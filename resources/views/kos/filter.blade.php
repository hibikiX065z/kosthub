
<form action="{{ route('kos.filter') }}" method="GET">
    <h3>Filter Kos</h3>

    <!-- Harga -->
    <label>Harga Minimum</label>
    <input type="number" name="harga_min" placeholder="cth: 500000">

    <label>Harga Maximum</label>
    <input type="number" name="harga_max" placeholder="cth: 1500000">

    <!-- Tipe -->
    <label>Tipe Kos</label>
    <select name="tipe">
        <option value="">-- pilih --</option>
        <option value="putra">Putra</option>
        <option value="putri">Putri</option>
        <option value="campur">Campur</option>
    </select>

    <!-- Fasilitas -->
    <label>Fasilitas</label>
    <select name="fasilitas">
        <option value="">-- pilih --</option>
        <option value="AC">AC</option>
        <option value="WiFi">WiFi</option>
        <option value="Kamar Mandi Dalam">Kamar Mandi Dalam</option>
    </select>

    <!-- Lokasi -->
    <label>Lokasi</label>
    <input type="text" name="lokasi" placeholder="cari kota / daerah">

    <button type="submit">Cari</button>
</form>

<hr>

<h3>Hasil:</h3>

@foreach($kos as $item)
    <div>
        <h4>{{ $item->nama }}</h4>
        <p>Harga: Rp {{ number_format($item->harga) }}</p>
        <p>Tipe: {{ $item->tipe }}</p>
        <p>Fasilitas: {{ $item->fasilitas }}</p>
        <p>Lokasi: {{ $item->lokasi }}</p>
    </div>
@endforeach
