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
include 'connection.php';
if(isset($_SESSION['User'])){
    if($_SESSION['type'] == 'customer'){
        header('location:welcomeLaundry.php');
    }
    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn,$sql);
    $productPrice = array();
    $productName = array();
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        array_push($productName, $row['type'].$row['name']);
        // array_push($productPrice, $row[$type]);
    }

    $sql = "SELECT * FROM `orders` WHERE confirm=0";;
    $result =$conn->query($sql) or die('error');
    $result = mysqli_query($conn,$sql);
    // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
    $count = mysqli_num_rows($result);
    ?>

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
    </nav> 
    <?php
        if($count>0){
    ?>
    
        <h2 class="font-weight-light my-3">Welcome  <?php echo $_SESSION['User'];?>,</h2>
    <div class="container-fluid">
        <div class="row">
        <table class="table">
        <thead class = "text-center">
            <th >
                Order
            </th>
            <th >
                Price
            </th>
            <th>
                Address
            </th>
            <th >
                Task    
            </th>
            <th>
                
            </th>
        </thead>
        <?php
        
        // $productName = array("Shirt","T-shirt","Trousers","Shorts","Jeans","Women Shirts","Women T-shirts","Women Trousers","Sarees","Dress");
      
        
            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
                $products = (unserialize(base64_decode($row['product'])));  ?>
            <tr>
           <?php ?>
                        <td><?php
                for($i=0;$i<10;$i++){
                    if($products[$i]>0){
                       
                        echo $products[$i];
                        echo "-";
                        echo $productName[$i];
                        echo "  ";
                        
                    }
                }?>
           </td>
           <td class = "text-center">
                <?php echo ($row['cost']); ?>
            </td>
            <td class = "text-center">
                <?php
                $customerId = $row['user_id'];
                $sql2 = "SELECT `address` FROM `login` WHERE id = '".$customerId."'";
                $result2 = mysqli_query($conn,$sql2);
                $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
                echo $row2['address'];
                
            ?>
            </td>
         
            <td class = "text-center">
                <?php
                echo $row['type'];
                ?>
            </td>
            <td class = "text-center" id="<?php echo $row['id'];?>">
                <button class="btn btn-success" name="approve" id ="<?php echo $row['id'];?>" onclick ="changeStatus('1',<?php echo $row['id'];?>)"  value="approve">Approve</button>

            </td>
            <?php
        }
        ?>
         </tr>

        </div>
    </div>
    <?php
    }else{?>
        <div class = "alert-light text-primary text-center pt-3"><h2 class="font-weight-light">You have no orders yet. Come back later!</h2></div>
        <?php
    }
    }
    else{
        header("location:index.html");
    }
    ?>
</body>
<script>
    function changeStatus(id,divtochange){
        if (id=='1'){
            var status = "approved";
        }
    $.ajax({
   type: "POST",
   url: "orderStatusChange.php",
   data: {status : status,
        orderId : divtochange},
   success: function(){
       if(id == '1'){
        document.getElementById(divtochange).innerHTML = '<h2 class="text-center font-weight-light text-success">Approved </h2>';
       }
   }
 });
    }
</script>
</html>
