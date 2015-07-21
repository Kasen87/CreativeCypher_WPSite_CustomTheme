<?php
if($_POST)
{   
    require_once(dirname(__FILE__).'\..\..\..\..\wp-load.php');

    $to_email       = "thecreativecypher@gmail.com"; //Recipient email, Replace with own email here
    $from_email     = "no-reply@thecreativecypher.com"; //From email address (eg: no-reply@YOUR-DOMAIN.com)
    $subject 		= "A Message from thecreativecypher.com";
    $attachments    = array(); //get array ready for attachments
    $attachNum      = 0;
    
    //check if its an ajax request, exit if not
if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        $output = json_encode(array( //create JSON data
            'type'=>'error',
            'text' => 'Sorry Request must be Ajax POST'
        ));
        die($output); //exit script outputting json data
    }
   
    //Sanitize input data using PHP filter_var().
    //$pre_Sanitize_Date = str_replace("/","-",$_POST["the_date"])

    //var_dump($pre_Sanitize_Date);
    //All Default Info
   // $the_date 				= filter_var($pre_Sanitize_Date , FILTER_SANITIZE_NUMBER_INT)
    $first_name     		= filter_var($_POST["first_name"], FILTER_SANITIZE_STRING);
    $last_name     			= filter_var($_POST["last_name"], FILTER_SANITIZE_STRING);
    $user_email   			= filter_var($_POST["user_email"], FILTER_SANITIZE_EMAIL);
    $company_name   		= filter_var($_POST["company_name"], FILTER_SANITIZE_STRING);
    $website_addy			= filter_var($_POST["website_addy"], FILTER_SANITIZE_URL);
    //Flags Brought in
    $scrActive				= filter_var($_POST["scrActive"], FILTER_SANITIZE_STRING);
    $memActive				= filter_var($_POST["memActive"], FILTER_SANITIZE_STRING);
    $comActive				= filter_var($_POST["comActive"], FILTER_SANITIZE_STRING);

   	//All Default and Optional Info
    if($comActive == 'true'){
    	$comment_question       = filter_var($_POST["comment_question"], FILTER_SANITIZE_STRING);
    }else{
    	$comment_question = "They didn't leave a message.";
    }
   
    //additional php validation
    if(strlen($first_name)<3 || strlen($last_name)<3){ // If length is less than 3 it will output JSON error.
        $output = json_encode(array('type'=>'error', 'text' => 'Name is too short or empty!'));
        die($output);
    }
    if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){ //email validation
        $output = json_encode(array('type'=>'error', 'text' => 'Please enter a valid email!'));
        die($output);
    }
    if(!filter_var($website_addy, FILTER_VALIDATE_URL)){ //check for valid website address
        $output = json_encode(array('type'=>'error', 'text' => 'Enter a valid website address!'));
        die($output);
    }
    if($scrActive == 'true'){
    	$subject = "Script Submission from thecreativecypher.com";
   		//Script Default Info
	    $user_script_title      = filter_var($_POST["user_script_title"], FILTER_SANITIZE_STRING);
	    $user_script_logline    = filter_var($_POST["user_script_logline"], FILTER_SANITIZE_STRING);
	    $user_script_synopsis   = filter_var($_POST["user_script_synopsis"], FILTER_SANITIZE_STRING);
	    $user_script_medium     = filter_var($_POST["user_script_medium"], FILTER_SANITIZE_STRING);

    	if(isset($user_script_title) && strlen($user_script_title)<3){ //check emtpy subject
        $output = json_encode(array('type'=>'error', 'text' => 'Title is required'));
        die($output);
    	}
	    if(strlen($user_script_logline)<3){ //check emtpy message
	        $output = json_encode(array('type'=>'error', 'text' => 'Too short logline! Please enter something.'));
	    die($output);
	    }
	    if(strlen($user_script_synopsis)<3){ //check emtpy message
	        $output = json_encode(array('type'=>'error', 'text' => 'Too short synopsis! Please enter something.'));
	    die($output);
    	}
    }
    
   
    //email body
    $message_body = "";

    if(isset($user_script_title)){
    	$message_body .= "Script Title: ".$user_script_title."\r\n"."Script Logline: ".$user_script_logline."\r\n"."Medium: ".$user_script_medium."\r\n"."Synopsis: "."\r\n\r\n".$user_script_synopsis."\r\n";
    }
    
    $message_body .= 'Comments/Questions: '.$comment_question."\r\n\r\n".$first_name." ".$last_name."\r\nEmail : ".$user_email."\r\n";
 

    ### Attachment Preparation ###
    $file_attached = false;
    $headshot_attached = false;
    $recommendation_attached = false;
    $script01_attached = false;
    $script02_attached = false;
    $script03_attached = false;

    if(isset($_FILES['user_headshot'])) //check uploaded file
    {
        //get file details we need
        $headS_tmp_name    = $_FILES['user_headshot']['tmp_name'];
        $headS_name        = $_FILES['user_headshot']['name'];
        $headS_size        = $_FILES['user_headshot']['size'];
        $headS_type        = $_FILES['user_headshot']['type'];
        $headS_error       = $_FILES['user_headshot']['error'];

        //exit script and output error if we encounter any
        if($headS_error>0)
        {
            $mymsg = array( 
            1=>"The uploaded file exceeds the upload_max_filesize directive in php.ini", 
            2=>"The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form", 
            3=>"The uploaded file was only partially uploaded", 
            4=>"No file was uploaded", 
            6=>"Missing a temporary folder" ); 
            
            $output = json_encode(array('type'=>'error', 'text' => $mymsg[$headS_error]));
            die($output); 
        }
        
        $attachNum++;
        //read from the uploaded file & base64_encode content for the mail
        move_uploaded_file($headS_tmp_name, WP_CONTENT_DIR.'/uploads/'.basename($headS_name));
        $attachments[$attachNum] = (WP_CONTENT_DIR."/uploads/".$headS_name);
        //now we know we have the file for attachment, set $file_attached to true
        $file_attached = true;
        $headshot_attached = true;
        var_dump('Attachments are: #'.$attachNum);
    }
    if(isset($_FILES['user_recommendation'])) //check uploaded file
    {
        //get file details we need
        $recA_tmp_name    = $_FILES['user_recommendation']['tmp_name'];
        $recA_name        = $_FILES['user_recommendation']['name'];
        $recA_size        = $_FILES['user_recommendation']['size'];
        $recA_type        = $_FILES['user_recommendation']['type'];
        $recA_error       = $_FILES['user_recommendation']['error'];

        //exit script and output error if we encounter any
        if($recA_error>0)
        {
            $mymsg = array( 
            1=>"The uploaded file exceeds the upload_max_filesize directive in php.ini", 
            2=>"The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form", 
            3=>"The uploaded file was only partially uploaded", 
            4=>"No file was uploaded", 
            6=>"Missing a temporary folder" ); 
            
            $output = json_encode(array('type'=>'error', 'text' => $mymsg[$recA_error]));
            die($output); 
        }
        
        //read from the uploaded file & base64_encode content for the mail
        $attachNum++;
        //read from the uploaded file & base64_encode content for the mail
        move_uploaded_file($recA_tmp_name, WP_CONTENT_DIR.'/uploads/'.basename($recA_name));
        $attachments[$attachNum] = (WP_CONTENT_DIR."/uploads/".$recA_name);
        //now we know we have the file for attachment, set $file_attached to true
        $file_attached = true;
        $recommendation_attached = true;
        var_dump('Attachments are: #'.$attachNum);
    }
   	if(isset($_FILES['user_script01'])) //check uploaded file
    {
        //get file details we need
        $script01_tmp_name    = $_FILES['user_script01']['tmp_name'];
        $script01_name        = $_FILES['user_script01']['name'];
        $script01_size        = $_FILES['user_script01']['size'];
        $script01_type        = $_FILES['user_script01']['type'];
        $script01_error       = $_FILES['user_script01']['error'];

        //exit script and output error if we encounter any
        if($script01_error>0)
        {
            $mymsg = array( 
            1=>"The uploaded file exceeds the upload_max_filesize directive in php.ini", 
            2=>"The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form", 
            3=>"The uploaded file was only partially uploaded", 
            4=>"No file was uploaded", 
            6=>"Missing a temporary folder" ); 
            
            $output = json_encode(array('type'=>'error', 'text' => $mymsg[$script01_error]));
            die($output); 
        }
        
        //read from the uploaded file & base64_encode content for the mail
        $handle = fopen($script01_tmp_name, "r");
        $content = fread($handle, $script01_size);
        fclose($handle);
        $script01_encoded_content = chunk_split(base64_encode($content));
        //now we know we have the file for attachment, set $file_attached to true
        $file_attached = true;
        $script01_attached = true;
    }   
   	if(isset($_FILES['user_script02'])) //check uploaded file
    {
        //get file details we need
        $script02_tmp_name    = $_FILES['user_script02']['tmp_name'];
        $script02_name        = $_FILES['user_script02']['name'];
        $script02_size        = $_FILES['user_script02']['size'];
        $script02_type        = $_FILES['user_script02']['type'];
        $script02_error       = $_FILES['user_script02']['error'];

        //exit script and output error if we encounter any
        if($script02_error>0)
        {
            $mymsg = array( 
            1=>"The uploaded file exceeds the upload_max_filesize directive in php.ini", 
            2=>"The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form", 
            3=>"The uploaded file was only partially uploaded", 
            4=>"No file was uploaded", 
            6=>"Missing a temporary folder" ); 
            
            $output = json_encode(array('type'=>'error', 'text' => $mymsg[$script02_error]));
            die($output); 
        }
        
        //read from the uploaded file & base64_encode content for the mail
        $handle = fopen($script02_tmp_name, "r");
        $content = fread($handle, $script02_size);
        fclose($handle);
        $script02_encoded_content = chunk_split(base64_encode($content));
        //now we know we have the file for attachment, set $file_attached to true
        $file_attached = true;
        $script02_attached = true;
    }   
   	if(isset($_FILES['user_script03'])) //check uploaded file
    {
        //get file details we need
        $script03_tmp_name    = $_FILES['user_script03']['tmp_name'];
        $script03_name        = $_FILES['user_script03']['name'];
        $script03_size        = $_FILES['user_script03']['size'];
        $script03_type        = $_FILES['user_script03']['type'];
        $script03_error       = $_FILES['user_script03']['error'];

        //exit script and output error if we encounter any
        if($script03_error>0)
        {
            $mymsg = array( 
            1=>"The uploaded file exceeds the upload_max_filesize directive in php.ini", 
            2=>"The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form", 
            3=>"The uploaded file was only partially uploaded", 
            4=>"No file was uploaded", 
            6=>"Missing a temporary folder" ); 
            
            $output = json_encode(array('type'=>'error', 'text' => $mymsg[$script03_error]));
            die($output); 
        }
        
        //read from the uploaded file & base64_encode content for the mail
        $handle = fopen($script03_tmp_name, "r");
        $content = fread($handle, $script03_size);
        fclose($handle);
        $script03_encoded_content = chunk_split(base64_encode($content));
        //now we know we have the file for attachment, set $file_attached to true
        $file_attached = true;
        $script03_attached = true;
    }   

