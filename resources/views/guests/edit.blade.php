<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tamu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('guests.update', $guest) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $guest->name) }}" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $guest->email) }}" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone', $guest->phone) }}" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="rsvp_status" class="block text-sm font-medium text-gray-700">Status RSVP</label>
                            <select name="rsvp_status" id="rsvp_status" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                <option value="coming" {{ old('rsvp_status', $guest->rsvp_status) === 'coming' ? 'selected' : '' }}>Hadir</option>
                                <option value="not_coming" {{ old('rsvp_status', $guest->rsvp_status) === 'not_coming' ? 'selected' : '' }}>Tidak Hadir</option>
                            </select>
                            @error('rsvp_status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 24px;">
                            <a href="{{ route('dashboard') }}" style="display: inline-block; padding: 10px 16px; background-color: #E5E7EB; color: #374151; font-size: 12px; font-weight: 600; text-transform: uppercase; border-radius: 6px; text-decoration: none;">
                                Batal
                            </a>
                            <button type="submit" style="display: inline-block; padding: 10px 16px; background-color: #4F46E5; color: white; font-size: 12px; font-weight: 600; text-transform: uppercase; border-radius: 6px; border: none; cursor: pointer;">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
