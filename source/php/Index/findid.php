<!DOCTYPE html>
<html lang="ko" dir="ltr">
<? include '../head_form.php'; ?>

<body>
  <div class="container">

    <? include '../header.php'; ?>

    <section>
      <div class="findid_style">
          <h1>아이디 찾기</h1>
          <div class="box">
              <form action="findid--action.php" method="post">   
                  <div class="inputform">
                      <div class="fieldlabel">이름 : </div>
                      <div><input type="text" id = "name" name="name" maxlength="15" placeholder="NAME" class="inputfield"></div>
                      <br>
                      <div class="fieldlabel">전화번호 : </div>
                      <span><input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}" required placeholder="010-1234-5678" class="inputfield"></span>
              <!--    <button>본인인증하기</button> -->
                  </div>  
                  <input type="submit" value="아이디찾기" class="inputbtn">
              </form>
          </div>

      </div>
    </section>

    <? include '../footer.php'; ?>

  </div>

</body>
</html>