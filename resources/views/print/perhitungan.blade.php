<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PERHITUNGAN</title>
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
      <img src="{{ asset('logo.png') }}" alt="Logo" class="logo-left">
      <h2>Penerapan Metode Simple
        Additive Weighting (SAW) <br> Dalam Optimalisasi Pengiriman Paket <br> Pada
        CV Jasa From Jawa (JFJ) Berbasis PHP</h2>
      <p>Jl. Mawar No 1233</p>
      <hr>
      <div class="title" style="text-align: center;">
        <h3 style="margin-bottom:0;"><u>PERHITUNGAN</u></h3>
        {{-- <p style="margin-bottom:0;">No: 01/TRF/KRHSPKP/2023</p> --}}
      </div>
    </div>

    <!-- Title -->

    <!-- Content -->
    <div class="content">
      <div>
        <div>
          <div>
            <div>
              <table width="100%" border="1" style="border-collapse: collapse; border-color: #000;">
                <thead>
                  <tr>
                    <th>Nama Alternative</th>
                    @foreach ($data['criterias'] as $criteria)
                    <th>{{ $criteria->name }}</th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data['scores'] as $key => $score)
                  <tr>
                    <td align="center">{{ $score->alternative->name }}</td>
                    @foreach (\App\Models\Score::where('parent_id',$score->parent_id)->get() as $child)
                    <td align="center">{{ $child->attribute->name }}</td>
                    @endforeach
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div>
        <h1>Data Perhitungan</h1>
        <div>
          <table width="100%" border="1" style="border-collapse: collapse; border-color: #000;">
            <thead>
              <tr>
                <th>Nama Alternative</th>
                @foreach ($data['criterias'] as $criteria)
                <th>{{ $criteria->name }}</th>
                @endforeach
              </tr>
            </thead>
            <tbody>
              @foreach ($data['scores'] as $key => $score)
              <tr>
                <td align="center">{{ $score->alternative->name }}</td>
                @foreach (\App\Models\Score::where('parent_id',$score->parent_id)->get() as $child)
                <td align="center">{{ $child->attribute->score }}</td>
                @endforeach
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div>
        <h1>Normalisasi</h1>
        <div>
          <table width="100%" border="1" style="border-collapse: collapse; border-color: #000;">
            <thead>
              <tr>
                <th>Nama Alternative</th>
                @foreach ($data['criterias'] as $criteria)
                <th>{{ $criteria->name }}</th>
                @endforeach
              </tr>
            </thead>
            <tbody>
              @foreach ($data['scores'] as $key => $score)
              <tr>
                <td align="center">{{ $score->alternative->name }}</td>
                @foreach (\App\Models\Score::where('parent_id',$score->parent_id)->get() as $child)
                <td align="center">{{ $data['perhitungan']['normalizedMatrix'][$score->id][$child->attribute_id]['value'] }}</td>
                @endforeach
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div>
        <h1>Hasil Perhitungan</h1>
        <div>
          <table width="100%" border="1" style="border-collapse: collapse; border-color: #000;">
            <thead>
              <tr>
                <th>Nama Alternative</th>
                @foreach ($data['criterias'] as $criteria)
                <th>{{ $criteria->name }}</th>
                @endforeach
              </tr>
            </thead>
            <tbody>
              @foreach ($data['scores'] as $key => $score)
              <tr>
                <td align="center">{{ $score->alternative->name }}</td>
                @foreach (\App\Models\Score::where('parent_id',$score->parent_id)->get() as $key => $child)
                <td align="center"> {{ $data['perhitungan']['scores_maatrics'][$score->id][$key]['value'] }}</td>
                @endforeach
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </div>

    <!-- Signature -->
    <div class="signature">
      <p>Alamat, {{date('d F Y')}}</p>
      <br>
      <br>
      <p>Nama Mahasiswa<br>
        NIM. 19808121001</p>
    </div>
  </div>
</body>

</html>