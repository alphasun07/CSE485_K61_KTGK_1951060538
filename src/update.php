<?php
include('templates/header.php');

?>

<div class="main-content">
    <div class="wrapper">
        <div class="alert alert-secondary text-center" role="alert">
            <h2>Sửa</h2>
        </div>

        <!-- sửa -->
        <div class="container">
            <?php
                if(isset($_GET['reci_id']))
                {
                    $id = $_GET['reci_id'];
                    $sql= "SELECT * FROM blood_recipient WHERE reci_id='$id'";
                    $query= mysqli_query($conn,$sql);

                    #lấy ra 1 dongf
                    $row= mysqli_fetch_assoc($query);
                }
            ?>

            <form action="" METHOD="POST">
                <div class="col-md-5 mx-auto">
                    <div class="input-group mb-2">
                        <span class="input-group-text col-4">Họ và tên</span>
                        <input type="text" class="form-control" name= "txtHoTen" ="Username"
                            value="<?php echo $row['reci_name']; ?>">
                    </div>

                    <div class="input-group mb-2">
                        <span class="input-group-text col-4" >Tuổi</span>
                        <input type="text" class="form-control" name= "tuoi"
                            value="<?php echo $row['reci_age']; ?>">
                    </div>
                    

                    <div class="input-group col"> 
                        <span class="input-group-text col-4" >Nhóm máu</span>
                        <input type="text" class="form-control" name="nhomMau"  
                            value="<?php echo $row['reci_bgrp']; ?>">          
                    </div>

                    <div class="input-group mb-2"> 
                        <span class="input-group-text col-4" >Giới tính</span>
                        <input type="text" class="form-control" name="txtGioiTinh"
                            value="<?php echo $row['reci_sex']; ?>">              
                    </div>

                    <div class="input-group mb-2"> 
                        <span class="input-group-text col-4" >Số lượng cần nhận</span>
                        <input type="text" class="form-control" name="slMau"
                            value="<?php echo $row['reci_bqnty']; ?>">              
                    </div>

                    <div class="input-group mb-2"> 
                        <span class="input-group-text col-4" >Số điện thoại</span>
                        <input type="tel" class="form-control" name="sdt" 
                            value="<?php echo $row['reci_phno']; ?>">              
                    </div>

                    <button type="submit" class="btn btn-primary" name="update">Sửa</button>
     
                </div>
            </form>
           
        </div>        
    </div>
</div>

<?php

   if(isset ($_GET['update']))
   {
        $hoten  = $_POST['txtHoTen'];
        $tuoi = $_POST['tuoi'];
        $nhomMau  = $_POST['nhomMau'];
        $gioitinh = $_POST['txtGioiTinh'];
        $slMau = $_POST['slMau'];
        $ngayDk = $_POST['ngayDk'];
        $sdt = $_POST['sdt'];

        //lệnh truy vấn sql để update
        $sql_1 = "UPDATE blood_recipient SET
        reci_name='$hoten',
        reci_age=$tuoi,
        reci_bgrp= '$nhomMau',
        reci_sex='$gioitinh',
        reci_bqnty=$slMau,
        reci_phno='$sdt',
        WHERE reci_id= '$id'";

        //thưc hiện truy vấn đối vs csdl
        $query_1 = mysqli_query($conn, $sql_1); 

        if((mysqli_query($conn, $sql_1))==TRUE)
        {
            $_SESSION['update']="<div class='text-success'>Sửa nhân viên thành công.</div>";
            header('location:' .SITEURL. 'src/index.php');
        }
        else
        {
            $_SESSION['update']="<div class='text-danger'>Sửa nhân viên thất bại.</div>";
            header('location:' .SITEURL. 'src/error.php');
       
        }

   }
?>

<?php
    include('templates/footer.php');
?>

