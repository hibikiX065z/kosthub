<!-- Pencari Filter -->
<form action="{{ route('pencari.kos.search') }}" method="GET" class="mb-4">

    <div class="d-flex gap-2">

        <input type="text" 
               name="lokasi" 
               class="form-control"
               placeholder="Cari kos..."
               value="{{ request('lokasi') }}">

        <button type="button" 
                class="btn btn-outline-primary"
                data-bs-toggle="modal"
                data-bs-target="#filterPencari">
            Filter
        </button>

        <button type="submit" class="btn btn-primary">
            Cari
        </button>

    </div>
</form>

{{-- MODAL --}}
<div class="modal fade" id="filterPencari">
  <div class="modal-dialog">
    <form action="{{ route('pencari.kos.search') }}" method="GET" class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title fw-bold">Filter Kos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">

        {{-- Tipe --}}
        <label class="fw-semibold">Tipe Kos</label>
        <select name="tipe" class="form-select">
            <option value="">Semua</option>
            <option value="putra">Putra</option>
            <option value="putri">Putri</option>
            <option value="campur">Campur</option>
        </select>

        {{-- Harga --}}
        <label class="fw-semibold mt-3">Harga Maksimal</label>
        <input type="number" class="form-control" name="max_price">

        {{-- Fasilitas --}}
        <label class="fw-semibold mt-3">Fasilitas</label>
        <div class="d-flex flex-wrap gap-2">
            @foreach(['WiFi','AC','Kasur','Kamar Mandi Dalam','Listrik'] as $f)
                <label class="border px-3 py-1 rounded-pill">
                    <input type="checkbox" name="fasilitas[]" value="{{ $f }}">
                    {{ $f }}
                </label>
            @endforeach
        </div>

      </div>

      <div class="modal-footer">
        <button class="btn btn-primary w-100">Terapkan</button>
      </div>

    </form>
  </div>
</div>
