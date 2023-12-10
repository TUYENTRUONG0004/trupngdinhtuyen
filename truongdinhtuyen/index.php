<?php
    $conn_tdt= new mysqli("localhost","root","","K22CNT3_tdt_day11");
    if(!$conn_tdt){
        echo "<h2> Lỗi: ". mysqli_error($conn_tdt). "</h2>";
    }else{
        echo "<h2> Trương ĐÌnh Tuyển  </h2>";
    }
?>