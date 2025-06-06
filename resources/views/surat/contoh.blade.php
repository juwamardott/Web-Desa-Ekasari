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
            background-color: #f0f0f0;
        }
        
        .container {
            width: 1000px;
            height: 650px;
            margin: 20px auto;
            background-color: white;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }
        
        .header {
            text-align: center;
            border-bottom: 3px solid #000;
            padding-bottom: 5px;
            margin-bottom: 10px;
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
            margin: 5px 0;
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
            font-size: 14px;
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
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
            font-size: 11px;
        }
        
        .signature-box {
            width: 45%;
            text-align: center;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-content">
                <div class="header-text">
                    <h1 class="title">KARTU KELUARGA</h1>
                    <p class="subtitle">REPUBLIK INDONESIA</p>
                </div>
            </div>
        </div>
        
        <div class="kk-number">
            <div>No. KK: <strong>1234567890123456</strong></div>
            <div>Dikeluarkan Tanggal: <strong>01-01-2023</strong></div>
        </div>
        
        <div class="section">
            <div class="section-title">DATA ALAMAT</div>
            <table>
                <tr>
                    <td width="15%">Alamat</td>
                    <td width="35%">Jl. Contoh No. 123</td>
                    <td width="10%">Kode Pos</td>
                    <td width="10%">12345</td>
                    <td width="15%">Provinsi</td>
                    <td width="15%">Provinsi Contoh</td>
                </tr>
                <tr>
                    <td>RT/RW</td>
                    <td>001/002</td>
                    <td>Telepon</td>
                    <td>021-1234567</td>
                    <td>Kabupaten/Kota</td>
                    <td>Kota Contoh</td>
                </tr>
                <tr>
                    <td>Desa/Kelurahan</td>
                    <td>Contoh Kelurahan</td>
                    <td colspan="2"></td>
                    <td>Kecamatan</td>
                    <td>Contoh Kecamatan</td>
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
                    <tr>
                        <td>1</td>
                        <td>BUDI SANTOSO</td>
                        <td>1234567890123456</td>
                        <td>L</td>
                        <td>JAKARTA</td>
                        <td>01-01-1980</td>
                        <td>ISLAM</td>
                        <td>S1</td>
                        <td>PNS</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>SITI RAHAYU</td>
                        <td>2345678901234567</td>
                        <td>P</td>
                        <td>BANDUNG</td>
                        <td>02-02-1985</td>
                        <td>ISLAM</td>
                        <td>S1</td>
                        <td>SWASTA</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>DENI SANTOSO</td>
                        <td>3456789012345678</td>
                        <td>L</td>
                        <td>JAKARTA</td>
                        <td>03-03-2010</td>
                        <td>ISLAM</td>
                        <td>SMP</td>
                        <td>PELAJAR</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>DINA SANTOSO</td>
                        <td>4567890123456789</td>
                        <td>P</td>
                        <td>JAKARTA</td>
                        <td>04-04-2012</td>
                        <td>ISLAM</td>
                        <td>SD</td>
                        <td>PELAJAR</td>
                    </tr>
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
                    <tr>
                        <td>1</td>
                        <td>KAWIN</td>
                        <td>KN-123456789</td>
                        <td>01-06-2008</td>
                        <td>KEPALA KELUARGA</td>
                        <td>WNI</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>KAWIN</td>
                        <td>KN-123456789</td>
                        <td>01-06-2008</td>
                        <td>ISTRI</td>
                        <td>WNI</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>BELUM KAWIN</td>
                        <td>-</td>
                        <td>-</td>
                        <td>ANAK</td>
                        <td>WNI</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>BELUM KAWIN</td>
                        <td>-</td>
                        <td>-</td>
                        <td>ANAK</td>
                        <td>WNI</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
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
                    <tr>
                        <td>1</td>
                        <td>5678901234567890</td>
                        <td>AHMAD SANTOSO</td>
                        <td>6789012345678901</td>
                        <td>MARYAM</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>7890123456789012</td>
                        <td>HADI RAHAYU</td>
                        <td>8901234567890123</td>
                        <td>DEWI</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>1234567890123456</td>
                        <td>BUDI SANTOSO</td>
                        <td>2345678901234567</td>
                        <td>SITI RAHAYU</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>1234567890123456</td>
                        <td>BUDI SANTOSO</td>
                        <td>2345678901234567</td>
                        <td>SITI RAHAYU</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="footer">
            <div class="signature-box">
                <p>Diketahui oleh:</p>
                <p>Camat/Lurah</p>
                <div class="signature-line"></div>
                <p>NIP: ........................</p>
            </div>
            <div class="signature-box">
                <p>Kota Contoh, 01-01-2023</p>
                <p>Kepala Keluarga</p>
                <div class="signature-line"></div>
                <p>BUDI SANTOSO</p>
            </div>
        </div>
    </div>
</body>
</html>