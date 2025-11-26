<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use RuntimeException;

class WahaClient
{
    protected string $baseUrl;
    protected string $session;
    protected ?string $apiKey;

    public function __construct()
    {
        $this->baseUrl = rtrim((string) config('services.waha.base_url'), '/');
        $this->session = (string) config('services.waha.session', 'default');
        $this->apiKey = config('services.waha.api_key');
    }

    public function sendText(string $phoneNumber, string $message): void
    {
        if (empty($this->baseUrl)) {
            throw new RuntimeException('WAHA base URL has not been configured.');
        }

        $payload = [
            'session' => $this->session,
            'chatId' => $this->formatChatId($phoneNumber),
            'text' => $message,
        ];

        $response = Http::withHeaders($this->authHeaders())
            ->post("{$this->baseUrl}/api/sendText", $payload);

        if ($response->failed()) {
            Log::error('WAHA sendText failed', [
                'phone' => $phoneNumber,
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            $response->throw();
        }
    }

    protected function authHeaders(): array
    {
        if (empty($this->apiKey)) {
            return [];
        }

        return [
            'X-Api-Key' => $this->apiKey,
        ];
    }

    protected function formatChatId(string $phoneNumber): string
    {
        $trimmed = trim($phoneNumber);

        if (Str::endsWith($trimmed, '@c.us')) {
            return $trimmed;
        }

        $digits = preg_replace('/\D+/', '', $trimmed);

        if (empty($digits)) {
            throw new RuntimeException('Invalid WhatsApp number provided.');
        }

        if (Str::startsWith($digits, '0')) {
            $countryCode = config('rsvp.default_country_code');
            if ($countryCode) {
                $digits = $countryCode . ltrim($digits, '0');
            }
        }

        return "{$digits}@c.us";
    }
}

