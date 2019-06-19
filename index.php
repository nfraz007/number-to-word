<?php
require_once("src/NumberToWord.php");

$numbers = [1028, 10002, 14500, 0002, 100000, -2, -12345, 123.12, 126.121, 100.001, 12.1234, "1.0.1"];
// $numbers = [100000];
foreach($numbers as $number){
    echo "<li>".$number." => ".NumberToWord::convert($number)."</li>";
}
?>