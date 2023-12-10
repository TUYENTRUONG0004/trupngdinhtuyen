<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục -TRƯƠNG ĐÌNH TUYỂN</title>
    <link rel="stylesheet" href=""/>
</head>
<body>
    <?php
        include("ketnoi-tdt.php");
        $sql_tdt = "SELECT * FROM `danhmuc_tdt` WHERE 1=1";
        $result_tdt = $conn_tdt->query($sql_tdt);
        //Duyệt và hiển thị kết quả -> tbody
    ?>
    <section class="container">
        <h1>Danh mục -TRƯƠNG ĐÌNH TUYỂN</h1>
        <hr/>
        <form action="" method="post">
            <div>
                <label for="keyword">Tìm kiếm danh mục</label>
                <input type="search" name="keyword" value="" id="" placeholer="Nhập tên cần tìm..."/>
                <input type="submit" name="btnSearch" value=""Tìm kiếm / >
                
            </div>

        </form>
        
        <table border="3px" width="100%">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã danh mục</th>
                    <th>Tên danh mục</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
       
        <tbody>
            <?php
                
                $stt_tdt=0;
                while($row_tdt = $result_tdt->fetch_array()):
                    $stt_tdt++;
            ?>
            <tr>
                <td><?php echo $stt_tdt;?></td>
                <td><?php echo $row_tdt["MADM_TDT"];?></td>
                <td><?php echo $row_tdt["TENDM_TDT"];?></td>
                <td><?php echo $row_tdt["TRANGTHAI_TDT"];?></td>
                <td>
                <a href="danhmuc-edit-truongdinhtuyen.php?MADM_TDT=<?php echo $row_tdt["MADM_TDT"];?>">Sửa</a>
                <a href="danhmuc-list-truongdinhtuyen.php?manv_tdt=<?php echo $row_tdt["MADM_TDT"];?>"onclick="if(confirm('Bạn muốn xóa ko')) {return true;}else{return false;}"><button>Xóa</button></a> 
                </td>
            </tr>
            <?php
                endwhile;
            ?>
        </tbody>
        <!-- <a href="nhanvien-create-tdt.php" class="btn">DANH MỤC MỚI</a> -->
        </table>
    </section>
    <a href="danhmuc-create-truongdinhtuyen.php" class="btn"><button>THÊM MỚI DANH MỤC</button></a>
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
    </body>
</html>