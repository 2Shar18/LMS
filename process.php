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
    <title>Washing</title>
    <script>
    if(!!window.performance && window.performance.navigation.type === 2)
{
    console.log('Reloading');
    window.location.reload();
}if(!!window.performance && window.performance.navigation.type === 2)
{
    console.log('Reloading');
    window.location.reload();
}
    </script>
</head>
<body>
    <?php
    include 'connection.php';
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
    <?php
    
        session_start();
        if(isset($_SESSION['User'])){
            echo "<br><center>";
            if($_GET['type'] == 'costw'){
                echo "<h2>Washing</h2>";
            }
            else if($_GET['type'] == 'costi'){
                echo "<h2>Ironing</h2>";
            }
            else if($_GET['type'] == 'costd'){
                echo "<h2>Dry Cleaning</h2>";
            }
            echo "</center>";
            ?>

            <div class="container">
                <div class="row my-5">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4 d-block mx-auto d-flex justify-content-center text-center">
                    <div class="card" style="width:300px" data-toggle="modal" data-target="#myModal">
                        <img class="card-img-top mx-auto d-block img-responsive " width="145px"src="media/male.png"  alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title text-center" >Male</h4>
                            <!-- <p class="card-text">Some example text.</p> -->
                            <!-- <a href="#" class="btn btn-primary">See Profile</a> -->
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-4 d-block mx-auto d-flex justify-content-center text-center">
                    <div class="card" style="width:300px" data-toggle="modal" data-target="#myModal2">
                        <img class="card-img-top mx-auto d-block img-responsive" src="media/female.png"  alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title text-center">Female</h4>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>            
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4 text-center font-weight-light" id="result">

                    </div>
                    <div class="col-sm-4"></div>
                </div>
                <div class="row">
                    
                                    
              
            </div>
            <form action="checkOut.php" method="GET">
                <input type="hidden" name="type" value="<?php echo $_GET['type'];?>">
            <!-- The Modal -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add what you want us to wash for you</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                            <table class="table flex-center" style="text-align:center; color:#3a76a7;">
                                <tr >
                                    <th>Products</th>
                                    <th>Quantity</th>
                                    <th>Rs./Unit</th>
                                </tr>
                                <?php 
                                    $sql = "SELECT * FROM product WHERE type = 'Male'";
                                    $result = mysqli_query($conn,$sql);
                                    $productPrice = array();
                                    $productName = array();
                                    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                        array_push($productName, $row['type'].$row['name']);
                                        array_push($productPrice, $row[$_GET['type']]);
                                ?>
                                <tr>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><input type="number" name="<?php echo $row['type'].$row['name'] ?>" id="1" ></td>
                                    <td><?php echo $row[$_GET['type']] ?></td>
                                </tr>
                                <?php } ?>
                                <!-- <tr>
                                    <td>T-Shirts</td>
                                    <td><input type="number" name="tshirt" id="2" ></td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>Trousers</td>
                                    <td><input type="number" name="trouser" id="3" ></td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>Shorts</td>
                                    <td><input type="number" name="shorts" id="4" ></td>
                                    <td>7</td>
                                </tr>
                                <tr>
                                    <td>Jeans</td>
                                    <td><input type="number" name="jeans" id="5" ></td>
                                    <td>12</td>
                                </tr> -->                               
                            </table>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="calc">Add</button>
                    </div>
                    </div>
                </div>
            </div>  



            <div class="modal fade" id="myModal2">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add what you want us to wash for you</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        
                            <table class="table flex-center" style="text-align:center; color:#3a76a7;">
                                <tr >
                                    <th>Products</th>
                                    <th>Quantity</th>
                                    <th>Rs./Unit</th>
                                </tr>
                                <?php 
                                    $sql = "SELECT * FROM product WHERE type = 'Female'";
                                    $result = mysqli_query($conn,$sql);
                                    $productPrice = array();
                                    $productName = array();
                                    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                        array_push($productName, $row['type'].$row['name']);
                                        array_push($productPrice, $row[$_GET['type']]);
                                ?>
                                <tr>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><input type="number" name="<?php echo $row['type'].$row['name'] ?>" id="1" ></td>
                                    <td><?php echo $row[$_GET['type']] ?></td>
                                </tr>
                                <?php } ?>
                                <!-- <tr>
                                    <td>Shirts</td>
                                    <td><input type="number" name="gshirt" id="6" ></td>
                                    <td>7</td>
                                </tr>
                                <tr>
                                    <td>T-Shirts</td>
                                    <td><input type="number" name="gtshirt" id="7" ></td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>Trousers</td>
                                    <td><input type="number" name="gtrouser" id="8" ></td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>Sarees</td>
                                    <td><input type="number" name="sarees" id="9"></td>
                                    <td>15</td>
                                </tr>
                                <tr>
                                    <td>Dresses</td>
                                    <td><input type="number" name="dress" id="10"></td>
                                    <input type="hidden" id = "total" name="total" value="">
                                    <input type="hidden" name="action" value="1">
                                    <td>12</td>
                                </tr>-->
                            </table>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="calc1">Add</button>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col" id="chkout">
                <br><button type="submit" class="btn btn-primary mx-auto d-flex " > Check Out </button>
            </div>  
            
            </form>
      <?php
        
        }
        else
            header("location:index.html");
        ?>
</body>
<Script>
var sum1=0;
    var sum = 0;
    var total = 0;
$(document).ready(function(){
    function displayTotal(){
        var nsum = sum+sum1;
        $("#total").val(nsum);
        document.getElementsByName("total").value = nsum;
        document.getElementById("result").innerHTML = "<h2>Total </h2>Rs. "+nsum ;
        document.getElementById("chkout").innerHTML = '<br><button type="submit" class="btn btn-primary mx-auto d-flex " > Check Out </button>';
    }
  $("#calc").click(function(){
    sum = 0;  
    $shirt = document.getElementById("1").value;
    
    if($shirt==="NaN"){
        $shirt=0;
    }
    else
        sum = sum + $shirt * 7;
    $tshirt = document.getElementById("2").value;
    if($tshirt==="NaN"){
        $tshirt=0;
    }
    else
        sum = sum + $tshirt * 5;
    $trouser = document.getElementById("3").value;
    if($trouser==="NaN"){
        $trouser=0;
    }
    else
        sum = sum + $trouser * 10;
    $short = document.getElementById("4").value;
    if($short==="NaN"){
        $short=0;
    }
    else
        sum = sum + $short * 7;
    $jeans = document.getElementById("5").value;
    if($jeans==="NaN"){
        $jeans=0;
    }
    else
        sum = sum + $jeans * 12;       
        
    
    displayTotal();
  });
  $("#calc1").click(function(){
    sum1=0;
    $gshirt = document.getElementById("6").value;
    if($gshirt==="NaN"){
        $gshirt=0;
    }
    else
        sum1 = sum1 + $gshirt * 7;
    $gtshirt = document.getElementById("7").value;
    if($gtshirt==="NaN"){
        $gtshirt=0;
    }
    else
        sum1 = sum1 + $gtshirt * 5;
    $gtrouser = document.getElementById("8").value;
    if($gtrouser==="NaN"){
        $gtrouser=0;
    }
    else
        sum1 = sum1 + $gtrouser * 10;
    $sarees = document.getElementById("9").value;
    if($sarees==="NaN"){
        $sarees=0;
    }
    else
        sum1 = sum1 + $sarees * 15;
    $dress = document.getElementById("10").value;
    if($dress==="NaN"){
        $dress=0;
    }
    else
        sum1 = sum1 + $dress * 12; 
    
    displayTotal();
  });
});

</Script>

</html>