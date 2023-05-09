<div class="modal fade" id="modalDetailProduk" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" id="modalFormDetailProduk" enctype="multipart/form-data">
                {{-- @csrf --}}
                <div class="modal-header">
                    <h5 class="modal-title fw-bold"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="data_id" id="data_id">
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-2">Nama Produk</label>
                        <div class="col-lg-10">
                            <select class="form-select" name="id_produk" id="id_produk">
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-2">Jenis Produk</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="jenis_produk" id="jenis_produk" readonly>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-2">Nama Petani</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="Masukan Nama Petani" name="nama_petani" id="nama_petani" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-2">Teknik Budidaya</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="Masukan Teknik Budidaya" name="teknik_budidaya" id="teknik_budidaya" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-2">Lokasi Tanam</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="Masukan Lokasi Tanam" name="lokasi_tanam" id="lokasi_tanam" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-2">Tanggal Tanam</label>
                        <div class="col-lg-10">
                            <input type="date" class="form-control" name="tgl_tanam" id="tgl_tanam" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-2">Tanggal Panen</label>
                        <div class="col-lg-10">
                            <input type="date" class="form-control" name="tgl_panen" id="tgl_panen" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-2">Tanggal Expired</label>
                        <div class="col-lg-10">
                            <input type="date" class="form-control" name="tgl_exp" id="tgl_exp" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-2">Kualitas Produk</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="Masukan Kualitas Produk" name="kualitas" id="kualitas" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="simpan" value="create">Simpan</button>
                    <button type="button" class="btn btn-success" id="update" value="create">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
