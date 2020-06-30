<?
  include '../dbconn.php';

  session_start(); 

  if ( isset($_SESSION['user']) ) {
    echo "<script>alert('이미 로그인 되어있습니다.'); location.href='./home.php'</script>";

  } 

  else {
    $id = $_POST['id'];
    $pw = $_POST['pw'];

    $query = "select * from member where id = '$id'";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    
    if($num){
      if ( $id == $row['id'] && $pw == $row['pw']) {
        $_SESSION[ 'user' ] = $id;
        $loginFail=FALSE;
        header('Location: home.php?loginFail=$loginFail');
      } 
      else {
        $loginFail=TRUE;
        header('Location: login.php?loginFail=$loginFail');
      }
    }
    else{
      $loginFail=TRUE;  
      header('Location: login.php?loginFail=$loginFail');
    }
  }







?>