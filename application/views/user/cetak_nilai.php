<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Nilai Magang</title>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/js/bootstrap.min.css'); ?>">
    <style>
        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }

        .lelang {
            margin-right: 30px;
        }



        hr.new4 {
            border: 1px solid black;
        }

        .foot p {
            margin-left: 500px;
        }

        table {
            margin-top: 50px;
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 20px;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5D6975;
            ;
        }
    </style>
</head>

<body>

    <div style="text-align:left">
        <img src="<?= base_url() ?>assets/jawatengah1.png" alt="logo">
    </div>
    <div style="text-align:center">
        <h4>PEMERINTAH PROVINSI JAWA TENGAH</h4>
        <h4>SEKRETARIAT DPRD</h4>
        <h6>Jl. Pahlawan No. 9 Telepon (024) 8311174 Fax. Semarang
            <hr class="new4">
        </h6>
    </div>

    <p>
        <center> <b>LAPORAN HASIL PENILAIAN</b></center>
    </p>
    <p>Diberikan Kepada : </p>
    <p>
        Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; <?= $peserta['nama_peserta'] ?>
        <br>
        NIM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; <?= $peserta['nim'] ?>
        <br>
        Asal Sekolah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; <?= $peserta['asal_sekolah'] ?>
        <br>
        Jurusan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; <?= $peserta['jurusan'] ?>
        <br>
        Yang telah melaksanakan Praktek Kerja Lapangan mulai tanggal <?= $peserta['tgl_mulai'] ?> Hingga tanggal <?= $peserta['tgl_selesai'] ?> di Kantor DPRD Provinsi Jawa Tengah dengan baik. berikut hasil nilai :
    </p>

    <table>
        <thead>
            <tr>

                <th class="desc">Inovasi</th>
                <th class="desc">Kerja Sama</th>
                <th class="desc">Disiplin</th>
                <th class="desc">Rata - Rata</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nilai as $nilai) : ?>
                <tr>

                    <td class="desc"><?= $nilai['inovasi'] ?></td>
                    <td class="desc"><?= $nilai['kerja_sama'] ?></td>
                    <td class="desc"><?= $nilai['disiplin'] ?></td>
                    <td class="desc"><b><?= $rata = ($nilai['inovasi'] + $nilai['kerja_sama'] + $nilai['disiplin']) / 3 ?>
                        </b></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <br>
    <p>Catatan :</p>
    <p> * Kisaran Nilai :&nbsp;&nbsp;&nbsp;&nbsp;>=85 nilai <=100 --> A</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; >=70 nilai <=85 --> B</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; >=60 nilai <=70 --> C</p>
    <br>

    <br>
    <br>
    <br>
    <p> Sekretariat DPRD Provinsi Jawa Tengah </p>
    <br>
    <br>
    <br>
    <br>
    Penyelia
    </div>
</body>

</html>