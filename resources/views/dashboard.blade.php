<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard - Daftar RSVP
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                        <h3 style="font-size: 18px; font-weight: 600;">Daftar Tamu</h3>
                        <a href="{{ route('guests.create') }}" style="display: inline-block; padding: 10px 20px; background-color: #4F46E5; color: white; font-weight: 600; border-radius: 6px; text-decoration: none;">
                            + Tambah Tamu
                        </a>
                    </div>

                    <div style="overflow-x: auto;">
                        <table style="width: 100%; border-collapse: collapse;">
                            <thead style="background-color: #F9FAFB;">
                                <tr>
                                    <th style="padding: 12px; text-align: left; font-size: 12px; font-weight: 500; color: #6B7280; text-transform: uppercase;">ID</th>
                                    <th style="padding: 12px; text-align: left; font-size: 12px; font-weight: 500; color: #6B7280; text-transform: uppercase;">Nama</th>
                                    <th style="padding: 12px; text-align: left; font-size: 12px; font-weight: 500; color: #6B7280; text-transform: uppercase;">Email</th>
                                    <th style="padding: 12px; text-align: left; font-size: 12px; font-weight: 500; color: #6B7280; text-transform: uppercase;">Phone</th>
                                    <th style="padding: 12px; text-align: left; font-size: 12px; font-weight: 500; color: #6B7280; text-transform: uppercase;">Status</th>
                                    <th style="padding: 12px; text-align: left; font-size: 12px; font-weight: 500; color: #6B7280; text-transform: uppercase;">Voucher</th>
                                    <th style="padding: 12px; text-align: right; font-size: 12px; font-weight: 500; color: #6B7280; text-transform: uppercase;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody style="background-color: white;">
                                @forelse($guests as $guest)
                                    <tr style="border-top: 1px solid #E5E7EB;">
                                        <td style="padding: 12px; font-size: 14px; color: #6B7280;">{{ $guest->id }}</td>
                                        <td style="padding: 12px; font-size: 14px; font-weight: 500; color: #111827;">{{ $guest->name }}</td>
                                        <td style="padding: 12px; font-size: 14px; color: #6B7280;">{{ $guest->email }}</td>
                                        <td style="padding: 12px; font-size: 14px; color: #6B7280;">{{ $guest->phone ?? '-' }}</td>
                                        <td style="padding: 12px;">
                                            @if($guest->rsvp_status === 'coming')
                                                <span style="padding: 4px 8px; font-size: 12px; font-weight: 600; background-color: #D1FAE5; color: #065F46; border-radius: 9999px;">Hadir</span>
                                            @else
                                                <span style="padding: 4px 8px; font-size: 12px; font-weight: 600; background-color: #FEE2E2; color: #991B1B; border-radius: 9999px;">Tidak Hadir</span>
                                            @endif
                                        </td>
                                        <td style="padding: 12px; font-size: 14px; color: #6B7280;">
                                            @if($guest->voucher)
                                                @if($guest->voucher->status === 'unused')
                                                    <span style="padding: 4px 8px; font-size: 12px; font-weight: 600; background-color: #DBEAFE; color: #1E40AF; border-radius: 9999px;">Belum Dipakai</span>
                                                @else
                                                    <span style="padding: 4px 8px; font-size: 12px; font-weight: 600; background-color: #F3F4F6; color: #374151; border-radius: 9999px;">Sudah Dipakai</span>
                                                @endif
                                            @else
                                                <span style="color: #9CA3AF;">-</span>
                                            @endif
                                        </td>
                                        <td style="padding: 12px; text-align: right; white-space: nowrap;">
                                            <a href="{{ route('guests.show', $guest) }}" style="display: inline-block; padding: 6px 12px; background-color: #3B82F6; color: white; font-size: 13px; font-weight: 500; border-radius: 4px; text-decoration: none; margin-right: 4px;">Detail</a>
                                            <a href="{{ route('guests.edit', $guest) }}" style="display: inline-block; padding: 6px 12px; background-color: #EAB308; color: white; font-size: 13px; font-weight: 500; border-radius: 4px; text-decoration: none; margin-right: 4px;">Edit</a>
                                            <form action="{{ route('guests.destroy', $guest) }}" method="POST" style="display: inline-block; margin: 0;" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="padding: 6px 12px; background-color: #EF4444; color: white; font-size: 13px; font-weight: 500; border-radius: 4px; border: none; cursor: pointer;">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" style="padding: 16px; text-align: center; color: #6B7280;">Belum ada data RSVP</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div style="margin-top: 20px;">
                        {{ $guests->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
