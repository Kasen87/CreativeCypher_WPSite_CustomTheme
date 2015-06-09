jQuery(document).ready(function($) {
	
	var menuClicked = false;

    $(".customMenuBtn").click(function($){

    if(menuClicked == false){
        jQuery("body").animate({"margin-left":"-300px"}, 500, 'swing');
        jQuery("#rightSideMenu").animate({"right":"0"}, 500, 'swing');
        menuClicked = true;
    }else

    {
    	jQuery("body").animate({"margin-left":"0"}, 500, 'swing');
    	jQuery("#rightSideMenu").animate({"right":"-300px"}, 500, 'swing');
        menuClicked = false;
    }
    });
    
});