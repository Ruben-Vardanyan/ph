<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        p{
            margin: 0;
        }
    </style>
</head>
<body>
    <?php 
         $today = new DateTime();
         echo "Today is the " . $today->format("jS") . " of " . $today->format("F") . ", " . $today->format("l");
        echo $today->format("Y/m/d");
        if(isset($_POST['fname']) &&
        isset($_POST['lname']) &&
        isset($_POST['bday']) &&
        isset($_POST['languages'])
        ){

            echo $_POST['fname'] . "<br>";
            echo $_POST['lname'] . "<br>";
           
            $bday = new DateTime($_POST['bday']);
            $today = new DateTime();
            $age = $today->diff($bday);

            echo $age->y . "<br>";

            
            echo implode(" ",$_POST['languages']) . "<br><hr>";
        }

        
    ?>

    <form action="" method="post">
        <p>name</p>
        <input type="text" name="fname">
        <p>surname</p>
        <input type="text" name="lname">
        <p>birthday</p>
        <input type="date" name="bday" >
        <p>languages</p>
        <select name="languages[]" id="" multiple>
            <option value="English">English</option>
            <option value="Russian">Russian</option>
            <option value="Armenian">Armenian</option>
        </select>
        <input type="submit" value="start">
    </form>

    
</body>
</html>