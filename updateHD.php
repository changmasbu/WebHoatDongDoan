
<?php
session_start();
include "db_conn.php";

if(isset ($_POST["capnhatHD"]))
{
    $id = $_POST['id_hd'];
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
        header("Location:tabupdateHD.php");
        exit(0);
    }elseif (empty($DonVi)){
        $_SESSION['message'] = "Vui lòng điền đơn vị!";
        header("Location:tabupdateHD.php");
        exit(0);
    }elseif (empty($TuNgay)){
        $_SESSION['message'] = "Vui lòng điền ngày bắt đầu hoạt động!";
        header("Location:tabupdateHD.php");
        exit(0);
    }elseif (empty($DenNgay)){
        $_SESSION['message'] = "Vui lòng điền ngày kết thúc hoạt động!";
        header("Location:tabupdateHD.php");
        exit(0);
    }elseif (empty($DiaDiem)){
        $_SESSION['message'] = "Vui lòng điền địa điểm!";
        header("Location:tabupdateHD.php");
        exit(0);
    }elseif(empty($imgHD)){
        $_SESSION['message'] = "Chưa thêm hình ảnh hoạt động!";
        header("Location:tabupdateHD.php");
        exit(0);
    }else{
        // $id = $_GET['edit'];
        $update = "UPDATE hoatdong SET
        ten_hd =$TenHD,don_vi =$DonVi,tu_ngay =$TuNgay,
        den_ngay =$DenNgay,dia_diem =$DiaDiem,
        noi_dung ='$NoiDung',hinh_anh =$imgHD 
        WHERE id_hd = $id";
 
        // if(isset($_GET['delete'])){
        //     $id = $_GET['delete'];
        //     mysqli_query($conn, "DELETE FROM hoatdong WHERE id_hd = $id");
        //     header("Location:createHD.php");
        // };
        
        $query_run = mysqli_query($conn, $update);
        if($query_run){
            move_uploaded_file($imgHD_tmp,$imgHD_folder);
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
