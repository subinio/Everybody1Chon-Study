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
    ?>

    <section>
      <div class="management_map_style">
          <div class="container">

          <div class="group_nav">
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link" href="./management_home.php?s_no=<? echo $s_no ?>">메인</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./management_calendar.php?s_no=<? echo $s_no ?>">캘린더</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="./management_map.php?s_no=<? echo $s_no ?>">모임</a>
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
              <div id="map" style="width:1000px;height:400px; margin: 0 auto;"></div>
              <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=7be8e94dd92f8c843ce916e031050c0a"></script>
              <script>
                var container = document.getElementById('map'); //지도를 담을 영역의 DOM 레퍼런스
                var options = { //지도를 생성할 때 필요한 기본 옵션
                  center: new kakao.maps.LatLng(37.51253687731904,126.90739469399936), //지도의 중심좌표.
                  level: 3 //지도의 레벨(확대, 축소 정도)
                };
                var map = new kakao.maps.Map(container, options); //지도 생성 및 객체 리턴
                var markerPosition  = new kakao.maps.LatLng(37.51253687731904,126.90739469399936); 

                // 마커를 생성합니다
                var marker = new kakao.maps.Marker({
                    position: markerPosition
                });

                // 마커가 지도 위에 표시되도록 설정합니다
                marker.setMap(map);

                var iwContent = '<div style="padding:5px; text-align:center;">히어로스트 커피</div>', // 인포윈도우에 표출될 내용으로 HTML 문자열이나 document element가 가능합니다
                    iwPosition = new kakao.maps.LatLng(37.51253687731904,126.90739469399936); //인포윈도우 표시 위치입니다

                // 인포윈도우를 생성합니다
                var infowindow = new kakao.maps.InfoWindow({
                    position : iwPosition, 
                    content : iwContent 
                });
                  
                // 마커 위에 인포윈도우를 표시합니다. 두번째 파라미터인 marker를 넣어주지 않으면 지도 위에 표시됩니다
                infowindow.open(map, marker); 
              </script>

            </div>
              

          </div>
      </div>
    </section>

    <? include '../footer.php'; ?>

  </div>

</body>
</html>