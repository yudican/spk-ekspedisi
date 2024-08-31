<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SPK</title>
  <style>
    body {
      font-family: 'Times New Roman', Times, serif;
      font-size: 14px;
      margin: 0;
      padding: 0;
      line-height: 1.6;
    }

    .container {
      width: 93%;
      padding: 40px;
    }

    .header {
      text-align: center;
      margin-bottom: 30px;
    }

    .header img {
      width: 80px;
      position: absolute;
      left: 30px;
      top: 60px;
    }

    .header .logo-left {
      float: left;
    }

    .header h1,
    .header h2,
    .header p {
      margin: 5px 0;
    }

    .content {
      text-align: justify;
      margin-top: 30px;
    }

    .footer {
      margin-top: 50px;
      text-align: left;
    }

    .signature {
      text-align: right;
      margin-top: 100px;
    }

    .signature img {
      width: 150px;
      /* Adjust size as necessary */
      height: auto;
    }
  </style>
</head>

<body>
  <div class="container">
    <!-- Header -->
    <div class="header">
      <img src="{{ asset('logo.jpeg') }}" alt="Logo" class="logo-left" width="50px;" height="50px;">
      <h2>CV JASA FROM JAWA</h2>
      <p>Jl. Lestari Gg. Kenanga No. 2000 RT.004/RW.003, Kali Sari <br /> Pasar Rebo, Jakarta Timur, DKI Jakarta - 13790</p>
      <hr>
      <div class="title" style="text-align: center;">
        <h3 style="margin-bottom:0;"><u>DATA Alternative</u></h3>
        {{-- <p style="margin-bottom:0;">No: 01/TRF/KRHSPKP/2023</p> --}}
      </div>
    </div>

    <!-- Title -->

    <!-- Content -->
    <div class="content">
      <table width="100%" border="1" style="border-collapse: collapse; border-color: #000;">
        <tr>
          <th>No.</th>
          <th>Nama ALTERNATIF</th>
        </tr>
        @foreach ($alternatives as $key => $item)
        <tr>
          <td>{{$key+1}}</td>
          <td>{{$item['name']}}</td>
        </tr>
        @endforeach
      </table>
    </div>

    <!-- Signature -->
    <div class="signature">
      <p>Jakarta, {{date('l, d F Y')}}</p>
      <br>
      <br>
      <p>Admin<br>
    </div>
  </div>
</body>

</html>