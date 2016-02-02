<?php
if(isset($_SESSION['iduser'])){
    
    require_once("Class/clsMain.php");
    $clsMain = new clsMain($_SESSION['db']);
    $clname = $clsMain->getCampaignLeader_ByUserID();
    echo ""
    . "        <div class='navbar navbar-default navbar-fixed-top move-me'>\n"
    . "            <div class='container'>\n"
    . "                <div class='navbar-header'>\n"
    . "                    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>\n"
    . "                        <span class='icon-bar'></span>\n"
    . "                        <span class='icon-bar'></span>\n"
    . "                        <span class='icon-bar'></span>\n"
    . "                    </button>\n"
    . "                    <a class='navbar-brand' href='index.php'>\n"
    . "                        <img src='assets/img/logo.png' class='navbar-brand-logo' alt='' />\n"
    . "                    </a>\n"
    . "                </div>\n"
    . "                <div class='navbar-collapse collapse move-me'>\n"
    . "                    <ul class='nav navbar-nav navbar-right'>\n"
    . "                        <li><a href='index.php'><span><i class='glyphicon glyphicon-home' ></i> HOME</span></a></li>\n"
    . "                        <li class='dropdown'>\n"
    . "                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span><i class='glyphicon glyphicon-user' ></i> $clname </span><span class='caret'></span></a>\n"
    . "                            <ul class='dropdown-menu'>\n"
    . "                              <li><a href='users.php'><span><i class='glyphicon glyphicon-cog' ></i> My Account</span></a></li>\n"
    . "                              <li role='separator' class='divider'></li>\n"
    . "                              <li><a href='class/clsLogout.php'><span><i class='glyphicon glyphicon-log-out' ></i> Logout</span></a></li>\n"
    . "                            </ul>\n"
    . "                        </li>\n"
    . "                    </ul>\n"
    . "                </div>\n"
    . "            </div>\n"
    . "        </div>\n";    
}
else{
    echo ""
    . "<div class='navbar navbar-default navbar-fixed-top move-me'>\n"
    . "            <div class='container'>\n"
    . "                <div class='navbar-header'>\n"
    . "                    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>\n"
    . "                        <span class='icon-bar'></span>\n"
    . "                        <span class='icon-bar'></span>\n"
    . "                        <span class='icon-bar'></span>\n"
    . "                    </button>\n"
    . "                    <a class='navbar-brand' href='index.php'>\n"
    . "                        <img src='assets/img/logo.png' class='navbar-brand-logo ' alt='' />\n"
    . "                    </a>\n"
    . "                </div>\n"
    . "                <div class='navbar-collapse collapse move-me'>\n"
    . "                    <ul class='nav navbar-nav navbar-right'>\n"
    . "                        <li ><a href='#home'><i class='glyphicon glyphicon-home' ></i> HOME</span></a>\n"
    . "                        <li ><a href='#about'><i class='glyphicon glyphicon-info-sign' ></i> ABOUT</span></a></li>\n"
    . "                        <li ><a href='#contact'><i class='glyphicon glyphicon-map-marker' ></i> CONTACT</span></a></li>\n"
    . "                    </ul>\n"
    . "                </div>\n"
    . "            </div>\n"
    . "        </div>\n";
}
?>