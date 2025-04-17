<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 20px;
            font-size: 12pt;
        }
        .container {
            width: 100%;
            margin: auto;
        }
        .text-center {
            text-align: center;
        }
        .text-end {
            text-align: right;
        }
        .mb-3 {
            margin-bottom: 1rem;
        }
        .mt-3 {
            margin-top: 1rem;
        }
        .mt-4 {
            margin-top: 2rem;
        }
        .mt-5 {
            margin-top: 2.5rem;
        }
        hr {
            border: 5px solid black;
            margin: 10px 0;
        }
        table {
            margin-left: 20px;
            border-spacing: 0;
        }
        td {
            padding: 4px 8px;
            vertical-align: top;
        }
        h3 {
            font-weight: normal;
        }

    </style>
</head>
<body>

<div class="container">
    <!-- KOP SURAT -->
    <div class="text-center mb-2">
        <table style="width: 84%; margin-left: 0;">
            <tr style="">
                <td style="text-align: center;">
                    <img src="{{ $logo_path }}" width="90" height="90" alt="Logo Desa">
                </td>
                <td style="text-align: center;">
                    <h3 style="margin: 0;">PEMERINTAH KABUPATEN JEMBRANA</h3>
                    <h3 style="margin: 0;">KECAMATAN MELAYA</h3>
                    <h3 style="margin: 0;"><strong>DESA EKASARI</strong></h3>
                    <p style="margin: 0; font-size: 14px;">Alamat: Jl. Contoh Alamat No.123, Kode Pos 12345</p>
                </td>
            </tr>
        </table>
        <hr>
    </div>

    <!-- ISI SURAT -->
    <div class="text-center mb-3">
        <h4 style="text-decoration: underline;">SURAT KETERANGAN DOMISILI</h4>
        <p>Nomor Surat: {{ $nomor_surat }}</p>
    </div>

    <p>Yang bertanda tangan di bawah ini, Kepala Desa Ekasari, menerangkan bahwa:</p>

    <table>
        <tr>
            <td style="width: 150px;">Nama</td>
            <td>: {{ $data->nama }}</td>
        </tr>
        <tr>
            <td>Tempat/Tgl Lahir</td>
            <td>: {{ $data->tempat_lahir }}, {{ \Carbon\Carbon::parse($data->tgl_lahir)->format('d F Y') }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: {{ $data->alamat }}</td>
        </tr>
        <tr>
            <td>Keperluan</td>
            <td>: {{ $keperluan }}</td>
        </tr>
    </table>

    <p class="mt-4">
        Adalah benar yang bersangkutan adalah warga Desa Ekasari dan surat keterangan ini dibuat sebagai kelengkapan administrasi untuk keperluan tersebut di atas.
    </p>

    <div class="text-end mt-5">
        <p>Ekasari, {{ \Carbon\Carbon::parse($tanggal_dibuat)->translatedFormat('d F Y') }}</p>
        <p><strong>Kepala Desa Ekasari</strong></p>
        <br><br>
        <p><strong><u>I Gede Puja</u></strong></p>
    </div>
</div>

</body>
</html>
