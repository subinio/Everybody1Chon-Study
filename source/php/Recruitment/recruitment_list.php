<!DOCTYPE html>
<html lang="ko" dir="ltr">
<? include '../head_form.php'; ?>

<body>
  <div class="container">

    <? include '../header.php'; ?>

    <section>
      <div class="recruitment_list_style">
          
          <!-- 로그인 했을때만 보여지도록-->
          <? if ( isset($_SESSION['user']) ){ ?>
          <div class="makefield">
             <a href="recruitment_enroll.php">
                  <i class="fa fa-pencil" style="color:#14A65F"></i>
             </a>
          </div>
          <? } ?>
          <!---->

          <div class="searchfield">
              <form action="recruitment_list.php">
                  <input type="search" name="search" placeholder="search..">
                  <button type="submit"><i class="fa fa-search"></i></button>
              </form>
          </div>
          <br><br><br>
          
          <div class="cardfield">
              <?
                include '../dbconn.php';
                
                $query = "select * from study where deadline >= curdate() order by study_num desc;";
                $result = mysqli_query($conn, $query);

                while($row = mysqli_fetch_row($result)){
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
                <!--groupcard 부분을 for문안에 넣으면 됩니다-->
                <div class="groupcard">
                    <a href="./recruitment_join.php?s_no=<?php echo $study_num ?>" style="text-decoration:none">
                        <div class ="content">
                            <h1 style = "font-size:35px;"><? echo $name ?></h1>
                          <!--  <span style="text-align:right; font-size: 10px;"><? echo $field ?></span> -->
                            <hr>
                            <div><? echo $field ?></div>
                            <div><? echo $type ?></div>
                            <div><? echo $location?></div>
                            <div style="color:cornflowerblue";>男 : <? echo $male ?> <p style="color:palevioletred ";>女 : <? echo $female ?></p></div>
                            <div>지각비 <? echo $latefee ?>원</div>
                            <div><? echo $deadline ?><p>까지 마감</p></div>
                            <p id= "intro"><? echo $intro ?></p>
                        </div>
                    </a>
                </div>
                <!-- 여기까지 -->
              <?
                }
              ?>

          </div>

      </div>
    </section>

    <? include '../footer.php'; ?>

  </div>

</body>
</html>