  <!DOCTYPE html>
<html>
<head>
   <title></title>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   </head>
   <body>
<?php
if(!isset($_REQUEST['submit'])){
    echo "Error: Please fill form";
?>
<form method = 'post'>
    <td>Family History of Prostate Cancer:</td></br>
    <br>
    <td><input name = 'history' type='checkbox'>I have family history.
    <br>
    <td>What percentage of your ethnicity is european? (please enter a number from 0 to 100): </td></br>
    <br>
    <td><input name = 'EU' type = 'text'></td></br>
    <br>
    <td>How many AR_GGC reapeats? </td></br>
    <br>
    <td><input name = 'AR_GGC' type = 'text'></td></br>
    <br>
    <td>What type of CYP3A4/CYP3A5 haplotype do you have? </br>
    <td><select name = 'Htype'>
    <option value = 'AA'>AA</option>
    <option value = 'GA'>GA</option>
    <option value = 'AG'>AG</option>
    <option value = 'GG'>GG</option>
    <td><input type = 'submit' name = 'submit' value ='Submit'>
</form>
<?php
}
if(isset($_REQUEST['submit'])){
    if ($_REQUEST['history']=='on'){
    $_REQUEST['history']=1;
    }else{
    $_REQUEST['history']=0;

}
//read file

$PYEXE = 'C:\ProgramData\Anaconda3\python.exe';

    // $_PYEXE='python';
if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'){
    if(file_exists($try='C:\ProgramData\Anaconda3\python.exe')) $_PYEXE=$try;
}
//$PYEXEpath = "C:\\ProgramData\\Anaconda3\\python.exe";
//$prostaterisk_script = "C:\\Users\\Fernando A. Ramirez\\Dropbox\\bmes550.fernandoramirezfar33\\web\\prostaterisk.py";
    $filepath = "C:\Users\Fernando A. Ramirez\Dropbox\bmes550.fernandoramirezfar33\web";

// $cmd = exec("\"$PYEXEpath\" prostaterisk.py $filepath" .escapeshellarg($_REQUEST["history"])." "

    $cmd="\"$PYEXE\" prostaterisk.py 2>&1" .escapeshellarg($_REQUEST['history']).""
    .escapeshellarg($_REQUEST['europe'])."".escapeshellarg($_REQUEST['ar_ggc']).""
    .escapeshellarg($_REQUEST['haplotype']);

    echo"Running command: $cmd";


    exec($cmd,$out);
    $out = implode("\n",$out);

    echo "<pre> Your risk of cancer is: <b>".print_r($out)."%";
    //echo "<pre> Your risk of cancer is: <b>".$lines[0].htmlspecialchars($out);
// echo htmlspecialchars($out);
    echo"</pre>";


}
?>

</body>
</html>
