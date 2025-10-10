<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Rekomendasi BBM Khusus Penugasan</title>
    <style>
        @page {
            size: A4;
            margin: 2.5cm 3cm 2.3cm 3cm; /* atas, kanan, bawah, kiri */
        }

        body {
            font-family: "Times New Roman", serif;
            font-size: 9.2pt;
            line-height: 1.18;
            color: #000;
            margin: 0;
        }

        .header {
            text-align: center;
            border-bottom: 1.3px solid #000;
            padding-bottom: 3px;
            margin-bottom: 10px;
        }

        .header h4 {
            margin: 0;
            font-size: 11pt;
            font-weight: bold;
        }

        .header p {
            margin: 1px 0 0;
            font-size: 8.8pt;
        }

        .title {
            text-align: center;
            margin: 8px 0 12px;
        }

        .title h3 {
            margin: 0;
            text-decoration: underline;
            font-size: 11pt;
            font-weight: bold;
        }

        .title p {
            margin: 2px 0 0;
            font-size: 9pt;
        }

        .content {
            text-align: justify;
        }

        ol {
            margin: 5px 0 8px 20px;
            padding: 0;
        }

        ol li {
            margin-bottom: 2px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 4px 0 6px 0;
        }

        .table td {
            padding: 1.8px 3px;
            vertical-align: top;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 6px 0 10px 0;
            font-size: 8.5pt;
        }

        .data-table th, .data-table td {
            border: 1px solid #000;
            text-align: center;
            padding: 2px 3px;
        }

        .data-table th {
            font-weight: bold;
            background: #f3f3f3;
        }

        ul {
            margin: 3px 0 7px 20px;
            padding: 0;
        }

        ul li {
            margin-bottom: 2px;
        }

        .signature {
            margin-top: 15px;
            text-align: right;
            font-size: 9pt;
        }

        .signature p {
            margin: 1.8px 0;
            line-height: 1.15;
        }

    </style>
