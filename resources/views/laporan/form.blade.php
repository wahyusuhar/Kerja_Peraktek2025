<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('laporan.index') }}" method="get" data-toggle="validator" class="form-horizontal">
            <div class="modal-content rounded-3 overflow-hidden shadow-lg border-0">

                <!-- Modal Header -->
                <div class="modal-header justify-content-between align-items-center p-3" style="background-color: #163696;">
                    <h5 class="modal-title text-white m-0" style="font-weight: 600;">
                        <i class="fa fa-truck me-2"></i> Periode Laporan
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body px-4 py-4">
                    <div class="mb-4 row align-items-center">
                        <label for="tanggal_awal" class="col-sm-3 col-form-label text-end fw-semibold">Tanggal Awal</label>
                        <div class="col-sm-7">
                            <input type="text" name="tanggal_awal" id="tanggal_awal" class="form-control datepicker shadow-sm" 
                                   value="{{ request('tanggal_awal') }}" required autofocus>
                            <div class="invalid-feedback">Tanggal awal wajib diisi.</div>
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label for="tanggal_akhir" class="col-sm-3 col-form-label text-end fw-semibold">Tanggal Akhir</label>
                        <div class="col-sm-7">
                            <input type="text" name="tanggal_akhir" id="tanggal_akhir" class="form-control datepicker shadow-sm" 
                                   value="{{ request('tanggal_akhir') ?? date('Y-m-d') }}" required>
                            <div class="invalid-feedback">Tanggal akhir wajib diisi.</div>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer bg-light px-4 py-3 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fa fa-save me-1"></i> Simpan
                    </button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="fa fa-times me-1"></i> Batal
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>
