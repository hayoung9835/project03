<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/><!-- content="IE=edge"내컴퓨터최신버전 엣지로실행 -->
	<meta name="Generator" content="Notepad++"/>
	<meta name="Author" content="남하영"/>
	<meta name="Keywords" content="포트폴리오, 남하영의 포토폴리오, 웹디자인, Ha Young's portfolio, 프로젝트, Portfolio, Project,  namhayoung, 남 하 영, 하영 남, 하영, hy, Nhy, Nhayoung, 하영이, gkdud "/>
	<meta name="Description" content="남하영의 포트폴리오에 오신 것을 환영합니다"/>	
	<title>교육부 - 회원가입페이지</title>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="../css/commmon.css"/>
	<link rel="stylesheet" href="css/board.css">	
	<link rel="stylesheet" href="css/message.css">	
	<link rel="icon" sizes="16x16" href="images/pavi.gif">
	<link rel="shortcut icon" sizes="16x16" href="../images/pavi.gif">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="../js/html5div.js"></script>
    <script src="../js/html5shiv.js"></script>
    <script src="../js/prefixfree.min.js"></script>
    <script src="../js/jQuery v1.7.1.js"></script>      
    <script src="../js/DB_springMove_fn.js"></script>
    <script src="../js/jquery.easing.1.3.min.js"></script>      
    <script src="../js/count.js"></script>
    <script src="../js/script.js"></script>
    <script> 

		<!-- 날씨 -->
		$.getJSON('http://api.openweathermap.org/data/2.5/weather?id=1835848&appid=778c1e6867ed4fe3f47a6254b2321c87&units=metric',function(data){
			//alert(data.city.name);
			//alert(data.list[0].main.temp_min);
			var $minTemp = data.main.temp_min;
			var $maxTemp = data.main.temp_max;
			var $cTemp = data.main.temp;
			//alert(new Date(Date.now()));
			var now = new Date(Date.now());
			var month = now.getMonth()+1;
			var $cDate = now.getFullYear() +'년 '+ month+'월 ' + now.getDate()+'일 '<!-- +now.getHours()+'시 ' + now.getMinutes() +'분 ' --> ;
			//var $cDate = data.dt;
			var $wIcon = data.weather[0].icon;

			$('.clowtemp').append($minTemp);
			$('.chightemp').append($maxTemp);
			$('.ctemp').append(Math.round($cTemp));
			$('h2').prepend($cDate);
			$('.cicon').append('<img src="http://openweathermap.org/img/wn/'+$wIcon+'.png" />');
		});
		
		//로그인 카운트다운
		var tid;
		var cnt = parseInt(3000);//초기값(초단위)
		function counter_init() {
			tid = setInterval("counter_run()", 1000);
		}

		function counter_reset() {
			clearInterval(tid);
			cnt = parseInt(3000);
			counter_init();
		}

		function counter_run() {
			document.getElementById("counter").innerText = time_format(cnt);
			cnt--;
			if(cnt < 0) {
				clearInterval(tid);
				self.location = "member_form.php"; //로그인 경로 넣기
			}
		}
		function time_format(s) {
			var nHour=0;
			var nMin=0;
			var nSec=0;
			if(s>0) {
				nMin = parseInt(s/60);
				nSec = s%60;

				if(nMin>60) {
					nHour = parseInt(nMin/60);
					nMin = nMin%60;
				}
			} 
			if(nSec<10) nSec = "0"+nSec;
			if(nMin<10) nMin = "0"+nMin;

			return ""+nHour+":"+nMin+":"+nSec;
		}	

		 function check_input() {
      if (!document.board_form.subject.value.trim())
      {
          alert("제목을 입력하세요!");
          document.board_form.subject.focus();
          return;
      }
      if (!document.board_form.content.value.trim())
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
    </script>			
</head>
<body> 
<header>
	<?php include "header2.php";?>
</header>  
<section>
	<div id="main_img_bar"></div>
		<div class="sectionwrap">
			<div class="contentwrap">
				<div class="left_content fl">
					<div class="left_border">
						<div class="Left_Title">게시판<br>작성하기</div>
					<div class="Left_Img"><img src="../images/sub_left_dot.png" alt=""/></div>
					<ul class="Left_List">
						<li><a href="board_list.php">/ 목록보기</a></li>
						<li><a href="board_form.php">/ 작성하기</a></li>

					</ul>
					<ul class="Left_Icon">
						<li class="print"><a href="#"><img src="../images/printer.png" width="18" height="18" alt="프린터"/></a></li>
						<li class="Pc"><a href="#"><img src="../images/share.png" width="18" height="18" alt="프린터"/></a></li>	
					</ul>
					</div>
				</div><!-- 왼쪽컨텐츠 -->
				<div class="right_content fl">	
					<div class="right_border">			
						<div id="board_box">
							<h3 id="board_title">
								게시판 > 글 쓰기
							</h3>
							<form  name="board_form" method="post" action="board_insert.php" enctype="multipart/form-data">
								<ul id="board_form">
									<li>
										<span class="col1">이름 : </span>
										<span class="col2"><?=$username?></span>
									</li>		
									<li>
										<span class="col1">제목 : </span>
										<span class="col2"><input name="subject" type="text"></span>
									</li>	    	
									<li id="text_area">	
										<span class="col1">내용 : </span>
										<span class="col2">
										<textarea name="content"></textarea>
										</span>
									</li>
									<li>
										<span class="col1"> 첨부 파일</span>
										<span class="col2"><input type="file" name="upfile"></span>
									</li>
								</ul>
								<ul class="buttons">
									<li><button type="button" onclick="check_input()">완료</button></li>
									<li><button type="button" onclick="location.href='board_list.php'">목록</button></li>
								</ul>
							</form>
						</div> <!-- board_box -->
					</div>
				</div>
			</div>
		</div>
</section> 
<footer>
	<?php include "../footer.php";?>
</footer>
</body>
</html>