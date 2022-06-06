<?php
include "../config.php";
if(isset($_POST['save'])){
    // ambil data dari formulir
    $id = $_POST['id_pegawai'];
    $nama = $_POST['nama_pegawai'];
    $alamat = $_POST['alamat_pegawai'];
    $jk = $_POST['jenis_kelamin'];
    $hp = $_POST['hp_pegawai'];
    $agama = $_POST['agama'];
    $jab = $_POST['jabatan'];
    $tgl = $_POST['tanggal_masuk'];
    $y = $_POST['y'];

    $pic = $_FILES['file_foto']['name'];
    $_FILES['file_foto']['size'];
    $acak = rand(1,9999);
    $tujuan = $acak.$pic;
    $folder = '/img'.$tujuan;
    $_FILES['file_foto']['type'];
    $foto = $_FILES['file_foto']['tmp_name'];
    
    if(!$foto=""){
        $buat_foto = $tujuan;
        $lokasi = 'img/'.$y;
        unlink($lokasi);
    }else{
        $buat_foto=$y;
    }
    move_uploaded_file($foto, 'img/'.$pic);
    $query = "UPDATE tb_pegawai SET nama_pegawai = '$nama', alamat_pegawai = '$alamat', jenis_kelamin = '$jk', hp_pegawai = '$hp', agama = '$agama', jabatan_pegawai = '$jab', tanggal_masuk = '$tgl', foto = '$buat_foto' WHERE id_pegawai = '$id'";
    $sql = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if($sql){
            header('location: pegawai.php');
            $_SESSION["update"] = 'Data Berhasil Diupdate';
        }else{
            echo 'Gagal mengedit profile';
        }
}
?>