<header class="header clearfix">
    <a class="navbar-brand" href="../../php/Index/home.php">
        <img src="../../img/logo.png">
        <div class="title">
        <span style="color:#14A65F">모두의</span> <span style="color:#ffc336">일촌</span>
        <p style="color:#34495E; text-align:left; font-size:15px;">: ver. STUDY</p>
        </div>
    </a>
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="nav">
            <li class="nav-item"><a href="../../php/Recruitment/recruitment_list.php" class="nav-link">스터디 모집</a></li>
            <li class="nav-item"><a href="../../php/Index/notice.php" class="nav-link">공지사항</a></li>
            
        </ul>
        <ul class="nav my-2 my-lg-0 ml-auto">
            <? session_start(); if ( isset($_SESSION['user']) ){ ?>
              <li class="nav-item"><a href="#" class="nav-link"><span id=namestyle><? echo $_SESSION['user'] ?> 님, 반갑습니다.</span></a></li>
              <li class="nav-item"><a href="../../php/Index/mypage.php" class="nav-link">마이페이지</a></li>
              <li class="nav-item"><a href="../../php/Index/logout--action.php" class="nav-link">로그아웃</a></li>
            <? } else{ ?>
              <li class="nav-item"><a href="../../php/Index/login.php" class="nav-link">로그인</a></li>
              <li class="nav-item"><a href="../../php/Index/signup.php" class="nav-link">회원가입</a></li>
           <? } ?>
        </ul>
        
    </nav>
</header>