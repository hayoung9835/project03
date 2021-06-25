<?php
    include "../define.php";

    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";
?>	
	<header id="header">
		<div id="header_Wrap">		
			<div class="h_T_box">
							
			</div>
			<div class="h_Quickmenu">
				<div class="h_gnb cf fl">
					

					<div class="message">
            			<a href="message_form.php"><img src="images/message_button.png"></a>
          			</div>	
					<div class="board_button">
            			<a href="../board/board_list.php"><img src="images/borad_button.png"></a>
          			</div>
          			<div class="borad_bullon"><img src="images/board2.png"></div>
					
				</div><!-- class="h_gnb" -->
		
				<div class="h_box fl">	
            <ul id="top_menu">  
<?php
    if(!$userid) {
?>                
                <li><a href="../member_form.php">회원 가입</a> </li>
                <li></li>
                <li><a href="../login_form.php">로그인</a></li>
<?php
    } else {
        $logged = $username."(".$userid.")님 &nbsp;[Level:".$userlevel.", Point:".$userpoint."]";
?>
                <li><?=$logged?> </li>
                <li> &nbsp;&nbsp;&nbsp;</li>
                <li><a href="../logout.php">로그아웃</a> </li>
                <li></li>
                <li><a href="../member_modify_form.php">정보 수정</a></li>
<?php
    }
?>
<?php
    if($userlevel==1) {
?>
                <li></li>
                <li><a href="admin.php">관리자 모드</a></li>
<?php
    }
