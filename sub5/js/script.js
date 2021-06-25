/* 서브페이지5 */
$(function(){
   /* alert('a'); */
   /* 게시판 하위컨텐츠 나오게 하기 */
/*    $('.notice').each(function(){
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
    */
   /* 게시판 데이터 베이스 */
   var notice = $('.notice');
   $.getJSON('data.json',function(people){
      $.each(people, function(i,person){
         var text_no = person.no;
         var text_title = person.title;
         var text_name = person.name;
         var text_date = person.date;
         var text_hits = person.hits;
		 var text_content = person.content
         
         var div = $('<div />'); 
		 var contentswrap = $('<div class = "content_wrap cf"');
         
		 var no = $('<div class="no"/>').html(text_no);
         var title = $('<div class="accordion"/>').html(text_title);
         var name = $('<div class="name"/>').html(text_name);
         var date = $('<div class="date"/>').html(text_date);
         var hits = $('<div class="hits"/>').html(text_hits);
		 var content = $('<div class ="content"/>').html(text_content);
      
         div.append(no);
         div.append(title);
         div.append(name);
         div.append(date);
         div.append(hits);
         notice.append(div);
		 
		 var class_closed = 'closed'
		 $(notice).each(function(){
			 var alltit = board.find(title);
			 var allcon = board.find(content);
			 
			 function(closedAll){
				 alltit.addClass(class_closed);
				 allcon.addClass(class_closed);
			 };
			 function open(tit,con){
				 tit.removeClass(class_closed);
				 con.removeClass(class_closed);
			 };
			 closedAll();
			 alltit.click(function){
				 alltit.click(function){
					 var tit = $(this);
					 var con = $(this).parent(notice).find(content);
					 closedAll();
					 open(tit,con);
				 };
			 };
		 });
      });
   });

});







































