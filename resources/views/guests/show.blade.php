<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Tamu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <dl class="divide-y divide-gray-200">
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">Nama</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $guest->name }}</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $guest->email }}</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">Phone</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $guest->phone ?? '-' }}</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">Status RSVP</dt>
                            <dd class="mt-1 sm:col-span-2">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $guest->rsvp_status === 'coming' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $guest->rsvp_status === 'coming' ? 'Hadir' : 'Tidak Hadir' }}
                                </span>
                            </dd>
                        </div>
                        @if($guest->voucher)
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">Kode Voucher</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 font-mono">{{ $guest->voucher->code }}</dd>
                        </div>
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">Status Voucher</dt>
                            <dd class="mt-1 sm:col-span-2">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $guest->voucher->status === 'unused' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ $guest->voucher->status === 'unused' ? 'Belum Dipakai' : 'Sudah Dipakai' }}
                                </span>
                            </dd>
                        </div>
                        @endif
                        <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-gray-500">Tanggal RSVP</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $guest->created_at->format('d M Y H:i') }}</dd>
                        </div>
                    </dl>

                    <div style="margin-top: 24px; display: flex; justify-content: space-between; align-items: center;">
                        <a href="{{ route('dashboard') }}" style="display: inline-block; padding: 10px 16px; background-color: #E5E7EB; color: #374151; font-size: 12px; font-weight: 600; text-transform: uppercase; border-radius: 6px; text-decoration: none;">
                            Kembali
                        </a>
                        <a href="{{ route('guests.edit', $guest) }}" style="display: inline-block; padding: 10px 16px; background-color: #4F46E5; color: white; font-size: 12px; font-weight: 600; text-transform: uppercase; border-radius: 6px; text-decoration: none;">
                            Edit Data
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
