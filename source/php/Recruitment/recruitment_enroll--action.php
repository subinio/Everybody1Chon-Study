<?
  include '../dbconn.php';

  session_start(); 

  if( !isset($_SESSION['user']) ){
    echo "<script>alert('로그인 후 다시 이용해주세요!'); </script>";
    echo "<script>location.href='../Index/login.php'</script>";
  }

  $name = $_POST['studyname'];
  $field = $_POST['studyfield'];
  $intro = $_POST['studyintro'];
  $onoff = $_POST['onoff'];
  $location = $_POST['studylocation'];
  $latefee = $_POST['latefee'];
  $deadline = $_POST['deadline'];
 
  //필수사항 체크 
  if(empty($name)){
    echo "<script>alert('스터디 이름을 작성해주세요!'); </script>";
    echo "<script>history.back();</script>";
  }
  else if(empty($field)){
    echo "<script>alert('분야를 작성해주세요!');</script>";
    echo "<script>history.back();</script>";
  }
  else if(empty($intro)){
    echo "<script>alert('소개를 작성해주세요!');</script>";
    echo "<script>history.back();</script>";
  }
  else if(empty($onoff)){
    echo "<script>alert('모임방식을 선택해주세요!');</script>";
    echo "<script>history.back();</script>";
  }
  else if(empty($location)){
    echo "<script>alert('활동지역을 작성해주세요!');</script>";
    echo "<script>history.back();</script>";
  }
  else if(empty($latefee)){
    echo "<script>alert('지각비 기준을 작성해주세요!');</script>";
    echo "<script>history.back();</script>";
  }
  else if(empty($deadline)){
    echo "<script>alert('모집 마감일을 선택해주세요!');</script>";
    echo "<script>history.back();</script>";
  }
  else{

    $query = "select * from study where study_name='$name';";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);

    //스터디 중복 확인
    if($num){
      echo "<script>alert('이미 존재하는 스터디 이름입니다! 스터디 이름을 변경해주세요!');</script>";
      echo "<script>history.back();</script>";
    }

    else{
      //study 테이블에 저장
      $query = "INSERT INTO study(study_name, field, host_id, introduction, meeting_type, location, late_fee, deadline) VALUES ('$name', '$field', '$_SESSION[user]', '$intro', '$onoff', '$location', '$latefee', '$deadline')";
      mysqli_query($conn, $query);
      
      //enroll_study 테이블에 스터디번호 회원번호 지각비를 저장
      $query1 = "select study_num from study where host_id='$_SESSION[user]' and study_name = '$name';";
      $result1 = mysqli_query($conn, $query1);
      $row1 = mysqli_fetch_array($result1);

      $query2 = "select mem_num from member where id='$_SESSION[user]';";
      $result2 = mysqli_query($conn, $query2);
      $row2 = mysqli_fetch_array($result2);

      $query3 = "INSERT INTO enroll_study(study_num, mem_num, my_late_fee) VALUES ('$row1[0]', '$row2[0]', 0);";
      mysqli_query($conn, $query3);
      
      echo "<script>alert('등록되었습니다!'); </script>";
      echo "<script>location.href='./recruitment_list.php'</script>";
    }

  }


?>