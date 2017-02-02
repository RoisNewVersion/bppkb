<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cetak detail mutasi karyawan</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <style type="text/css">
        .body-msg{
            font-family: helvetica;
            font-size: 18px; 
        }
        .tabel-nama{
            margin-left: 25px;
            margin-right: 25px;
            /*width: 100%;*/
        }
        
        td{
            padding: 0 10px 0 10px;
        }
    </style>
</head>
<body onload="cetak()">
    <?php 
    include 'system/fungsi.php';
    $app = new Core();
    // $app->check_session('admin');
    $id = $_GET['id'];
    ?>
    <?php
        $app->con->join('tabel_karyawan k', 'k.id_karyawan=m.id_karyawan', 'LEFT');
        $app->con->join('tabel_gol g', 'k.id_gol=g.id_gol', 'LEFT');
        $app->con->join('tabel_instansi i', "m.dinas_lama=i.id_instansi", "LEFT");
        $app->con->join('tabel_instansi i2', 'm.dinas_baru=i2.id_instansi', "LEFT");
        $app->con->where('m.id_mutasi', $id);
        $data = $app->con->get('tabel_mutasi m', null, 'm.*, k.nama_karyawan, k.nip, k.jabatan, g.gol, i.nama_ins as dinas_lama, i.kota as kota_lama, i2.nama_ins as dinas_baru, i2.kota as kota_baru');
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
     ?>
    <div id="page-content-wrapper">
        <div class="row">
            <table width="100%">
                <tr>
                    <td><img width="80" height="90" src="images/logokendal.jpg" class="img-responsive" alt=""></td>
                    <td>
                        <h3 class="title-header">Data Pegawai Mutasi Jabatan</h3>
                        <h3 class="title-header">Badan Pemberdayaan Perempuan dan Keluarga Berencana Kabupaten Kendal</h3>
                    <h4 class="title-header">Jl. Soekarno hatta Kotak Pos 107 Tlp/Fax (0294)381143</h4>
                    </td>
                    <td><img width="80" height="90" src="images/logo-kb.jpg" class="img-responsive" alt=""></td>
                </tr>
            </table>
        </div>
        <hr>

    <p class="body-msg">Perihal : <b><u>Permohonan Mutasi / Alih Tugas</u></b></p>
    <br><br>
    <p class="body-msg">Yang bertanda tangan dibawah ini :</p>

    <table class="body-msg tabel-nama">
        <tr>
            <td>Nama </td>
            <td>:</td>
            <td><?= $data[0]['nama_karyawan'] ?></td>
        </tr>
        <tr>
            <td>NIP </td>
            <td>:</td>
            <td><?= $data[0]['nip'] ?></td>
        </tr>
        <tr>
            <td>Jabatan / Gol</td>
            <td>:</td>
            <td><?= $data[0]['jabatan'] ?> / <?= $data[0]['gol'] ?></td>
        </tr>
    </table>

    <br>

    <p class="body-msg">Bersama ini saya mengajukan Permohonan Mutasi / Alih Tugas dari <?= $data[0]['dinas_lama'] .' '.$data[0]['kota_lama'] ?> ke <?= $data[0]['dinas_baru'] .' '.$data[0]['kota_baru'] ?></p>


    <p class="body-msg">Sebagai bahan pertimbangan, saya lampirkan hal - hal sebgai berikut: </p>

    <div  style="padding-left: 15px;">
        <p>1. Surat pernyataan tidak menjalani hukuman disiplin atau sedang dalam proses pengadilan</p>
        <p>2. Surat pernyataan tidak sedang menjalani pendidikan atau tugas belajar</p>
        <p>3. Surat rekomendasi dari atasan</p>
        <p>4. Foto kopi karpeg</p>
        <p>5. Foto kopi SK PNS</p>
        <p>6. Biodata Pegawai</p>
    </div>

    <p class="body-msg">Demikian surat ini saya buat, atas perhatianya saya sampaikan terimakasih </p>

    <div  style="float: right; margin: 2px;">
    <table class="hea">
        <tr><td>Kendal, .....,.......................2017</td></tr>
        <tr><td><b>Hormat saya</b></td></tr>
    </table>
    <br><br><br><br><br>
    <table class="title-header">
        <tr><td><b><u><?= $data[0]['nama_karyawan'] ?></u></b></td></tr>
        <tr><td><?= $data[0]['nip'] ?></td></tr>
    </table>
    </div>

</div>
</body>
<script >
    function cetak() {
        window.print();
    }
</script>
</html> 