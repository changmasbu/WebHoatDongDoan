<?php 
  session_start();
  if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    require "db_conn.php";
   
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hoạt động Đoàn</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="HD.css"/>
</head>
<body>
<!-- LOUTOUT -->
<div style="position: absolute;top: 10px;right: 10px">
     <p text-align: right ; style ="font-weight: 500" >Hello, <?php echo $_SESSION['name']; ?></p>
     <a 
     href="loginindex.php" style="position:absolute;top:15px;text-decoration: underline;color:#C65CB6">Logout</a>
</div>

<div class="container-fluid bg-primary text-white text-center pt-0 " >
  <nav class="navbar" >
    <div class="container" >
      <a class="navbar-brand  " href="#" >
        <img src="logotruong.png" alt="Bootstrap" style="position:absolute;bottom:auto ;width:7%">
      </a>
    </div>
  </nav>
<div class="container">

  <h1>TRƯỜNG ĐẠI HỌC </h1>
 <h1>KỸ THUẬT - CÔNG NGHỆ CẦN THƠ </h1> 

  <p>HỆ THỐNG QUẢN LÝ HOẠT ĐỘNG ĐOÀN</p>
</div>
</div>
<ul class="nav nav-tabs" id="myTab" style="position:sticky" role="tablist">

<li class="nav-item">
      <a class="nav-link" href="trangchu1.php">Trang chủ</a>
</li>
<li class="nav-item" role="presentation">
    <a class="nav-link" href="createHD.php">Hoạt động</a>
</li>
<li class="nav-item" role="presentation">
    <a class="nav-link" href="createDV.php">Đoàn viên</a>
</li>
<li class="nav-item" role="presentation">
  <button class="nav-link" id="news-tab" data-bs-toggle="tab"  data-bs-target="#news-tab-pane" type="button" role="tab" aria-controls="news-tab-pane" aria-selected="false" >Tin Tức</button>
</li>
<form class="d-flex position-absolute end-0 col-sm-3">
  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-dark" type="submit">Search</button>
</form>

</ul>

<?php 
if(isset($_GET['edit'])){
   $id_hd = mysqli_real_escape_string($conn,$_GET['edit']);
      $query = "SELECT * FROM hoatdong WHERE id_hd = $id_hd";
      $query_run = mysqli_query($conn,$query);
      if(mysqli_num_rows($query_run) > 0){
        $hd = mysqli_fetch_array($query_run);
        // print_r($hd);
        ?>
<!-- FORM CẬP NHẬT -->
    <div class="container" >
      <form action="hoatdong.php" method="POST"  enctype="multipart/form-data" style="background:#d5d1f6">
        <div class="row justify-content-around">
          <div class="col-7">         
            <legend class="w-100 p-3 fs-1 text-center">Chi Tiết Hoạt Động</legend>
              <?php include('message.php');?>
              <input type="hidden" name ="id_hd" value ="<?php echo $hd['id_hd']?>"disabled>
            <div class="mb-3">
            <div class="mb-3">
                <label >Hình ảnh hoạt động</label>
                <img src="uploaded_img/<?php echo $hd['hinh_anh']; ?>" class="img-fluid" alt="...">
            </div>
                <label>Tên HD</label>
                <input type="text" name="TenHD" value="<?php echo $hd['ten_hd']?>" class="form-control"disabled>
            </div>
            
           <div class="mb-3">
            <label>Đơn vị</label>
            <input type="text" name="DonVi" value="<?php echo $hd['don_vi']?>" class="form-control"disabled>
            </div>
                
            <div class="mb-3">
              <label>Từ ngày</label>
              <input type="date" name="TuNgay" value="<?php echo $hd['den_ngay']?>" class="form-control"disabled>
            </div>
        
            <div class="mb-3">
              <label>Đến ngày</label>
              <input type="date" name="DenNgay" value="<?php echo $hd['den_ngay']?>" class="form-control"disabled>
            </div>
        
            <div class="mb-3">
              <label>Địa điểm</label>
              <input type="text" name="DiaDiem" value="<?php echo $hd['dia_diem']?>" class="form-control"disabled>
            </div>
          
            <div class="mb-3"> 
              <label>Nội dung</label>
              <textarea class="form-control" name="NoiDung"   style="height: 100px"disabled><?php echo  $hd['noi_dung'];?></textarea>            
            </div>
            
        
            <div class="mb-3">
              <!-- <div class="col-sm-6"> -->
                <a href="trangchu1.php" class="btn btn-primary">Trở về</a>
            </div>
          </div>
        </div> 
      </form>
   
    </div>

        <?php
      }else 
      {
        echo "<h4> Không tìm thấy id hoạt động <h4>";
      };
}
?>

   


    
    <footer class="page-footer font-small bg-white unique-color-dark mt-1" style="font-weight: 500;"> 
        <div style="background-color: #5539f3;"> 
          <div class="container">
            <div class="row py-2 align-items-center">
              <div class="col-md-6 col-lg-5"> 
                <h6 class="mb-0 h6" style="color: #fff">Cảm ơn các bạn đã ghé xem!</h6>
               </div>
            </div>
          </div> 
        </div>  
          <div class="container text-center text-md-left mt-5">  
            <div class="row mt-3">
              <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">  
                <h6 class="text-uppercase font-weight-bold">TRƯỜNG ĐẠI HỌC KỸ THUẬT - CÔNG NGHỆ CẦN THƠ</h6> 
                <hr class="mb-4 mt-0 " style="width: 60px;"> <p>
                  Địa chỉ: 256 Nguyễn Văn Cừ, Quận Ninh Kiều, Thành phố Cần Thơ
                  Email:phonghanhchinh@ctuet.edu.vn</p> 
              </div>

              <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4"> 
                <h6 class="text-uppercase font-weight-bold">Useful links</h6> 
                <hr class="mb-4 mt-0 mx-auto" style="width: 60px;"> <p> 
                  <a href="#!">Tài khoản của bạn</a> 
                </p> 
                <p> 
                  <a href="#!">Trở thành người giới thiệu</a> 
                </p> 
                <p> 
                  <a href="#!">Giá cước vận chuyển</a> 
                </p> 
                <p> 
                  <a href="#!">Trợ giúp</a> 
                </p> 
              </div>
 
              </div>
            </div>      
        </footer>


    </div>
        
      </div>
    </div>
</body>
</html> 	
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
