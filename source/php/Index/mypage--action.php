<?
  include '../dbconn.php';

  session_start();
  
  if( isset($_SESSION['user']) ){
    $query = "select * from member where id = '$_SESSION[user]'; ";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
  }

  $pw = $_POST['pw'];
  $pw2 = $_POST['pw2'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $image = $_POST['image'];

  if(empty($pw)){
    $pw = $row['pw'];
  }
  
  if(empty($pw2)){
    $pw2 = $row['pw'];
  }
  
  if(empty($phone)){
    $phone = $row['phone_num'];
  }
  
  if(empty($address)){
    $address = $row['address'];
  }

  if(empty($image)){
    $image = $row['profile_img'];
  }
  

  $query2 = "select * from member where phone_num = '$phone' and id != '$_SESSION[user]' ";
  $result2 = mysqli_query($conn, $query2);
  $num = mysqli_num_rows($result2);

  if($num){
    echo "<script>alert('사용할 수 없는 전화번호 입니다!');</script>";
    echo "<script>history.back();</script>";
  }

  else if($pw != $pw2){
    echo "<script>alert('비밀번호 확인이 일치하지 않습니다!');</script>";
    echo "<script>history.back();</script>";
  }

  else{
    $query = "UPDATE member SET pw='$pw', phone_num='$phone', address='$address', profile_img='$image' where id='$_SESSION[user]' ";
    mysqli_query($conn, $query);
    
    echo "<script>alert('회원 정보 수정 완료!'); location.href='./home.php'</script>";
  }
    
    


?>