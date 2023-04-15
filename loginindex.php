<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css"/>
    <title>LogIn Form</title>
    </head>
    <body>
    <div class="container">
    <form action="login.php" method="post" class="form-login">
             <h1>Đăng nhập</h1>

               <?php if (isset($_GET['error'])) { ?>
                  <p class="error"><?php echo $_GET['error']; ?></p>
               <?php } ?> 
           
             <div class="form-text" >
                <label>Gmail</label>
                <input id = "username" type="text" name = "username"/>
             </div>   
             <div class="form-text" >
                <label>Password:</label>
                <input id = "password" type="password"  name = "password"/>
             </div>
             <button type = 'submit' id="btnDangNhap" class ="btn"> Đăng nhập</button><br>
             <span>Bạn chưa có tài khoản? Đăng ký <a href="signupindex.php">Tại đây</a></span>
            </form> 
    </div>
</body>
</html>

