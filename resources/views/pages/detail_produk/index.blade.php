@extends('layouts.app')
@section('title', 'Detail Produk')
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
    <div class="container-fluid p-0 text-sm">
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
                                    <th class="text-nowrap">Kode</th>
                                    <th class="text-nowrap">Nama</th>
                                    <th class="text-nowrap">Jenis Produk</th>
                                    <th class="text-nowrap">Nama Petani</th>
                                    <th class="text-nowrap">Teknik Budidaya</th>
                                    <th class="text-nowrap">Lokasi Tanam</th>
                                    <th class="text-nowrap">Tanggal Tanam</th>
                                    <th class="text-nowrap">Tanggal Panen</th>
                                    <th class="text-nowrap">Usia</th>
                                    <th class="text-nowrap">Kualitas Produk</th>
                                    <th class="text-nowrap">Tanggal Expired</th>
                                    <th class="text-nowrap">Gambar 1</th>
                                    <th class="text-nowrap">Gambar 2</th>
                                    <th class="text-nowrap">Gambar 3</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.detail_produk.modal')
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
                        data: 'kode_produk',
                        name: 'kode_produk',
                        class: 'text-nowrap'
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
                    {
                        data: 'nama_petani',
                        name: 'nama_petani',
                        class: 'text-nowrap'
                    },
                    {
                        data: 'teknik_budidaya',
                        name: 'teknik_budidaya',
                        class: 'text-nowrap'
                    },
                    {
                        data: 'lokasi_tanam',
                        name: 'lokasi_tanam',
                        class: 'text-nowrap'
                    },
                    {
                        data: 'tanggal_tanam',
                        name: 'tanggal_tanam',
                        class: 'text-nowrap'
                    },
                    {
                        data: 'tanggal_panen',
                        name: 'tanggal_panen',
                        class: 'text-nowrap'
                    },
                    {
                        data: 'usia',
                        name: 'usia',
                        class: 'text-nowrap'
                    },
                    {
                        data: 'kualitas_produk',
                        name: 'kualitas_produk',
                        class: ''
                    },
                    {
                        data: 'tanggal_expired',
                        name: 'tanggal_expired',
                        class: ''
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

            function get_produk() {
                $.ajax({
                    url: "{{ route('master.produk.get_produk') }}",
                    method: "GET",
                    dataType: "json",
                    data: {
                        _token: '{!! csrf_token() !!}',
                    },
                    success: function(data) {
                        if (data) {
                            $('#id_produk').append('<option value="">-Pilih Produk-</option>');
                            jQuery.each(data, function(id, data) {
                                $('#id_produk').append('<option value="' + data.id + '">' + data.nama_produk + '</option>');
                            });
                        } else {
                            $('#id_produk').append('<option value="">Produk Kosong</option>');
                        }
                    }
                });
            };

            $('body').on('click', '#tambah', function() {
                $('#modalDetailProduk').modal('show');
                $('.modal-title').text("Tambah Detail Produk");
                $('#update').addClass('d-none');
                $('#simpan').removeClass('d-none');
                get_produk();
                $('#nama_produk').val('');
                $('#jenis_produk').val('');
            });

            $('body').on('change', '#id_produk', function() {
                let id = $(this).val();
                $.ajax({
                    url: "{{ route('master.produk.selected_produk') }}",
                    method: "GET",
                    dataType: "json",
                    data: {
                        _token: '{!! csrf_token() !!}',
                        id: id
                    },
                    success: function(data) {
                        if (data) {
                            if (data.jenis_produk == 1) {
                                data.jenis_produk = 'Sayur';
                            } else {
                                data.jenis_produk = 'Buah';
                            }
                            $('#jenis_produk').append('<option selected>' + data.jenis_produk + '</option>');
                        } else {
                            $('#jenis_produk').append('<option value=""></option>');
                        }
                    }
                });
            });

            $('body').on('click', '#simpan', function() {
                let id_produk = $('#id_produk').val();
                let nama_petani = $('#nama_petani').val();
                let teknik_budidaya = $('#teknik_budidaya').val();
                let lokasi_tanam = $('#lokasi_tanam').val();
                let tgl_tanam = $('#tgl_tanam').val();
                let tgl_panen = $('#tgl_panen').val();
                let tgl_exp = $('#tgl_exp').val();
                let kualitas = $('#kualitas').val();
                let gambar_1 = $('#gambar_1').val();
                let gambar_2 = $('#gambar_2').val();
                let gambar_3 = $('#gambar_3').val();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('detail-produk.store') }}",
                    data: {
                        _token: '{!! csrf_token() !!}',
                        id_produk: id_produk,
                        nama_petani: nama_petani,
                        teknik_budidaya: teknik_budidaya,
                        lokasi_tanam: lokasi_tanam,
                        tgl_tanam: tgl_tanam,
                        tgl_panen: tgl_panen,
                        tgl_exp: tgl_exp,
                        kualitas: kualitas,
                        gambar_1: gambar_1,
                        gambar_2: gambar_2,
                        gambar_3: gambar_3,
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#modalDetailProduk').modal('hide');
                        table.draw();
                    },
                    error: function(data) {
                        $('#modalDetailProduk').modal('show');
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
                        get_produk();
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
