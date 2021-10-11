<div class="sidebar-overlay" onclick="halfmoon.toggleSidebar()"></div>
      <div class="sidebar">
        <div class="sidebar-menu">
            <h5 class="sidebar-title">Logged in as:</h5>
            <div class="sidebar-divider"></div>
            <a href="<?php echo $AreaInfo['area_url'];?>admin/myprofile.php" class="sidebar-link sidebar-link-with-icon">
              <span class="sidebar-icon bg-transparent text-dark rounded-circle">
                <!--<i class="fa fa-user-circle" aria-hidden="true"></i>-->
                <?php $Email = $AdminInfo['admin_email'];
                $Default = "https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Twemoji_1f600.svg/440px-Twemoji_1f600.svg.png";
                $Size = 30;
                $Grav_URL = "https://www.gravatar.com/avatar/".md5(strtolower(trim($Email)))."?d=".urlencode($Default)."&s=".$Size;
                ?>
                <img class="rounded-circle" src="<?php echo $Grav_URL ?? 'Hello';?>" height="30px" width="30px">
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
              All Clients
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