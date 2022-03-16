<?php
if(file_exists('../installation/install.php')){
    header('location: ../installation/');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta name="viewport" content="width=device-width" />

    <link rel="icon" href="../assets/image/fav.png">
    <title><?php echo $PageInfo['title'];?> - <?php echo $AreaInfo['area_name'];?> Admin</title>
    <?php echo $PageInfo['rel'];?>
    <link href="../assets/css/halfmoon.min.css" rel="stylesheet" />
    <link href="../assets/css/all.min.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <meta name="robots" content="noindex,nofollow">
  </head>
    <body class="with-custom-webkit-scrollbars with-custom-css-scrollbars" data-dm-shortcut-enabled="true" data-sidebar-shortcut-enabled="true" data-set-preferred-theme-onload="true">
