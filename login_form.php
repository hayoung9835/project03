<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/><!-- content="IE=edge"내컴퓨터최신버전 엣지로실행 -->
	<meta name="Generator" content="Notepad++"/>
	<meta name="Author" content="남하영"/>
	<meta name="Keywords" content="포트폴리오, 남하영의 포토폴리오, 웹디자인, Ha Young's portfolio, 프로젝트, Portfolio, Project,  namhayoung, 남 하 영, 하영 남, 하영, hy, Nhy, Nhayoung, 하영이, gkdud "/>
	<meta name="Description" content="남하영의 포트폴리오에 오신 것을 환영합니다"/>	
	<title>교육부 - 로그인페이지</title>
	<link rel="stylesheet" href="css/login_1.css"/>
	<link rel="stylesheet" href="css/commmon.css"/>
	<link rel="icon" sizes="16x16" href="images/pavi.gif">
	<link rel="shortcut icon" sizes="16x16" href="images/pavi.gif">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="js/html5div.js"></script>
    <script src="js/html5shiv.js"></script>
    <script src="js/prefixfree.min.js"></script>
    <script src="js/count.js"></script>
    <script src="js/script.js"></script>
    <script src="js/login.js"></script>

    <script src="js/jquery.easing.1.3.min.js"></script> 
	
</head>
<body>
	<header>
		<?php include "header3.php";?>
	</header>
	<section id="sectionwrap">
		<div id="section">
			<div class="login_h">
				<p>로그인</p>
			</div>
			<div class="login_text">
				<p><span>교육부 통합 로그인페이지에 오신 것을 환영합니다!</span><br/>로그인을 통해 홈페이지의 다양한 기능을 이용하시기 바랍니다.</p>
			</div>
			<div class="login_img">
				<img src="images/loginImg.jpg" alt="로그인 이미지"/>
			</div>
			<div class="login_wrap">
				<div class="login_box">
					<form id="loginForm" form name="login_form" method="post" action="login.php">
						
						<fieldset>	
							<legend>Member Loin</legend>
							<div id="login">
								<p>
									<label for="userId" class="labelStyle"></label>
									<input type="text"  name="id" placeholder="아이디" id="Id" class="labelStyle" value="admin" />
								</p>
								<p>
									<label for="userPWD" class="labelStyle"></label>
									<input type="password" name="pass" placeholder="비밀번호" id="password" class="labelStyle" value="1234" />
								</p>
							</div>
								<div id="login_btn">
									<a href="#"><img src="images/btn_login.gif" onclick="check_input()"></a>
								</div>
							<p id="btn1">
								<input type="checkbox" id="saveId" value="savedIdYes" />
								<label for="saveId">아이디저장</label>	
								<input type="checkbox" id="secure" value="secureYes" />
								<label for="secure">보안접속</label>	
							</p>
							<p class="btns"> <a href="member_form.php" title="회원가입"><span>회원가입</span></a></p>
								<ul class="idpw_search">
									<li><span class="txt">아이디를 잊어버리셨나요?</span><a href="/niseCert.do" title="아이디 찾기"><img alt="아이디 찾기" src="images/btn_id_search.gif"><span class="W_hid">아이디 찾기</span></a></li>
									<li><span class="txt">비밀번호가 기억나지 않으신가요?</span><a href="/niseCert.do" title="비밀번호 찾기"><img alt="비밀번호 찾기" src="images/btn_pw_search.gif"><span class="W_hid">비밀번호 찾기</span></a></li>
								</ul>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</section>
	<footer>
		<?php include "footer.php";?>
	</footer>
</body>
</html>