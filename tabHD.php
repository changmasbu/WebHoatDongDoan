<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hoạt động Đoàn</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
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
      <a class="navbar-brand  " href="#">
        <img src="logotruong.png" alt="Bootstrap" style="position:absolute;top:1px ;width:7%">
      </a>
    </div>
  </nav>
<div class="container "> 

  <h1>TRƯỜNG ĐẠI HỌC </h1>
 <h1>KỸ THUẬT - CÔNG NGHỆ CẦN THƠ </h1> 

  <p>CHẤT LƯỢNG - SÁNG TẠO - NĂNG ĐỘNG - PHÁT TRIỂN</p>
</div>
 

</div>


  <ul class="nav nav-tabs" id="myTab" role="tablist">

    <li class="nav-item">
          <a class="nav-link" href="trangchu1.php">Trang chủ</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" href="tabHD.php">Hoạt động</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" href="tabDV.php">Đoàn viên</a>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="news-tab" data-bs-toggle="tab"  data-bs-target="#news-tab-pane" type="button" role="tab" aria-controls="news-tab-pane" aria-selected="false" >Tin Tức</button>
    </li>

  </ul>
 
  <!-- code start  -->

  <table class="table">
  <thead class="table-dark">
   
  </thead>
  <tbody>
    
  </tbody>
</table>
<!-- finish code -->
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
                <h6 class="text-uppercase font-weight-bold">Products</h6> 
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;"> <p> 
                  <a href="#!">Sách</a> 
                </p> 
                <p> 
                  <a href="#!">Manga</a> 
                </p> 
                <p> 
                  <a href="#!">Sách nói</a> 
                </p> 
                <p> 
                  <a href="#!">Đọc online</a> 
                </p> 
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
    <!-- <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
    
      <div class="row justify-content-around">
        <div class="col-6" ;width: 25rem;>
            <form>
              <legend class="w-100 p-3 fs-1 text-center">Thông Tin Đoàn Viên</legend>
              <div class="row mb-2 ">
                <label for="" class="col-sm-3 col-form-label">Mã SV:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control"  aria-label="Mã SV:">
                </div>
              </div>
              <div class="row mb-2">
                <label for="" class="col-sm-3 col-form-label">Tên SV:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control"  aria-hidden="Tên SV:">
                </div>
              </div>
              <div class="row mb-2">
                <label for="" class="col-sm-3 col-form-label">Ngày Sinh:</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control"  aria-hidden="Ngày Sinh:">
                </div>
              </div>
            

              <div class="row mb-1">
                <label for="" class="col-sm-3 col-form-label">Giới Tính:</label> 
              <div class="form-check form-check-inline col-sm-2 pt-2">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                <label class="form-check-label" for="inlineRadio1">Nam</label>
              </div>
              <div class="form-check form-check-inline col-sm-2 pt-2">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                <label class="form-check-label" for="inlineRadio2">Nữ</label>
              </div>
              </div>

              <div class="row mb-2 ">
                <label for="" class="col-sm-3 col-form-label">Địa Chỉ:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control"  aria-label="Địa Chỉ:">
                </div>
              </div>
              <div class="row mb-2 ">
                <label for="" class="col-sm-3 col-form-label">SĐT:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control"  aria-label="SĐT:">
                </div>
              </div>

              <div class="row mb-2">
                <label for="" class="col-sm-3 col-form-label">Lớp:</label>
                <div class="col-sm-5">
              <select class="form-select" aria-label="Default select example">
                <option selected>Lớp141103</option>
                <option value="1"></option>
                <option value="2"></option>
                <option value="3"></option>
              </select>
                </div>
               </div>

               <div class="row mb-2">
                <label for="" class="col-sm-3 col-form-label">Khoa:</label>
                <div class="col-sm-5">
              <select class="form-select" aria-label="Default select example">
                <option selected>CNTT</option>
                <option value="1">CNTP-CNSH</option>
                <option value="2">KTXD</option>
                <option value="3">QLCN</option>
              </select>
                </div>
               </div>
               <div class="row mb-2">
                <label for="" class="col-sm-3 col-form-label">Ngày Vào Đoàn:</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control"  aria-hidden="Ngày Vào Đoàn:"placeholder="01/01/1999">
                </div>
              </div>
               

          </form>
        </div> -->

        
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
