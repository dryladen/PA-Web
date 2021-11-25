<?php
require("../../config.php");

?>

<?php
if (isset($_GET)) {
    $year = $_GET["year"];
    $season = $_GET["season"];
    $json_data = file_get_contents("https://api.jikan.moe/v3/season/$year/$season");
    $response_data = json_decode($json_data);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seasonal</title>
</head>
<body>
    
</body>
</html>