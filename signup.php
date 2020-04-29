<?php
session_start();
include 'connection.php';
if(isset($_POST['signup'])){
    if(empty($_POST['name'])||empty($_POST['password'])||empty($_POST['repassword'])||empty($_POST['email'])||empty($_POST['address'])){
        header("location:signUpCustomer.php?Empty= FIll up the blanks");
    }
    else{
        if($_POST['password']!=$_POST['repassword']){
            header("location:signUpCustomer.php?noMatch= Password does not match. Please check.");
        }
        else{
            $sql = "INSERT INTO login VALUES (NULL, '".$_POST['name']."','".$_POST['username']."','".$_POST['password']."','".$_POST['email']."','".$_POST['address']."',".$_POST['phone'].",'customer')";
            $result =$conn->query($sql);
            if($result){
                echo "here";
                header("location:login.php?successful=Successfully created an account. Please SignIn here.");
            }
            else{
                header("location:signUpCustomer.php?exist=User already exists. Please try different username or password.");
            }
            
           
        }
    }
}
else{
    header("location:index.html");

}