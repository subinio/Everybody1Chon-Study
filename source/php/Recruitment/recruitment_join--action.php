<?
  include '../dbconn.php';

  session_start(); 
  
  $s_no = $_GET['s_no'];

  if(empty($s_no)){ header('location:./recruitment_list.php'); }

  $query = "select mem_num from member where id = '$_SESSION[user]';";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);


  $query = "INSERT INTO  enroll_study VALUES ('$s_no', '$row[0]', 0)";
  mysqli_query($conn, $query);
      
  echo "<script>alert('가입되었습니다! 마이페이지에서 확인해보세요!'); location.href='./recruitment_list.php'</script>";
  
  
?>