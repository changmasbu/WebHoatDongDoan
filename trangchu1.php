<?php 
session_start();
require "db_conn.php";

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>
<?php

$sql = "SELECT * FROM hoatdong";
$hd =$conn->query($sql) ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hoạt động Đoàn</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- css -->
  <link rel="stylesheet" href="home.css"/>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"/>

</head>
<body>

<div style="position: absolute;top: 10px;right: 10px">
     <p text-align: right ; style ="font-weight: 500" >Hello, <?php echo $_SESSION['name']; ?></p>
     <a 
     href="loginindex.php" style="position:absolute;top:15px;text-decoration: underline;color:#C65CB6">Logout</a>
</div>
<div class="container-fluid bg-primary text-white text-center pt-5 ">
  <nav class="navbar">
    <div class="container">
      <a class="navbar-brand" href="https://www.ctuet.edu.vn/">
        <img  src="logotruong.png" alt="Bootstrap" style="position:absolute;top:1px ;width:7%">
      </a>
    </div>
  </nav>
<div class="container"> 

  <h1>TRƯỜNG ĐẠI HỌC </h1>
 <h1>KỸ THUẬT - CÔNG NGHỆ CẦN THƠ </h1> 

  <p>CHẤT LƯỢNG - SÁNG TẠO - NĂNG ĐỘNG - PHÁT TRIỂN</p>
</div>
 

</div>

<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>
    
    <!-- The slideshow/carousel -->
    <div class="carousel-inner" >
      <div class="carousel-item active">
        <img src="https://ctuet.edu.vn/View/assets/images/tuyensinh.gif" alt="Los Angeles" class="d-block" style="width:100%;  height: 400px">
      </div>
      <div class="carousel-item">
       
        <!-- <img src=" https://avatars.githubusercontent.com/u/91968711?v=4" alt="Chicago" class="d-block" style="width:100%"> -->
        <img src="https://ctuet.edu.vn/Admin/View/taptindinhkem/Backdrop_1665565029926.png" alt="Chicago" class="d-block" style="width:100%;  height: 400px">
      </div>
      <div class="carousel-item">
        <img src="https://ctuet.edu.vn/Admin/View/taptindinhkem/2_1665977728212.jpg" alt="New York" class="d-block" style="width:100%; height: 400px">
      </div>
    </div>
    
    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
  
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Trang Chủ</button>
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
      <button class="btn btn-outline-primary" type="submit">Search</button>
    </form>
  </ul>
 
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
      
    <div class="w-100 p-1 fs-1 text-center" style="background-color: #F1F1F6;">
       Hoạt động mới 
     </div>
      <div class="container mt-n1">
        <div class="row">
    
    <?php
    $query = "SELECT * FROM hoatdong";
    $query_run = mysqli_query($conn, $query);
    $check_hd = mysqli_num_rows($query_run) > 0;
    if ($check_hd) 
    {
      while ($row = mysqli_fetch_assoc($hd)) 
      {
        ?>
        <div class="col-md-3 mt-3 ">
          <div class="card" style="width: 18rem;">
              <img src="uploaded_img/<?php echo $row['hinh_anh']; ?>"  alt="hoatdong Images">
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['ten_hd']?></h5>
                <p class="card-text"><?php echo  $row['noi_dung'];?></p>
                <a href="chitietHD.php?edit=<?php echo $row['id_hd'];?>" class="btn btn-primary">Xem chi tiết<i class="uil uil-info-circle"></i></a>
              </div>
            </div>
      </div>

      <?php
        }
      }
      ?>
        <div class="container-fluid pt-3">
        <ul class="pagination justify-content-center"> 
           <li class="page-item"><a class="page-link" href="#">Previous</a></li>
           <li class="page-item"><a class="page-link text-dark" href="#">1</a></li>
           <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
           <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
           <li class="page-item"><a class="page-link text-dark" href="#">4</a></li>
           <li class="page-item"><a class="page-link text-dark" href="#">5</a></li>
           <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </div>
      
      </div>
    </div>
  </div>
</div>
      <footer class="page-footer font-small bg-white unique-color-dark mt-1" style="font-weight: 500;"> 
        <div style="background-color: #5539f3;"> 
          <div class="container">
            <div class="row py-2 align-items-center">
              <div class="col-md-6 col-lg-5"> 
                <h6 class="mb-0 h6">Cảm ơn các bạn đã ghé xem!</h6>
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
              <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold">lIÊN KẾT</h6> 
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;"> <p> 
                  <a href="https://www.facebook.com/CTUT.CT/">FACEBOOK
                    <i ></i>
                  </a> 
                </p> 
                <p> 
                  <a href="https://www.facebook.com/groups/1403982969847749/">FACEBOOK ĐOÀN</a> 
                </p> 
                <p> 
                  <a href="https://www.ctuet.edu.vn/">CTUET</a> 
                </p> 
                <p> 
                  <a href="https://www.facebook.com/groups/1104417646254769/">FACEBOOK HỘI SINH VIÊN</a> 
                </p> 
              </div> 
             
              
              </div>
            </div> 
            
        </footer>
     </div>

</body>
</html> 	

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>
