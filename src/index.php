<?php
    include('templates/header.php');
?>

<?php
          if(isset($_SESSION['add']))
            {
              echo $_SESSION['add'];
              unset($_SESSION['add']);
            }
            
            if(isset($_SESSION['update']))
            {
              echo $_SESSION['update'];
              unset($_SESSION['update']);
            }

            if(isset($_SESSION['delete']))
            {
              echo $_SESSION['delete'];
              unset($_SESSION['delete']);
            }

?>


    <!-- bảng -->
    <h2 class="text-center mt-4">Người nhận máu</h2>
    <div class="col-md-12">
        <a class="btn btn-primary m-3" href="add.php" role="button">Thêm mới</a>
        <div id="table">
            <table class="table table-Secondary table-bordered table-striped">
            <thead>
                <tr>
                <th scope="col">STT</th>
                <th scope="col">Họ và tên</th>
                <th scope="col">Tuổi</th>
                <th scope="col">Nhóm máu</th>
                <th scope="col">Giới tính</th>
                <th scope="col">Số lượng máu cần nhận</th>
                <th scope="col">Ngày đăng kí nhận máu</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xóa</th>

                </tr>
            </thead>
            <tbody>

                <?php

                    $sql="SELECT reci_id, reci_name, reci_age, reci_bgrp, reci_bqnty, reci_sex, reci_reg_date, reci_phno FROM blood_recipient";
                    $result = mysqli_query($conn,$sql);

                    if(mysqli_num_rows($result)>0){
                          $i=1;
                          //sẽ tìm và trả về một dòng kết quả của một truy vấn MySQL nào đó dưới dạng một mảng kết hợp
                          while($row = mysqli_fetch_assoc($result)){
                      ?>      
                        <tr>
                          <th scope="row"><?php echo $i; ?></th>
                          <td><?php echo $row['reci_name']; ?></td>
                          <td><?php echo $row['reci_age']; ?></td>
                          <td><?php echo $row['reci_bgrp']; ?></td>
                          <td><?php echo $row['reci_sex']; ?></td>
                          <td><?php echo $row['reci_bqnty']; ?></td>
                          <td><?php echo $row['reci_reg_date']; ?></td>
                          <td><?php echo $row['reci_phno']; ?></td>
                          <td><a href="http://localhost/CSE485_K61_KTGK_1951060538/src/update.php?reci_id=<?php echo $row['reci_id'];?>"><i class="bi bi-pencil-square"></i></a></td>
                          <td><a href="http://localhost/CSE485_K61_KTGK_1951060538/src/delete.php?reci_id=<?php echo $row['reci_id'];?>"><i class="bi bi-trash"></i></i></a></td>
                            
                        </tr>
                    <?php
                          $i++;
                        }
                      }
                    ?>
                    </tbody>
                </table>

        </div>

</div>

<?php
    include('templates/footer.php');
    
?>