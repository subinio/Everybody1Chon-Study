<!DOCTYPE html>
<html lang="ko" dir="ltr">
<? include '../head_form.php'; ?>

<body>
  <div class="container">

    <? include '../header.php'; ?>

    <section>
      <div class="login_style">
          <h1>로그인</h1>
          <div class="box">
              <form action="login--action.php" method="post">
                  <div class="inputform">
                      <div class="fieldlabel">아이디 : </div>
                      <div><input type="text" id = "id" name="id" maxlength="15" placeholder="ID" class="inputfield"></div>
                      <br>
                      <div class="fieldlabel">패스워드 : </div>
                      <div><input type="password" id = "pw" name="pw" maxlength="15" autocomplete="off" placeholder="PASSWORD" class="inputfield"></div>
                  </div>   
                  <input type="submit" value="LOGIN" class="inputbtn">
              </form>
              <br>
              <div class="error_msg"> <? if(!empty($_GET['loginFail']) && $_GET['loginFail']==TRUE){ echo '가입하지 않은 아이디이거나, 잘못된 비밀번호입니다.';} ?> </div>
              <br>
              <div class="find">
                  <a href="findid.php" target="_blank">아이디 찾기</a>
                  <a href="findpassword.php" target="_blank">비밀번호 찾기</a>
                  <a href="signup.php">회원가입</a>
              </div>
          </div>
      </div>
    </section>

    <? include '../footer.php'; ?>

  </div>

</body>
</html>