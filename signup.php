
<?php
 session_start(); 
 include "db_conn.php";


 if (isset($_POST['uname']) && isset($_POST['password'])
 && isset($_POST['name']) && isset($_POST['re_password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
     $uname = validate($_POST['uname']);
     $pass = validate($_POST['password']);
 
     $re_pass = validate($_POST['re_password']);
     $name = validate($_POST['name']);
 
     $user_data = 'uname='. $uname. '&name='. $name;
    echo $user_data; //Connectedusername=root name = chang1
 

	if (empty($uname)) {
		header("Location: signupindex.php?error=User Name đang trống&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signupindex.php?error=Password đang trống&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signupindex.php?error=Re Password đang trống&$user_data");
	    exit();
	}

	else if(empty($name)){
        header("Location: signupindex.php?error=Name đang trống&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signupindex.php?error=Repassword không giống với password&$user_data");
	    exit();
	}

	else{

        $pass = md5($pass);

	    $sql = "SELECT * FROM users WHERE user_name='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signupindex.php?error=Tên đã được sử dụng , thử tên khác&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO users(user_name, password, name) VALUES('$uname', '$pass', '$name')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signupindex.php?success=Tạo tài khoản thành công!");
	         exit();
           }else {
	           	header("Location: signupindex.php?error=Lỗi không xác định&$user_data");
		        exit();
           }
		}
	}

    } else {
        header("Location: signupindex.php");
        exit();
    }
