/* 서브페이지2 */
$(function(){
	/* alert('a'); */
	/* 게시판 하위컨텐츠 나오게 하기 */
	$('.notice').each(function(){
		var dl = $(this);
		var allDt = dl.find('.title2');
		var allDd = dl.find('.content_wrap');
		allDd.hide();
		allDt.css('cursor','pointer');
		allDt.click(function(){
			var dt = $(this);
			var dd = dt.parent('.contents').find('.content_wrap');
			allDd.hide();
			dd.show();
			allDt.css('cursor','pointer');
			dt.css('cursor','default');
		});
	});
	
	/* 게시판 상위 클릭했을 때 색 지정 */
	var check = $('.title2');
	check.click();
});