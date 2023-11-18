
<!-- Include the admin stylesheet -->
<link rel="stylesheet" href="admin.css">
<!-- Include the PHP connection script -->
<?php include('connection.php');?>

<?php include('header.php');?>


        <div class="main-content">
          <div class="wrapper">
              <h1>Manage Staff</h1></br>


              <?php

                if(isset($_SESSION['add']))
                {
                    echo $_SESSION ['add'];
                    unset($_SESSION['add']);
                }
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset ($_SESSION['delete']);
                }
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset ($_SESSION['update']);
                }

            ?>
<br><br>
              <a href="add-admin.php" class="btn-primary">Add Staff</a></br></br>

        <table class="tbl-full">
            <tr>
                <th>No.</th>
                <th>Full Name</th>
        
                <th>Actions</th>
            </tr>

            <?php
                $sql ="SELECT * FROM setting_admin";
                  
                  
                $res= mysqli_query($conn, $sql);

                if($res==TRUE)
                {
                    $count = mysqli_num_rows($res);

                    $sn=1;

                    if($count>0)
                    {
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            $id=$rows['id'];
                            $full_name=$rows['full_name'];

                            ?>
                                <tr>
                                    <td><?php echo $sn++;?>. </td>
                                    <td><?php echo $full_name; ?> </td>
                                    <td>
                                        <a href= "<?php echo SITEURL; ?>update-staff.php?id=<?php echo $id; ?>" class="btn-secondary">Update staff</a>
                                        <a href="<?php echo SITEURL; ?>delete-admin.php?id=<?php echo $id; ?>" class="btn-delete">Delete staff</a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }
                    else
                    {

                    }
                }
            ?>
        
        </table>
            </div>
        </div>


    </div>



<script>
        function openNav() {
            var sidenav = document.getElementById("mySidenav");
            var main = document.getElementById("main");

            if (sidenav.style.width === "300px") {
                sidenav.style.width = "0px";
                main.style.marginLeft = "0px";
            } else {
                sidenav.style.width = "300px";
                main.style.marginLeft = "300px";
            }
        }
    </script>
</body>

<footer>
        <p>&copy; 2023 CIZINIE GYM. All Rights Reserved.</p>
</footer>
</html>