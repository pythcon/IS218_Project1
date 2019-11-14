<?php
function redirect($targetfile, $delay){

    header("refresh: $delay, url = $targetfile");

    exit();
}
?>