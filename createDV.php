<?php 
  session_start();
  if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    include "db_conn.php";
  if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM doanvien WHERE id_dv = $id");
    header("Location:createDV.php");
    
  };
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hoạt động Đoàn</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="  https://unicons.iconscout.com/release/v4.0.0/css/line.css"/>
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"> -->
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
  </ul>
  <div class="container col-md-6" >
      
        <form action="doanvien.php" method="POST"  enctype="multipart/form-data" style="background:#d5d1f6">    
        <div class="row justify-content-around">
        <div class="col-6">
        <legend class="w-100 p-3 fs-1 text-center">Thông Tin Đoàn Viên</legend>
        <?php include('message.php');?>
              <!-- <div class="mb-3">
                <label>Mã DV</label>
                  <input type="text" class="form-control" name ="" aria-label="Mã SV:">
              </div> -->
              <div class="mb-3">
                <label>Tên DV</label>
                  <input type="text" class="form-control" name ="TenDV" placeholder="NGUYỄN VĂN A">
              </div>
              <div class="mb-3">
                <label>Ngày Sinh</label>
                  <input type="date" class="form-control" name ="NgaySinh" aria-hidden="Ngày Sinh:">
                </div>
                <div class="mb-3">
                <label>Giới Tính</label><br>
                  <input class="form-check-input" type="radio" name="GioiTinh" id="inlineRadio1" value="Nam">
                <label class="form-check-label" for="inlineRadio1">Nam</label>
                  <input class="form-check-input" type="radio" name="GioiTinh" id="inlineRadio2" value="Nữ">
                <label class="form-check-label" for="inlineRadio2">Nữ</label>
              </div>
              

              <div class="mb-3">
                <label>Địa Chỉ</label>
                  <input type="text" class="form-control" name="DiaChi" >
                </div>
              
                <div class="mb-3">
                  <label>SĐT</label>
                  <input type="text" class="form-control" name="SDT"  >
                </div>
            
                <div class="mb-3">
                  <label>Chi đoàn</label>
                  <input type="text" class="form-control" name="ChiDoan" >
                </div>

                <div class="mb-3">
                  <label>Khoa</label>
                    <select class="form-select" name="Khoa" >
                      <option selected>CNTT</option>
                      <option value="1">CNTP-CNSH</option>
                      <option value="2">KTXD</option>
                      <option value="3">QLCN</option>
                    </select>
                </div>
                <div class="mb-3">
                <label >Ngày Vào Đoàn</label>
                  <input type="date" class="form-control" name="NgayVao"  placeholder="01/01/1999">
                </div>

                <div class="mb-3">
                  <label >Hình ảnh đoàn viên</label>
                  <input  type="file"  name="imgDV" class="form-control" >
                </div>
                <div class="mb-3">
                  <button type="submit" name="LuuDV" class="btn btn-primary">Thêm</button>
                </div>
            </div>
          </div>
        </div>
      </form>

    <?php
    $select = mysqli_query($conn, "SELECT * FROM doanvien");
    ?>

     <div class="table-responsive-xl"  >
        <table class="table table-sm  caption-top table-striped" >
        <caption>DANH SÁCH CÁC ĐOÀN VIÊN</caption>
        <thead class="table" style="background:#aca3fd">
        <tr>
          <th scope="col">Mã DV</th>
          <th scope="col">Tên DV</th>
          <th scope="col">Ngày Sinh</th>
          <th scope="col">Giới Tính</th>
          <th scope="col">Địa Chỉ</th>
          <th scope="col">SĐT</th>
          <th scope="col">Chi đoàn</th>
          <th scope="col">Khoa</th>
          <th scope="col">Ngày Vào Đoàn</th>
          <th scope="col">Hình ảnh đoàn viên</th>
          <th scope="col" colspan="2">Hành động</th>
        </tr>
        </thead>
          <?php
          while($row = mysqli_fetch_assoc($select)){

          ?>
            <tbody>
            <tr>            
              <td><?php echo $row['id_dv']; ?></td>
              <td><?php echo $row['ten_dv']; ?></td>
              <td><?php echo $row['ngay_sinh']; ?></td>
              <td><?php echo $row['gioi_tinh']; ?></td>
              <td><?php echo $row['dia_chi']; ?></td>
              <td><?php echo $row['sdt']; ?></td>
              <td><?php echo $row['chi_doan']; ?></td>
              <td><?php echo $row['khoa']; ?></td>
              <td><?php echo $row['ngay_vao']; ?></td>
              <td><img src="uploaded_imgDV/<?php echo $row['hinh_anh']; ?>" height ="100" alt=""></td>
              <td>
                <a href="tabupdateDV.php?edit=<?php echo $row['id_dv'];?>" class="btn btn-outline-success"><i class="uil uil-edit"></i>Sửa </a>

                <a href="createDV.php?delete=<?php echo $row['id_dv'];?>"class="btn btn-outline-danger"><i class="uil uil-trash"></i>Xóa</a>
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
