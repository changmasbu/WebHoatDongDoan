<?php
session_start();
require "db_conn.php";


if (isset($_POST["capnhatHD"])) {
    $id = $_POST['id_hd'];
    $TenHD = $_POST['TenHD'];
    $DonVi = $_POST['DonVi'];
    $TuNgay = $_POST['TuNgay'];
    $DenNgay = $_POST['DenNgay'];
    $DiaDiem = $_POST['DiaDiem'];
    $NoiDung = $_POST['NoiDung'];

    $imgHD = $_FILES['imgHD']['name'];
    $imgHD_tmp = $_FILES['imgHD']['tmp_name'];
    $imgHD_folder = 'uploaded_img/' . $imgHD;

    $query = "UPDATE hoatdong SET 
        ten_hd ='$TenHD',don_vi ='$DonVi',tu_ngay ='$TuNgay',
        den_ngay ='$DenNgay',dia_diem ='$DiaDiem',
        noi_dung ='$NoiDung',hinh_anh ='$imgHD' 
        WHERE id_hd = '$id'";

    $query_run = mysqli_real_query($conn, $query);
    if ($query_run) {
        move_uploaded_file($imgHD_tmp, $imgHD_folder);
        header("Location:createHD.php");
    } else {
        if ($query_run) {
            $_SESSION['message'] = "Cập nhật hoạt động không thành công!";
            header("Location:createHD.php");
            exit(0);
        }
    }
}
;


if(isset ($_POST["LuuHD"]))
{
    $TenHD = $_POST['TenHD'];
    $DonVi =  $_POST['DonVi'];
    $TuNgay = $_POST['TuNgay'];
    $DenNgay = $_POST['DenNgay'];
    $DiaDiem = $_POST['DiaDiem'];
    $NoiDung =  $_POST['NoiDung'];
   
    $imgHD =  $_FILES['imgHD']['name'];
    $imgHD_tmp =  $_FILES['imgHD']['tmp_name'];
    $imgHD_folder = 'uploaded_img/' . $imgHD;

    
    if(empty($TenHD) ){
        $_SESSION['message'] = "Vui lòng điền tên hoạt động!";
        header("Location:createHD.php");
        exit(0);
    }elseif (empty($DonVi)){
        $_SESSION['message'] = "Vui lòng điền đơn vị!";
        header("Location:createHD.php");
        exit(0);
    }elseif (empty($TuNgay)){
        $_SESSION['message'] = "Vui lòng điền ngày bắt đầu hoạt động!";
        header("Location:createHD.php");
        exit(0);
    }elseif (empty($DenNgay)){
        $_SESSION['message'] = "Vui lòng điền ngày kết thúc hoạt động!";
        header("Location:createHD.php");
        exit(0);
    }elseif (empty($DiaDiem)){
        $_SESSION['message'] = "Vui lòng điền địa điểm!";
        header("Location:createHD.php");
        exit(0);
    }elseif(empty($imgHD)){
        $_SESSION['message'] = "Chưa thêm hình ảnh hoạt động!";
        header("Location:createHD.php");
        exit(0);
    }else{
        
        $query = "INSERT INTO hoatdong 
        (ten_hd,don_vi,tu_ngay,den_ngay,dia_diem,noi_dung,hinh_anh) values
        ('$TenHD','$DonVi','$TuNgay','$DenNgay','$DiaDiem','$NoiDung','$imgHD')";
    
        $query_run = mysqli_query($conn, $query);
        if($query_run){
            move_uploaded_file($imgHD_tmp,$imgHD_folder);
            $_SESSION['message'] = "Hoạt động đã được tạo thành công!";
            header("Location:createHD.php");
            exit(0);
        } else {
            if ($query_run) {
                $_SESSION['message'] = "Tạo hoạt động không thành công!";
                header("Location:createHD.php");
                exit(0);
            }
        }
    }
};

?>
