<div class="page-header">            
<div class="leftside-header">
    <div class="logo">
        <a href="index.php" class="on-click">
            <img alt="logo" src="<?=BASEURL?>uploads/images/logo.png" style="width: 49%;height: 100%;margin: 0px 0px 0px 10px;"/>
        </a>
    </div>
    <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
    </div>
</div>
<div class="rightside-header">
    <div class="header-middle"></div>
    <div class="header-section hidden-xs" id="notice-headerbox"> 
    </div>    
    <div class="header-section" id="user-headerbox">
        <div class="user-header-wrap">
            <div class="user-photo">                
                <img alt="profile photo" src="<?=BASEURL?>assets/images/user.png" />
            </div>
            <div class="user-info">
                <span class="user-name">Master Admin</span>
                <span class="user-profile">Master</span>
            </div>           
        </div>        
    </div>
    <div class="header-separator"></div>
    <div class="header-section">
        <a href="<?=BASEURL?>index.php" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
    </div>    
</div>
</div>
<div class="page-body">        
<div class="left-sidebar">
    <!-- left sidebar HEADER -->
    <div class="left-sidebar-header">
        <div class="left-sidebar-title"></div>
        <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
            <span></span>
        </div>
    </div>
    <!-- NAVIGATION -->    
    <div id="left-nav" class="nano">
        <div class="nano-content">
            <nav>
                <ul class="nav nav-left-lines" id="main-nav">  
                    <li class="active-item"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span>Menu 1</span></a></li>
                    <li class=" has-child-item close-item">
                        <a>
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>Menu 2</span>
                        </a>

                        <ul class="nav child-nav level-1">
                        <li class="active-item"> <a href="index.php">Submenu 1</a> </li>                        
                        <li class=""> <a href="index.php">Submenu 2</a> </li>                        
                        <li class=""> <a href="index.php">Submenu 3</a> </li>                        
                        </ul>
                    </li>
                    <li class=" has-child-item close-item">
                        <a>
                            <i class="fa fa-flag" aria-hidden="true"></i>
                            <span>Menu 3</span>
                        </a>

                        <ul class="nav child-nav level-1">
                        <li class="active-item"> <a href="index.php">Submenu 1</a> </li>                        
                        <li class=""> <a href="index.php">Submenu 2</a> </li>                        
                        <li class=""> <a href="index.php">Submenu 3</a> </li>                        
                        </ul>
                    </li>                    
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
</div>