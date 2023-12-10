<?php
if(isset($_POST["MADM_TDT"])){
    $MADM_TDT=$_POST["MADM_TDT"];
    $sql_delete_tdt="DELETE FROM MADM_TDT WHERE MADM_TDT='$MADM_TDT'";
    if($conn_tdt-> query($sql_delete_tdt)){
        header ("location:danhmuc-list-truongdinhtuyen.php");
    }else{
        echo "<script>alert('lỗi xóa')</script>";
    }
}
?>