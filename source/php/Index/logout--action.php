<?
 
  session_start();
  $result = session_destroy();
  header('Location: home.php');

?>