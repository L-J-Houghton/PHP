<?php // storing html content.
$SignOut = " 
<form method='post' action='user.php'>  <!-- // start of form , using post method to post data from within form.. -->
    <div id='Signout'><input type='submit' value='sign out' name='signOut' /></div> <!-- // signout submit button allowing user to sign out/ end session. -->
</form>"; // end of form
echo $SignOut; // echo html content.