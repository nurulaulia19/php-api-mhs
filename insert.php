<?php
include_once('config.php');
if($_SERVER['REQUEST_METHOD'] == "POST"){
 // Get data from the REST client
//  $nim = isset($_POST['nim']) ? mysqli_real_escape_string($conn, $_POST['nim']) : "";
//  $nama = isset($_POST['nama']) ? mysqli_real_escape_string($conn, $_POST['nama']) : "";
//  $kelas = isset($_POST['kelas']) ? mysqli_real_escape_string($conn, $_POST['kelas']) : "";
//  $jurusan = isset($_POST['kelas']) ? mysqli_real_escape_string($conn, $_POST['jurusan']) : "";
 // Insert data into database
 $data = json_decode(file_get_contents("php://input"), true);

 // Lakukan pemrosesan data
 $nim = $_POST['nim'];
 $nama = $_POST['nama'];
 $kelas = $_POST['kelas'];
 $jurusan = $_POST['jurusan'];

 $sql = "INSERT INTO tb_mahasiswa(nim,nama,kelas,jurusan) VALUES('$nim','$nama','$kelas','$jurusan')";
 $post_data_query = mysqli_query($conn, $sql);
 if($post_data_query){
 $json = array("status" => 1, "Success" => "Insert Success");
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