var go, navRefresh, block, blockTop, zoomval;

window.cl=function(msg){console.log(msg);};

jQuery(function($){


	var  fb_visible=0, entercab=0; //header in px

	

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
	$("#cabinet").click(function(){
		var top=0;
		if (entercab){
			top=-300;
			entercab=0;
		} else{ 
			entercab=1;
		}
		$("#enter_cabinet").animate({"top":top+"px"});

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
