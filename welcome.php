
<!DOCTYPE html>
<html lang="en">
<head>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css" />
    <title>Welcome</title>
  </head>
<body>
<?php
    
    session_start();
    if(isset($_SESSION['User'])){
        if($_SESSION['type'] == 'laundry'){
            header('location:welcomeLaundry.php');
        }
        ?>
    <nav class="navbar navbar-expand-sm ">
            <a class="navbar-brand" href="welcome.php">Home</a>
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="orders.php">Orders</a>
            </li>
            <li class="nav-item logout">
            <a href = "logout.php?logout" class="nav-link">Logout</a>
            </li>
        </ul>
    </nav> 
    
        <h2 class="font-weight-light my-3">Welcome  <?php echo $_SESSION['User'];?>,</h2>
    <div class="container">
        <div class="row">
            <div class="col-sm mt-4 mx-auto">
                <a href="process.php?type=costw">
                    <img src="resource/wash.png" alt=""  class="mx-auto d-block img-responsive" height="145px">
                </a>
            </div>
            <div class="col-sm mt-5 mx-auto text-center">
                <a href="process.php?type=costw">
                    <div class="display-4">Washing</div>
                </a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm  mx-auto">
                <a href="process.php?type=costi">
                    <img src="resource/iron.png" alt=""  class="mx-auto d-block img-responsive" height="145px">
                </a>
            </div>
            <div class="col-sm mx-auto mt-2 text-center">
                <a href="process.php?type=costi">
                    <div class="display-4">Ironing</div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm  mx-auto">
                <a href="process.php?type=costd">
                    <img src="resource/dry-clean.png" alt=""  class="mx-auto d-block img-responsive" height="145px">
                </a>
            </div>
            <div class="col-sm mx-auto mt-1 text-center">
                <a href="process.php?type=costd">
                    <div class="display-4">Dry Cleaning</div>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
<?php
}
    else{
        header("location:index.html");
    }
    ?>