<div class="sidebar-overlay" onclick="halfmoon.toggleSidebar()"></div>
      <div class="sidebar">
        <div class="sidebar-menu">
            <h5 class="sidebar-title">Logged in as:</h5>
            <div class="sidebar-divider"></div>
            <a href="<?php echo $AreaInfo['area_url'];?>admin/myprofile.php" class="sidebar-link sidebar-link-with-icon">
              <span class="sidebar-icon bg-transparent text-dark rounded-circle">
                <?php $Email = $AdminInfo['admin_email'];
                $Default = "https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Twemoji_1f600.svg/440px-Twemoji_1f600.svg.png";
                $Size = 30;
                $Grav_URL = "https://www.gravatar.com/avatar/".md5(strtolower(trim($Email)))."?d=".urlencode($Default)."&s=".$Size;
                $ch1 = curl_init($Grav_URL);
                curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                curl_exec($ch1);
                $HttpCode1 = curl_getinfo($ch1, CURLINFO_HTTP_CODE);
                curl_close($ch1);
                $ch2 = curl_init($Default);
                curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
                curl_exec($ch2);
                $HttpCode2 = curl_getinfo($ch2, CURLINFO_HTTP_CODE);
                curl_close($ch2);
                if($HttpCode1 !== 200){
                  echo '<img class="rounded-circle" src="../assets/image/default.png" height="30px" width="30px">';
                }
                elseif($HttpCode2 !== 200){
                  echo '<img class="rounded-circle" src="../assets/image/default.png" height="30px" width="30px">';
                }
                else{
                  echo '<img class="rounded-circle" src="'.$Grav_URL.'" height="30px" width="30px">';
                }
                ?>
              </span>
              <?php echo $AdminInfo['admin_fname']." ".$AdminInfo['admin_lname'];?>
            </a>

            <h5 class="sidebar-title">Main Menu</h5>
            <div class="sidebar-divider"></div>
            <a href="<?php echo $AreaInfo['area_url'];?>admin/index.php" class="sidebar-link sidebar-link-with-icon">
              <span class="sidebar-icon bg-transparent">
                <i class="fa fa-home" aria-hidden="true"></i>
              </span>
              Home
            </a>
            <a href="<?php echo $AreaInfo['area_url'];?>admin/myclients.php" class="sidebar-link sidebar-link-with-icon">
              <span class="sidebar-icon bg-transparent">
                <i class="fa fa-users" aria-hidden="true"></i>
              </span>
              My Clients
            </a>
            <a href="<?php echo $AreaInfo['area_url'];?>admin/myssl.php" class="sidebar-link sidebar-link-with-icon">
              <span class="sidebar-icon bg-transparent">
                <i class="fa fa-shield-alt" aria-hidden="true"></i>
              </span>
              SSL Certificates
            </a>
            <a href="<?php echo $AreaInfo['area_url'];?>admin/myaccounts.php" class="sidebar-link sidebar-link-with-icon">
              <span class="sidebar-icon bg-transparent">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              </span>
              MOFH Accounts
            </a>
            <a href="<?php echo $AreaInfo['area_url'];?>admin/knowledgebase.php" class="sidebar-link sidebar-link-with-icon">
              <span class="sidebar-icon bg-transparent">
                <i class="fa fa-book" aria-hidden="true"></i>
              </span>
              Knowledgebase
            </a>
            <a href="<?php echo $AreaInfo['area_url'];?>admin/mytickets.php" class="sidebar-link sidebar-link-with-icon">
              <span class="sidebar-icon bg-transparent">
                <i class="fa fa-bullhorn" aria-hidden="true"></i>
              </span>
              Support Tickets
            </a>
            <a href="<?php echo $AreaInfo['area_url'];?>admin/apisettings.php" class="sidebar-link sidebar-link-with-icon">
              <span class="sidebar-icon bg-transparent">
                <i class="fa fa-tools" aria-hidden="true"></i>
              </span>
              API Settings
            </a>
            <a href="<?php echo $AreaInfo['area_url'];?>admin/extensions.php" class="sidebar-link sidebar-link-with-icon">
              <span class="sidebar-icon bg-transparent">
                <i class="fa fa-plug" aria-hidden="true"></i>
              </span>
              Extensions
            </a>
            <a href="<?php echo $AreaInfo['area_url'];?>admin/mysettings.php" class="sidebar-link sidebar-link-with-icon">
              <span class="sidebar-icon bg-transparent">
                <i class="fa fa-cog" aria-hidden="true"></i>
              </span>
              Settings
            </a>
            <a href="<?php echo $AreaInfo['area_url'];?>admin/logout.php" class="sidebar-link sidebar-link-with-icon">
              <span class="sidebar-icon bg-transparent">
                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
              </span>
              Logout
            </a>
            <br />
        </div>
      </div>
      <div class="content-wrapper">