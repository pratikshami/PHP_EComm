<?php
   session_start();
   class GenericClass
   {
   public function checFunLogin($email, $pass)
   {
    $obj=new Helper("ecomm");
    $field="user_id,email_id,password";
    $table="user";
    $condition=" email_id='$email' AND password='$pass' ";
    $result=$obj->read_record($field, $table, $condition);
    if (is_array($result)){
    foreach ($result as $row){
    $_SESSION['user'] = $row['user_id'];
    $_SESSION['email'] =$row['email_id'];
    $_SESSION['pass'] =$row['password'];
    if (isset($_SESSION['key'])){
	header("Location: OrderSummaryPageIncluded.php");
    } else{
    header("Location: index.php");
    }	
    }
    } else{
   echo "Invalid Login Credentials.";
   header("Location: LoginPageIncluded.php");
   }  
   }
   public function checkFunctionSummery($email, $pass)
  {
  $obj=new Helper("ecomm"); 
  if(isset($email) && isset($pass)){
  $field="user_id";
  $table="user";
  $condition=" email_id='$email' AND password='$pass' ";
  $result=$obj->read_record($field, $table, $condition);
  if (is_array($result)){		
  foreach($result as $row){
  if($_SESSION['user'] == $row['user_id']){
  header("Location: OrderSummaryPageIncluded.php");
  }
  }	
  }
  else{
  echo "Invalid Login Credentials.";
  header("Location: LoginPageIncluded.php");
  }
  }
  else{
  echo "Invalid Login Credentials.";
  header("Location: LoginPageIncluded.php");
  }
  }
  }
?>