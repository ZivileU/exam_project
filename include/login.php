<?php

  ini_set('error_reporting', 2047);
  ini_set('display_errors', 1);
  session_start();
  include_once('config.php');

  if(isset($_POST['email'])){
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $sql = "select * from users where email = '$email' and password = '$pwd'";
    $result = $dbo->query($sql);
    $row = $result->fetchObject();

    if($row){
      $_SESSION['id'] = $row->id;
      $_SESSION['firstname'] = $row->firstname;
      $_SESSION['lastname'] = $row->lastname;
      $_SESSION['email'] = $row->email;
      $firstname = $_SESSION['firstname'];

      header('Location: ../admin.php');

    }else{
      header('Location: ../index.php?rejected');
    }
  }else{
    //header('Location: ../index.php');
  }

?>
