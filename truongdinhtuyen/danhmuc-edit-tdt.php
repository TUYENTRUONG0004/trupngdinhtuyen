<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới thông tin nhân viên</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
    <?php
        include("ketnoi-tdt.php");
        $sql_pb_tdt = "SELECT * FROM danhmuc_tdt WHERE 1=1";
        $res_pb_tdt = $conn_tdt->query($sql_pb_tdt);
        // => hiển thị trong điều khiển select
        // Thực hiện thêm dữ liệu
        $error_message_tdt ="";
        if(isset($_POST["btnSubmit_tdt"])){
            // lấy dữ liệu trên form
            $MADM_TDT = $_POST["MADM_TDT"];
            $TENDM_TDT = $_POST["TENDM_TDT"];
            $TRANGTHAI_TDT = $_POST["TRANGTHAI_TDT"];
            //kiểm trả khóa chính không được trùng
            $sql_check_tdt = "SELECT MADM_TDT FROM danhmuc_tdt WHERE MADM_TDT = 'MADM_TDT' ";
            $res_check_tdt = $conn_tdt->query($sql_check_tdt);
            if($res_check_tdt->num_rows>0){
                $error_message_tdt="Lỗi trùng khóa chính.";
            }
            $sql_insert_tdt = "INSERT INTO `danhmuc_tdt` (`MADM_TDT`, `TENDM_TDT`, `TRANGTHAI_TDT`)";
            $sql_insert_tdt.="VALUES ('$MADM_TDT','$TENDM_TDT','$TRANGTHAI_TDT';";
            if($conn_tdt->query($sql_insert_tdt)){
                //    header("Location: -list-tdt.php"); 
            }else{
                $error_message_tdt="Lỗi thêm mới". mysqli_error($conn_tdt);
            }
        }
    ?>
    <section class="container">
        <h1>Cập nhật thông tin</h1>
        <form name="frm_tdt" method="post" action="">
            <table border="1" width="100%" cellspacing="5" cellpadding="5">
                <tbody>
                    <tr>
                        <td>Mã danh mục</td>
                        <td>
                            <input type="text" name="MADM_TDT" id="MADM_TDT">
                        </td>
                    </tr>
                    <tr>
                        <td>Tên danh mục</td>
                        <td>
                            <input type="text" name="TENDM_TDT" id="TENDM_TDT">
                        </td>
                    </tr>
                    <tr>
                        <td>Trạng thái</td>
                        <td>
                            <select name="TRANGTHAI_TDT" >
                                <option value="1" selected>Hoạt động</option>
                                <option value="0" selected>Không hoạt động</option>
                            </select>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td>Phòng ban</td>
                        <td>
                        
                            <select name="MAPB_TDT" id="MAPB_TDT">
                                <?php
                                    while($row = $res_pb_tdt->fetch_array()):        
                                ?>
                                <option value="<?php echo $row["MAPB_TDT"]?>">
                                    <?php echo $row["TENPB_TDT"]?>
                                </option>
                                <?php
                                    endwhile;
                                ?>
                            </select>
                        </td>
                    </tr> -->
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Thêm" name="btnSubmit_tdt">
                            <input type="reset" value="Làm lại" name="btnReset_tdt">
                        </td>
                    </tr>
                </tbody>
            </table>    
            <div>
                <?php echo $error_message_tdt;?>
            </div>
        </form>
        <!-- <a href="nhanvien-list-tdt.php">Danh sách nhân viên</a> -->
    </section>
</body>
</html>