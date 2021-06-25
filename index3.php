<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/><!-- content="IE=edge"내컴퓨터최신버전 엣지로실행 -->
	<meta name="Generator" content="Notepad++"/>
	<meta name="Author" content="남하영"/>
	<meta name="Keywords" content="포트폴리오, 남하영의 포토폴리오, 웹디자인, Ha Young's portfolio, 프로젝트, Portfolio, Project,  namhayoung, 남 하 영, 하영 남, 하영, hy, Nhy, Nhayoung, 하영이, gkdud "/>
	<meta name="Description" content="남하영의 포트폴리오에 오신 것을 환영합니다"/>	
	<title>교육부 - 모든 아이는 우리 모두의 아이</title>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/commmon.css"/>
	<link rel="stylesheet" type="text/css" href="../css/common.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="icon" sizes="16x16" href="images/pavi.gif">
	<link rel="shortcut icon" sizes="16x16" href="images/pavi.gif">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="js/html5div.js"></script>
    <script src="js/html5shiv.js"></script>
    <script src="js/prefixfree.min.js"></script>
    <script src="js/jQuery v1.7.1.js"></script>      
    <script src="js/DB_springMove_fn.js"></script>
    <script src="js/jquery.easing.1.3.min.js"></script>      
    <script src="js/count.js"></script>
    <script src="js/script.js"></script>

    <script> 
		<!-- 팝업창 -->
		window.open("popup.html", "", "resizable=no, toolbar=no, width=530, height=600")
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
		var cnt = parseInt(5);//초기값(초단위)
		function counter_init() {
			tid = setInterval("counter_run()", 1000);
		}

		function counter_reset() {
			clearInterval(tid);
			cnt = parseInt(60);
			counter_init();
		}

		function counter_run() {
			document.getElementById("counter").innerText = time_format(cnt);
			cnt--;
			if(cnt < 0) {
				clearInterval(tid);
				self.location = "login_form.php"; //로그인 경로 넣기
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
<body onLoad="ddaycount()">
 
	<header>
		<?php include "header3.php";?>
	</header>
	<section>
		<?php include "main.php";?>
	</section> 
	<footer>
		<?php include "footer.php";?>
	</footer>
	
</body>
</html>
<script>
counter_init();
</script>















