<?php
session_start();
if ($_REQUEST["forgetme"]==1){
    $_SESSION=[];
    session_commit();
}
// echo '<hr>';
if(!isset($_SESSION['myname']) && !isset($_REQUEST['myname'])){
?>
<form method='post'>
<tr><td> Enter your name:</td>
<td><input name='myname' type='text'><input type='submit' name='submit' value='Enter'>
</form>

<hr>
<?
}
//if the user has submiited, check if parameter
if(isset($_REQUEST['myname'])){
    $_SESSION['myname']=$_REQUEST['myname'];
    session_commit();
}
if(isset($_SESSION['myname'])){
    echo 'Hello '."<b>".$_SESSION['myname']."!"."<br>\n";
    echo "<a href='session.php?forgetme=1'>Forget name</a>";
    //urlencode
    //$searchurl = "https://www.google.com/search".urlendcode($name);
    //echo "<a href = '".$searchurl."'>search for [$name_html] in google </a>
    //session_commit():
}

?>