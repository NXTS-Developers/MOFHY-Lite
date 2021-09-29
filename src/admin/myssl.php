<?php
$PageInfo = ['title'=>'My SSL','rel'=>''];
require_once __DIR__.'/includes/Connect.php';
require_once __DIR__.'/handler/AreaHandler.php';
require_once __DIR__.'/includes/Header.php';
require_once __DIR__.'/handler/SessionHandler.php';
require_once __DIR__.'/handler/SSLHandler.php';
require_once __DIR__.'/includes/Navbar.php';
require_once __DIR__.'/includes/Sidebar.php';
include __DIR__.'/template/MySSL.php';
require_once __DIR__.'/includes/Footer.php';
?>