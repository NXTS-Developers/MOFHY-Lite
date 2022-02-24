	<div class="page-wrapper with-navbar with-sidebar" data-sidebar-type="overlayed-sm-and-down">
      <nav class="navbar">
        <div class="container-fluid">
        	<a href="<?php echo $AreaInfo['area_url'];?>index.php" class="navbar-brand"><?php echo $AreaInfo['area_name'];?></a>
        	<ul class="navbar-nav ml-auto">
		    <li class="nav-item nav-height">
		      <button class="btn btn-sm my-auto" role="button" onclick="halfmoon.toggleDarkMode()"><i class="fas fa-paint-roller"></i></button>
            	    </li>
		    <li class="nav-item nav-height dropdown with-arrow">
		      <a class="btn btn-sm m5x" data-toggle="dropdown" id="nav-link-dropdown-toggle">
		        <i class="fa fa-user"></i>
		      </a>
		      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="nav-link-dropdown-toggle">
		        <a href="<?php echo $AreaInfo['area_url'];?>myprofile.php" class="dropdown-item">Profile</a>
		        <a href="<?php echo $AreaInfo['area_url'];?>mysettings.php" class="dropdown-item">Settings</a>
		        <a href="<?php echo $AreaInfo['area_url'];?>logout.php" class="dropdown-item">Logout</a>
		      </div>
		    </li>
		    <li class="nav-item nav-height hidden-on-up">
		      <button class="btn btn-sm my-auto" onclick="halfmoon.toggleSidebar()"><i class="fa fa-bars"></i></button>
		    </li>
        </div>
      </nav>
