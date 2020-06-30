<!DOCTYPE html>
<html lang="ko" dir="ltr">
<? include '../head_form.php'; ?>

<body>
  <div class="container">

    <? include '../header.php'; ?>

    <section>
      <div class="notice_style">
        <h1>공지사항</h1>
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
                
                $query = "select * from notice_board order by date desc, no desc;";
                $result = mysqli_query($conn, $query);

                while($row = mysqli_fetch_row($result)){
                  $no = $row[0];
                  $title = $row[1];
                  $date = $row[3];
                  $writer = $row[4];
              ?>
                <!--for문 시행-->
                <tr>
                  <th scope="row"><? echo $no ?></th>
                  <td style="width:800px;"><a href="./notice_view.php?bno=<?php echo $no ?>"><?php echo $title ?></a></td>
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
    </section>

    <? include '../footer.php'; ?>

  </div>

</body>
</html>