/*    if($file_attached) //continue if we have the file
    {
        # Mail headers should work with most clients
        $headers = "MIME-Version: 1.0\r\n";
        $headers = "X-Mailer: PHP/" . phpversion()."\r\n";
        $headers .= "From: ".$from_email."\r\n";
        $headers .= "Subject: ".$subject."\r\n";
        $headers .= "Reply-To: ".$user_email."" . "\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=".md5('boundary1')."\r\n\r\n";
        
        $headers .= "--".md5('boundary1')."\r\n";
        $headers .= "Content-Type: multipart/alternative;  boundary=".md5('boundary2')."\r\n\r\n";
        
        $headers .= "--".md5('boundary2')."\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8\r\n\r\n";
        $headers .= $message_body."\r\n\r\n";
        
        $headers .= "--".md5('boundary2')."--\r\n";
    	

    	if($headshot_attached){
			$headers .= "--".md5('boundary1')."\r\n";
		    $headers .= "Content-Type:  ".$headS_type."; ";
		    $headers .= "name=\"".$headS_name."\"\r\n";
		    $headers .= "Content-Transfer-Encoding:base64\r\n";
		    $headers .= "Content-Disposition:attachment; ";
		    $headers .= "filename=\"".$headS_name."\"\r\n";
		    $headers .= "X-Attachment-Id:".rand(1000,9000)."\r\n\r\n";
		    $headers .= $headS_encoded_content."\r\n";
		    //$headers .= "--".md5('boundary1')."--";
    	}
    	if($recommendation_attached){
			$headers .= "--".md5('boundary1')."\r\n";   		
		    $headers .= "Content-Type:  ".$recA_type."; ";
		    $headers .= "name=\"".$recA_name."\"\r\n";
		    $headers .= "Content-Transfer-Encoding:base64\r\n";
		    $headers .= "Content-Disposition:attachment; ";
		    $headers .= "filename=\"".$recA_name."\"\r\n";
		    $headers .= "X-Attachment-Id:".rand(1000,9000)."\r\n\r\n";
		    $headers .= $recA_encoded_content."\r\n";
		    //$headers .= "--".md5('boundary1')."--";
    	}
    	if($script01_attached){
    		$headers .= "--".md5('boundary1')."\r\n";
		    $headers .= "Content-Type:  ".$script01_type."; ";
		    $headers .= "name=\"".$script01_name."\"\r\n";
		    $headers .= "Content-Transfer-Encoding:base64\r\n";
		    $headers .= "Content-Disposition:attachment; ";
		    $headers .= "filename=\"".$script01_name."\"\r\n";
		    $headers .= "X-Attachment-Id:".rand(1000,9000)."\r\n\r\n";
		    $headers .= $script01_encoded_content."\r\n";
		    //$headers .= "--".md5('boundary1')."--";
    	}
    	if($script02_attached){
    		$headers .= "--".md5('boundary1')."\r\n";
		    $headers .= "Content-Type:  ".$script02_type."; ";
		    $headers .= "name=\"".$script02_name."\"\r\n";
		    $headers .= "Content-Transfer-Encoding:base64\r\n";
		    $headers .= "Content-Disposition:attachment; ";
		    $headers .= "filename=\"".$script02_name."\"\r\n";
		    $headers .= "X-Attachment-Id:".rand(1000,9000)."\r\n\r\n";
		    $headers .= $script02_encoded_content."\r\n";
		    //$headers .= "--".md5('boundary1')."--";
    	}
    	if($script03_attached){
    		$headers .= "--".md5('boundary1')."\r\n";
		    $headers .= "Content-Type:  ".$script03_type."; ";
		    $headers .= "name=\"".$script03_name."\"\r\n";
		    $headers .= "Content-Transfer-Encoding:base64\r\n";
		    $headers .= "Content-Disposition:attachment; ";
		    $headers .= "filename=\"".$script03_name."\"\r\n";
		    $headers .= "X-Attachment-Id:".rand(1000,9000)."\r\n\r\n";
		    $headers .= $script03_encoded_content."\r\n";
		    //$headers .= "--".md5('boundary1')."--";
    	}
    	$headers .= "--".md5('boundary1')."--";
    }else{
        //proceed with PHP email.

    }*/

    $headers = 'From: '.$first_name.' '.$last_name.'' . "\r\n" .
    'Reply-To: '.$user_email.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
   
   	var_dump($headers, $to_email, $subject, $message_body, $attachments);
    $send_mail = wp_mail($to_email, $subject, $message_body, $headers, $attachments);


    if(!$send_mail)
    {
        //If mail couldn't be sent output error. Check your PHP email configuration (if it ever happens)
        $output = json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
        die($output);
    }else{
        $output = json_encode(array('type'=>'message', 'text' => 'Hi '.$first_name .' Thank you for your email'));
        die($output);
    }
}