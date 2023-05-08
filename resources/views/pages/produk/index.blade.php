@extends('layouts.app')
@section('title', 'Produk')
@section('style')
    <style>
        table.dataTable>tfoot tr>th>select {
            display: none !important;
        }

        table.dataTable.table-loader {
            visibility: hidden;
            margin-top: -2em !important;
        }
    </style>
@endsection
@section('content')
    <div class="container p-0 text-sm">
        <div class="row">
            <div class="col-12">
                <div class="card-header pt-3 py-2 m-0 pb-2">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="fw-bold text-nowrap me-3">{{ $header }}</h4>
                            <div>
                                <button class="btn btn-sm btn-primary shadow" id="tambah">Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-white pt-0 mt-0">
                    <div class="col-12">
                        <table class="table table-hover table-bordered" id="dataProduk" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">No</th>
                                    <th class="text-nowrap">#</th>
                                    <th class="text-nowrap">Nama</th>
                                    <th class="text-nowrap">Jenis Produk</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.produk.modal')
@endsection
@section('script')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>

    <script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/4.2.1/js/dataTables.fixedColumns.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/min/moment.min.js" integrity="sha256-c95CVJWVMOTR2b7FhjeRhPlrSVPaz5zV5eK917/s7vc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/min/moment-with-locales.min.js" integrity="sha256-E3Snwx6F4t7DiA/L3DgPk6In2M1747JSau+3PWjtS5I=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>

    <script>
        $(document).ready(function() {
            let uriIndex;

            var table = $('#dataProduk').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    type: "GET",
                    url: uriIndex,
                    dataSrc: function(json) {
                        return json.data;
                    }
                },
                responsive: true,
                fixedHeader: true,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: 'false',
                        searchable: 'false'
                    },
                    {
                        data: 'nama_produk',
                        name: 'nama_produk',
                        class: 'text-nowrap'
                    },
                    {
                        data: 'jenis_produk',
                        name: 'jenis_produk',
                        class: 'text-nowrap'
                    },
                ],
                select: {
                    style: "multi"
                },
                // language: {
                //     url: '{{ asset('id.json') }}',
                //     processing: "<div id='loadercontainer'><div class='d-flex justify-content-center text-secondary' id='loader'><div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div></div></div>"
                // },
                dom: '<"row"<"col-12 col-sm-6 py-0"l><"col-12 col-sm-6 py-0 pt-2 pt-sm-0"fr><"col-12"t><"col-12 d-flex justify-content-between"ip>>',
            });

            $('body').on('click', '#tambah', function() {
                $('#modalProduk').modal('show');
                $('.modal-title').text("Tambah Produk");
                $('#update').addClass('d-none');
                $('#simpan').removeClass('d-none');
                $('#nama_produk').val('');
                $('#jenis_produk').val('');
            });

            $('body').on('click', '#simpan', function() {
                let nama_produk = $('#nama_produk').val();
                let jenis_produk = $('#jenis_produk').val();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('master.produk.store') }}",
                    data: {
                        _token: '{!! csrf_token() !!}',
                        nama_produk: nama_produk,
                        jenis_produk: jenis_produk
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#modalProduk').modal('hide');
                        swal({
                            title: data.title,
                            text: data.message,
                            timer: 5000,
                            type: data.status,
                        });
                        table.draw();
                    },
                    error: function(data) {
                        $('#modalProduk').modal('show');
                    }
                });
            });

            $('body').on('click', '.btnEdit', function() {
                let id = $(this).data('id');
                let ajax1 = $.ajax({
                    type: 'GET',
                    url: "{{ route('master.produk.edit') }}",
                    data: {
                        id: id,
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#modalProduk').modal('show');
                        $('.modal-title').text("Edit Produk " + data.data.nama_produk);
                        $('#simpan').addClass('d-none');
                        $('#update').removeClass('d-none');
                        $('#update').val(data.data.id);
                        $('#nama_produk').val(data.data.nama_produk);
                        $('#jenis_produk').val(data.data.jenis_produk);
                    },
                    error: function(data) {
                        $('#modalProduk').modal('hide');
                    }
                });
            });

            $('body').on('click', '#update', function() {
                let id = $(this).val();
                let nama_produk = $('#nama_produk').val();
                let jenis_produk = $('#jenis_produk').val();
                console.log(id);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('master.produk.update') }}",
                    data: {
                        _token: '{!! csrf_token() !!}',
                        id: id,
                        nama_produk: nama_produk,
                        jenis_produk: jenis_produk
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#modalProduk').modal('hide');
                        swal({
                            title: data.title,
                            text: data.message,
                            timer: 5000,
                            type: data.status,
                        });
                        table.draw();
                    },
                    error: function(data) {
                        $('#modalProduk').modal('show');
                    }
                });
            });

            $('body').on('click', '.btnHapus', function() {
                let id = $(this).data('id');
                let call = $(this).data('call');

                $('#modalProduk').modal('hide');
                swal({
                    title: "Hapus Data",
                    text: "Apa anda yakin akan menghapus data " + call + " ?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Tidak',
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{ route('master.produk.delete') }}",
                            method: 'POST',
                            data: {
                                _token: '{!! csrf_token() !!}',
                                id: id
                            },
                            success: function(data) {
                                table.draw();
                                swal({
                                    text: data.message,
                                    timer: 5000,
                                    type: data.status,
                                });
                            },
                            error: function(data) {
                                swal({
                                    text: data.message,
                                    timer: 5000,
                                    type: data.status,
                                });
                            }
                        });
                    } else {
                        swal("Hapus data dibatalkan !");
                    }
                }, function(dismiss) {
                    if (dismiss == 'cancel') {
                        //
                    }
                });
            });
        });
    </script>
@endsection
