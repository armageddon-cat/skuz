jQuery(function($){
	$("input:checkbox").transformCheckbox({
			checked: "/img/checkbox_on.png", // Checked image
			unchecked: "/img/checkbox_off.png",		// Unchecked image
			tristateHalfChecked : "/img/checkbox_off.png", // Tri-state image
			tristate : true // Use tri state? need to be ul > li > checkbox // ul > li > ul > li > checkbox
		});
});