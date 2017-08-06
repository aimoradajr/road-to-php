<?php

echo $_FILES['fileToUp']['name'] . '<br/>';
echo $_FILES['fileToUp']['type'] . '<br/>';
echo $_FILES['fileToUp']['size'] . '<br/>';
echo $_FILES['fileToUp']['tmp_name'] . '<br/>';
echo $_FILES['fileToUp']['error'] . '<br/>';

$target_dir = 'uploads/';
$target_file = $target_dir . basename($_FILES['fileToUp']['name']);
$uploadOk = 1;


$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
echo $imageFileType . '<br/>';


if(isset($_POST['submit'])) {
    echo 'submit ya<br/>';
    $check = getimagesize($_FILES['fileToUp']['tmp_name']);
    echo 'check 0 ' . $check[0] . '.<br/>';
    echo 'check 1 ' . $check[1] . '.<br/>';
    echo 'check 2 ' . $check[2] . '.<br/>';
    echo 'check 3 ' . $check[3] . '.<br/>';
    echo 'check 4 ' . $check[4] . '.<br/>';
    echo 'check 5 ' . $check[5] . '.<br/>';
    echo 'check 6 ' . $check[6] . '.<br/>';

    if($check !== false)
    {
        echo 'FILE IS image. <br/>';
        $uploadOk = 1;
    }
    else
    {
        echo 'FILE IS NOT image. <br/>';
        $uploadOk = 0;
    }
}

?>