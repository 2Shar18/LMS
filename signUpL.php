<?php
include 'connection.php';
session_start();
if(isset($_POST['signup1'])){
    if(empty($_POST['name'])||empty($_POST['password'])||empty($_POST['repassword'])||empty($_POST['email'])){
        header("location:signupLaundry.php?Empty= FIll up the blanks");
    }
    else{
        if($_POST['password']!=$_POST['repassword']){
            header("location:signupLaundry.php?noMatch= Password does not match. Please check.");
        }
        else{
            $sql = "INSERT INTO login VALUES (NULL, '".$_POST['name']."','".$_POST['username']."','".$_POST['password']."','".$_POST['email']."','".$_POST['address']."',".$_POST['phone'].",'laundry')";
            $result =$conn->query($sql);
            if($result){

                header("location:login.php?successful=Successfully created an account. Please SignIn here.");
            }
            else{
                header("location:signupLaundry.php?exist=User already exists. Please try different username or password.");
            }
            
           
        }
    }
}
else{
    header("location:index.html");
}
?>