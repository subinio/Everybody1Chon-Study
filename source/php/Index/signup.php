<!DOCTYPE html>
<html lang="ko" dir="ltr">
<? include '../head_form.php'; ?>

<body>
  <div class="container">

    <? include '../header.php'; ?>

    <section>
      <div class="signup_style">
          <h1>회원가입</h1>
          <div class="box">
              <form action="signup--action.php" method="post">   
                  <div class="inputform">
                      <div style="color: red; text-align:center;" >* 는 입력 필수입니다.</div>
                      <br><br>      
                      <div class="fieldlabel"><span style="color: red">*</span> 이름 : </div>
                      <div><input type="text" name="name" maxlength="15" placeholder="NAME" class="inputfield"></div>
                      <br><br>
                      <div class="fieldlabel"><span style="color: red">*</span> 아이디 : </div>
                      <div><input type="text" name="id" maxlength="15" placeholder="ID" class="inputfield"></div>
                      <!--
                      <button value = "CHECK" name = "duplicateCHECK">중복확인</button>
                      -->
                      <br><br>
                      <div class="fieldlabel"><span style="color: red">*</span> 비밀번호 : </div>
                      <div><input type="password" name="pw" maxlength="15" autocomplete="off" placeholder="PASSWORD" class="inputfield"></div>
                      <br><br>
                      <div class="fieldlabel"><span style="color: red">*</span> 비밀번호확인 : </div>
                      <div><input type="password" name="pw2" maxlength="15" autocomplete="off" placeholder="PASSWORD" class="inputfield"></div>
                      <br><br>
                      <div class="fieldlabel"><span style="color: red">*</span> 전화번호 : </div>
                      <div><input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}" required placeholder="010-1234-5678" class="inputfield"></div>
                      <div class="text_center">반드시 형식을 지켜 입력하세요 예) 010-1234-5678</div> 
                      <br><br>
                      <div class="fieldlabel">주소 : </div>
                      <div><input type="text" name="address" maxlength="50" placeholder="ADDRESS" class="inputfield"></div>
                      <br><br>
                      <div class="fieldlabel"><span style="color: red">* </span>성별: </div>
                      <div>
                          <input type="radio" name="gender" value="M" checked> 남성
                          <input type="radio" name="gender" value="F"> 여성
                      </div>
                      <br><br>
                      <div class="fieldlabel">프로필 사진 : </div>
                      <div><input type="file" name="image" maxlength="15" placeholder="image" class="inputfield"></div>
                      <br><br>
                      <div>
                      <div class="fieldlabel">관심분야 : </div>
                      <div class ="intchkbox">
                          <input type="checkbox" name="interest[]" value="영어회화" class="chkbox"> 영어회화
                          <input type="checkbox" name="interest[]" value="자격증" class="chkbox"> 자격증 
                          <input type="checkbox" name="interest[]" value="토익/토플" class="chkbox"> 토익/토플
                          <br>
                          <input type="checkbox" name="interest[]" value="프로젝트" class="chkbox"> 프로젝트
                          <input type="checkbox" name="interest[]" value="공무원" class="chkbox"> 공무원
                          <input type="checkbox" name="interest[]" value="제2외국어" class="chkbox"> 제2외국어
                          <br>
                          <input type="checkbox" name="interest[]" value="유학준비" class="chkbox"> 유학준비
                          <input type="checkbox" name="interest[]" value="NCS" class="chkbox"> NCS 
                          <input type="checkbox" name="interest[]" value="면접" class="chkbox"> 면접
                          <br>
                          <div> (다중 선택 가능)</div>
                      </div>
                      </div>
                  </div> 
                  <input type="submit" value="가입하기" class="inputbtn">
              </form>
          </div>
      </div>
    </section>

    <? include '../footer.php'; ?>

  </div>

</body>
</html>