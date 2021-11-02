<?php
$sql = mysqli_query($connect, "UPDATE `hosting_account` SET `account_sql` = '".$_POST['status']."' WHERE `account_username` = '".$_POST['username']."'");