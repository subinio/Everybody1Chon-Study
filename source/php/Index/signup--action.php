<?
  include '../dbconn.php';

  $name = $_POST['name'];
  $id = $_POST['id'];
  $pw = $_POST['pw'];
  $pw2 = $_POST['pw2'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $gender = $_POST['gender'];
  $image = $_POST['image'];
  
  if(!empty($_POST['interest'])){
    for($i=0; $i<count($_POST['interest']); $i++){
      $interests = $_POST['interest'];
    }
  }

  //필수사항 체크 
  if(empty($name)){
    echo "<script>alert('이름을 입력해주세요!'); </script>";
    echo "<script>history.back();</script>";
  }
  else if(empty($id)){
    echo "<script>alert('아이디를 입력해주세요!');</script>";
    echo "<script>history.back();</script>";
  }
  else if(empty($pw)){
    echo "<script>alert('비밀번호를 입력해주세요!');</script>";
    echo "<script>history.back();</script>";
  }
  else if(empty($pw2)){
    echo "<script>alert('비밀번호확인을 입력해주세요!');</script>";
    echo "<script>history.back();</script>";
  }
  else if(empty($phone)){
    echo "<script>alert('전화번호을 입력해주세요!');</script>";
    echo "<script>history.back();</script>";
  }
  else if($pw != $pw2){
    echo "<script>alert('비밀번호 확인이 일치하지 않습니다!');</script>";
    echo "<script>history.back();</script>";
  }
  
  else{

    //전화번호 중복확인을 통해 가입된 회원인지 체크
    $query = "Select * from member where phone_num = '$phone'";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);

    if($num){
      echo "<script>alert('이미 가입된 회원입니다!');</script>";
      echo "<script>history.back();</script>";
    }


    // 아이디 중복 체크
    $query = "Select * from member where id = '$id'";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);

    if (!$num) {
      if(empty($address) && empty($image)){
        $query2 = "INSERT INTO member(id, pw, name, phone_num, address, gender, profile_img) VALUES ('$id', '$pw', '$name', '$phone', null, '$gender', null)";
        mysqli_query($conn, $query2);
      }
      else if(empty($address)){
        $query2 = "INSERT INTO member(id, pw, name, phone_num, address, gender, profile_img) VALUES ('$id', '$pw', '$name', '$phone', null, '$gender', '$image')";
        mysqli_query($conn, $query2);
      }
      else if(empty($image)){
        $query2 = "INSERT INTO member(id, pw, name, phone_num, address, gender, profile_img) VALUES ('$id', '$pw', '$name', '$phone', '$address', '$gender', null)";
        mysqli_query($conn, $query2);
      }
      else{
        $query2 = "INSERT INTO member(id, pw, name, phone_num, address, gender, profile_img) VALUES ('$id', '$pw', '$name', '$phone', '$address', '$gender', '$image')";
        mysqli_query($conn, $query2);
      }

      $query3 = "Select * from member where id = '$id'";
      $result3 = mysqli_query($conn, $query3);
      $row = mysqli_fetch_array($result3);
      
      if(!empty($_POST['interest'])){
        for($i=0; $i<count($_POST['interest']); $i++){
          $query4 = "INSERT INTO interests(mem_num, interest) VALUES ('$row[mem_num]', '$interests[$i]')";
          mysqli_query($conn, $query4);
        }
      }
      
      echo "<script>alert('회원가입완료!'); location.href='./home.php'</script>";
    } 
    
    else {
      echo "<script>alert('중복된 아이디 입니다! 다른 아이디를 사용해주세요.');</script>";
      echo "<script>history.back();</script>";
    }
  
  }


?>