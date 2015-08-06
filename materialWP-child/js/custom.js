jQuery(document).ready(function($) {

    var templateURL = object_name.templateURL;
    var curPosition; //Used for the hover-over effects
    var menuClicked = false; //Toggle variable for the right side menu functions


    //Allows entry-desc class to raise up when a user hovers over the specific post
    $('.entry-container, #portfolio').hover(

        //This part slides the entry-desc div up
        function(){
            if( $(this).children(".entry-desc").data('isSet') != true){ //Check if the isSet value for the element is true, if not then..
                curPosition = $(this).children(".entry-desc").css('top');           //Set the curPosition variable to the starting top pos
                $(this).children(".entry-desc").data('defaultTop', curPosition);    //Attach that value above to the object
                $(this).children(".entry-desc").data('isSet', true);                //And set the isSet value to true
            }else{
                curPosition = $(this).children(".entry-desc").data('defaultTop');   //If isSet is true, make sure we use the starting top Pos from earlier
            }
            $(this).children(".entry-desc").stop(true,false).animate({top:"0%"}, "fast", "swing");
            $(this).parent().children(".entry-desc").stop(true,false).animate({top:"0%"}, "fast", "swing")},
        //This part slides the entry-desc div down
        function(){
            $(this).children(".entry-desc").stop(true,false).animate({top:curPosition}, "fast", "swing");
            $(this).parent().children(".entry-desc").stop(true,false).animate({top:curPosition}, "fast", "swing")}
    );
    

    //The "create" Page Functionality
    $('ul#submitNav a').click(function(event){  //This function is responsible for the menu functionality, whether it shows a "start application" button, or just cycles through 

        event.preventDefault(); //Prevent the # click
        event.stopPropagation();
        if( $(this).children('h3').hasClass('cur') ){
            //If the menu selected, is already showing then don't reshow the page *This works!*
            return false;
        }
        else
        {
            //Check whether or not stuff is filled out, if so alert the user about leaving!
            //Code here ^ ^ ^ ^
            //
            $('ul#submitNav .submitCurNav').removeClass('submitCurNav'); //Make the current selected class, not selected
            $('ul#submitNav .cur').removeClass('cur'); //Make the current li selected class, not selected
            $(this).addClass('submitCurNav'); //add the *select class* to the current object firing this event
            $(this).parent().addClass('submitCurNav'); //add to the parent because selecting the children with the below code is being a bitch (I don't like the way I've done this...#potentialIssue)
            $(this).children('h3').addClass('cur'); //If you clicked the word instead of the button, for some reason it wouldn't read. So we have to add the class to the H3 element inside the button.

            var filterVal = $(this).text().toLowerCase().replace(' ', '-'); //Convert it to "expected" form for the if-statement below

            $('div#boilerPlate div').each(function(){   //cycle through each of the boiler plate sections
                if(!$(this).hasClass(filterVal)){       //if the section doesn't contain the converted menu name, then fade it out
                    $(this).fadeOut('slow').addClass('hidden');
                }else{                                  //If it does have it, then fade it in
                    $(this).fadeIn('slow').removeClass('hidden');
                }          
            })

            $('div#form-fields').fadeOut('slow').addClass('hidden'); //Regardless of the above, fade-out all of the form-fields sections
            
            $('div#form-fields div').each(function(){               //cycle through each of the form fields
                $(this).fadeOut('slow').addClass('hidden');             //slowly hide them all!
            });
            
            //Fade in the "Start Application button" and slide the page down to the top of the menu (if possible)
            //Although, the if-possible doesn't actually check to see if it can move the page or not :(

            if ((filterVal == "membership") || (filterVal == "submit-script")){ //If it's membership or submit-script then...do these things
                $('div#startApp').fadeIn('slow', function(){    //Fade in the "start application button"

                $("html, body").animate({
                                    scrollTop:$('#submitNavCont').offset().top-70+'px'})}).removeClass('hidden');

                return false;
            }
            else
            {

                $('div#startApp').fadeOut('slow', function(){    //Fade in the "start application button"

                $("html, body").animate({
                               scrollTop:$('#submitNavCont').offset().top-70+'px'})}).addClass('hidden');

                startApplication(filterVal);    

                return false;
            }
            
        }
    });

    //This is the function to call if "Start Application" button is clicked
    //Also, use this to show forms manually without the start appication button
    function startApplication(n){
       var name = n +'-form';           //Take the supplied name and convert it to the expected format

        $('div#form-fields').fadeIn('slow', function(){
            $("html, body").animate({scrollTop:$('#submitNavCont').offset().top-70+'px'})}).removeClass('hidden');

        $('div#form-fields>form div').each(function(){          //Cycle through form-field divs
            if ($(this).hasClass('default')) {                  //If it is a typical field div... 
                $(this).fadeIn('slow').removeClass('hidden');   //Show the div
            } else {
                if (!$(this).hasClass(name)) { //If it doesn't have a class that matches the supplied name above

                    $(this).fadeOut('slow').addClass('hidden');     //Fade it out, and add a 'hidden' to it
                    $(this).find('input').prop("disabled", true);   //Disable all inputs within the div
                    $(this).find('textarea').prop("disabled", true);//disable all of the text areas within the div

                }else{

                    $(this).fadeIn('slow').removeClass('hidden');       //Show the current div
                    $(this).find('input').prop("disabled", false);      //Enable the inputs within the div
                    $(this).find('textarea').prop("disabled", false);   //Enable the text-area if there are any
                    $(this).find('select').prop("disabled", false);     //Enable the select option if there are any
                }

                //This isn't working right now...it still shows up for all of the selected creation pages or none at all
                var terms = $('input#acceptTerms');                     

                if ((name == "membership-form") || (name =="submit-script-form")){             //If it's a membership or script...
                    $(terms).parent('label').fadeIn('slow').removeClass('hidden');  //Then show the label for Term Acceptance & button
                    $(terms).prop('disabled', false);                               //Then enable the button/label
                }else{
                    $(terms).parent('label').fadeOut('slow').addClass('hidden');    //Hide the label and button
                    $(terms).prop('disabled', true);                                //Then disable the label/button
                };
            }
        });
    };

    //this is the click event for "start application" button that shows up
    $('div#startApp a').click(function(){  

        //This part is meant to hide any currently showing forms or boilerplate divs
        //For example: user clicked submit script, but meant to apply for membership....
        $('div#boilerPlate div').each(function(){   //cycle through all boiler-plate divs
            if(!$(this).hasClass('hidden')){        //If it is shown currently
               $(this).fadeOut('slow').addClass('hidden');  //Fade it out and hide it
            }else{
                //Do nothing if it's already hidden
            }
        });

        //fade in the form-fields div
        //and move the window to the top of the menu section


        //Figure out which form we're currently on and convert it to an expected form-name

        var formName = $('ul#submitNav a.submitCurNav').text().toLowerCase().replace(' ','-');
        startApplication(formName); //use this to show the right fields for the form
            
        $('div#startApp').fadeOut('slow').addClass('hidden');//hide the "start Application" button

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

    //Ajax Call for Submission to Email below
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

            if(form_Name == "contact"){
                m_data.append('reasonActive', true);
                m_data.append('contact_reason', $('select[name=contactReason]').val());
            }else{
                m_data.append('reasonActive', false);
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

    $(".navbar-collapse.collapse li:last-child").click(function(event){

        event.preventDefault();

        if(menuClicked == false){
            jQuery("body, html").animate({"margin-left":"-250px"}, 500, 'swing');
            jQuery("#rightSideMenuContainer").animate({"right":"0"}, 500, 'swing');
            menuClicked = true;
        }else{
            jQuery("body, html").animate({"margin-left":"0"}, 500, 'swing');
            jQuery("#rightSideMenuContainer").animate({"right":"-250px"}, 500, 'swing');
            menuClicked = false;
        }
    }); //Ends the $("navbar") function above

    //This is for the instagram feed on the landing page
    var userFeed = new Instafeed({
        get: 'user',
        userId: 1543147855,
        accessToken: '1543147855.467ede5.2fb001a5cee149e0a87618eba5283bcc',
        template: ''
    });

    userFeed.run();
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
 //end of customMenuBtn Click function*/
    
//});//End of document ready functions