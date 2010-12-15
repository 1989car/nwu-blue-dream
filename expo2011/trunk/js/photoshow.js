//<![CDATA[
$(function(){
	(function(){
		var curr = 0;
		$("#jsNav .trigger").each(function(i){
			$(this).click(function(){
				curr = i;
				$("#js img").eq(i).fadeIn("slow").siblings("img").hide();
				$(this).siblings(".trigger").removeClass("imgSelected").end().addClass("imgSelected");
				return false;
			});
		});

		var pg = function(flag){
			//flag:true±íÊŸÇ°·­£¬ false±íÊŸºó·­
			if (flag) {
				if (curr == 0) {
					todo = 2;
				} else {
					todo = (curr - 1) % 3;
				}
			} else {
				todo = (curr + 1) % 3;
			}
			$("#jsNav .trigger").eq(todo).click();
		};

		//Ç°·­
		$("#prev").click(function(){
			pg(true);
			return false;
		});

		//ºó·­
		$("#next").click(function(){
			pg(false);
			return false;
		});

		//×Ô¶¯·­
		var timer = setInterval(function(){
			todo = (curr + 1) % 3;
			$("#jsNav .trigger").eq(todo).click();
		},4000);

		//Êó±êÐüÍ£ÔÚŽ¥·¢Æ÷ÉÏÊ±Í£Ö¹×Ô¶¯·­
		$("#jsNav a").hover(function(){
				clearInterval(timer);
			},
			function(){
				timer = setInterval(function(){
					todo = (curr + 1) % 3;
					$("#jsNav .trigger").eq(todo).click();
				},1500);
			}
		);
	})();
});
//]]>

//ÀÁÈËÍŒ¿â www.lanrentuku.com
