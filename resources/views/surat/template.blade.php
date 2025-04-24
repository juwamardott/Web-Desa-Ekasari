
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Surat Keterangan Penghasilan</title>
  <style>
    body {
      font-family: "Times New Roman", Times, serif;
      margin: 40px;
      line-height: 1.6;
    }
    .header{
     display: flex;
     justify-content: center;

     align-items: center;
    }

    .judul{
     margin-right: 4rem;
    }


    .signature-block{
     margin-right: 10%;
    }
    .header, .content, .signature {
      text-align: center;
      /* border: 2px solid black; */

    }
    .header h2, .header h3 {
      margin: 0;
      margin-top: -10px;    
    }
    .address {
      font-size: 12px;
      font-style: italic;
      text-align: justify;
    }
    .title {
      text-decoration: underline;
      font-weight: bold;
    }

    .number{
        margin-top: -20rem !important;
    }
    .left-align {
      text-align: left;
      margin: 0 auto;
      max-width: 650px;
    }
    .income, .closing {
      /* margin-top: 20px; */
      /* margin-top:-1px; */
      text-align: justify;
    }

    .closing{
        margin-top: -20px;
    }
    table {
      width: 100%;
      /* margin-top: -40px; */
      /* border:2px solid black;  */
      /* border-spacing: 0; */
    }
    .info table{
    }
    .info td {
      padding: 4px 0;
    }
    .signature-block {
      margin-top: 25px;
      text-align: right;
    }
    .signature-block .name {
      margin-top: 60px;
      font-weight: bold;
      text-decoration: underline;
    }

    .email-highlight {
    color: blue;
    text-decoration: underline;
    text-decoration-color: blue;
    }

    .line1{
        color:black;
        height: 2px;
    }
    .line2{
        color:black;
        height:3px;
        margin-top:-11px;
    }
    .line3{
        color:black;
        height: 2px;
        margin-top:-11px;
        margin-bottom: 0;
    }
  </style>
</head>
<body>


    <div style="margin-top: -20px; text-align: center; padding: 0; width: auto;">
        <img src="{{ asset('lte/dist/assets/img/header.png') }}" alt="Logo Desa" height="200">
        <hr class="line1">
        <hr class="line2">
        <hr class="line3">
    </div>
    
    


  <div class="content">
    <div>
        <h3 class="title" style="text-transform: uppercase; margin-bottom: 1px;">
            {{ $jenis_surat->jenis_surat }}
        </h3>
        <p class="number" style="margin-top: 0;">
            Nomor : {{ $nomor_surat }}
        </p>
    </div>
    

    <div class="left-align" style="margin-top: -30px;">
      <p style="margin-bottom: 0;">Yang bertanda tangan di bawah ini :</p>
      <table class="perbekel" style="margin-bottom: 0;">
        <tr><td>Nama</td><td>:I Gede Puja</td></tr>
        <tr><td>Jabatan</td><td>:Perbekel Ekasari</td></tr>
      </table>

      <p style="margin-bottom: 0;">Menerangkan dengan sebenarnya bahwa :</p>
      <table class="info" style="margin-bottom: 0; margin-top: 0;" >
        <tr><td>Nama</td><td>: {{ $data->nama }}</td></tr>
        <tr><td>Tempat/tgl lahir</td><td>: {{ $data->tempat_lahir }}, {{ $data->tgl_lahir }}</td></tr>
        <tr><td>Jenis Kelamin</td><td>: {{ $data->jenis_kelamin->jenis_kelamin }}</td></tr>
        <tr><td>No. KTP</td><td>: {{ $data->nik }}</td></tr>
        <tr><td>Status Perkawinan</td><td>: {{ $data->kawin->status }}</td></tr>
        <tr><td>Agama</td><td>: {{ $data->agama->agama }}</td></tr>
        <tr><td>Pekerjaan</td><td>: {{ $data->pekerjaan->nama_pekerjaan }}</td></tr>
        <tr><td>Tujuan</td><td>: {{ $keperluan }}</td></tr>
        <tr><td>Alamat</td><td>: {{ $data->alamat }}</td></tr>
      </table>

      <div class="income">  
        <p>{{ $jenis_surat->keterangan }}  {{ $keterangan }}</p>
      </div>

      <div class="closing">
        <p>Demikian Surat Keterangan ini kami buat dengan sebenarnya untuk dapat dipergunakan bilamana diperlukan.</p>
      </div>
    </div>

    <div class="signature-block">
      <p>Ekasari, {{ \Carbon\Carbon::parse($tanggal_dibuat)->translatedFormat('d F Y') }}</p>
      <p>Perbekel Ekasari</p>
      <p class="name">I GEDE PUJA</p>
    </div>

  </div>

</body>
</html>


