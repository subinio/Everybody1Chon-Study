<!DOCTYPE html>
<html lang="ko" dir="ltr">
<? include '../head_form.php'; ?>

<body>
  <div class="container">

    <? include '../header.php'; ?>
    <?
      include '../dbconn.php';
      
      $s_no = $_GET['s_no'];

      if(empty($s_no)){ header('location:../Recruitment/recruitment_list.php'); }

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
      <div class="management_home_style">
          <div class="container">

            <div class="group_nav">
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="./management_home.php?s_no=<? echo $s_no ?>">메인</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./management_calendar.php?s_no=<? echo $s_no ?>">캘린더</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./management_map.php?s_no=<? echo $s_no ?>">모임</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./management_certificationboard.php?s_no=<? echo $s_no ?>">인증게시판</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./management_freeboard.php?s_no=<? echo $s_no ?>">자유게시판</a>
                </li>
              </ul>
            </div>

            <div class="group_content">
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
              <br>
              <div>자세한 사항은 상단 탭의 자유게시판을 이용해주세요.</div>
            </div>

          </div>
      </div>
    </section>

    <? include '../footer.php'; ?>

  </div>

</body>
</html>