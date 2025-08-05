<?php 
 $conn = new mysqli("localhost" , "root" , "" , "QLSHOPDH" ); 
 session_start();
 if($_SERVER['REQUEST_METHOD'] === 'POST'){
  if(isset($_POST['register']) && ($_POST['register'])){
        $name = $_POST['username'];
   $pass = $_POST['userpass'];
   $email = $_POST['useremail'];
   $passHashed = password_hash($pass ,PASSWORD_DEFAULT);
   $insertValue = "INSERT INTO UserAccount (nameUser , passwordUser , emailUser) VALUES ('$name' , '$passHashed' , '$email')";
   if($conn->query($insertValue) === TRUE){
     header("Location: index.php");
     exit;
   }
  }else if(isset($_POST['login']) && ($_POST['login'])){
        $name = $_POST['username'];
      $pass = $_POST['userpass'];
    $_SESSION['checkDuplicateName'] = false;
   $_SESSION['checkDuplicatePass'] = false;
  $compare = "SELECT * FROM UserAccount WHERE nameUser = '$name'";
  $res = $conn->query($compare);
  if($res->num_rows > 0){
   $rows = $res->fetch_assoc();
      $_SESSION['checkDuplicateName'] = true;
     if(password_verify($pass , $rows['passwordUser'])){
      $_SESSION['checkDuplicatePass'] = true;
      header("Location: index.php");
      exit;
     }
  }
  header("Location: Login.php");
  exit;
}
 }
?>