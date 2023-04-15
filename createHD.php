
  <?php 
  session_start();
  if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    include "db_conn.php";
  if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM hoatdong WHERE id_hd = $id");
    header("Location:createHD.php");
    
  };
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

    <div class="container col-md-6" >
  <form action="hoatdong.php" method="POST"  enctype="multipart/form-data" style="background:#d5d1f6">    
        <div class="row justify-content-around">
          <div class="col-7">         
            <legend class="w-100 p-3 fs-1 text-center">Thêm Hoạt Động</legend>
              <?php include('message.php');?>
            <div class="mb-3">
                <label>Tên HD</label>
                <!-- <div class="col-sm-6"> -->
                <input type="text" name="TenHD" class="form-control">
            </div>
            
            <div class="mb-3">
            <label>Đơn vị</label>
                  <select class="form-select" name="DonVi" aria-label="Default select example">
                    <option selected>ALL</option>
                    <option value="CNTT">CNTT</option>
                    <option value="CNTP-CNSH">CNTP-CNSH</option>
                    <option value="KTXD">KTXD</option>
                    <option value="QLCN">QLCN</option>
                  </select>
            </div>
                
            <div class="mb-3">
              <label>Từ ngày</label>
              <input type="date" name="TuNgay" class="form-control">
            </div>
        
            <div class="mb-3">
              <label>Đến ngày</label>
              <input type="date" name="DenNgay" class="form-control">
            </div>
        
            <div class="mb-3">
              <label>Địa điểm</label>
              <input type="text" name="DiaDiem" class="form-control">
            </div>
          
            <div class="mb-3">
              <label>Nội dung</label>
              <textarea class="form-control" name="NoiDung" placeholder="Viết nội dung"  style="height: 100px"></textarea>
              <!-- <textarea id="textarea" rows="3"  name="NoiDung" style="width:500px;"  placeholder="..."></textarea> -->
            </div>
            <div class="mb-3">
                <label >Hình ảnh hoạt động</label>
                <input  type="file"   name="imgHD" class="form-control" >
            </div>
        
            <div class="mb-3">
              <button type="submit" name="LuuHD" class="btn btn-primary">Thêm</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  
    <?php
    $select = mysqli_query($conn, "SELECT * FROM hoatdong");
    ?>


     <div class="table-responsive-xl"  >
        <table class="table table-sm  caption-top table-striped" >
        <caption>DANH SÁCH CÁC HOẠT ĐỘNG ĐÃ TẠO</caption>
        <thead class="table" style="background:#aca3fd">
        <tr>
          <th scope="col">Mã HD</th>
          <th scope="col">Tên HD</th>
          <th scope="col">Đơn vị</th>
          <th scope="col">Từ ngày</th>
          <th scope="col">Đến ngày</th>
          <th scope="col">Địa điểm</th>
          <th scope="col">Nội dung</th>
          <th scope="col">Hình ảnh</th>
          <th scope="col" colspan="2">Hành động</th>
        </tr>
        </thead>
          <?php
          while($row = mysqli_fetch_assoc($select)){

          ?>
            <tbody>
            <tr>            
              <td><?php echo $row['id_hd']; ?></td>
              <td><?php echo $row['ten_hd']; ?></td>
              <td><?php echo $row['don_vi']; ?></td>
              <td><?php echo $row['tu_ngay']; ?></td>
              <td><?php echo $row['den_ngay']; ?></td>
              <td><?php echo $row['dia_diem']; ?></td>
              <td><?php echo $row['noi_dung']; ?></td>
              <td><img src="uploaded_img/<?php echo $row['hinh_anh']; ?>" height ="100" alt=""></td>
              <td>
                <a href="tabupdateHD.php?edit=<?php echo $row['id_hd'];?>" class="btn btn-outline-success"><i class="bi bi-pencil-square"></i>Sửa </a>

                <a href="createHD.php?delete=<?php echo $row['id_hd'];?>"class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i>Xóa</a>
              </td>
            </tr>
            </tbody>
        <?php }; ?>
        </table>
      </div>


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
