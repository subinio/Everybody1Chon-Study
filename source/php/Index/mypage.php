<!DOCTYPE html>
<html lang="ko" dir="ltr">
<? include '../head_form.php'; ?>

<body>
  <div class="container">

    <? include '../header.php'; ?>

    <!-- DB에서 정보 가져오기 -->
    <?
      include '../dbconn.php';

      if( isset($_SESSION['user']) ){
        $query = "select * from member where id = '$_SESSION[user]'; ";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);

        // 관심분야를 위한 검색
        $query2 = "select * from interests where mem_num ='$row[mem_num]';" ;
        $result2 = mysqli_query($conn, $query2);
      }
    ?>

    <section>
      <div class="mypage_style">
          <h1>마이페이지 - 회원정보수정</h1>
          <div class="box">
              <div class = "leftbox">
                  <img src="../../img/profile_default.png" alt="profile_image">
                  <br>
                  <div class="fieldlabel">이름 : </div>
                  <div><? echo $row['name'] ?></div>
                  <br>
                  <div class="fieldlabel">아이디 : </div>
                  <div><? echo $row['id'] ?></div>
                  <br>
                  <!--
                  <div class="fieldlabel">회원등급 : </div>
                  <div>{{회원등급과 이미지</div>
                  <br>
                  <div class="fieldlabel">스터디등급 : </div>
                  <div>{{스터디등급과 이미지</div>
                  <br>
                  -->
                  <div class="fieldlabel">현재 등록된 스터디 : </div>
                  <?
                    include '../dbconn.php';
                    
                    $query3 = "select study_num, study_name from study where study_num in (select study_num from enroll_study where mem_num in (select mem_num from member where id='$_SESSION[user]'));";
                    $result3 = mysqli_query($conn, $query3);

                    while($row3 = mysqli_fetch_row($result3)){
                      $study_num = $row3[0];
                      $study_name = $row3[1];
                  ?>
                  <span><a href = "../Management/management_home.php?s_no=<? echo $study_num ?>"><? echo $study_name ?></a>,  </span>
                  <?
                  }
                  ?>
              </div>

              <div class="rightbox">
                  <form action="mypage--action.php" method="post">   
                      <div class="inputform">
                          <div class="fieldlabel">비밀번호 수정: </div>
                          <div><input type="password" name="pw" maxlength="15" autocomplete="off" placeholder="PASSWORD" class="inputfield"></div>
                          <br><br>
                          <div class="fieldlabel">비밀번호 확인 : </div>
                          <div><input type="password" name="pw2" maxlength="15" autocomplete="off" placeholder="PASSWORD" class="inputfield"></div>
                          <br><br>
                          <div class="fieldlabel">전화번호 수정: </div>
                          <div><input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}" placeholder="<?echo $row['phone_num'] ?>" class="inputfield"></div>
                          <div class="text_center">반드시 형식을 지켜 입력하세요 예) 010-1234-5678</div> 
                          <br><br>
                          <div class="fieldlabel">주소 수정: </div>
                          <div><input type="text" name="address" maxlength="50" placeholder="<?echo $row['address'] ?>" class="inputfield"></div>
                          <br><br>
                          <div class="fieldlabel">프로필사진 변경 : </div>
                          <div><input type="file" name="image" maxlength="10" placeholder="<?echo $row['profile_img'] ?>" class="inputfield"></div>
                          <br><br>
                          <div class="fieldlabel">관심분야 : </div>
                          <div> <? while($row2 = mysqli_fetch_row($result2)){ echo '#'; echo $row2[2], '   ' ;} ; ?></div>
                      </div>   
                      <br>
                      <input type="submit" value="수정하기" class="inputbtn">
                  </form>
                  <br><br>
                  <a href = "deleteaccount--action.php" style="color: red; margin: 0px 0px 0px 160px; text-decoration: underline; font-size: 15px; ">회원탈퇴하기</a>
              </div>
          </div>
      </div>
    </section>

    <? include '../footer.php'; ?>

  </div>

</body>
</html>