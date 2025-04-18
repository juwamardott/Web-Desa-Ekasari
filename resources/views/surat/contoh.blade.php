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
      font-size: 14px;
      font-style: italic;
      font-weight: bold
    }
    .title {
      margin: 30px 0 10px;
      text-decoration: underline;
      font-weight: bold;
    }
    .number {
      margin-bottom: 30px;
    }
    .left-align {
      text-align: left;
      margin: 0 auto;
      max-width: 650px;
    }
    .info, .income, .closing {
      margin-top: 20px;
      text-align: justify;
    }
    .info table {
      width: 100%;
      border-spacing: 0;
    }
    .info td {
      padding: 4px 0;
    }
    .signature-block {
      margin-top: 50px;
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
      background-color: black;
      height: 2px;
    }
    .line2{
      background-color: black;
      height: 4px;
      margin-top: -7px;
    }
    .line3{
      background-color: black;
      height: 2px;
      margin-top: -7px;
    }
  </style>
</head>
<body>

  <div class="header">
     <div class="logo">
          <img src="{{ asset('lte/dist/assets/img/Picture1.png') }}" width="200" alt="">
     </div>
     <div class="judul">
          <img src="{{ asset('lte/dist/assets/img/1.png') }}" alt="">
          <h3>PEMERINTAH KABUPATEN JEMBRANA</h3>
          <img src="{{ asset('lte/dist/assets/img/2.png') }}" alt="">
          <h3>KECAMATAN MELAYA</h3>
          <img src="{{ asset('lte/dist/assets/img/3.jpg') }}" alt="">
          <h2>DESA EKASARI</h2>
          <div class="address">
            Jalan AA. Ngurah Kediri No. 1, Telp : 085738231406<br>
            Kode Pos : 82252 ,Kode Desa : 510104.2004 Email :  <span class="email-highlight">desaekasari04@gmail.com</span>
          </div>
     </div>
     
  </div>
  <hr class="line1">
  <hr class="line2">
  <hr class="line3">

  <div class="content">
    <h3 class="title">SURAT KETERANGAN PENGHASILAN</h3>
    <div class="number">Nomor :</div>

    <div class="left-align">
      <p>Yang bertanda tangan di bawah ini :</p>
      <table class="info">
        <tr><td>Nama</td><td>: I Gede Puja</td></tr>
        <tr><td>Jabatan</td><td>: Perbekel Ekasari</td></tr>
      </table>

      <p>Menerangkan dengan sebenarnya bahwa :</p>
      <table class="info">
        <tr><td>Nama</td><td>: I Kadek Kudana</td></tr>
        <tr><td>Tempat/tgl lahir</td><td>: Ekasari, 2 Februari 1977</td></tr>
        <tr><td>Jenis Kelamin</td><td>: Laki-laki</td></tr>
        <tr><td>No. KTP</td><td>: 5101040202770005</td></tr>
        <tr><td>Status Perkawinan</td><td>: Kawin</td></tr>
        <tr><td>Agama</td><td>: Hindu</td></tr>
        <tr><td>Pekerjaan</td><td>: Petani</td></tr>
        <tr><td>Tujuan</td><td>: Melengkapi surat-surat</td></tr>
        <tr><td>Alamat</td><td>: Banjar Anggasari, Desa Ekasari, Kecamatan Melaya, Kabupaten Jembrana.</td></tr>
      </table>

      <div class="income">
        <p>Orang tersebut diatas sepanjang pengetahuan saya memang benar berpenghasilan sekitar <strong>Rp. 1.500.000</strong> (Satu juta lima ratus ribu rupiah)</p>
      </div>

      <div class="closing">
        <p>Demikian Surat Keterangan ini kami buat dengan sebenarnya untuk dapat dipergunakan bilamana diperlukan.</p>
      </div>
    </div>

    <div class="signature-block">
      <p>Ekasari, 18 Juni 2024</p>
      <p>Perbekel Ekasari</p>
      <p class="name">I GEDE PUJA</p>
    </div>

  </div>

</body>
</html>
