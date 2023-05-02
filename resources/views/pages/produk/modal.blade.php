<div class="modal fade" id="modalProduk" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" id="modalFormProduk" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="data_id" id="data_id">
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-2">Nama</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="Masukan Nama Produk" name="nama_produk" id="nama_produk" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-2">Jenis Produk</label>
                        <div class="col-lg-10">
                            <select class="form-select" name="jenis_produk" id="jenis_produk">
                                <option value="">-- Pilih Jenis Produk --</option>
                                <option value="1">Sayur</option>
                                <option value="2">Buah</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" id="simpan" value="create">Simpan</button>
                    <button type="submit" class="btn btn-success" id="update" value="create">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
