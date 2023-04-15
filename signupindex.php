<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dangky.css"/>
    <title>Đăng ký</title>
    </head>
    <body>
    <div  class="container">
       <form class="form-login" action="signup.php" method="post" > 
             <h1>Đăng ký</h1>


             <?php if (isset($_GET['error'])) { ?>
     		      <p class="error"><?php echo $_GET['error']; ?></p>
     	       <?php } ?>

             <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
             <?php } ?>
            
             
             <div class="form-text">
               <label>Gmail</label>
               <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name"              
                      value="<?php echo $_GET['name']; ?>"><br>
               <?php }else{ ?>
               <input type="text" 
                      name="name">
            <?php }?> 
               </div>  

             <div class="form-text">
               <label>Username:</label>
               <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="uname"   
                      value="<?php echo $_GET['uname']; ?>"><br>
               <?php }else{ ?>
               <input type="text" 
                      name="uname"> 
               <?php }?>
                  </div>    

             <div class="form-text">
             <label>Password</label>
     	       <input type="password" 
                    name="password">
             </div>

             <div class="form-text">
                <label>Repassword:</label>
                <input type="password" 
                       name="re_password">
             </div>

             <button type="submit" id="btnDangKy" class ="btn">Đăng ký</button><br>
              <a href="loginindex.php">Bạn đã có tài khoản ? Đăng nhập tại </a>
            </form> 
    </div>
</body>
</html>

