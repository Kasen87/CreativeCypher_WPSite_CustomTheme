<?php get_template_part('pieces/hero', 'generic'); ?>

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

            </div><!--End of BoilerPlate Div-->

            <div id="form-fields" class="centerMargins card hidden">
                <form id="target" action="">
                    <div class="default hidden">
                            <p>Date:<br/>
                            <input type="text" id="datepicker" name="date"></p>
                            <p>Your Name:<br/>
                            <input type="text" id="first-name" name="first-name" placeholder="First Name">
                            <input type="text" id="last-name" name="last-name" placeholder="Last Name"></p>
                            <p>E-mail:<br/>
                            <input type="email" id="e-mail" name="e-mail"placeholder="Your E-mail"></p>
                            <p>Company Name:<br/>
                            <input type="text" id="company-name" name="company-name" placeholder="Your Company"></p>
                            <p>Website:<br/>
                            <input type="text" id="website" name="website" placeholder="http://"></p>
                            <br/>
                    </div>

                    <div class="membership-form hidden">
                        <p>Headshot:<br/>
                        <input type="file" id="user-headshot" name="userPic" accept="image/*"></p>
                        <br/>
                        <p>Written Recommendation:<br/>
                        <input type="file" id="user-recommendation" name="userRec"></p>
                        <br/>
                    </div>

                    <div class="default hidden">
                        <p>Comments or Question:<br/>
                        <textarea rows="4" cols="50" name="comment-question" placeholder="Enter text here..."></textarea>
                        </p><br />
                        <input id="form-submit-btn" type="submit" value="Submit">
                    </div>

                </form>

            </div>

            <div id="startMem" class="centerMargins hidden">
                <h4 class="centerMargins card"><a href="#">start your application</a></h4>
            </div>

        </div><!--End of inner container-->
    </div>
</div>
