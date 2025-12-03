<div class="p-6">

    <h2 class="text-2xl font-semibold mb-4">Daftar Pengajuan Kos</h2>

    <div class="bg-white shadow rounded-lg p-4">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="p-3 text-left">Nama Kos</th>
                    <th class="p-3 text-left">Pemilik</th>
                    <th class="p-3 text-left">Lokasi</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($kosList as $kos)
                <tr class="border-b">
                    <td class="p-3">{{ $kos->nama }}</td>
                    <td class="p-3">{{ $kos->pemilik->name }}</td>
                    <td class="p-3">{{ $kos->lokasi }}</td>

                    <td class="p-3">
                        @if ($kos->status == 'pending')
                            <span class="px-3 py-1 text-sm bg-yellow-200 text-yellow-800 rounded">Pending</span>
                        @elseif ($kos->status == 'approved')
                            <span class="px-3 py-1 text-sm bg-green-200 text-green-800 rounded">Disetujui</span>
                        @else
                            <span class="px-3 py-1 text-sm bg-red-200 text-red-800 rounded">Ditolak</span>
                        @endif
                    </td>

                    <td class="p-3 flex gap-2">
                        @if ($kos->status == 'pending')
                            <form action="{{ route('admin.kos.approve', $kos->id) }}" method="POST">
                                @csrf
                                <button class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700">
                                    Approve
                                </button>
                            </form>

                            <form action="{{ route('admin.kos.reject', $kos->id) }}" method="POST">
                                @csrf
                                <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                    Reject
                                </button>
                            </form>
                        @else
                            <span class="text-gray-500 text-sm">Tidak ada aksi</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
