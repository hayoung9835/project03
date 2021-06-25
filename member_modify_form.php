<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/><!-- content="IE=edge"내컴퓨터최신버전 엣지로실행 -->
	<meta name="Generator" content="Notepad++"/>
	<meta name="Author" content="남하영"/>
	<meta name="Keywords" content="포트폴리오, 남하영의 포토폴리오, 웹디자인, Ha Young's portfolio, 프로젝트, Portfolio, Project,  namhayoung, 남 하 영, 하영 남, 하영, hy, Nhy, Nhayoung, 하영이, gkdud "/>
	<meta name="Description" content="남하영의 포트폴리오에 오신 것을 환영합니다"/>	
	<title>교육부 - 회원정보수정페이지</title>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/commmon.css"/>
	<link rel="stylesheet" href="css/main.css">	
	<link rel="stylesheet" href="css/member.css">	
	<link rel="icon" sizes="16x16" href="images/pavi.gif">
	<link rel="shortcut icon" sizes="16x16" href="images/pavi.gif">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="js/html5div.js"></script>
    <script src="js/html5shiv.js"></script>
    <script src="js/prefixfree.min.js"></script>
    <script src="js/count.js"></script>
    <script src="js/script.js"></script>
    <script src="js/jquery.easing.1.3.min.js"></script> 
    <script src="js/member_modify.js"></script> 

</head>
<body>
	<header>
		<?php include "header2.php";?>
	</header>	
		<?php    
		   	$con = mysqli_connect("localhost", DBuser, DBpass, DBname);
		    $sql    = "select * from members where id='$userid'";
		    $result = mysqli_query($con, $sql);
		    $row    = mysqli_fetch_array($result);

		    $pass = $row["pass"];
		    $name = $row["name"];
		

		    $email = explode("@", $row["email"]);
		    $email1 = $email[0];
		    $email2 = $email[1];

		    mysqli_close($con);
		?>
	
	<section>
		<div id="section_wrap">
			<div class="section_h_box"></div>
			<div class="title">회원정보수정</div>
			<div id="main_img_bar">
				<div class="info_box">
					<p class="join_info_title">회원가입 유형 한가지를 선택하세요!<span>회원 유형에 따라 필수 입력 회원정보가 다릅니다. 본인에 해당하는 회원 유형을 선택하시기 바랍니다.</span> </p>
					<ul class="join_type">
						<li id="on1"><a href="javascript:goType('1');"><h3>교원/교직원</h3><br/><span>교육행정 전자서명 <br>인증서(EPKI)가 있는 대상자</span></a></li>
						<li id="on2"><a href="javascript:goType('2');"><h3>학생</h3><br/><span>초,중,고등학생 사용자</span></a></li>
						<li id="on3"><a href="javascript:goType('3');"><h3>일반</h3><br/><span>교원/교직원, 학생을 제외한 모든 대상자</span></a></li>
					</ul>
				</div>
			</div>
			<div class="tbl_frm">
					<h3 class="tit_02">인증 및 회원정보 입력<span>가입을 위해서는 아래의 정보를 모두 입력하셔야 합니다.(필수입력사항)</span></h3>
					<h5 class="f_title" style="font-size:11px; color:#254482;">학생 -초,중,고등학생 사용자</h5>
			</div>
			<div id="main_content">
				<div id="join_box">
					<form name="member_form" method="post" action="member_modify.php?id=<?=$userid?>">
						<h2></h2>
						
						<div class="form_box">
							<div class="form id">
								<div class="col1">아이디</div>
									<div class="col2">
										<?=$userid?>
									</div>
							</div>
							<div class="clear"></div>	
						</div>	
						<div class="form_box">
							<div class="form">						
								<div class="col1">이름</div>
								<div class="col2">
									<input type="text" name="name" value="<?=$name?>">
								</div>
							</div>
							<div class="clear"></div>
						</div>	
						<div class="form_box">	
							<div class="form">
								<div class="col1">비밀번호</div>
								<div class="col2">
									<input type="password" name="pass" value="<?=$pass?>">
								</div>

							</div>

							<div class="clear"></div>
						</div>
						<div class="form_box">			
							<div class="form">
								<div class="col1">비밀번호 확인</div>
								<div class="col2">
									<input type="password" name="pass_confirm" value="<?=$pass?>">
								</div>
								<p>* 비밀번호는 영문 대/소문자, 숫자, 특수문자(!,@,#,$,%,^,&,*,?,_,~) 중 3종류를 조합하여 8~16자로 입력해 주세요.</p>
							</div>
							
							<div class="clear"></div>
						</div>
	
						<div class="form_box">
							<div class="form eamil">
								<div class="col1">이메일</div>
								<div class="col2">
									<input type="text" name="email1"  value="<?=$email1?>">@<input type="text" name="email2"  value="<?=$email2?>">
								</div>
								<p>* 이메일은 아이디 및 비밀번호 찾기에 필요한 정보이므로 <br>정확하게 입력해 주시기 바랍니다.</p>
							</div>

							<div class="clear"></div>
						</div>
						<div class="bottom_line"></div>
						<div class="buttons">
							<img style="cursor:pointer" src="images/button_save.png" onclick="check_input()">&nbsp;
							<img id="reset_button" style="cursor:pointer" src="images/button_reset.png" onclick="reset_form()">
						</div>
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