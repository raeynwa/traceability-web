<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        body {
            font-size: 40%;
        }

        /* tr:nth-child(even) td {
            background: #e8eae9;
            } */
        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        .left {
            text-align: left;
        }

        .justify {
            text-align: justify;
        }

        .logo {
            position: absolute;
            top: 5;
            width: 60px;
            height: 60px;
            margin-top: 0.5rem;
        }

        .col-12 {
            width: 100%
        }

        .col-6 {
            width: 50%
        }

        table#table1 {
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
        }

        tr,
        td {
            text-align: left;
        }
    </style>
    <link rel="stylesheet" href="">
    <title>Qr Code {{ $data['kode_produk'] }}</title>
</head>

<body>
    <div class="center" style="margin-left: auto">
        <h1>Scan Here</h1>
        <br>
        <img src="data:image/png;base64, {!! base64_encode($qrCode) !!} ">
        <br>
        {{-- <span>{{ $data['kode_produk'] }}</span> --}}
        <h1>For Traceability</h1>
    </div>
</body>

</html>
