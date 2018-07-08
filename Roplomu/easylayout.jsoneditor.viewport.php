<?php

$easylayout_editor = true;
include('./easylayout.compiler.php');

$string = $_COOKIE["CodeNowEditing"];
//$string = file_get_contents("./easylayout.jsoneditor.tempjsoncode.json");
$string = str_replace("\\", "", $string);
echo easylayout( $string);

?>