jQuery(document).ready(function($) {
	
	var menuClicked = false;

    $(".customMenuBtn").click(function($){

    if(menuClicked == false){
        $("body").animate({"margin-left":"-300px"}, 500, 'swing');
        $("#rightSideMenu").animate({"right":"0"}, 500, 'swing');
        menuClicked = true;
    }else

    {
    	$("body").animate({"margin-left":"0"}, 500, 'swing');
    	$("#rightSideMenu").animate({"right":"-300px"}, 500, 'swing');
        menuClicked = false;
    }
    });//end of customMenuBtn Click function

    $('ul#filterNav a').click(function(){

        $(this).css('outline', 'none');
        $('ul#filterNav .current').removeClass('current');
        $(this).parent().addClass('current');

        var filterVal = $(this).text().toLowerCase().replace(' ','-');

        if(filterVal == 'all'){
            $('ul#membersPortfolio li.hidden').fadeIn('slow').removeClass('hidden');
        }else{
            $('ul#membersPortfolio li').each(function(){
                if(!$(this).hasClass(filterVal)){
                    $(this).fadeOut('slow').addClass('hidden');
                }else{
                    $(this).fadeIn('slow').removeClass('hidden');
                }

            });
        }

        return false;


    });

    $('.entry-img').hover(

        function(){$(this).children(".entry-desc").animate({top:"0%"}, "slow", "swing")},

        function(){$(this).children(".entry-desc").animate({top:"85%"}, "slow", "swing")}

        );
    
    $('ul#submitNav a').click(function(){

        //$(this).css('outline', 'none');
        $('ul#submitNav .submitCurNav').removeClass('submitCurNav');
        $(this).addClass('submitCurNav');
        $(this).parent().addClass('submitCurNav');

        var filterVal = $(this).text().toLowerCase().replace(' ', '-');

        $('div#boilerPlate div').each(function(){
            if(!$(this).hasClass(filterVal)){
                $(this).fadeOut('slow').addClass('hidden');
            }else{
                $(this).fadeIn('slow').removeClass('hidden');
            }          
        })

        if(filterVal == 'membership'){
            $('div#startMem').fadeIn('slow', function(){$("html, body").animate({scrollTop:$('#boilerPlate').offset().top})}).removeClass('hidden');
        }else{
            //Do nothing yet
        }

        return false;


    });

    $('div#startMem a').click(function(){

        $('div#boilerPlate div').each(function(){
            if(!$(this).hasClass('hidden')){
               $(this).fadeOut('slow').addClass('hidden'); 
            }else{
                //Do nothing if it's already hidden
            }
        });

        $('div#form-fields').fadeIn('slow', function(){$("html, body").animate({scrollTop:$('#submitNavCont').offset().top})}).removeClass('hidden');

        $('div#form-fields div').each(function(){
                
            if ($(this).hasClass('default')) {
                $(this).fadeIn('slow').removeClass('hidden');
            } else {
                if (!$(this).hasClass('membership-form')) {
                    $(this).fadeOut('slow').addClass('hidden'); 
                }else{
                    $(this).fadeIn('slow').removeClass('hidden');
                }
            }
        });
            
        $('div#startMem').fadeOut('slow').addClass('hidden');   

        return false;
    });

    $('#target').submit(function(event){
        alert('Submit?!');
        $('#target')[0].reset(); //reset works. Use it after the 
    })

    $("#datepicker").datepicker();

    
});//End of document ready functions