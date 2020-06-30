<!DOCTYPE html>
<html lang="ko" dir="ltr">
<? include '../head_form.php'; ?>

<body>
  <div class="container">

    <? include '../header.php'; ?>

    <?
      include '../dbconn.php';
      
      $query = "select * from main_calendar;";
      $result = mysqli_query($conn, $query);

      $table = array();

      while($row = mysqli_fetch_row($result)){
        array_push($table, array($row[1], $row[2], $row[3]));
      }
    ?>

    <section>
      <div class="home_style">
          <script> 

          var contents = <?php echo json_encode($table)?>;     //////////////////// json을 통해 php 배열을 js로 가져옴.

          document.addEventListener('DOMContentLoaded', function() {
              var today = new Date();
              var year = today.getFullYear();
              var month = today.getMonth() +1;
              var day = today.getDate();
          
              if(day<10){
                  day='0'+day;
              }
              if(month<10){
                  month='0'+month;
              }
          
              today=year+'-'+month+'-'+day;
              
              var calendarEl = document.getElementById('calendar');
              var calendarContents = {
              plugins: [ 'interaction', 'dayGrid' ],
              defaultDate: today,
              editable: true,
              eventLimit: true, // allow "more" link when too many events
              events: []
              }
              for(var i=0; i<contents.length; i++){
                calendarContents['events'].push( {
                  title: contents[i][0],
                  start: contents[i][1],
                  end: contents[i][2] + 'T23:00:00'
                })
              }

              var calendar = new FullCalendar.Calendar(calendarEl, calendarContents);
              
              calendar.render();
          });
          
          </script>

          <div id='mini_notice'>
            <div style="text-align:center; font-size: 20px; color: #14A65F; font-weight: bold;">공지사항</div>
            <br>
            <table class="table">
              <?
                include '../dbconn.php';
                
                $query = "select * from notice_board order by date desc, no desc;";
                $result = mysqli_query($conn, $query);

                while($row = mysqli_fetch_row($result)){
                  $no = $row[0];
                  $title = $row[1];
                  $date = $row[3];
              ?>
                <!--for문 시행-->
                <tr>
                  <td><a href = "./notice_view.php?bno=<?php echo $no ?>"><? echo $title?></a></td>
                  <td><?echo $date?></td>
                </tr>
                <!---->
              
              <?
                }
              ?>
               
                
            </table>
          </div>

          <div id='calendar'>
              <br>
              주요 시험 일정 (일정추가를 원하면 공지사항에 댓글을 남겨주세요.)
              <a href="notice.php" id="go">바로가기</a>  
          </div>
          
      </div>
    </section>

    <? include '../footer.php'; ?>

  </div>

</body>
</html>