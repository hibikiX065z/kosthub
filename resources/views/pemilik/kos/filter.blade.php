<!-- Pemilik Filter -->
<form action="{{ route('pemilik.kos.search') }}" method="GET" class="mb-4">

    <div class="d-flex gap-2">

        <input type="text" 
               name="lokasi" 
               class="form-control"
               placeholder="Cari kos anda..."
               value="{{ request('lokasi') }}">

        <button 
            type="button"
            class="btn btn-outline-warning"
            data-bs-toggle="modal"
            data-bs-target="#filterPemilik">
            Filter
        </button>

        <button type="submit" class="btn btn-warning text-white">
            Cari
        </button>
    </div>

</form>

{{-- MODAL --}}
<div class="modal fade" id="filterPemilik">
  <div class="modal-dialog">
    <form action="{{ route('pemilik.kos.search') }}" method="GET" class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title fw-bold">Filter Kos Anda</h5>
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

      </div>

      <div class="modal-footer">
        <button class="btn btn-warning w-100 text-white">Terapkan</button>
      </div>

    </form>
  </div>
</div>

