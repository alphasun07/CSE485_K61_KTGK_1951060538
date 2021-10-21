<?php
include('templates/header.php');
?>  

<?php
   //lấy id là manv
    $id = $_GET['reci_id'];

    //2. Create SQL Query to Delete Admin
    $sql = "DELETE FROM blood_recipient WHERE reci_id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    // Check whether the query executed successfully or not
    if($res==true)
    {           
        $_SESSION['delete']="<div class='text-success'>Xóa nhân viên thanh công.</div>";
        header('location:' .SITEURL. 'src/index.php');
    }
    else
    {
        $_SESSION['delete']="<div class='text-danger'>Xóa nhân viên thất bại.</div>";
        header('location:' .SITEURL. 'src/error.php');
    }

?>

<?php 
    include('templates/footer.php');
?>