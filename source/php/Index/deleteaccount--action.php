


<script>
  var conf = confirm('정말로 탈퇴하시겠습니까?');

  if(conf){
    <?
      include '../dbconn.php';
      session_start();
      $query = "delete from member where id = '$_SESSION[user]'; ";
      $result = mysqli_query($conn, $query);
    ?>
    
    alert('탈퇴되었습니다.'); 
      location.href='./logout--action.php';
  }

  else{
    location.href='./mypage.php';
  }
</script>

  
  

