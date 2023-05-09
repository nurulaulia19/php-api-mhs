<?php
 include_once('config.php');
 
 $sql = "SELECT * FROM tb_mahasiswa";
 $get_data_query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
 if(mysqli_num_rows($get_data_query)!=0){
 $result = array();
 
 while($r = mysqli_fetch_array($get_data_query)){
 extract($r);
 $result[] = array("nim" => $nim, "nama" => $nama, 'kelas' => $kelas,'jurusan'=> $jurusan);
 }
 $json = array("status" => 1, "info" => $result);
 }
 else{
 $json = array("status" => 0, "error" => "mahasiswa not found!");
 }
@mysqli_close($conn);
// Set Content-type to JSON
header('Content-type: application/json');
echo json_encode($json);