<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Pradeepa.Seneviratna
 * Date: 4/3/13
 * Time: 9:27 AM
 *
 * List client specific information including IP address and browser cookies
 */
/*
 * Define variable to store IP address and browser cookies
 * */

$ipAddress = NULL; //store IP address of the client
$browserCookies = array(); //store all browser cookies as an array
$clearSuccessMessage = FALSE; //store browser cookie clear success message
$hostName=$_SERVER['SERVER_NAME'];//store host name
/*
 * Get client IP address
 * */
$ipAddress = $_SERVER['REMOTE_ADDR'];

/*
 * Get List of Browser cookies for given session
 * */
$browserCookies = $_COOKIE;

/*
 * Handle delete browser cookie request
 * */
if (isset($_POST['deleteCookieYes'])) :
    if (count($_COOKIE) > 0):
        foreach ($_COOKIE as $key => $value):
            //iterate and unset cookies
            setcookie($key, "", time() - 3600, '/', '.'.$hostName);
        endforeach;
        $clearSuccessMessage = TRUE;
        $browserCookies = NULL;
    endif;
endif;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>GEO IP DEBUG TOOL</title>
    <link type="text/css" rel="stylesheet" href="css/debug.css" media="all"/>
</head>
<body>
<div id="debugcontainer">
    <h3 id="ipaddress">Your IP Address : <?php print $ipAddress;?></h3>

    <h3 id="cookies">List of browser cookies : </h3>
    <?php
    if (count($browserCookies) > 0):
        //if there are browser cookies
        ?>
        <ul>
            <?php
            foreach ($browserCookies as $key => $value):
                //iterate through list of browser cookies
                ?>
                <li><?php print $key . " -> " . $value;?></li>
            <?php
            endforeach;
            ?>
        </ul>
        <!--Delete Browser Cookies-->
        <div id="deleteCookies">
            <a href="javascript:void(0);" id="deleteCookieButton">Clear all browser cookies</a>
        </div>
        <div id="deleteCookiesConfirm">
            <div class="columns">
                <div class="one">Are you sure you want to delete?</div>
                <div class="two">
                    <form name="form_deleteCookiesConfirm" method="post">
                        <input type="submit" name="deleteCookieYes" id="deleteCookieYes" value="Yes" class="yesButton">
                    </form>
                </div>
                <div class="three"><input type="button" name="deleteCookieNo" id="deleteCookieNo" value="No"
                                          class="noButton"></div>
            </div>
            <div class="clear"></div>
        </div>
        <!--End of Delete Browser Cookies-->
    <?php else:
        ?>
        <p>There are no stored browser cookies.</p>
        <?php
        if ($clearSuccessMessage === TRUE):
            //if user has successfully clear browser cookies
            ?>
            <p class="success">You have successfully cleaned out your browser cookies.</p>
        <?php
        endif;
        ?>
    <?php
    endif;
    ?>
    <!--Check  download speed-->
    <h3 id="downloadspeed">Download Speed</h3>
    <a href="javascript:void(0);" id="downloadSpeed">Click here to start download speed test</a>

    <div id="loadingSpeedCheck"><img src="images/speed.gif"></div>
    <div id="downloadProgress"></div>
    <!--Check download speed-->
</div>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/debug.js"></script>
<script type="text/javascript" src="js/download_speed.js"></script>
</body>
</html>