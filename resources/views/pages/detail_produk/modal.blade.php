<div class="modal fade" id="modalDetailProduk" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form type="post" id="modalFormDetailProduk" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="data_id" id="data_id">
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-3">Nama Produk</label>
                        <div class="col-lg-9">
                            <select class="form-select" name="id_produk" id="id_produk">
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-3">Jenis Produk</label>
                        <div class="col-lg-9">
                            <select class="form-select" name="jenis_produk" id="jenis_produk" disabled>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-3">Nama Petani</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" placeholder="Masukan Nama Petani" name="nama_petani" id="nama_petani" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-3">Teknik Budidaya</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" placeholder="Masukan Teknik Budidaya" name="teknik_budidaya" id="teknik_budidaya" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-3">Lokasi Tanam</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" placeholder="Masukan Lokasi Tanam" name="lokasi_tanam" id="lokasi_tanam" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-3">Tanggal Tanam</label>
                        <div class="col-lg-9">
                            <input type="date" class="form-control" name="tgl_tanam" id="tgl_tanam" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-3">Tanggal Panen</label>
                        <div class="col-lg-9">
                            <input type="date" class="form-control" name="tgl_panen" id="tgl_panen" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-3">Tanggal Expired</label>
                        <div class="col-lg-9">
                            <input type="date" class="form-control" name="tgl_exp" id="tgl_exp" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-3">Kualitas Produk</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" placeholder="Masukan Kualitas Produk" name="kualitas" id="kualitas" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-3">Gambar 1</label>
                        <div class="col-lg-9">
                            <input type="file" class="form-control" name="gambar_1" id="gambar_1" required>
                            <div class="invalid-feedback"></div>
                            <div class="col-md-7 d-flex justify-content-center img-fluid">
                                <img class="d-none gambarPreview" id="gambar_1_preview" src="" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-3">Gambar 2</label>
                        <div class="col-lg-9">
                            <input type="file" class="form-control" name="gambar_2" id="gambar_2" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-3">Gambar 3</label>
                        <div class="col-lg-9">
                            <input type="file" class="form-control" name="gambar_3" id="gambar_3" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="simpan" value="create">Simpan</button>
                    <button type="button" class="btn btn-success" id="update" value="create">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
