<!DOCTYPE html>
<html lang="ko" dir="ltr">
<? include '../head_form.php'; ?>

<body>
  <div class="container">

    <? include '../header.php'; ?>

    <?
      include '../dbconn.php';
      
      $s_no = $_GET['s_no'];

      if(empty($s_no)){ header('location:./recruitment_list.php'); }

      // 로그인이 안되어 있다면 로그인하라고 알림
      if(empty($_SESSION['user'])){
        echo "<script>alert('로그인 후 이용해주세요!'); location.href='./recruitment_list.php'</script>";
      }

      //이미 가입된 회원이라면 detail페이지로 이동
      else if(!empty($_SESSION['user'])){
        $query = "select * from enroll_study where study_num = '$s_no' and mem_num in (select mem_num from member where id='$_SESSION[user]');"; 
        $result = mysqli_query($conn, $query);
        $num = mysqli_num_rows($result);
        if($num){
          header("location:../Management/management_home.php?s_no=$s_no");
        }
      }

      //스터디 정보
      $query = "select * from study where study_num = '$s_no'";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_row($result);
      $study_num = $row[0];
      $name = $row[1];
      $field = $row[2];
      $host = $row[3];
      $intro = $row[4];
      $type = $row[5];
      $location =$row[6];
      $latefee =$row[7];
      $deadline =$row[8];

      //여자 성별 수
      $query2 = "select count(gender) from member where mem_num in (select mem_num from enroll_study where study_num='$study_num') and gender ='F';";
      $result2 = mysqli_query($conn, $query2);
      $row2 = mysqli_fetch_row($result2);
      $female = $row2[0];

      //남자 성별 수
      $query3 = "select count(gender) from member where mem_num in (select mem_num from enroll_study where study_num='$study_num') and gender ='M';";
      $result3 = mysqli_query($conn, $query3);
      $row3 = mysqli_fetch_row($result3);
      $male = $row3[0]
    ?>

    <section>
      <div class="recruitment_join_style">
        <div class="box">
            <h1><? echo $name?></h1>
            <br><br>
            <div>안녕하세요? 해당 모임의 방장 <? echo $host ?> 입니다.</div>
            <br>
            <div>자세히 설명하면 <? echo $intro ?> 입니다.</div>
            <br>
            <div>해당 스터디는 주로 <? echo $field ?> 분야를 공부합니다.</div>
            <br>
            <div>해당 스터디는 <? echo $type ?>으로 진행됩니다.</div>
            <br>
            <div>해당 스터디는 주로 <? echo $location ?>에서 모임을 할 예정입니다.</div>
            <br>
            <div>해당 스터디는 <? echo $latefee ?>원 씩 지각비가 부여됩니다.</div>
            <br>
            <div>현재까지 모인 멤버는 여자 <? echo $female ?>명, 남자 <? echo $male ?>명으로 총 <? echo ($female+$male) ?>명 입니다.</div>
            <br>
            <div>해당 스터디는 <?echo $deadline ?>까지 멤버를 모집합니다.</div>
            <br><br>
            <a href="./recruitment_join--action.php?s_no=<? echo $study_num ?>"><div>이 스터디에 가입하기</div></a>
        </div>
      </div> 
    </section>

    <? include '../footer.php'; ?>

  </div>

</body>
</html>