</head>
<body>
    <div class="header">
        <h4>PEMERINTAH KABUPATEN KEPULAUAN SANGIHE</h4>
        <h4>DINAS PERIKANAN DAERAH</h4>
        <p>Jl. Tidore, Kode Pos 95814, Kec. Tahuna Timur</p>
    </div>

    <div class="title">
        <h3>SURAT REKOMENDASI</h3>
        <p>Nomor: {{ $data->suratRekomendasi->nomor_surat ?? '302-KAB/2/PERIKANAN/BKJP/10/2025' }}</p>
    </div>

    <div class="content">
        <p><strong>Dasar Hukum:</strong></p>
        <ol>
            <li>Undang-Undang Nomor 22 Tahun 2001 tentang Minyak dan Gas Bumi sebagaimana telah diubah dengan Undang-Undang Nomor 6 Tahun 2023 tentang Penetapan Peraturan Pemerintah Pengganti Undang-Undang Nomor 2 Tahun 2022 tentang Cipta Kerja menjadi Undang-Undang;</li>
            <li>Undang-Undang Nomor 23 Tahun 2014 tentang Pemerintah Daerah sebagaimana telah beberapa kali diubah terakhir dengan Undang-Undang Nomor 6 Tahun 2023;</li>
            <li>Peraturan Presiden Nomor 191 Tahun 2014 tentang Penyediaan, Pendistribusian dan Harga Jual Eceran Bahan Bakar Minyak sebagaimana telah diubah terakhir dengan Peraturan Presiden Nomor 117 Tahun 2021;</li>
            <li>Peraturan BPH Migas Nomor 2 Tahun 2023 tentang Penerbitan Surat Rekomendasi Untuk Pembelian Jenis Bahan Bakar Minyak Khusus Penugasan;</li>
        </ol>

        <p>Dengan ini memberikan rekomendasi kepada:</p>

        <table class="table">
            <tr><td width="160">Nama</td><td>: {{ $data->nama ?? 'Yosua' }}</td></tr>
            <tr><td>NIK</td><td>: {{ $data->nik ?? '7103011210980001' }}</td></tr>
            <tr><td>Alamat</td><td>: {{ $data->alamat ?? 'Tapuang' }}</td></tr>
        </table>

        <table class="table">
            <tr><td width="160">Sektor Konsumen Pengguna</td><td>: {{ $data->konsumen_pengguna ?? 'Usaha Perikanan' }}</td></tr>
            <tr><td>Nama Kapal</td><td>: {{ $data->nama_kapal ?? 'KM. Iemboan' }}</td></tr>
        </table>

        @php
            use Carbon\Carbon;
            function toFloat($value, $default = 0) {
                $clean = preg_replace('/[^0-9.]/', '', (string)($value ?? $default));
                return (float) ($clean ?: $default);
            }
            $jumlah_mesin   = toFloat($data->jumlah_alat_mesin, 1);
            $daya_mesin     = toFloat($data->daya_alat_mesin, 18);
            $jam_penggunaan = toFloat($data->lama_penggunaan_jam_per_hari, 5);
            $lama_operasi   = toFloat($data->lama_operasi, 10);
            $koefisien      = 0.303;
            $alokasi_bbm = $jumlah_mesin * $daya_mesin * $jam_penggunaan * $lama_operasi * $koefisien;
            $alokasi_bbm = number_format($alokasi_bbm, 0, ',', '.');
            $tanggalMulai = Carbon::parse('2025-10-10');
            $tanggalBerakhir = $tanggalMulai->copy()->addMonths(3);
        @endphp

        <p><strong>1.</strong> Berdasarkan hasil verifikasi dan evaluasi data, alokasi kebutuhan BBM Khusus Penugasan untuk kapal tersebut adalah sebagai berikut:</p>

        <table class="data-table">
            <thead>
                <tr>
                    <th>Nama Kapal</th>
                    <th>Jenis Mesin</th>
                    <th>Fungsi Mesin</th>
                    <th>Daya Mesin (HP)</th>
                    <th>Jumlah Mesin</th>
                    <th>Jam Penggunaan (Jam/Hari)</th>
                    <th>Klasifikasi GT</th>
                    <th>Lama Operasi (Hari/Bulan)</th>
                    <th>Konsumsi BBM (Liter/Bulan)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $data->nama_kapal ?? '-' }}</td>
                    <td>{{ $data->jenis_alat_mesin ?? 'Honda' }}</td>
                    <td>{{ $jumlah_mesin > 1 ? 'Tambahan' : 'Utama' }}</td>
                    <td>{{ $daya_mesin }}</td>
                    <td>{{ $jumlah_mesin }}</td>
                    <td>{{ $jam_penggunaan }}</td>
                    <td>{{ $data->kapasitas_gt ?? '-' }}</td>
                    <td>{{ $lama_operasi }}</td>
                    <td><strong>{{ $alokasi_bbm }}</strong></td>
                </tr>
                <tr>
                    <td colspan="8" style="text-align:right;"><strong>Total</strong></td>
                    <td><strong>{{ $alokasi_bbm }}</strong></td>
                </tr>
            </tbody>
        </table>

        <p><strong>2.</strong> Diberikan Jenis BBM Khusus Penugasan Jenis <strong>Bensin (Gasoline)</strong> dengan ketentuan:</p>
        <ul>
            <li>Alokasi Volume: {{ $alokasi_bbm }} Liter per Bulan</li>
            <li>Tempat Pengambilan: {{ $data->tempat_pengambilan ?? '-' }}</li>
            <li>Nomor Penyalur: {{ $data->no_penyalur ?? '-' }}</li>
            <li>Alamat Penyalur: {{ $data->alamat_penyalur ?? '-' }}</li>
            <li>Alat Pembelian yang digunakan: GALON</li>
        </ul>

        <p>
            Jangka waktu pemberlakuan Surat Rekomendasi ini berlaku mulai tanggal
            <strong>{{ $tanggalMulai->translatedFormat('d F Y') }}</strong>
            sampai dengan tanggal
            <strong>{{ $tanggalBerakhir->translatedFormat('d F Y') }}</strong>.
        </p>

        <p>Surat Rekomendasi ini hanya berlaku untuk keperluan sesuai identitas pemohon dan tidak dapat dipindahtangankan. Apabila ditemukan pelanggaran, surat rekomendasi ini dapat dicabut kembali.</p>

        <div class="signature">
            <p>Kepulauan Sangihe, <strong>{{ $tanggalMulai->translatedFormat('d F Y') }}</strong></p>
            <p>Plt. Kepala Dinas Perikanan Daerah Kab. Kep. Sangihe</p>
            <br><br><br>
            <p><strong><u>M.M. Pudihang, S.Pi, M.Si</u></strong><br>NIP. 197005271999031004</p>
        </div>
    </div>
</body>
</html>
