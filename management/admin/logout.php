<?php

session_start();

if(session_destroy())

{

include_once("index.php");
}

?>