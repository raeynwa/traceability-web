@extends('layouts.auth')
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
                                {{-- <button class="btn btn-sm btn-primary shadow" id="tambah">Tambah</button> --}}
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
                        class: 'text-nowrap'
                    },
                    {
                        data: 'gambar_1',
                        name: 'gambar_1',
                        class: 'text-nowrap'
                    },
                    {
                        data: 'gambar_2',
                        name: 'gambar_2',
                        class: 'text-nowrap'
                    },
                    {
                        data: 'gambar_3',
                        name: 'gambar_3',
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

            $('body').on('click', '.viewData', function(){
                let data = $(this).val();
                window.open("{{ route('public.detail-produk') }}?data=" + data).focus();
            });
        });
    </script>
@endsection