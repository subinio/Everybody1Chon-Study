<!DOCTYPE html>
<html lang="ko" dir="ltr">
<? include '../head_form.php'; ?>

<body>
  <div class="container">

    <? include '../header.php'; ?>

    <section>
      <div class="recruitment_enroll_style">
          <h1>새 스터디 등록</h1>
          <div class="box">
              <form action="recruitment_enroll--action.php" method="post">  
                  <div class="inputform">
                      <div style="color: red; text-align:center;" >* 반드시 모두 기입해야 합니다.</div>
                      <br>
                      <div class="fieldlabel">스터디 이름 : </div>
                      <div><input type="text" name="studyname" maxlength="15" placeholder="스터디 이름" class="inputfield"></div>
                      <br><br>
                      <div class="fieldlabel">분야 : </div>
                      <div><input type="text" name="studyfield" maxlength="15" placeholder="분야" class="inputfield"></div>
                      <br><br>
                      <div class="fieldlabel">소개 : </div>
                      <div><input type="textarea" name="studyintro" placeholder="스터디소개" class="inputfield"></div>
                      <br><br>
                      <div class="fieldlabel">모임 방식: </div>
                      <div>
                          <input type="radio" name="onoff" value="온라인" checked> 온라인
                          <input type="radio" name="onoff" value="오프라인"> 오프라인
                          <input type="radio" name="onoff" value="온/오프 둘다"> 온/오프 둘다
                      </div>
                      <br><br>
                      <div class="fieldlabel">활동 지역 : </div>
                      <div><input type="text" name="studylocation" placeholder="활동할 지역" class="inputfield"></div>
                      <div style="text-align:center; font-size: 12px; color:gray;">ex) 인천광역시 연수구</div>
                      <br><br>
                      <div class="fieldlabel">지각비 기준: </div>
                      <div><input type="number" name="latefee" class="inputfield">원</div>
                      <div style="text-align:center; font-size: 12px; color:gray;">! 지각비 기준은 지각할 때마다 적용되는 비용의 기준입니다.</div>
                      <div style="text-align:center; font-size: 12px; color:gray;">ex) 500원 -> 지각할때마다 500원씩 증가</div>
                      <br><br>
                      <div class="fieldlabel">모집마감일 : </div>
                      <div><input type="date" name="deadline" class="inputfield"></div>
                      <div style="text-align:center; font-size: 12px; color:gray;">해당 스터디를 언제까지 모집할 것인지 적어주세요.</div>            
                  </div> 
                  <input type="submit" value="등록하기" class="inputbtn">
              </form>
          </div>
      </div>
    </section>

    <? include '../footer.php'; ?>

  </div>

</body>
</html>