<?php
include('templates/header.php');

?>

<div class="main-content">
    <div class="wrapper">
        <div class="alert alert-secondary text-center" role="alert">
            <h2>Thêm</h2>
        </div>

  <!-- thêm -->
        <div class="container col-md-12 mx-auto">
            <form action="" METHOD="POST">
                <div class="col-md-7 mx-auto">
                    <div class="input-group mb-2">
                        <span class="input-group-text col-4">Họ và tên</span>
                        <input type="text" class="form-control" name= "txtHoTen" placeholder="Nhập họ và tên">
                    </div>

                    <div class="input-group mb-2">
                        <span class="input-group-text col-4" >Tuổi</span>
                        <input type="text" class="form-control" name= "tuoi" placeholder="Nhập tuổi">
                    </div>
                    
                    <div class="input-group mb-2">
                        <span class="input-group-text col-4" >Nhóm máu</span>
                        <input type="text" class="form-control" name= "nhomMau" placeholder="Nhập số nhóm">
                    </div>

                    <div class="input-group mb-2"> 
                        <span class="input-group-text col-4" >Giới tính</span>
                        <input type="text" class="form-control" name="txtGioiTInh" placeholder="Nhập giới tính" >      
                    </div>

                    <div class="input-group mb-2"> 
                        <span class="input-group-text col-4" >Số lượng máu cần nhận</span>
                        <input type="text" class="form-control" name="slMau" placeholder="Nhập số lượng cần nhận">             
                    </div>

                    <div class="input-group mb-2"> 
                        <span class="input-group-text col-4" >Số điện thoại</span>
                        <input type="tel" class="form-control" name="sdt" placeholder="Nhập số điện thoại">             
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Thêm</button>
     
                </div>
            </form>
                      
        </div>        
    </div>
</div>

<?php

    if(isset($_POST['submit'])){
        $hoten  = $_POST['txtHoTen'];
        $tuoi = $_POST['tuoi'];
        $nhommau = $_POST['nhomMau'];
        $gioitinh  = $_POST['txtGioiTInh'];
        $slmau = $_POST['slMau'];
        $sdt   = $_POST['sdt'];

        //lệnh sql
        $sql="INSERT INTO blood_recipient SET 
        reci_name='$hoten',
        reci_age='$tuoi', 
        reci_bgrp='$nhommau', 
        reci_bqnty='$slmau', 
        reci_sex='$gioitinh', 
        reci_phno='$sdt'";
 
        $query = mysqli_query($conn,$sql) or die(mysqli_error());
        if($query==TRUE)
        {
            $_SESSION['add']="<div class='text-success'>Thêm nhân viên thành công.</div>";
            header('location:' .SITEURL. 'src/index.php');
        }
        else
        {
            $_SESSION['add']="<div class='text-danger'>Thêm nhân viên thất bại.</div>";
            header('location:' .SITEURL. 'src/error.php');

        }

    }
?>

<?php
    include('templates/footer.php');
?>