?>
					<span id="counter"></span>
					<span>후 자동로그아웃</span>
					<input type="button" value="연장" onclick="counter_reset()">	
								
            </ul>					
            
				</div>
				<div class="h_icon fl">
					<a href="http://www.facebook.com/ourmoekr"><img src="images/h_nav_facebook.png" alt="페이스북 바로가기" width="30" height="30" onmouseover="this.src='images/h_nav_facebopk_h.png'" onmouseout="this.src='images/h_nav_facebook.png'"/></a>
					<a href="https://twitter.com/our_moe"><img src="images/h_nav_twt.png" alt="트위터 바로가기" width="30" height="30"   onmouseover="this.src='images/h_nav_twt_h.png'" onmouseout="this.src='images/h_nav_twt.png'"/></a>
					<a href="https://www.youtube.com/user/ourmoetv"><img src="images/h_nav_youtube.png" alt="유튜브 바로가기" width="29" height="30"  onmouseover="this.src='images/h_nav_youtube_h.png'" onmouseout="this.src='images/h_nav_youtube.png'"/></a>
					<a href="https://story.kakao.com/ch/moe"><img src="images/h_nav_kakao.png" alt="카카오톡 바로가기" width="30" height="30" onmouseover="this.src='images/h_nav_kakao_h.png'" onmouseout="this.src='images/h_nav_kakao.png'"/></a>
					<a href="https://blog.naver.com/moeblog"><img src="images/h_nav_blog.png" alt="네이버 블로그 바로가기" width="29" height="30" onmouseover="this.src='images/h_nav_blog_h.png'" onmouseout="this.src='images/h_nav_blog.png'"/></a>
					<a href="https://band.us/band/52073092"><img src="images/h_nav_band.png" alt="네이버 밴드 바로가기" width="30" height="30" onmouseover="this.src='images/h_nav_band_h.png'" onmouseout="this.src='images/h_nav_band.png'"/></a>
				</div><!-- class="h_icon" -->
			</div><!-- class="H_Quickmenu" -->
			<div class="h_logo_menu">
				<div class="h_logo fl">
					<h1><a href="../index2.php" title="메인로고이미지입니다" class="showBalloon"><img src="images/HomeLogo.png" alt="메인로고이미지"/></a></h1>
				</div><!-- class="h_logo -->
				<div class="h_C_box fl"></div>
			<div class="main_menu cf fl">		
				<div class="oneInner fl">
					<ul class="oneDepth cf fl">
						<li><a href="../sub1/sub01.php" class="showBalloon" title="국민참여민원 페이지">국민참여&middot;민원</a>
							<div class="twoInner">
								<ul class="twoDepth cf">
									<li>
										<h3 class="twoDepth_first1 fl cf"><a href="#">국민참여&middot;민원</a></h3>
										<dl>
											<dt><a href="#">국민소통</a></dt>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 온 - 교육</a></dd>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 전자공청회</a></dd>
										</dl>	
										<dl>
											<dt><a href="#">국민제안</a></dt>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 등교&middot;원격수업 관련 의견 청취 게시판</a></dd>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 국민제안</a></dd>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 나의 국민제안</a></dd>
										</dl>
										<dl>
											<dt><a href="#">민원신청</a></dt>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 민원신청하기</a></dd>    
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 나의민원학인</a></dd>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 국민콜110</a></dd>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 자주묻는질문(FAQ)</a></dd>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 질의회신사례집</a></dd>
										</dl>
										<dl>
											<dt><a href="#">청탁금지법 알아보기</a></dt>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/>부정청탁 및 금품 등 수수 신고</a></dd>    
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 자료실</a></dd>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 묻고답하기</a></dd>
										</dl>
										<dl>
											<dt><a href="#">부패공익신고</a></dt>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 내부 부패 행위 등 신문고</a></dd>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 청렴정책자문관(청렴옴부즈맨)</a></dd>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 예산 낭비 신문고</a></dd>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 나의신고보기</a></dd>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 공익신고센터</a></dd>
										</dl>
										<dl>
											<dt><a href="#">교육부 청백리 칭찬방</a></dt>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 교육부 청백리 칭찬방</a></dd>
										</dl>
										<dl>
											<dt><a href="#">규제개혁</a></dt>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 규제란?</a></dd>    
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 규제개혁과제</a></dd>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 규제개선건의</a></dd>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 규제입증요청</a></dd>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 규제정보포털로 바로가기</a></dd>
										</dl>
										<div class="twoDepth_twoline">
											<dl>
												<dt><a href="#">신고 &middot; 제안 &middot; 고충처리</a></dt>
												<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 교육신뢰회복을 위한 국민신고센터</a></dd>
												<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 불법사교육신고센터</a></dd>
												<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 교육분야 성희롱 &middot; 성폭력 신고센터</a></dd>
												<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 학생선수 폭력피해 신고센터</a></dd>
												<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 안전신문고</a></dd> 
												<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 정보공시 신고</a></dd> 
												<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 돌봄 지원센터</a></dd> 
												<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 갑질 신고센터</a></dd>
											</dl>
										</div>
										<div class="twoDepth_twoline">
											<dl>
												<dt><a href="#">적극행정</a></dt>	
												<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 적극행정이란?</a></dd>    
												<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 적극행정 교육 및 우수사례</a></dd>
												<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 적극행정 공무원 &middot; 정책 국민추천</a></dd>
												<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 적극행정 우수공무원</a></dd>
												<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 적극행정 점검단(모니터링단 활동)</a></dd> 
												<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 소극행정 신고하기</a></dd>
											</dl>
										</div>
									</li>				
								</ul>	
							</div>	
						</li>
						<li><a href="sub2/sub02.html" class="showBalloon" title="뉴스 &middot; 흥보 페이지" >뉴스 &middot; 흥보</a>
							<div class="twoInner">
								<ul class="twoDepth cf">
									<li>
										<h3 class="twoDepth_first2 fl cf"><a href="sub1/moe_sub2.html">뉴스 &middot; 흥보</a></h3>
										<dl>
											<dt><a href="#">보도자료</a></dt>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 보도자료</a></dd>    
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 동정자료</a></dd>	
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 보도설명 &middot; 반박</a></dd>	
										</dl>	
										<dl>
											<dt><a href="#">주요뉴스</a></dt>	
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 영상뉴스</a></dd>    
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> E브리핑</a></dd>
										</dl>
										<dl>
											<dt><a href="#">흥보마당</a></dt>	
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 흥보자료</a></dd>    
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 흥보동영상</a></dd>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 행복한교욱 누리잡지</a></dd>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 소식지</a></dd>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 해외교육정보동향자료</a></dd>
										</dl>
									</li>	
								</ul><!-- class="twoDepth -->	
							</div>	<!-- class="twoInner" -->
						</li><!-- 뉴스&middot;흥보	 -->	
						<li><a href="sub3/sub03.html" class="showBalloon" title="정책정보공표 페이지">정책정보공표</a>
							<div class="twoInner">
								<ul class="twoDepth cf">
									<li>
										<h3 class="twoDepth_first3 fl cf"><a href="sub1/moe_sub3.html">정책정보공표</a></h3>
										<dl>
											<dt><a href="#">보도자료</a></dt>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 주요업무계획</a></dd> 	
										</dl>	
										<dl>
											<dt><a href="#">대학(원)교육</a></dt>	
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 대학(원)교육</a></dd>
										</dl>
										<dl>
											<dt><a href="#">평생교육</a></dt>	
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 평생교육</a></dd>
										</dl>
										<dl>
											<dt><a href="#">교원</a></dt>	
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 교원</a></dd>
										</dl>
										<dl>
											<dt><a href="#">국외(유학)교육</a></dt>	
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 국외(유학)교육</a></dd>
										</dl>
										<dl>
											<dt><a href="#">교육 통계 및 정보화</a></dt>	
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 교육 통계 및 정보화</a></dd>
										</dl>
										<dl>
											<dt><a href="#">지방교육자치</a></dt>	
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 지방교육자치</a></dd>
										</dl>
										<dl>
											<dt><a href="#">사회정책</a></dt>	
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 사회정책</a></dd>
										</dl>
									</li>
								</ul><!-- class="twoDepth -->	
							</div>	<!-- class="twoInner" -->
						</li><!-- 뉴스&middot;흥보	 -->
						<li class="showBalloon" title="정보공개 페이지"><a href="sub4/sub04.html">정보공개</a>
							<div class="twoInner">
								<ul class="twoDepth cf">
									<li>
										<h3 class="twoDepth_first4 fl cf"><a href="sub1/moe_sub4.html">정보공개</a></h3>
										<dl>
											<dt><a href="#">정보공개</a></dt>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 정보공개 제도안내</a></dd>   
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 정보공표 운영 종합표</a></dd>    
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 정보목록</a></dd>    
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 정보공개청구</a></dd> 	
										</dl>	
										<div class="twoDepth_twoline">
											<dl>
												<dt><a href="#">사전정보공표</a></dt>	
												<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 교육부 행정 정보</a></dd>   
												<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 감사정보</a></dd>    
												<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 제정 &middot; 예산 정보</a></dd>    
												<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 계약정보</a></dd>    
												<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 국고보조금 정보</a></dd>    
												<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 수입징수 현황</a></dd>    
												<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 지출집행 현황</a></dd>    
												<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 사회적협동조합 경영공시</a></dd>    
												<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 업무추진비 사용내역</a></dd> 
												<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 정책연구 정보</a></dd>
											</dl>
										</div>
										<dl>
											<dt><a href="#">공공데이터 개방</a></dt>		
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 공공데이터 개방 제도안내</a></dd>    
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 제공대상 공공데이터 목록</a></dd>
										</dl>
										<dl>
											<dt><a href="#">정책실명(이력)제</a></dt>	
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 정책실명(이력)제</a></dd>   
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 국민신청실명제</a></dd>
										</dl>
										<dl>
											<dt><a href="#">법령정보</a></dt>	
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 입법 &middot; 행정예고</a></dd>    
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 소관법령정보</a></dd>    
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 판례</a></dd>
										</dl>
										<dl>
											<dt><a href="#">공공누리</a></dt>	
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 공공누리 제도안내</a></dd>   
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 공공누리 유형안내</a></dd>
										</dl>
									</li>	
								</ul><!-- class="twoDepth -->	
							</div>	<!-- class="twoInner" -->
						</li><!-- 뉴스&middot;흥보	 -->					
						<li class="showBalloon" title="교육부 소식 페이지"><a href="sub5/sub05.html">교육부 소식</a>
							<div class="twoInner">
								<ul class="twoDepth cf">
									<li>
										<h3 class="twoDepth_first5 fl cf"><a href="sub4/moe_sub4.html">교육부 소식</a></h3>
										<dl>
											<dt><a href="#">공지사항</a></dt>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 공지사항</a></dd> 	
										</dl>	
										<dl>
											<dt><a href="#">인사알림</a></dt>	
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 인사정보</a></dd>    
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 채움공고</a></dd> 
										</dl>
										<dl>
											<dt><a href="#">표창대상자 공개검증</a></dt>	
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 표창대상자 공개검증</a></dd>
										</dl>
									</li>
								</ul><!-- class="twoDepth -->	
							</div>	<!-- class="twoInner" -->
						</li><!-- 뉴스&middot;흥보	 -->
						<li class="showBalloon" title="교육부 소개 페이지"><a href="sub6/sub06.html">교육부 소개</a>
							<div class="twoInner">
								<ul class="twoDepth cf">
									<li>
										<h3 class="twoDepth_first6 fl cf"><a href="sub5/moe_sub5.html">교육부 소개</a></h3>
										<dl>
											<dt><a href="#">일반현황</a></dt>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 연혁</a></dd>    
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 소속기간</a></dd>    
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 사 &middot; 도교육청</a></dd>    
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 국정지표</a></dd>    
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 부처 상징(MI)</a></dd> 	
										</dl>	
										<dl>
											<dt><a href="#">부총리</a></dt>	
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 약력</a></dd>    
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 동정</a></dd>    			
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 인터뷰기사</a></dd>    			
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 동영상</a></dd>    			 
										</dl>
										<dl>
											<dt><a href="#">조직도 &middot; 직원 및 연락처</a></dt>	
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 조직도 &middot; 직원 및 연락처</a></dd> 
										</dl>
										<dl>
											<dt><a href="#">찾아오시는 길</a></dt>
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 찾아오시는 길</a></dd>  
											<dd><a href="#"><img src="images/white.png" width="4" height="4" alt="dot"/> 층별안내</a></dd> 
										</dl>
									</li>
								</ul><!-- class="twoDepth -->	
							</div>	<!-- class="twoInner" -->
						</li><!-- 뉴스&middot;흥보	 -->
					</ul><!-- class="oneDepth -->
				</div><!-- class="oneInner -->		
				<div class="h_search fl"><img src="images/search.png" width="40" height="40" alt=""/>
					<div class="searchBox">
					<!-- 	<form class="searchBox_left cf fl">
							<fieldset>
								<p class="searchBoxlabel cf">
									<label for="text">통합검색</label>
								</p>
								<p class="searchBoxtext cf">
									<input type="text" name="text" id="text"/>
								</p>
								<p>
									<button type="submit"> 검색하기 </button>
								</p>
							</fieldset>
						</form> -->
					</div>
				</div><!-- class="h_search -->
			</div>
			</div><!-- id="mainWrap" -->
		</div><!-- 헤더웹 -->
	</header>