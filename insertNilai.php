<?php
include_once('config.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
$data = json_decode(file_get_contents("php://input"), true);

 // Lakukan pemrosesan data
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$kehadiran = $_POST['kehadiran'];
$tugas = $_POST['tugas'];
$uts = $_POST['uts'];
$uas = $_POST['uas'];

$sql = "INSERT INTO tb_nilai(nim,nama,kelas,jurusan,kehadiran,tugas,uts,uas) VALUES('$nim','$nama','$kelas','$jurusan','$kehadiran','$tugas','$uts','$uas')";
$post_data_query = mysqli_query($conn, $sql);
if($post_data_query){
$json = array("status" => 1, "Success" => "Insert Success",
        'uts' => $uts,
);
}
else{
$json = array("status" => 0, "Error" => "Error Insert Data");
}
}
else{
$json = array("status" => 0, "Info" => "Request method not accepted!");
}
@mysqli_close($conn);
// Set Content-type to JSON
header('Content-type: application/json');
echo json_encode($json);
?>
