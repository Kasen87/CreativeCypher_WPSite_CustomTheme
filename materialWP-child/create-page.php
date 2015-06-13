<?php get_template_part('pieces/hero', 'generic'); ?>

<!--This section is specifically for overlay features-->  

<div class="overlay-bg">
</div>

<div class="overlay-content popup-terms">
    <p>Oh My! This is a popup!</p>
    <button class="close-btn">Close</button>
</div>

<div class="overlay-content popup-scriptTips">
    <h2>tips for script submissions</h2>
    <hr/>
    <ul>
        <li>Is your content shot in HD?</li>
        <li>Do you have a global reach?</li>
        <li>Does your show and or each episode have a synopsis or logline?</li>
        <li>Does your content have attractive cover art or thumbnails?</li>
        <li>Does your audio have clarity?<em>  (Content with great and bad audio is not a great video.)</em></li>
        <li>Shareability<em>  (Will viewers your share?)</em></li>
        <li>Conversation<em>  (Is there an element of speaking directly to the audience?)</em></li>
        <li>Interactivity<em>  ((Is the audience involved in the concept?)</em></li>
        <li>Consistency<em>  (Are there strong recurring elements?)</em></li>
        <li>Targeting<em>  (Is there a clearly defined audience?)</em></li>
        <li>Sustainability<em>  (Can you make more of it?)</em></li>
        <li>Discoverability<em>  (Will the content get found via search or related videos?)</em></li>
        <li>Accessibility<em>  (Can every episode by discovered by someone new?)</em></li>
        <li>Collaboration<em>  (Is there opportunity to feature other content creators for cross promotion?)</em></li>
        <li>Inspiration<em>  (Is this a genuine inspiration?)</em></li>
        <li>Does your overall brand have other links or social media pages?<em>(Website, Facebook, Twitter, Instagram, Vimeo, Vine, or Vessel)</em></li>
        <li>Alternative ways to advertise on youtube?<em>(Ad sense, Affiliate Product links, Product placement and Lead Gen-bridge to website)</em></li>
    </ul>

    <button class="close-btn">Close</button>
</div>

<!--End of overlay section-->
<div class="outerContentCont">
    <div class="card">
        <div class="paddingTop25 centerText">
            <h1>contact the creative cypher</h1>
        </div>




      
        <div class="innerContainer">
            <div id="submitNavCont" class="centerMargins">
            <ul id="submitNav">
                <li class="card"><a href="#"><h3>membership</h3></a></li>
                <li class="card"><a href="#"><h3>submit script</h3></a></li>
                <li class="card"><a href="#"><h3>advertise</h3></a></li>
                <li class="card"><a href="#"><h3>post job</h3></a></li>
            </ul>
            <div class="clearBoth"></div>
            </div> <!-- end of submit navigation -->

            <div id="boilerPlate" class="centerMargins">
                <div class="membership card hidden">
                    <h2>member invitation</h2>
                    <hr />
                    <h3>requirements</h3>
                    <ul>
                        <li>Upload your written recommendation from an industry professional</li>
                        <li>A clear and recent headshot must be included.</li>
                        <li>Offer trade discounts to fellow Creative Cypher Members.</li>
                        <li>Minimum of three years experience in the industry or a related field.</li>
                        <li>Willingness to contribute up to 10 hours a month on Creative Cypher related activities:<br>
                            <em>(Productions, events, worokshops, youth shadowing, and community service)</em></li>
                    </ul>
                    <hr />
                    <h3>all applications are reviewed by the creative cypher membership committee</h3>
                    <h4 class="padTopBotBy10">all information will be treated in confidence</h4>
                </div>

                <div class="submit-script card hidden">
                    <h2>submit a script</h2>
                    <hr />
                    <h3>before you submit</h3>
                    <p>The Creative Cypher is always on the move and our Development Team reviews new show concepts on a weekly basis. We take your submission and intellectual property very seriously and why we only review concepts that have been submitted through this online submissions process.
                    <br/><br />We encourage you to register your concept with the <a href="http://www.wgawregistry.org" alt="Writers Guild of America Website" target="_blank">Writers Guild of America West Registry</a>.</p>
                    <hr/>
                    <h3>requirements</h3>
                    
                        <p>The Creative Cypher must always be accredited for development of the project via our logo and a "In Association with" credit</p>
                        <!--<li>Project must be SAG-AFTRA</li>-->
                    
                    <hr />
                    <h3>also, consider these <a class="show-popup" href="#" data-showpopup="scriptTips">tips</a> when creating content for new media.</h3>
                    <h4 class="padTopBotBy10">all information will be treated in confidence</h4>
                </div>

            </div><!--End of BoilerPlate Div-->


            <div id="form-fields" class="centerMargins card hidden">
                <form id="target"  method="post" action="contactCypher.php" enctype="multipart/form-data">
                    <div id="contact_results"></div>
                    <div class="default hidden">
                            <h3>basic information</h3>
                            <hr />
                            <p>Date:<span class="required">*</span><br/>
                            <input type="text" id="datepicker" name="date" required="true"></p>
                            <p>Your Name:<span class="required">*</span><br/>
                            <input type="text" id="first_name" name="first_name" placeholder="First Name" required="true"> 
                            <input type="text" id="last_name" name="last_name" placeholder="Last Name" required="true"></p>
                            <p>E-mail:<span class="required">*</span><br/>
                            <input type="email" id="e_mail" name="e_mail"placeholder="Your E-mail" required="true"></p>
                            <p>Company Name:<span class="required">*</span><br/>
                            <input type="text" id="company_name" name="company_name" placeholder="Your Company" required="true"></p>
                            <p>Website:<span class="required">*</span><br/>
                            <input type="text" id="website" name="website" placeholder="http://" required="true"></p>
                            <br/>
                    </div>

                    <div class="membership-form hidden">
                        <p>Headshot:<span class="required">*</span><br/>
                        <input type="file" id="user_headshot" name="userPic" accept="image/*" disabled required="true"></p>
                        <br/>
                        <p>Written Recommendation:<span class="required">*</span><br/>
                        <input type="file" id="user_recommendation" name="userRec" disabled required="true"></p>
                        <br/>
                    </div>

                    <div class="submit-script-form hidden">
                        <h3>about the project</h3>
                        <hr />
                        <p>Project Title:<span class="required">*</span><br/>
                        <input type="text" id="user_script_title" name="userTitle" disabled required="true"></p>
                        <br/>          
                        <p>Logline:<span class="required">*</span><br/>
                        <input type="text" id="user_script_logline" name="userLogline" disabled required="true"></p>
                        <br/>    
                        <p>Synopsis:<span class="required">*</span><br/>
                        <textarea rows="4" cols="50" name="userSynopsis" placeholder="Enter synopsis here..." disabled required="true"></textarea> 
                        <br/>
                        <p>Medium:<span class="required">*</span><br/>
                        <input type="text" id="user_script_medium" name="userMedium" disabled required="true"></p>
                        <br/>    
                        <p>Upload a File:<span class="required">*</span><br/>
                        <input type="file" id="user_script01" name="userScript01" disabled required="true"></p>
                        <br/>
                        <p>Upload a File:<br/>
                        <input type="file" id="user_script02" name="userScript02" disabled></p>
                        <br/>
                        <p>Upload a File:<br/>
                        <input type="file" id="user_script03" name="userScript03" disabled></p>
                        <br/>
                    </div>

                    <div class="default hidden">
                        <p>Comments or Question:<br/>
                        <textarea rows="4" cols="50" name="comment_question" placeholder="Enter text here..."></textarea>
                        </p>
                        <label class="hidden"><input type="checkbox" id="acceptTerms" name="accept_Terms" disabled  required="true">I accept the<a class="show-popup" id="termsAndCond" href="#" data-showpopup="terms"> terms and conditions.</a></label>
                        <br/><br/>
                        <input id="form-submit-btn" type="submit" value="Submit" />
                    </div>

                </form>

            </div>

            <div id="startApp" class="centerMargins hidden">
                <h4 class="centerMargins card"><a href="#">start your submission</a></h4>
            </div>

        </div><!--End of inner container-->
    </div>
</div>
