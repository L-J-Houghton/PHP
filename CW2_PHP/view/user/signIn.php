<?php	// signIn used to store html content.
$signIn = " 
		<div id='background'> // start of background container.
			<div id='back_0'><img src='images/back_0.png'></div><!-- // background / UI -->
			<div id='back_1'><img src='images/back_1.png'></div><!-- // navbar // UI -->
			<div id='logo'><img src='images/logo.png'></div><!-- // goldbuy logo// UI -->
			<div id='loginpanel'><img src='images/loginpanel.png'></div><!-- logipanel // UI -->
			<form method='post' action='user.php'> <!-- // start of form using post method to post data -->
				<div id='username'><input type='email' name='email' required /></div><!-- // adding a username (text) input allowing user to enter data via form. -->
				<div id='password'><input type='password' name='password' required /></div><!-- // adding a password input allowing user to enter data via form. -->
				<div id='Signin'><input type='submit' value='Sign in' name='signIn' /></div><-- // adding submit button allowing user to post data via form. -->
			</form> <!-- // end form -->
		</div>"; // end div
echo $signIn; // echoing html content.