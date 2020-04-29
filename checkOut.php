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
    <title>Check Out</title>   
</head>
<body>
    <?php
    include 'connection.php';
    ?>
<nav class="navbar navbar-expand-sm ">
            <a class="navbar-brand" href="welcome.php">Home</a>
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item logout">
            <a href = "logout.php?logout" class="nav-link">Logout</a>
            </li>
        </ul>
    </nav> 
    <?php
        session_start();
    //    var_dump($_GET['trouser']);
        if(isset($_SESSION['User'])){
            $type = $_GET['type'];
            $sql = "SELECT * FROM product";
            $result = mysqli_query($conn,$sql);
            $productPrice = array();
            $productName = array();
            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                array_push($productName, $row['type'].$row['name']);
                array_push($productPrice, $row[$type]);
            }
            $productQty = array();
            $quantity = 0;
            foreach($productName as $p){
                $p = $_GET[$p];
                if($p==''){
                    $p=0;
                }
                $quantity = $quantity + $p;
                array_push($productQty, $p);
            }
            // $shirt = $_GET['shirt'];
            // if($shirt==''){
            //     $shirt = 0;
        
            // }
            // $tshirt = $_GET['tshirt'];
            // if($tshirt==''){
            //     $tshirt = 0;
            //     // echo $tsthirt;
            // }
            // $trouser = $_GET['trouser'];
            // if($trouser==''){
            //     $trouser = 0;
            //     // echo $trouser;
            // }
            
            // $shorts = $_GET['shorts'];
            // if($shorts==''){
            //     $shorts = 0;
            //     // echo $shorts;
            // }
            // $jeans = $_GET['jeans'];
            // if($jeans==''){
            //     $jeans = 0;
            //     // echo $jeans;
            // }
            // $gshirt = $_GET['gshirt'];
            
            // if($gshirt==''){
            //     $gshirt = 0;
            //     // echo $gshirt;
            // }
            // $gtshirt = $_GET['gtshirt'];
            // if($gtshirt==''){
            //     $gtshirt = 0;
            //     // echo $gtshirt;
            // }
            // $gtrouser = $_GET['gtrouser'];
            // if($gtrouser==''){
            //     $gtrouser = 0;
            //     // echo $gtrouser;
            // }$sarees = $_GET['sarees'];
            // if($sarees==''){
            //     $sarees = 0;
            //     // echo $sarees;
            // }
            
            // $dress = $_GET['dress'];
            // if($dress==''){
            //     $dress = 0;
            //     // echo $dress;
            // }
            // $total = $_GET['total'];
        //    var_dump($total);
            // $productPrice= array(5,5,10,5,10,5,5,10,15,12);
            // $productName = array("Shirt","T-shirt","Trousers","Shorts","Jeans","Women Shirts","Women T-shirts","Women Trousers","Sarees","Dress");
            // $productQty = array($shirt,$tshirt,$trouser,$shorts,$jeans,$gshirt,$gtshirt,$gtrouser,$sarees,$dress);
            // echo $_COOKIE['total'];
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4 display-4 d-flex text-center">
                        Order Summary
                    </div>
                    <div class="col-sm-4"></div>
                    <table class="table flex-center" style="text-align:center; color:#3a76a7;">
                    <thead>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    </thead>
                    <td><?php
                 
                    $total = 0;
                    for($i=0;$i<10;$i++){
                    if($productQty[$i]==0){
                        continue;
                    }
                    else{
                        ?><tr><td><?php echo $productName[$i]; ?> </td>
                        <td><?php echo $productQty[$i]; ?> </td>
                        <td><?php $total = $total + $productPrice[$i]*$productQty[$i]; echo $productPrice[$i]*$productQty[$i];?> </tr><?php
                    }
                    }
                   ?>
                   </td>  
                    </tr>
                   </table>

                   <h2 class="text-center mx-auto font-weight-light d-flex justify-center"> Total Rs. <?php echo $total?> </h2>
                   
                </div>
                <br>
                <form action="processOrder.php" method="post">

                    <input type="hidden" name="total" value="<?php echo $total; ?>">
                    <input type="hidden" name="type" value="<?php echo $type; ?>">
                    <input type="hidden" name="quantity" value="<?php echo $quantity; ?>">
                    <input type="hidden" name="productQty" value="<?php echo base64_encode(serialize($productQty)); ?>">
                    <button type="submit" class="btn btn-primary mx-auto d-flex" name="placeorder">Place Order</button>
                </form>
            </div>
            <?php
            }
        else
            header("location:index.html");
        
        

        ?>
</body>
<script>


</script>
</html>