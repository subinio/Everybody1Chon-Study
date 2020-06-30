<!DOCTYPE html>
<html lang="ko" dir="ltr">
<? include '../head_form.php'; ?>

<body>
  <div class="container">

    <? include '../header.php'; ?>

    <script>
      // 공지글에서 새로고침 할 경우 _GET 변수가 날아간다. 따라서 새로고침하면 공지사항목록으로 이동하도록 설정. 
      if(performance.navigation.type == 1){ location.href='./notice.php'; }
    </script>

    <?
      include '../dbconn.php';

      $bno = $_GET['bno']; // 보고자 하는 게시글 번호

      if(empty($bno)){ header('location:./home.php'); }

      // 게시글 찾기
      $query = "select * from notice_board where no = $bno;"; // 보고자 하는 게시글 번호로 찾기
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_row($result);
      $no = $row[0];
      $title = $row[1];
      $content = $row[2];
      $date = $row[3];
      $writer = $row[4];
      
      //해당 게시글의 댓글 찾기
      $query2 = "select b.content, b.date, b.writer from notice_board as a RIGHT JOIN notice_board_comment as b ON a.no=b.notice_board_no where a.no=$bno;"; 
      $result2 = mysqli_query($conn, $query2);
      $num = mysqli_num_rows($result2);
      $c_cnt = $num;
    ?>

    <section>
      <div class="notice_view_style">
        <div class="board"> 
          <p class="float_left">제목: <? echo $title ?></p>
          <p class="float_right">작성일: <? echo $date ?></p>
          <br><hr>
          <p class="content"><? echo $content ?></p>


          <br><hr>
          <div class ="comment_input">
            <form action="./notice_view--action.php">
                댓글 남기기 : 
                <input type="textarea" name="leave_comment">
                <input type="hidden" name="bno" value="<? echo $bno ?>">
                <button type="submit">확인</button>
            </form>
          </div>

          <hr>
          <div class="comment">
            <p>댓글 <? echo $c_cnt ?>개</p>
            <table class="table">
              <?
                while($row2 = mysqli_fetch_row($result2)){
                $c_content = $row2[0];
                $c_date = $row2[1];
                $c_writer = $row2[2];
              ?>
                <!--for문 시행-->
                <tr>
                  <th><? echo $c_writer ?></td>
                  <td style="width:800px;"><? echo $c_content ?></td>
                  <td><? echo $c_date ?></td>
                </tr>
                <!---->
              <?
                }
              ?>

            </table>
          </div>

          
        </div>

      </div>
    </section>

    <? include '../footer.php'; ?>

  </div>

</body>
</html>