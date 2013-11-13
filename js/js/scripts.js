var go, navRefresh, block, blockTop, zoomval;

window.cl=function(msg){console.log(msg);};

jQuery(function($){


	var hheight=0, prevId, fb_visible=0; //header in px

	block=[];
	$(".block").each(function(){
		var id=$(this).attr("id").substr(5);
		block[id]=$(this);
	});

	navRefresh=function(){
		var el, top;

		blockTop=[];
		for (var i in block){
			top=block[i].offset().top-hheight;
			top=top>0? top : 0;
			blockTop[i]=top;
		}
	};

	go=function(id){
		var top;

		prevId=id;
		top=block[id].offset().top-hheight;
		top=top>0? top : 0;
		blockTop[id]=top;
		$("html,body").animate({scrollTop:blockTop[id]+"px"}, function(){
			var title;
			$("#nav li").removeClass("curr");
			$("#navbl"+id).addClass("curr");
			//alert(id);
			document.title=$("#navbl"+id+" a").text()+" | "+basetitle;
		});
	};

	$(window).scroll(function(){
		var title, min, curr, minId=1, top=$(window).scrollTop();
		
		min=top;
		for(var i in blockTop){
			curr=top-blockTop[i]+5; //for go
			if(curr>0 && curr<min){
				min=curr;
				minId=i;
			}
		}

		if(top+$(window).height()==$(document).height()){ //last
			minId=block.length-1;
		}

		if(minId!==prevId){
			$("#nav li").removeClass("curr");
			$("#navbl"+minId).addClass("curr");
			document.title=$("#navbl"+minId+" a").text()+" | "+basetitle;
			prevId=minId;
		}
	});


	$("#back_call").click(function(){
		var top=-0;
		if (fb_visible){
			top=-194;
			fb_visible=0;
		} else{ 
			fb_visible=1;
		}
		$("#number_enter").animate({"top":top+"px"});

		return false;
	});

	$("img#labar").hover(
	function anim1(){
		var el1=$("#e1"),right;
		right=12;
		el1.animate({
			"right":right+"%",
		}, 700, function(){
		});
	}, 
	function anim1(){
		var el1=$("#e1"),right;	
		right=2;
		el1.stop(true, false).animate({
			"right":right+"%",
		}, 350, function(){
		});
	});
$("img#labar").hover(
function anim2(){
		var el2=$("#e2"),right;
		right=10;
		el2.animate({
			"right":right+"%",
		}, 700, function(){
		});
	}, 
	function anim2(){
		var el2=$("#e2"),right;	
		right=5;
		el2.stop(true, false).animate({
			"right":right+"%",
		}, 350, function(){
		});
	});



	navRefresh();

	$("#home, .up").click(function(){
		$("html,body").animate({scrollTop:0+"px"});
		return false;
	});

    $(".ill").hover(
function(){
	$(".color",$(this)).fadeIn();
	$(this).unbind("hover");
},
function(){
	$(".color",$(this)).fadeOut();
});
});
 

/*
$(window).load(function(){
	navRefresh();
});
*/

function toggle_show(id) {
        document.getElementById(id).style.display = document.getElementById(id).style.display == 'none' ? 'block' : 'none';

    }

function toggle_show(id) {
 $("#"+id).slideToggle("slow");

}