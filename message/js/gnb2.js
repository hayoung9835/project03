$(function(){
	// 서브페이지 엑티브
	
    var mainmenu = $('.oneDepth'); // 1depth 메뉴
	var wrap = $('.main_menu'); // 1depth와 2depth를 감싸는 element
	var menuHeight = mainmenu.children('li').height();
	// 1depth의 높이
	var pageURL = location.href;
	// file:///D:/06_jQuery_middle/ex05_2depth_menu/2depth_menu.html
	var activeMenu1;
	var activeMenu2;
	
	mainmenu.on({
		mouseover:function(){
			var tg = $(this);
			mainmenu.removeClass('on');
			tg.addClass('on');
			var th = menuHeight + tg.find('>.twoInner').height();
			wrap.stop().animate({height:th});
		},
		mouseout:function(){
			var tg = $(this);
			tg.removeClass('on');
			//tg.addClass('on');
			//var th = menuHeight + tg.find('>.sGnbArea').height();
			wrap.stop().animate({height:menuHeight});	
			onActive();
		}
	});
	
	mainmenu.each(function(i){
		var tg = $(this);
		// tg = 순환하는 1Depth
		var sub = tg.find('>.twoInner > ul > li');
		// sub = 순환하는 2Depth
		var menuURL = tg.children('a').attr('href');
		// 1Depth의 anchor의 주소 2depth_menu.html
		var active = pageURL.indexOf(menuURL);
		// active는 있으면 숫자를 return하고 없으면 -1을 되돌려준다.
		if(active>-1){activeMenu1 = tg;};
		sub.each(function(j){
			var tg = $(this);
			var subURL = tg.children('a').attr('href');
			active = pageURL.indexOf(subURL);
			if(active>-1) {activeMenu2 = tg;};
		});
		sub.on({
			mouseover:function(){
				var tg = $(this);
				sub.removeClass('on');
				tg.addClass('on');
			},
			mouseout:function(){
				var tg = $(this);
				tg.removeClass('on');
				onActive();
			}
		});
	});
	onActive();
	function onActive(){
		/* if(activeMenu){activeMenu.trigger('mouseover')}; */
		if(activeMenu1){activeMenu1.addClass('on')};
		if(activeMenu2){activeMenu2.addClass('on')};
	};
});
















