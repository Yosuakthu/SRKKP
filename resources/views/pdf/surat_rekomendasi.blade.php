<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Rekomendasi</title>
    <style>
        body {
            font-family: "DejaVu Sans", sans-serif;
            font-size: 12pt;
            line-height: 1.4;
            margin: 40px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            margin-bottom: 20px;
            padding-bottom: 5px;
        }
        .header h4 {
            margin: 0;
            line-height: 1.3;
            font-weight: bold;
        }
        .header p {
            margin: 0;
            font-size: 11pt;
        }
        .title {
            text-align: center;
            margin-top: 15px;
        }
        .title h3 {
            margin: 0;
            text-decoration: underline;
        }
        .content {
            margin-top: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }
        .table td {
            vertical-align: top;
            padding: 3px;
        }
        .signature {
            margin-top: 60px;
            text-align: right;
        }
        .signature p {
            margin: 3px 0;
        }
        hr {
            border: 0;
            border-top: 1px solid #000;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <!-- Header Pemerintah -->
    <div class="header">
        <h4>PEMERINTAH KABUPATEN KEPULAUAN SANGIHE</h4>
        <h4>DINAS PERIKANAN DAERAH</h4>
        <p>Jl. Tidore, Kec. Tahuna Timur, Kode Pos 95814</p>
        <hr>
    </div>

    <!-- Judul Surat -->
    <div class="title">
        <h3>SURAT REKOMENDASI</h3>
        <p>Nomor: {{ $nomorSurat }}</p>
    </div>

    <!-- Isi Surat -->
    <div class="content">
        <p>Berdasarkan hasil verifikasi data dan dokumen, dengan ini memberikan rekomendasi kepada:</p>

        <table class="table">
            <tr><td width="160">Nama</td><td>: {{ $data->nama }}</td></tr>
            <tr><td>NIK</td><td>: {{ $data->nik }}</td></tr>
            <tr><td>Alamat</td><td>: {{ $data->alamat ?? '-' }}</td></tr>
            <tr><td>Nama Kapal</td><td>: {{ $data->nama_kapal }}</td></tr>
            <tr><td>Jenis Mesin</td><td>: {{ $data->jenis_alat_mesin }}</td></tr>
            <tr><td>Daya Mesin</td><td>: {{ $data->daya_alat_mesin }}</td></tr>
        </table>

        <p>
            Dengan ketentuan alokasi BBM Khusus Penugasan sebesar
            <strong>{{ $data->usulan_volume_konsumsi }}</strong> liter per bulan.
        </p>

        <p>
            Surat rekomendasi ini diterbitkan untuk digunakan sebagaimana mestinya.
        </p>
    </div>

    <!-- Tanda Tangan -->
    <div class="signature">
        <p>Kepulauan Sangihe, {{ $tanggalSurat }}</p>
        <p>Plt. Kepala Dinas Perikanan Daerah</p>
        <br><br><br>
        <p><strong><u>M.M. Pudihang, S.Pi, M.Si</u></strong><br>NIP. 197005271999031004</p>
    </div>
</body>
</html>
