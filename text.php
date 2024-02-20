<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $result = "";
        $value = "";

        if(isset($_POST['val'])){
            $value = $_POST['val'];
            // $result = str_word_count($value);
            // $result = substr($value,3,2);
            $result = substr_count($value, "aaa");

        }
    ?>
    <form action="" method="post">
        
        <input type="text" name="val" value="<?=$value; ?>">
        <input type="text" value="<?=$result; ?>">
        <input type="submit" value="start">
    </form>
</body>
</html>