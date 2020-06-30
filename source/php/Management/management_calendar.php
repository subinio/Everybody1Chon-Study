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

      $query = "select * from study_calendar where study_num = '$s_no' order by start_date;";
      $result = mysqli_query($conn, $query);

      $table = array();

      while($row = mysqli_fetch_row($result)){
        array_push($table, array($row[2], $row[3], $row[4]));
      }

    ?>

    <section>
      <div class="management_calendar_style">
          <div class="container">

            <div class="group_nav">
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link" href="./management_home.php?s_no=<? echo $s_no ?>">메인</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link  active" href="./management_calendar.php?s_no=<? echo $s_no ?>">캘린더</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./management_map.php?s_no=<? echo $s_no ?>">모임</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./management_certificationboard.php?s_no=<? echo $s_no ?>">인증게시판</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./management_freeboard.php?s_no=<? echo $s_no ?>">자유게시판</a>
                </li>
              </ul>
            </div>

            <div class="group_content">

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
                
                <div id='calendar'>
                      
                    </div>

                    <div class="schedule">
                      <h2>Schedules</h2>
                      <br>
                      <? for($i=0;$i<count($table);$i++){ ?>
                          <p><?echo $table[$i][1]?> ~ <?echo $table[$i][2]?> <?echo $table[$i][0]?></p> <br>
                      <? } ?>
                    </div>
            </div>

          </div>
      </div>
    </section>

    <? include '../footer.php'; ?>

  </div>

</body>
</html>