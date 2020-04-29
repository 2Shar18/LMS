<?php
session_start();
include 'connection.php';
if(isset($_POST['signin'])){
    if(empty($_POST['username'])||empty($_POST['password'])){
        header("location:login.php?Empty= FIll up the blanks");
    }
    else{
        
        $sql = "SELECT * FROM login WHERE username = '".$_POST['username']."' and password = '".$_POST['password']."'";
        // $result =$conn->query($sql) or die('error');
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
       
        $count = mysqli_num_rows($result);
        
        if($count == 1 ) { 
            // var_dump($row);
            $_SESSION['id'] = $row['id'];
            $_SESSION['User'] = $row['name'];
            $_SESSION['type'] = $row['type'];
            if($row['type'] == 'customer')
                header("location: welcome.php");
            else
                header("location: welcomeLaundry.php");
        }
        else{
            header("location:login.php?Invalid=Your Login Name or Password is invalid");
        }
    }
}

else{
    header("location:index.html");

}
