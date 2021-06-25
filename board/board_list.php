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
						<div class="Left_Title">게시판<br>목록보기</div>
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
							<h3>
								게시판 > 목록보기
							</h3>
							<ul id="board_list">
								<li>
									<span class="col1">번호</span>
									<span class="col2">제목</span>
									<span class="col3">글쓴이</span>
									<span class="col4">첨부</span>
									<span class="col5">등록일</span>
									<span class="col6">조회</span>
								</li>
					<?php
						if (isset($_GET["page"]))
							$page = $_GET["page"];
						else
							$page = 1;

						$con = mysqli_connect("localhost", DBuser, DBpass, DBname);
						$sql = "select * from board order by num desc";
						$result = mysqli_query($con, $sql);
						$total_record = mysqli_num_rows($result); // 전체 글 수

						$scale = 10;

						// 전체 페이지 수($total_page) 계산 
						if ($total_record % $scale == 0)     
							$total_page = floor($total_record/$scale);      
						else
							$total_page = floor($total_record/$scale) + 1; 
					 
						// 표시할 페이지($page)에 따라 $start 계산  
						$start = ($page - 1) * $scale;      

						$number = $total_record - $start;

						for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
						{
							mysqli_data_seek($result, $i);
							// 가져올 레코드로 위치(포인터) 이동
							$row = mysqli_fetch_array($result);
							// 하나의 레코드 가져오기
							$num         = $row["num"];
							$id          = $row["id"];
							$name        = $row["name"];
							$subject     = $row["subject"];
							$regist_day  = $row["regist_day"];
							$hit         = $row["hit"];
							if ($row["file_name"])
								$file_image = "<img src='./img/file.gif'>";
							else
								$file_image = " ";
					?>
								<li>
									<span class="col1"><?=$number?></span>
									<span class="col2"><a href="board_view.php?num=<?=$num?>&page=<?=$page?>"><?=$subject?></a></span>
									<span class="col3"><?=$name?></span>
									<span class="col4"><?=$file_image?></span>
									<span class="col5"><?=$regist_day?></span>
									<span class="col6"><?=$hit?></span>
								</li>	
					<?php
							$number--;
						}
						mysqli_close($con);
					?>
							</ul>
							<ul id="page_num"> 	
					<?php
						if ($total_page>=2 && $page >= 2)	
						{
							$new_page = $page-1;
							echo "<li><a href='board_list.php?page=$new_page'>◀ 이전</a> </li>";
						}		
						else 
							echo "<li>&nbsp;</li>";

						// 게시판 목록 하단에 페이지 링크 번호 출력
						for ($i=1; $i<=$total_page; $i++)
						{
							if ($page == $i)     // 현재 페이지 번호 링크 안함
							{
								echo "<li><b> $i </b></li>";
							}
							else
							{
								echo "<li><a href='board_list.php?page=$i'> $i </a><li>";
							}
						}
						if ($total_page>=2 && $page != $total_page)		
						{
							$new_page = $page+1;	
							echo "<li> <a href='board_list.php?page=$new_page'>다음 ▶</a> </li>";
						}
						else 
							echo "<li>&nbsp;</li>";
					?>
							</ul> <!-- page -->	    	
							<ul class="buttons">
								<li><button onclick="location.href='board_list.php'">목록</button></li>
								<li>
					<?php 
						if($userid) {
					?>
									<button onclick="location.href='board_form.php'">글쓰기</button>
					<?php
						} else {
					?>
									<a href="javascript:alert('로그인 후 이용해 주세요!')"><button>글쓰기</button></a>
					<?php
						}
					?>
								</li>
							</ul>
						</div> <!-- board_box -->
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