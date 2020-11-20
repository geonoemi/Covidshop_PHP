<?php
session_start();
//azért kétszer is elpusztítotm, biztos ami biztos :)
session_destroy();
$_SESSION= [];

// ../index.php vagy ../views/home.php fájlokat nem látja
//csak olyan jó neki ahol az urlbe már át lett adva valamilyen controller
header('Location: index.php?c=login');