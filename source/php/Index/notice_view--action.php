<?
  include '../dbconn.php';

  $new_comment = $_GET['leave_comment'];
  $bno = $_GET['bno'];
  session_start();
    
  //로그인 하지 않았을 경우
  if( !isset($_SESSION['user']) ){
    echo "<script>alert('로그인 후 댓글을 작성해주세요!'); </script>";
    echo "<script>location.href='./home.php'</script>";
  }
  //빈칸으로 확인을 눌렀을 경우
  else if(empty($new_comment)){
    echo "<script>alert('댓글을 작성해주세요!'); </script>";
    echo "<script>location.href='./notice.php'</script>";
  }
  
  //댓글 입력
  else{
    $query = "INSERT INTO notice_board_comment(notice_board_no, content, date, writer) VALUES('$bno', '$new_comment', curdate(), '$_SESSION[user]')";
    mysqli_query($conn, $query);

    echo "<script>location.href='./notice_view.php?bno=$bno'</script>";
  }

?>