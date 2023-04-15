<?php
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM hoatdong WHERE id_hd = $id");
    header("Location:createHD.php");
};
?>