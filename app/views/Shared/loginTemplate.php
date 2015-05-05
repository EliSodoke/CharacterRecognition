<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
        <script type="text/javascript" src="<?php echo $GLOBALS['CFG']->js; ?>jquery-2.1.3.js"></script>
        <script type="text/javascript" src="<?php echo $GLOBALS['CFG']->js; ?>login.js"></script>
    </head>
    <body>
        <?php include($this->file); ?>
    </body>
</html>

