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
    ?>

    <section>
      <div class="management_freeboard_style">
          <div class="container">

            <div class="group_nav">
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link" href="./management_home.php?s_no=<? echo $s_no ?>">메인</a>
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
                  <a class="nav-link active" href="./management_freeboard.php?s_no=<? echo $s_no ?>">자유게시판</a>
                </li>
              </ul>
            </div>

            <div class="group_content">
            <h1>자유게시판</h1>
              <br><br>
              <table class="table">
                <thead>
                  <tr>      
                    <th scope="col">#</th>                        
                    <td scope="col" style="width:500px;">제목</th>
                    <td scope="col">작성자</th>
                    <td scope="col">작성일</th>
                  </tr>
                </thead>
                <tbody>
                  <?
                    include '../dbconn.php';
                    
                    $query = "select * from study_fboard where study_num = '$s_no' order by date desc, no desc;";
                    $result = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_row($result)){
                      $no = $row[0];
                      $title = $row[2];
                      $date = $row[4];
                      $writer = $row[5];
                  ?>
                  <!--for문 시행-->
                  <tr>
                    <th scope="row"><? echo $no ?></th>
                    <td style="width:800px;"><a href="./notice_view.php?bno=<?php echo $no ?>" style="color:#14A65F"><?php echo $title ?></a></td>
                    <td><? echo $writer ?></td>
                    <td><? echo $date ?></td>
                  </tr>
                  <!---->

                  <?
                    }
                  ?>
                      
                </tbody>
              </table>
            </div>

          </div>
      </div>
    </section>

    <? include '../footer.php'; ?>

  </div>

</body>
</html>