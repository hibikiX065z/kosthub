@extends('layouts.footer')


@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Filter Kos</title>
</head>

<body class="bg-gray-100 p-6">

    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-6">

        <!-- ================= FILTER SIDEBAR ================= -->
        <div class="bg-white p-5 rounded-2xl shadow-xl h-fit md:sticky top-4">
            <h2 class="text-xl font-bold mb-4">Filter</h2>

            <form action="{{ route('search.kos') }}" method="GET" class="space-y-5">

                <!-- Lokasi -->
                <div>
                    <label class="font-semibold">Lokasi</label>
                    <input 
                        type="text" 
                        name="lokasi"
                        value="{{ request('lokasi') }}"
                        class="w-full mt-1 p-2 border rounded-lg"
                        placeholder="Cari lokasi..."
                    />
                </div>

                <!-- Harga -->
                <div>
                    <label class="font-semibold">Harga</label>
                    <div class="flex items-center gap-2 mt-1">
                        <input 
                            type="number" 
                            name="harga_min"
                            value="{{ request('harga_min') }}"
                            class="w-1/2 p-2 border rounded-lg" 
                            placeholder="Min" 
                        />
                        <input 
                            type="number" 
                            name="harga_max"
                            value="{{ request('harga_max') }}"
                            class="w-1/2 p-2 border rounded-lg" 
                            placeholder="Max" 
                        />
                    </div>
                </div>

                <!-- Tipe Kos -->
                <div>
                    <label class="font-semibold">Tipe Kos</label>
                    <select name="tipe" class="w-full mt-1 p-2 border rounded-lg">
                        <option value="">Semua</option>
                        <option value="putra" {{ request('tipe')=='putra' ? 'selected' : '' }}>Putra</option>
                        <option value="putri" {{ request('tipe')=='putri' ? 'selected' : '' }}>Putri</option>
                        <option value="campur" {{ request('tipe')=='campur' ? 'selected' : '' }}>Campur</option>
                    </select>
                </div>

                <!-- Fasilitas -->
                <div>
                    <label class="font-semibold">Fasilitas</label>
                    <div class="mt-1 space-y-2 text-sm">

                        @php
                            $fasilitasReq = request()->has('fasilitas') ? request('fasilitas') : [];
                        @endphp

                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="fasilitas[]" value="AC"
                                   {{ in_array('AC', $fasilitasReq) ? 'checked' : '' }}>
                            AC
                        </label>

                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="fasilitas[]" value="WiFi"
                                   {{ in_array('WiFi', $fasilitasReq) ? 'checked' : '' }}>
                            WiFi
                        </label>

                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="fasilitas[]" value="Kamar Mandi Dalam"
                                   {{ in_array('Kamar Mandi Dalam', $fasilitasReq) ? 'checked' : '' }}>
                            Kamar Mandi Dalam
                        </label>

                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="fasilitas[]" value="Lemari"
                                   {{ in_array('Lemari', $fasilitasReq) ? 'checked' : '' }}>
                            Lemari / Meja
                        </label>

                    </div>
                </div>

                <button class="bg-blue-600 text-white w-full p-2 rounded-xl shadow hover:bg-blue-700 transition">
                    Terapkan Filter
                </button>
            </form>
        </div>

        <!-- ================= LIST KOS ================= -->
        <div class="md:col-span-3 grid grid-cols-1 sm:grid-cols-2 gap-5">

            @forelse($kos as $item)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <img 
                        src="{{ $item->foto ?? 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c' }}" 
                        class="w-full h-40 object-cover" 
                    />

                    <div class="p-4">
                        <h3 class="font-bold text-lg">{{ $item->nama }}</h3>

                        <p class="text-gray-500 text-sm mt-1">
                            {{ $item->lokasi }}
                        </p>

                        <p class="text-blue-600 font-semibold mt-2">
                            Rp {{ number_format($item->harga) }} / bulan
                        </p>

                        <div class="text-xs text-gray-600 mt-2">
                            {{ $item->fasilitas }}
                        </div>

                        <a href="{{ route('kos.detail', $item->id) }}">
                            <button class="mt-3 w-full bg-gray-900 text-white py-2 rounded-xl hover:bg-black">
                                Lihat Detail
                            </button>
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-gray-600 col-span-2">Tidak ada kos ditemukan.</p>
            @endforelse

        </div>
    </div>

</body>
</html>
