<?php 
    function xmlTojson($xmlstring){
        $xmlObject = @simplexml_load_string($xmlstring);

        return ($xmlObject == false) ? false : json_decode(json_encode($xmlObject));
    }

    if(isset($_POST['submit'])){
        $xmlstring = $_POST['xml'];

        $jsonObject = xmlTojson($xmlstring);

        $errormassage = ($jsonObject == false) ? 'Salah format' : '<pre>' . json_encode($jsonObject, JSON_PRETTY_PRINT) . '</pre>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XML To Json</title>
</head>
<body>
    <h1>XML2JSON</h1>
    <form action="" method="post">  
        <textarea name="xml" id="" cols="30" rows="10"></textarea>
        <input type="submit" name="submit" value="Convert">
    </form>
    <?php
    echo $errormassage ?? $result ?? '';
    ?>

</body>
</html>