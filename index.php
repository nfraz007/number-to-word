<?php
require_once("src/NumberToWords.php");

try{
    echo NumberToWords::convert(1028);
}catch(Exception $e){
    echo $e->getMessage();
}
?>