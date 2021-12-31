<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
    include '_dbconnect.php';
    $user_email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];

    $existSql = "SELECT * FROM `users` WHERE `user_email`= '$user_email' ";
    $result = mysqli_query($conn,$existSql);
    $numRow = mysqli_num_rows($result);
     if($numRow==1){
         $row=mysqli_fetch_assoc($result);
         if(password_verify($pass,$row['user_pass'])){
             session_start();
             $_SESSION['loggedin']=true;
             $_SESSION['sno'] = $row['sno'];
             $_SESSION['useremail']=$user_email;
             echo "loggedin";
             
         }
         header("Location: /forum/index.php");
     }
}
?>