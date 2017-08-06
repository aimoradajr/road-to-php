<?php

    // SESSION TIME
    session_start();
    $_SESSION['favnumber'] = 9;
    print_r($_SESSION);
    echo '<br/>';
    echo 'SESSION favnumber:' . $_SESSION['favnumber'] . '<br/>';
?>
<a href="sessionista.php">try session</a>

<p>------------------------ajax------------------------------------------------------------</p>

<form>
    <input type="text" onkeyup="showHint(this.value)"></input>
</form>

<div>
    <span id="hintBox"></span>
</div>

<script>
    function showHint(str){
        // send ajax request
        if(str.length == 0)
        {
            document.getElementById('hintBox').innerHTML = '';
            return;
        }
        else
        {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if(this.readyState==4 && this.status == 200)
                {
                    document.getElementById('hintBox').innerHTML = this.response;
                }
                else{
                    console.log('ajax request failed boi.');
                }
            }
            xmlhttp.open('GET','ajaxanahi.php?q='+str,true);
            xmlhttp.send();
        }
    }
</script>

<p>------------------------ajax------------------------------------------------------------</p>

<?php
    echo '----------------------------------------------------------------------------------------<br/>';
    // MYSQL CONNECT
    $servername = 'localhost';
    $username = 'temptemp';
    $password = 'temptemp';
    $dbname = 'dota';

    $conn = new mysqli($servername, $username, $password,$dbname);

    if($conn->connect_error)
        die('MySQL connection failedddddddddddddddd: ' . $conn->connect_error);

    echo 'SQL KONEK!!!<br/>';

    $query = 'SELECT * from heroes';
    $result = $conn->query($query);

    if($result->num_rows>0)
    {
        echo 'selected baybe!<br/>';
        while($row = $result->fetch_assoc())
        {
            echo 'id: ' . $row['id'] . ' name: ' . $row['name'] . ' strength: ' . $row['strength'] . '<br/>';
        }
    }
    else
        echo 'failed to select heroes<br/> error: ' . $conn->error . '<br/>';
    
    
    echo '----------------------------------------------------------------------------------------<br/>';
?>

<?php
    // COOKIE TIME
    $cook_name = 'user';
    $cook_value = 'aaaaaaa';
    setcookie($cook_name,$cook_value,time() + (86400 * 2), '/');

    if(!isset($_COOKIE[$cook_name]))
        echo 'COOKIE IS NOT HERE!!! <br/>';
    else
        echo 'COOKIE IS HEREEEEE!!!! user:' . $_COOKIE['user'] . '<br/>';

    if (count($_COOKIE) < 1)
        echo 'COOKIE IS NOT ENABLED WTH <br/>';
?>

<html>
    <head>
        <title>Dotinator</title>
    </head>
    <body>

<?php
    include('includame.php');
    
    include('yow.php');
    echo 'chilllll! practice warning lang to ng include bes<br/>';

    define('constantchange','anoba?!',true);

    echo 'hoy ipagpatuloy mo to bukas boi<br/>';

    $varvar = 'im the varvar';

    echo 'who is the varvar? ' . $varvar . '<br/>';

    echo 'constant change is = ' . constantchange . '<br/>';

    $mear = array('ako', 'si', 'superman','baboy');
    sort($mear);

    foreach( $mear as $meme) {
        echo $meme . ' - ';
    }

    

    echo 'date is ' . date('Y - m - d') . '<br/>';

    echo 'readfile: -- ' . readfile('temp.txt') . ' --<br/>';

    //$mefile = fopen('temp.txt','a') or die('Cant fight this feeling anymore');
    //fwrite($mefile,'dinagdag ko to.');
    //fclose($mefile);


    
?>




    <form method="post" action="forma.php">
        Name: <input type="text" name="name"/>
        <button type="submit">Gorabels</button>
    </form>


    <form method="post" action="uploadame.php" enctype="multipart/form-data">
        <input type="file" name="fileToUp" id="fileToUp"/>
        <input type="submit" value="uploadinahinaboi" name="submit">
    </form>

    </body>
</html>


<table>
    <tr>
        <td>Filter Name</td>
        <td>Filter ID</td>
    </tr>

<?php
    // filters naman
    echo 'filterssssssssssssss<br/>';
    foreach (filter_list() as $id =>$filter) {
        echo '<tr><td>' . $filter . '</td><td>' . filter_id($filter) . '</td></tr>';
    }

    $mestr = '<h1>YOW WAZZUP</h1>';
    echo 'unsanitized:'.$mestr;
    $mestr = filter_var($mestr,FILTER_SANITIZE_STRING);
    echo 'sanitized:'.$mestr.'<br/>';


    // try catch exception
    try {
        throw new Exception('U R D ONLY EXCEPTION');
    }
    catch(Exception $e)
    {
        echo 'UY NACATCH ITONG EXCEPTION!!!: ' . $e->getMessage() . '<br/>';
    }
?>

<?php
    // error handling custom

    function mecustomerrorhandler($erno,$erstr)
    {
        echo 'CUSTOM ERRNO: ' . $erno . ' ' . $erstr . '<br/>';
    }

    set_error_handler('mecustomerrorhandler');

    echo $imnotavalidvar;

    trigger_error('TRIGGERED!!!!!!!!');
?>



</table>