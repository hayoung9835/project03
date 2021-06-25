<!DOCTYPE html>
<html>
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
	<link rel="stylesheet" href="css/main.css">	
	<link rel="stylesheet" href="css/message.css">	
	<link rel="icon" sizes="16x16" href="images/pavi.gif">
	<link rel="shortcut icon" sizes="16x16" href="images/pavi.gif">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="js/html5div.js"></script>
    <script src="js/html5shiv.js"></script>
    <script src="js/prefixfree.min.js"></script>
    <script src="js/count.js"></script>
    <script src="js/script.js"></script>
    <script src="js/jquery.easing.1.3.min.js"></script> 
    <script>
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
						<div class="Left_Title">쪽지<br/>보내기</div>
					<div class="Left_Img"><img src="../images/sub_left_dot.png" alt=""/></div>
					<ul class="Left_List">
						<li><a href="message_form.php">/ 쪽지보내기</a></li>
						<li><a href="message_box.php?mode=rv">/ 수신 쪽지함</a></li>
						<li><a href="message_box.php?mode=send">/ 송신 쪽지함</a></li>
					</ul>
					<ul class="Left_Icon">
						<li class="print"><a href="#"><img src="../images/printer.png" width="18" height="18" alt="프린터"/></a></li>
						<li class="Pc"><a href="#"><img src="../images/share.png" width="18" height="18" alt="프린터"/></a></li>	
					</ul>
					</div>
				</div><!-- 왼쪽컨텐츠 -->
				<div class="right_content fl">	
					<div class="right_border">			
					   	<div id="message_box">
						    <h3 class="title">
					<?php
						$mode = $_GET["mode"];
						$num  = $_GET["num"];

						$con = mysqli_connect("localhost", DBuser, DBpass, DBname);
						$sql = "select * from message where num=$num";
						$result = mysqli_query($con, $sql);

						$row = mysqli_fetch_array($result);
						$send_id    = $row["send_id"];
						$rv_id      = $row["rv_id"];
						$regist_day = $row["regist_day"];
						$subject    = $row["subject"];
						$content    = $row["content"];

						$content = str_replace(" ", "&nbsp;", $content);
						$content = str_replace("\n", "<br>", $content);

						if ($mode=="send")
							$result2 = mysqli_query($con, "select name from members where id='$rv_id'");
						else
							$result2 = mysqli_query($con, "select name from members where id='$send_id'");

						$record = mysqli_fetch_array($result2);
						$msg_name = $record["name"];

						if ($mode=="send")	    	
							echo "송신 쪽지함 > 내용보기";
						else
							echo "수신 쪽지함 > 내용보기";
					?>
							</h3>
							<ul id="view_content">
								<li>
									<span class="col1"><b>제목 :</b> <?=$subject?></span>
									<span class="col2"><?=$msg_name?> | <?=$regist_day?></span>
								</li>
								<li>
									<?=$content?>
								</li>		
							</ul>
							<ul class="buttons">
								<li><button onclick="location.href='message_box.php?mode=rv'">수신 쪽지함</button></li>
								<li><button onclick="location.href='message_box.php?mode=send'">송신 쪽지함</button></li>
								<li><button onclick="location.href='message_response_form.php?num=<?=$num?>'">답변 쪽지</button></li>
								<li><button onclick="location.href='message_delete.php?num=<?=$num?>&mode=<?=$mode?>'">삭제</button></li>
							</ul>
						</div> <!-- message_box -->
					</div>
				</div>
			</div>
		</div>
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>