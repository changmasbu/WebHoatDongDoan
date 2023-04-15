<?php
session_start();
require "db_conn.php";


if(isset ($_POST["capnhatDV"]))
{   $id = $_POST['id_dv'];
    $TenDV = $_POST['TenDV'];
    $NgaySinh = $_POST['NgaySinh'];
    $GioiTinh = $_POST['GioiTinh'];
    $DiaChi = $_POST['DiaChi'];
    $SDT =  $_POST['SDT'];
    $ChiDoan = $_POST['ChiDoan'];
    $Khoa = $_POST['Khoa'];
    $NgayVao = $_POST['NgayVao'];
   
    $imgDV =  $_FILES['imgDV']['name'];
    $imgDV_tmp =  $_FILES['imgDV']['tmp_name'];
    $imgDV_folder = 'uploaded_imgDV/' . $imgDV;

    $update = "UPDATE  doanvien SET 
        ten_dv ='$TenDV',ngay_sinh ='$NgaySinh',dia_chi ='$DiaChi',
        sdt ='$SDT',chi_doan ='$ChiDoan',
        khoa ='$Khoa',ngay_vao ='$NgayVao',hinh_anh ='$imgDV' ,gioi_tinh ='$GioiTinh'
        WHERE id_dv = '$id'";

$update_run = mysqli_query($conn, $update);
if ($update_run) {
    move_uploaded_file($imgDV_tmp, $imgDV_folder);
    $_SESSION['message'] = "Cập nhật  thành công!";
    header("Location:createDV.php");
    exit(0);
} else {
    if ($query_run) {
        $_SESSION['message'] = "Cập nhật không thành công!";
        header("Location:createDV.php");
        exit(0);
        }   
    }
}
;


if(isset ($_POST["LuuDV"]))
{
    $TenDV = $_POST['TenDV'];
    $NgaySinh = $_POST['NgaySinh'];
    $GioiTinh = $_POST['GioiTinh'];
    $DiaChi = $_POST['DiaChi'];
    $SDT =  $_POST['SDT'];
    $ChiDoan = $_POST['ChiDoan'];
    $Khoa = $_POST['Khoa'];
    $NgayVao = $_POST['NgayVao'];
   
    $imgDV =  $_FILES['imgDV']['name'];
    $imgDV_tmp =  $_FILES['imgDV']['tmp_name'];
    $imgDV_folder = 'uploaded_imgDV/' . $imgDV;

    
    if(empty($TenDV) ){
        $_SESSION['message'] = "Vui lòng điền tên đoàn viên!";
        header("Location:createDV.php");
        exit(0);
    }elseif (empty($NgaySinh)){
        $_SESSION['message'] = "Vui lòng điền ngày sinh!";
        header("Location:createDV.php");
        exit(0);
    }elseif (empty($GioiTinh)){
        $_SESSION['message'] = "Vui lòng điền giới tính!";
        header("Location:createDV.php");
        exit(0);
    }elseif (empty($DiaChi)){
        $_SESSION['message'] = "Vui lòng điền địa chỉ!";
        header("Location:createDV.php");
        exit(0);
    }elseif (empty($SDT)){
        $_SESSION['message'] = "Vui lòng điền số điện thoại!";
        header("Location:createDV.php");
        exit(0);
    }elseif (empty($ChiDoan)){
        $_SESSION['message'] = "Vui lòng điền tên chi đoàn!";
        header("Location:createDV.php");
        exit(0);
    }elseif (empty($Khoa)){
        $_SESSION['message'] = "Vui lòng điền khoa!";
        header("Location:createDV.php");
        exit(0);
    }elseif (empty($NgayVao)){
        $_SESSION['message'] = "Vui lòng điền ngày vào đoàn!";
        header("Location:createDV.php");
        exit(0);
    }elseif(empty($imgDV)){
        $_SESSION['message'] = "Chưa thêm hình ảnh của đoàn viên!";
        header("Location:createDV.php");
        exit(0);
    }else{
        
        $query = "INSERT INTO doanvien 
        (ten_dv,ngay_sinh,gioi_tinh,dia_chi,sdt,chi_doan,khoa,ngay_vao,hinh_anh) values
        ('$TenDV','$NgaySinh','$GioiTinh','$DiaChi','$SDT','$ChiDoan','$Khoa','$NgayVao','$imgDV')";
    
        $query_run = mysqli_query($conn, $query);
        if($query_run){
            move_uploaded_file($imgDV_tmp,$imgDV_folder);
            $_SESSION['message'] = "Đoàn viên đã được tạo thành công!";
            header("Location:createDV.php");
            exit(0);
        } else {
            if ($query_run) {
                $_SESSION['message'] = "Tạo không thành công!";
                header("Location:createDV.php");
                exit(0);
            }
        }
    }
};

?>
