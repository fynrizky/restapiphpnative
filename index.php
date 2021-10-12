<?php 
include_once "koneksi.php";
include_once "m_db.php";
include_once "response.php";
include_once "header.php";
$connection = new Databases($host,$user,$password,$db);

if($connection==null){
    sendResponse(404, $connection->connects, "Server Not Connection");
}else{

    $qry = "SELECT * FROM card";
    $query = $connection->connects->query($qry);
    if($query->num_rows > 0){
        $result = array();
    while($row = $query->fetch_assoc()){
        // $res = array(
            //     'nama kartu' => $row['nama_kartu'],
            //     'tipe kartu' => $row['tipe'],
            //     'url' => $row['url']
            // );
            // array_push($result, $res);
            array_push($result, array(
                'id' => $row['id_kartu'],
                'nama kartu'=> $row['nama_kartu'],
                'tipe kartu'=> $row['tipe'],
                'url' => $row['url']
            ));
        }
        // echo json_encode(array('result'=>$result));
        sendResponse(300, $result, "Data Avalable");
    }else{
        sendResponse(500, [], 'Data Not Found' ); 
    }
}


?>