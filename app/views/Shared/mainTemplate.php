<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['CFG']->css; ?>main.css"/>
        <script type="text/javascript" src="<?php echo $GLOBALS['CFG']->js; ?>jquery-2.1.3.js"></script>
        <script type="text/javascript" src="<?php echo $GLOBALS['CFG']->js; ?>main.js"></script>
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <div id="topMenu">
            <nav>
                <ul>
                    <li><a href="<?php echo $GLOBALS['CFG']->homeFrontEnd; ?>Dashboard/index">Dashboard</a></li>
                    <li><a>Test</a></li>
                    <li><a>Test</a></li>
                </ul>
            </nav>
            <div id="logout">
                <a href="<?php echo $GLOBALS['CFG']->homeFrontEnd; ?>Logout/index">Log Out</a>
            </div>
        </div>
        <br/>
        <?php include($this->file); ?> 
    </body>
</html>

