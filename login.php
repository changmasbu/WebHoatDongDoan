
<?php
 session_start(); 
 include "db_conn.php";

if(isset($_POST['username']) && isset($_POST['password'])) {

     function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }
    $uname = validate($_POST['username']);
    $pass = validate($_POST['password']);


    if (empty($uname)){
        header("Location: loginindex.php?error=Username đang trống");
        exit();
    } else if( empty($pass)){
        header("Location: loginindex.php?error=Password đang trống");
        exit();
    } else {
     $pass = md5($pass); 
      $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location:trangchu1.php");
                exit();
            }else{
                header("Location: loginindex.php?error=Incorect Username or password");
                exit();
            }
        }else{
            header("Location: loginindex.php?error=Incorect Username or password");
            exit();
        }
    }
    
}else{
    header("Location: loginindex.php");
    exit();
}