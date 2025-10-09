<?php
    include("../config.php");
    $sql = mysqli_query($connect, "SELECT * FROM tanggal");
    $result = array();
    
    while ($row = mysqli_fetch_assoc($sql)) {
        $data[] = $row;
    }

    echo json_encode(array("result" => $data));
?>