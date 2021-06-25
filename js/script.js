$(function(){
	/* 말풍선 */
	var balloon = $('<div class="balloon"></div>').appendTo('body');

	function updateBalloonPosition(x,y){
		balloon.css({left:x+5, top: y}); //x +5
	};
	function showBalloon(){
		balloon.stop().css('opacity',0).show().animate({opacity:1},1000);
	};
	function hideBalloon(){
		balloon.stop().animate({opacity:1},1000,function(){balloon.hide()});
	}; //.animate 세번째 파라메터 '콜백(function)'

	$('.showBalloon').each(function(){
		var element = $(this);
		var text = element.attr('title');
		element.attr('title',''); //중복되는걸 방지
		element.hover(
			function(e){
				balloon.text(text);
				updateBalloonPosition(e.pageX,e.pageY)
				showBalloon();
			},
			function(){
				hideBalloon();
			}
		);
		element.mousemove(function(e){  //디폴트이벤트를 캐치하기위해(e)를 사용
			updateBalloonPosition(e.pageX,e.pageY)
		});
	});

	/* toggle */
	$('.quick_icon > .text_image').hover(
		function(){
			var num = $(this).index()+1;
			$(this).find('.menu_image>a>img').attr({'src':'image/quick_on_0'+num+'.png'});
		},function(){
			var num = $(this).index()+1;
			$(this).find('.menu_image>a>img').attr({'src':'image/quick_0'+num+'.png'});

		}
	);

	bb = true;
	$('.quick_toggle').click(function(){
		if(bb){
			$(this).addClass('quick_open');
			$(this).stop(true,true).animate({'margin-right':'-102px'},500);
			$('.quickmenu').stop(true,true).animate({'margin-right':'-102px'},500,function(){bb = false;});
			bb = false;
		}else{
			$(this).removeClass('quick_open');
			$(this).stop(true,true).animate({'margin-right':'0px'},500);
			$('.quickmenu').stop(true,true).animate({'margin-right':'0px'},500,function(){bb = true;});
			bb = false;
		};
	});
	

	/* 날씨 컨텐츠 텝 */
	var menu = $('.contentwrap1_1_2 > li');
	var tg, onTxt, menuImage, imageWidth, tc;
	menu.hover(
		function(){
			close();
			var tg = $(this);
			var onTxt = tg.find('.weatherTitle');
			var menuImage = tg.find('.weather');
			var imageWidth = 335;
			//onTxt.addClass('on');	//onTxt.stop().animate({'background-color':'rgba(0,0,0, 0.7)'},200);
			menuImage.animate({width:imageWidth},{duration:600,queue:false,easeing:'easeOutCubic'});
		},
		function(){
			var tg = $(this);
			var onTxt = tg.find('.weatherTitle');
			//var offImg = tg.find('.text_image>.off');
			var menuImage = tg.find('.weather');
			var imageWidth = 0;
			//onTxt.removeClass('on');	//onTxt.stop().animate({'background-color':'rgba(0,0,0, 0.5)'},200);
			menuImage.animate({width:imageWidth},{duration:600,queue:false,easeing:'easeOutCubic'});
			open();
		}
	);
	function open(){
		var tc = $('.contentwrap1_1_2 > li').eq(0);
		var onTxt = tc.find('.weatherTitle');
		var menuImage = tc.find('.weather');
		//menuImg 마우스 올렸을때 보여지는 로고 이미지
		var imageWidth = 335;
		//onTxt.addClass('on');	//onTxt.stop().animate({'background-color':'rgba(0,0,0, 0.7)'},200);
		menuImage.animate({width:imageWidth},{duration:600,queue:false,easeing:'easeOutCubic'});
	};
	function close(){
		var tc = $('.contentwrap1_1_2 > li').eq(0);
		var onTxt = tc.find('.weatherTitle');
		var menuImage = tc.find('.weather');
		var imageWidth = 0;
		//onTxt.removeClass('on');	//onTxt.stop().animate({'background-color':'rgba(0,0,0, 0.5)'},200);
		menuImage.animate({width:imageWidth},{duration:600,queue:false,easeing:'easeOutCubic'});
	};
	open();




	/* 메인이미지슬라이드 */
	var panel_width = $('.slider_panel>img').width();
	//var panel_height = $('.slider_panel>img').height();
	//panel_width = 1420
	var setIntervalId;

	//호버했을 때 멈추기
	$('.animation_canvas').hover(
		function(){
			clearInterval(setIntervalId);
		},
		function(){
			timer();
		}
	);

	function timer(){
		setIntervalId = setInterval(function(){
			randomNumber++;
			if(randomNumber==$('.control_button').size()){randomNumber=0;};
			moveSlider(randomNumber);
		},3000);
	};
	function moveSlider(index){
		var willMoveLeft = -(index%3*1420);
		//var willMoveTop = Math.floor(index/3)*-400;

		$('.slider_panel').animate({left:willMoveLeft},'500');
		//$('.slider_panel').animate({top:willMoveTop},'500');

		//글씨나오게
		$('.slider_text[data-index='+index+']').show().animate({left:20},200);
		$('.slider_text[data-index!='+index+']').hide().animate({left:-1420},200);
		$('.control_button[data-index='+index+']').addClass('active');
		$('.control_button[data-index!='+index+']').removeClass('active');
		randomNumber = index;
	};

	$('.slider_text').css('left',-300).each(function(index){
		$(this).attr('data-index',index); //사용자정의 attr
	});
	$('.control_button').each(function(index){
		$(this).attr('data-index',index);
	}).click(function(){
		var index = $(this).attr('data-index');
		moveSlider(index);
	});

	//램덤으로 나오게
	var randomNumber = Math.round(Math.random()*3);
	moveSlider(randomNumber);
	timer();

	//이전 다음 버튼
	$('.left_main').click(function(){
		randomNumber--;
		if(randomNumber<0){randomNumber=$('.control_button').size()-1;};
		$('.control_button').eq(randomNumber).trigger('click');
		//moveSlider(randomNumber);
	});
	$('.right_main').click(function(){
		randomNumber++;
		if(randomNumber==$('.control_button').size()){randomNumber=0;};
		$('.control_button').eq(randomNumber).trigger('click');
	});

	
	/* 컨텐츠2이미지슬라이드 */
	var interval = 2000;
	$('.slide').each(function(){
		var timer;
		var container = $(this);
		function switchImg(){
			var anchors = container.find('a');
			var first = anchors.eq(0);
			var second = anchors.eq(1);
			first.fadeOut().appendTo(container);
			second.fadeIn();
		};
		function startTimer(){
			timer = setInterval(switchImg, interval);
		};
		function stopTimer(){
			clearInterval(timer);
		};
		
		var a = container.find('a');
		
		a.hover(
			function(){
				stopTimer();
			},
			function(){
				startTimer();
			}
		);
		startTimer();
	});


 

	/* 섹션4번째 이미지 animate */
	$('.slideshow div').each(function(){
		var box =$(this);
		box.hover(
			function(){
				box.find('>a').stop(true,true).animate({'margin-top':'-294px'},500);
			},
			function(){
				box.find('>a').stop(true,true).animate({'margin-top':'0px'},500);				
			}
		);
	});	

	//세번째 컨텐츠
/* 	$('.contenst2_1').each(function(){
		var borderInner =$(this);
		borderInner.hover(
			function(){
				borderInner.find('.content2_1Inner1_1').fadeIn(5000);
			},
			function(){
				borderInner.find('.content2_1Inner1_1').fadeOut(5000);				
			}
		);
	});		
	 */
	//메인 로그인 창 벨류 속성 및 엑티브
	var guide_class = 'gray';
	var active_class = 'active';
	 $('.guide_text').each(function(){
		var guide_text = this.defaultValue;
		var element = $(this);
		element.focus(function(){
			//1.사용자가 아무것도 입력안했을때 2.그리고 포커스가 되었을떄
			if(element.val()===guide_text){
				element.val('');
				element.removeClass(guide_class);
				element.addClass(active_class);
			}		
		}).blur(function(){
			//1.사용자가 포커스했다가 블러했는데 2.아무것도 안썻을때
			if(element.val()===''){
				element.val(guide_text);
				element.addClass(guide_class);
				element.removeClass(active_class);
				
			}		
		}); 
		if(element.val()===guide_text){
			//처음실행했을때 포커스도 블러도 안했을때
			element.addClass(guide_class);
			element.removeClass(active_class);
		}	
	});

	//뉴스
	var current = 0;
	var banner = $('.news li');
	setInterval(function(){
		var prev = banner.eq(current);
		move(prev,'0%','-100%');
		current++;
		if(current == banner.size()){current = 0;}
		var next = banner.eq(current);
		move(next,'100%','0%');
	},2000);
	
	function move(tg, start, end){
		tg.css('top',start).stop().animate({top:end},{duration:500,ease:'easeOutCubic'});
	}




	//텝메뉴
	$('.contentW1_1_1Title').each(function(){
		var topDiv = $(this);
		var anchors = topDiv.find('ul.tabs a');
		var panelDivs = topDiv.find('div.penel');
		var lastAnchor;
		var lastPanel;
		anchors.show();
		lastAnchor = anchors.filter('.first');
		lastPanel = $(lastAnchor.attr('href'));
		panelDivs.hide();
		lastPanel.show();
		
		anchors.click(function(e){
			e.preventDefault();
			var currentAnchor = $(this);
			var currentPaner = $(currentAnchor.attr('href'));
			lastAnchor.removeClass('.first');
			currentAnchor.addClass('.first');
			lastPanel.hide();
			currentPaner.show();
			lastAnchor = currentAnchor;
			lastPanel = currentPaner;
		});
		
	/* 텝active */
	var tab = $('.tabs > li');
		tab.click(function(){
		e.preventDefault();	
		var tg = $(this);
		var i = tg.index();
		tab.removeClass('active');
		tg.addClass('active');
		});
	});



    var guideClass = 'labelStyle';
    //css 에서 class="gray"를 변수처리
    $('.labelStyle').each(function(){
        var guideText = this.defaultValue;

        var element = $(this);
        element.focus(function(){
            if(element.val()===guideText){
                element.val('');  
                element.removeClass(guideClass); 
            }; //
        });
        element.blur(function(){
            if(element.val()===''){  
                element.val(guideText); 
                element.addClass(guideClass);
            };
        });
        
        if(element.val()===guideText){ 
             element.addClass(guideClass);
        };
    });

		$('.borad_bullon').DB_springMove({
			key:'e24102',                //라이센스키
			dir:'x',               //방향축('x','y')
			mirror:1,              //반대방향이동(1,-1)
			radius:5,             //반경
			motionSpeed:0.1       //속도(0~1)
		})		
		$('.message_bullon').DB_springMove({
			key:'e24102',                //라이센스키
			dir:'x',               //방향축('x','y')
			mirror:-1,              //반대방향이동(1,-1)
			radius:5,             //반경
			motionSpeed:0.1       //속도(0~1)
		})				










});