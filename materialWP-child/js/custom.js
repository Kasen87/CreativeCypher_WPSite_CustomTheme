jQuery(document).ready(function($) {

    var templateURL = object_name.templateURL;
	
    //Meant for hover over on member and partner pages...maybe for shows too?
    $('.entry-img').hover(

        function(){$(this).children(".entry-desc").animate({top:"0%"}, "fast", "swing")},

        function(){$(this).children(".entry-desc").animate({top:"85%"}, "slow", "swing")}

        );
    

    //Create Page Functionality
    $('ul#submitNav a').click(function(event){

        event.preventDefault();

        if( $(this).children('h3').hasClass('cur') ){
            
            return false;
        }else{
            //Check whether or not stuff is filled out, if so alert the user about leaving!
            //Code here ^ ^ ^ ^
            //
            $('ul#submitNav .submitCurNav').removeClass('submitCurNav');
            $('ul#submitNav .cur').removeClass('cur');
            $(this).addClass('submitCurNav');
            $(this).parent().addClass('submitCurNav');
            $(this).children('h3').addClass('cur'); //h3 kept messing the click up

            var filterVal = $(this).text().toLowerCase().replace(' ', '-');

            $('div#boilerPlate div').each(function(){
                if(!$(this).hasClass(filterVal)){
                    $(this).fadeOut('slow').addClass('hidden');
                }else{
                    $(this).fadeIn('slow').removeClass('hidden');
                }          
            })

            $('div#form-fields').fadeOut('slow').addClass('hidden');
            $('div#form-fields div').each(function(){
                $(this).fadeOut('slow').addClass('hidden');
            });
            
            $('div#startApp').fadeIn('slow', function(){$("html, body").animate({scrollTop:$('#submitNavCont').offset().top-70+'px'})}).removeClass('hidden');

            return false;
        }
        


    });

    //If start membership application is clicked...
    function startApplication(n){
       var name = n +'-form';

        $('div#form-fields div').each(function(){
                
            if ($(this).hasClass('default')) {
                $(this).fadeIn('slow').removeClass('hidden');
            } else {
                if (!$(this).hasClass(name)) { //It isn't the membership form then...

                    $(this).fadeOut('slow').addClass('hidden');
                    $(this).find('input').prop("disabled", true);
                    $(this).find('textarea').prop("disabled", true);

                }else{

                    $(this).fadeIn('slow').removeClass('hidden');
                    $(this).find('input').prop("disabled", false);
                    $(this).find('textarea').prop("disabled", false);
                }

                if (name == "membership-form" || "submit-script-form"){
                    var terms = $('input#acceptTerms');
                    $(terms).parent('label').fadeIn('slow').removeClass('hidden');
                    $(terms).prop('disabled', false);
                }else{
                    $(terms).parent('label').fadeOut('slow').addClass('hidden');
                    $(terms).prop('disabled', true);
                };
            }
        });
    };


    $('div#startApp a').click(function(){

        $('div#boilerPlate div').each(function(){
            if(!$(this).hasClass('hidden')){
               $(this).fadeOut('slow').addClass('hidden'); 
            }else{
                //Do nothing if it's already hidden
            }
        });

        $('div#form-fields').fadeIn('slow', function(){$("html, body").animate({scrollTop:$('#submitNavCont').offset().top-70+'px'})}).removeClass('hidden');

        var formName = $('ul#submitNav a.submitCurNav').text().toLowerCase().replace(' ','-');
        startApplication(formName); //use this to show the right form
            
        $('div#startApp').fadeOut('slow').addClass('hidden');

        return false;
    });



    
    //Datepicker JQuery object
    $("#datepicker").datepicker();

    //Used for the filter buttons for members and partners
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

    //Meant for overlay divs
    // function to show our popups
    function showPopup(whichpopup){
        var docHeight = $(document).height(); //grab the height of the page
        var scrollTop = $(window).scrollTop(); //grab the px value from the top of the page to where you're scrolling
        $('.overlay-bg').show().css({'height' : docHeight, 'top': -60+'px'}); //display your popup background and set height to the page height
        $('.popup-'+whichpopup).show().css({'top': scrollTop+20+'px'}); //show the appropriate popup and set the content 20px from the window top
    }
     
    // function to close our popups
    function closePopup(){
        $('.overlay-bg, .overlay-content').hide(); //hide the overlay
    }
     
    // show popup when you click on the link
    $('.show-popup').click(function(event){
        event.preventDefault(); // disable normal link function so that it doesn't refresh the page
        var selectedPopup = $(this).data('showpopup'); //get the corresponding popup to show
         
        showPopup(selectedPopup); //we'll pass in the popup number to our showPopup() function to show which popup we want
    });
       
        // hide popup when user clicks on close button or if user clicks anywhere outside the container
    $('.close-btn, .overlay-bg').click(function(){
        closePopup();
    });
         
        // hide the popup when user presses the esc key
    $(document).keyup(function(e) {
        if (e.keyCode == 27) { // if user presses esc key
            closePopup();
        }
    });

    //Ajax Call for Submission to Email

    //Meant for submit button on the form sections
    $('#target').submit(function(event){
        var proceed = true;
        var scriptFile02 = false;
        var scriptFile03 = false;
        var commentQuest = false;

        event.preventDefault();
        //simple validation at client's end
        //loop through each field and we simply change border color to red for invalid fields
        $('#target input, #target textarea').each(function(){
            $(this).css('border-color','');
            console.log($('#target input[name=date]').val());
            if(!$(this).prop('disabled')){ //if the input field is enabled then...
                if( $(this).prop('required')){ //if this input field is required then...
                    if( !$.trim($(this).val() )){ //if this field is empty
                        $(this).css('border-color','red'); //change border color to red   
                        proceed = false; //set do not proceed flag
                    }
                    //check invalid email
                    var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                    if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
                        $(this).css('border-color','red'); //change border color to red   
                        proceed = false; //set do not proceed flag              
                    }
                    if( $(this).prop("type")=="file" && !$(this)[0].files[0] ){ //if no file is attached then
                        $(this).css('border-color','red'); //change border color to red   
                        proceed = false; //set do not proceed flag
                    }
                }else{ //Not required but enabled (Optional info then) vvvvv
                    if( $(this).prop("type")=="file" && $(this)[0].files[0]){  //if there's a file attached, do something else 
                        if($(this).prop("name")=="userScript02"){ scriptFile02 = true; }
                        if($(this).prop("name")=="userScript03"){ scriptFile03 = true; }
                    }

                    if( $(this).is('textarea') && $.trim($(this).val())) { //is this a textarea and does it have something in it besides whitespace?
                        if($(this).prop("name")=="comment_question"){ commentQuest = true; }
                    }
                }
            }else{
                //If object is disabled, do something here
            }
            
        });       
        
        if(proceed) //everything looks good! proceed...
        {          
            //check to see which data to send by looking at current tab
            var form_Name = $('ul#submitNav a.submitCurNav').text().toLowerCase().replace(' ','-');
           //data to be sent to server         
            var m_data = new FormData();
            //Default data to be collected, all required inputs...
            m_data.append( 'the_date', $('input[name=date]').val());
            m_data.append( 'first_name', $('input[name=first_name]').val());
            m_data.append( 'last_name', $('input[name=last_name]').val());
            m_data.append( 'user_email', $('input[name=e_mail]').val());
            m_data.append( 'company_name', $('input[name=company_name]').val());
            m_data.append( 'website_addy', $('input[name=website]').val());
            //Specialized section to gather up, only if enabled and filled out
            //--Member Section--//
            if(form_Name == "membership"){
                m_data.append( 'memActive', true);
                m_data.append( 'user_headshot', $('input[name=userPic]')[0].files[0]);
                m_data.append( 'user_recommendation', $('input[name=userRec]')[0].files[0]);               
            }else{
                m_data.append( 'memActive', false);
            }
            //--Script Section--//
            if(form_Name == "submit-script"){
                m_data.append( 'scrActive', true);
                m_data.append( 'user_script_title', $('input[name=userTitle]').val());
                m_data.append( 'user_script_logline', $('input[name=userLogline]').val());
                m_data.append( 'user_script_synopsis', $('textarea[name=userSynopsis]').val());
                m_data.append( 'user_script_medium', $('input[name=userMedium]').val());
                m_data.append( 'user_script01', $('input[name=userScript01]')[0].files[0]);               
            }else{
                m_data.append('scrActive', false);
            }
            //Check the optional input sources for potential uploads
            if(scriptFile02){

                m_data.append( 'user_script02', $('input[name=userScript02]')[0].files[0]); 
            }
            if(scriptFile03){ 
                m_data.append( 'user_script03', $('input[name=userScript03]')[0].files[0]); 
            }
            if(commentQuest){
                m_data.append( 'comActive', true);
                m_data.append( 'comment_question', $('textarea[name=comment_question]').val()); 
            }else{
                m_data.append( 'comActive', false);
            }
            //Last Default data to be collected, one required

            //instead of $.post() we are using $.ajax()
            //that's because $.ajax() has more options and flexibly.
            $.ajax({
              url: templateURL+'/contact/contactCypher.php',
              data: m_data,
              processData: false,
              contentType: false,
              type: 'POST',
              dataType:'json',
              success: function(response){
                 //load json data from server and output message     
                if(response.type == 'error'){ //load json data from server and output message     
                    console.log(response.text);
                }else{
                    console.log(response.text);;
                    $('#target').each(function(){
                        this.reset();
                    }); //reset works. Use it after the submission data is confirmed
                }
                $("#form-fields #contact_results").hide().html(output).slideDown();
              }
            });         
        }

       
    });
    
    //reset previously set border colors and hide all message on .keyup()
    $("#target  input[required=true], #target textarea[required=true]").keyup(function() { 
        $(this).css('border-color',''); 
        $("#result").slideUp();
    });


    });

/*
-------------------------------------------------
-------------------------------------------------
Things below this line are still experimental and do
not yet have a place in the code
-------------------------------------------------
-------------------------------------------------
-------------------------------------------------
-------------------------------------------------
*/

    // timer if we want to show a popup after a few seconds.

    //setTimeout(function() {
    // Show popup3 after 2 seconds
    //   showPopup(3);
    //}, 2000);

    //Meant for custom menu functionality(right side menu)
    /*var menuClicked = false;

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
    });//end of customMenuBtn Click function*/
    
//});//End of document ready functions