<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php 
    $value = "";
    $result = "";
    session_start();
    $_SESSION['d'];
    if(isset($_POST['val'])){
        $value = $_POST['val'];
        $_SESSION['d'][] = $value;
        $result = implode("",$_SESSION['d']);
        print_r($_SESSION['d']);
    }
?>
<body>
    <form action="" method="post">
        <input type="text" name="val" id="" value="<?=$value; ?>">
        <br>
        <input type="text" readonly value="<?=$result; ?>">
        <br>
        <input type="submit" value="run">
    </form>
    
</body>
</html>