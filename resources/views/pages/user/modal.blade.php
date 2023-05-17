<div class="modal fade" id="modalUser" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" id="modalFormUser" enctype="multipart/form-data">
                {{-- @csrf --}}
                <div class="modal-header">
                    <h5 class="modal-title fw-bold"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="data_id" id="data_id">
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-3">Nama</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="name" id="name" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-3">Username</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="username" id="username" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-3">E-mail</label>
                        <div class="col-lg-9">
                            <input type="email" class="form-control" name="email" id="email" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-3">Role</label>
                        <div class="col-lg-9">
                            <select class="form-select" name="role" id="role">
                                <option value="">-- Pilih Role --</option>
                                <option value="1">Superadmin</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-3">Password</label>
                        <div class="col-lg-9 input-wrapper">
                            <input type="password" class="form-control" name="password" id="password" required>
                            <span class="input-icon"><i class="far fa-eye" id="toggle_password"></i></span>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-form-label col-lg-3">Konfirmasi Password</label>
                        <div class="col-lg-9 input-wrapper">
                            <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password" required>
                            <span class="input-icon"><i class="far fa-eye" id="toggle_konfirmasi_password"></i></span>
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
