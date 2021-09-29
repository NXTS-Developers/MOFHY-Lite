<?php
$PageInfo = ['title'=>'Suspended Account','rel'=>''];
require_once __DIR__.'/includes/Connect.php';
require_once __DIR__.'/handler/AreaHandler.php';
require_once __DIR__.'/includes/Header.php';
require_once __DIR__.'/handler/CookieHandler.php';
include __DIR__.'/template/Suspended.php';
require_once __DIR__.'/includes/Footer.php';
?>