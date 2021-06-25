<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<style>
		body{background: #f2f2f2;}
		h3{text-align: center; color: #393846; border-bottom: 3px solid #888888;}
		#close{margin: 20px 0 0 290px; cursor: pointer;}
		li{text-align: center; list-style: none; margin-top: 3px; color: #272b3b; }
	</style>
</head>
<body>
	<h3>아이디 중복체크</h3>
	<p>
		<?php
			include "define.php";
			
			$id = $_GET["id"];
			
			if(!$id)
			{
				echo("<li>아이디가 입력되지 않았습니다.<br><br>아이디를 입력해주세요!</li>");
			}
			else
			{
				$con = mysqli_connect("localhost" ,DBuser, DBpass, DBname);

				$sql = "select * from members where id='$id'";
				$result = mysqli_query($con, $sql);

				$num_record = mysqli_num_rows($result);

				if($num_record)
				{
					echo "<li>[ ".$id." ] &nbsp;<br> 아이디는 중복됩니다.</li>";
					echo "<li>다른 아이디를 사용해 주세요.</li>";
				}
				else
				{
					echo "<li>[ ".$id." ] &nbsp;<br> 아이디는 사용 가능합니다. <br> 사용 원하실 경우 닫기 버튼을 눌러주세요.</li>";
				}

				mysqli_close($con);
			}
		?>
	</p>
	<div id="close">
		<img src="images/id_check_closed.png" onclick="javascript:self.close()">		
	</div>
</body>
</html>