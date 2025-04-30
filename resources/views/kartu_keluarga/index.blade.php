<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Keluarga Indonesia - Landscape</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            /* background-color: #f0f0f0; */
        }
        
        .container {
            width: 100%;
            height: 650px;
            /* margin: 20px auto; */
            /* background-color: white; */
            /* padding: 15px; */
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
            /* box-sizing: border-box; */
        }
        
        .header {
            text-align: center;
            border-bottom: 3px solid #000;
            padding-bottom: 5px;
            margin-bottom: 5px; 
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .title {
            margin: 0;
            font-size: 22px;
            font-weight: bold;
        }
        
        .subtitle {
            margin: 2px 0;
            font-size: 16px;
        }
        
        .kk-number {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
            padding: 5px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
        }
        
        .section {
            margin: 10px 0;
        }
        
        .section-title {
            font-weight: bold;
            background-color: #e0e0e0;
            padding: 5px;
            font-size: 10px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
        }
        
        th, td {
            border: 1px solid #000;
            padding: 4px;
            text-align: left;
        }
        
        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        
        .footer {
            display: inline;
            justify-content: space-between;
            margin-top: 2px;
            font-size: 11px;
            padding: 0;
        }
        
        .signature-box {
            width: 20%;
            text-align: center;
            padding: 0px;
        }
        
        .signature-line {
            margin-top: 40px;
            border-bottom: 1px solid #000;
        }
        
        .logo {
            height: 60px;
            margin-right: 10px;
            vertical-align: middle;
        }
        
        .header-content {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .header-text {
            text-align: center;
        }
        
        .compact-table th, .compact-table td {
            padding: 3px;
            font-size: 10px;
        }
        .desa{
            margin-top:-8px;
            margin-bottom: 0;
        }
        .nama{
            margin-top:-2px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-content">
                <div class="header-text">
                    <h1 class="title">KARTU KELUARGA</h1>
                    <p class="subtitle">REPUBLIK INDONESIA</p>
                    <p class="subtitle">NO KK : {{ $kepala->no_kk }}</p>
                </div>
            </div>
        </div>
        
        {{-- <div class="kk-number">
            <div>No. KK: <strong>1234567890123456</strong></div>
            <div>Dikeluarkan Tanggal: <strong>01-01-2023</strong></div>
        </div> --}}
        
        <div class="section">
            <div class="section-title">DATA ALAMAT</div>
            <table>
                <tr>
                    <td width="15%">Alamat</td>
                    <td width="35%">{{ $kepala->alamat }}</td>
                    <td width="10%">Kode Pos</td>
                    <td width="10%">82245</td>
                    <td width="15%">Provinsi</td>
                    <td width="15%">BALI</td>
                </tr>
                <tr>
                    <td>RT/RW</td>
                    <td>-</td>
                    <td>Telepon</td>
                    <td>{{ $kepala->no_telepon }}</td>
                    <td>Kabupaten/Kota</td>
                    <td>JEMBRANA</td>
                </tr>
                <tr>
                    <td>Desa/Kelurahan</td>
                    <td>DESA EKASARI</td>
                    <td colspan="2"></td>
                    <td>Kecamatan</td>
                    <td>MELAYA</td>
                </tr>
            </table>
        </div>
        
        <div class="section">
            <div class="section-title">DATA KELUARGA</div>
            <table class="compact-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>NIK</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Agama</th>
                        <th>Pendidikan</th>
                        <th>Pekerjaan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                    <tr>
                        <td>1</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->nik }}</td>
                        <td>{{ $d->jenis_kelamin->jenis_kelamin }}</td>
                        <td>{{ $d->tempat_lahir }}</td>
                        <td>{{ $d->tgl_lahir }}</td>
                        <td>{{ $d->agama->agama }}</td>
                        <td>{{ $d->pendidikan->pendidikan }}</td>
                        <td>{{ $d->pekerjaan->nama_pekerjaan }}</td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        
        <div class="section">
            <div class="section-title">DATA PERKAWINAN</div>
            <table class="compact-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Status Perkawinan</th>
                        <th>No. Akta Nikah</th>
                        <th>Tanggal Perkawinan</th>
                        <th>Status Hub. Keluarga</th>
                        <th>Kewarganegaraan</th>
                        <th>No. Paspor</th>
                        <th>No. KITAS/KITAP</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $p)
                    <tr>
                        <td>1</td>
                        <td>{{ $p->kawin->status }}</td>
                        <td>{{ $p->akta_nikah }}</td>
                        <td>{{ $p->tgl_perkawinan }}</td>
                        <td>{{ $p->hubungan_keluarga->hubungan_keluarga }}</td>
                        <td>{{ $p->warga_negara->warga_negara }}</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="section">
            <div class="section-title">DATA ORANG TUA</div>
            <table class="compact-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK Ayah</th>
                        <th>Nama Ayah</th>
                        <th>NIK Ibu</th>
                        <th>Nama Ibu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $o)
                    <tr>
                        <td>1</td>
                        <td>{{ $o->nik_ayah }}</td>
                        <td>{{ $o->nama_ayah }}</td>
                        <td>{{ $o->nik_ibu }}</td>
                        <td>{{ $o->nama_ibu }}</td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        
        <div class="footer">
            <div class="signature-box">
                <p class="desa">Desa Ekasari, 01-01-2023</p>
                <p class="nama">Kepala Desa</p>
                <div class="signature-line"></div>
                <p>I Gede Puja</p>
            </div>
        </div>
    </div>
</body>
</html>