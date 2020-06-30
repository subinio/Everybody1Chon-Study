<?
  include '../dbconn.php';

  $id = $_POST['id'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];

  $query = "select * from member where id = '$id' and name = '$name' and phone_num='$phone' ";
  $result = mysqli_query($conn, $query);
  $num = mysqli_num_rows($result);
  $row = mysqli_fetch_array($result);

  if($num){
    echo "
      <script>
        var conf = confirm(' 당신의 비밀번호는 {$row['id']} 입니다. 로그인 하시겠습니까?');
        if(conf){
          location.href='./login.php';
        }
        else{
          location.href='./home.php';
        }
      </script>
    " ;    
  }

  else{
    echo "
      <script>
        var conf = confirm('회원이 아닙니다! 회원가입 하시겠습니까?');
        if(conf == true){
          location.href='./signup.php';
        }
        else{
          location.href='./home.php';
        }
      </script>
    " ;
  }


?>