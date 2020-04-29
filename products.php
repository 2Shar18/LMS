<?php
session_start();
include 'connection.php';
if(isset($_SESSION['User'])){

$sql = "SELECT * FROM product";

$result =$conn->query($sql) or die('error');
$result = mysqli_query($conn,$sql);
// $row = mysqli_fetch_array($result,MYSQLI_ASSOC);


?>
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
            <title>Items</title>
        </head>
        <body>
            <nav class="navbar navbar-expand-sm ">
                <a class="navbar-brand" href="welcomeLaundry.php">Home</a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Items</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="orderReplied.php">Orders</a>
                    </li>
                    <li class="nav-item logout">
                        <a href = "logout.php?logout" class="nav-link">Logout</a>
                    </li>
                </ul>
            </nav>  <div class="container-fluid">
            <div class="modal-footer">
                <button class="btn btn-primary form-control" style="width:10%;" data-toggle="modal" data-target="#myModal">Add new item</button>
            </div>
            <h2> View all Items </h2>
            <div class="row">
                <table class="table">
                    <thead class = "text-center">
                        <th >
                            Name
                        </th>
                        <th >
                            Type
                        </th>
                        <th>
                            Wash Cost
                        </th>
                        <th >
                            Iron Cost
                        </th>
                        <th>
                            Dry Clean Cost
                        </th>
                    </thead>
                    <?php
                    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                    {
                    ?>
                    <tr>
                        <td class = "text-center">
                            <?php echo $row['name']; ?>
                        </td>
                        <td class = "text-center">
                            <?php echo $row['type']; ?>
                        </td>
                        <td class = "text-center">
                            <?php echo $row['costw']; ?>
                        </td>
                        <td class = "text-center">
                            <?php echo $row['costi']; ?>
                        </td>
                        <td class = "text-center">
                            <?php echo $row['costd']; ?>
                        </td>
                        <?php
                        }
                        ?>
                    </tr>
                </table>
            </div>
        </div>
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Items</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <form action="addProduct.php" method = "post">
                        <div class="modal-body">
                            
                            <div class="form-group">
                                <input type="text" class="form-control" id ="name" name="name" placeholder="Name of Cloth">
                            </div>
                            <div class="form-group">
                                <select name="type">
                                    <option value="" disabled="" selected="">Select Type</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="All">All</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" id ="costw" name="costw" placeholder="Cost For Washing">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" id ="costi" name="costi" placeholder="Cost for Ironing">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" id ="costd" name="costd" placeholder="Cost for Dry Cleaning">
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-danger" name="submit" value="Add" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    
    
    <?php
    }
    else{
    header("location:index.html");
    }
    ?>