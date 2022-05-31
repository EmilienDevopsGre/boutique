<?php

require 'my-functions.php';

require "header.php";
?>

<?php

global $db;
$productsSql = listProducts($db);
echo '<pre>';
var_dump($productsSql);
echo '</pre>';

?>


<?php require "footer.php"; ?>




