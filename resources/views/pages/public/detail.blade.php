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
                <div class="card">
                    <div class="card-header">
                        <h5>Traceability System</h5>
                        <span class="text-sm" style="font-size: 12px">by Dwi Prayoga</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <td>: {{ $data['nama_produk'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Produk</th>
                                        <td>: {{ $data['jenis_produk'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kode Produk</th>
                                        <td>: {{ $data['kode_produk'] }}</td>
                                    </tr>
                                    <tr>
                                        <th >Lokasi Tanam</th>
                                        <td>: {{ $data['lokasi_tanam'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Petani</th>
                                        <td>: {{ $data['nama_petani'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Teknik Budidaya</th>
                                        <td>: {{ $data['teknik_budidaya'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Tanam</th>
                                        <td>: {{ $data['tanggal_tanam'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Panen</th>
                                        <td>: {{ $data['tanggal_panen'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Usia</th>
                                        <td>: {{ $data['usia'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kualitas Produk</th>
                                        <td>: {{ $data['kualitas_produk'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Expired</th>
                                        <td>: {{ $data['tanggal_expired'] }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="col-md-7 d-flex justify-content-center img-fluid mt-2">
                                                <img class="gambarPreview img-fluid"  src="{{ $data['gambar_1'] }}" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="col-md-7 d-flex justify-content-center img-fluid mt-2">
                                                <img class="gambarPreview img-fluid"  src="{{ $data['gambar_2'] }}" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="col-md-7 d-flex justify-content-center img-fluid mt-2">
                                                <img class="gambarPreview img-fluid"  src="{{ $data['gambar_3'] }}" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="col-md-7 d-flex justify-content-center img-fluid mt-2 shadow">
                                                <a href="https://api.whatsapp.com/send?phone=6281937093899&text" target="_blank" class="btn btn-success btn-sm">WhatsApp</a>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        $(document).ready(function() {});
    </script>
@endsection
