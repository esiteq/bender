<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bender Demo</title>
<?php
require_once "../Bender/Bender.class.php";
$bender = new Bender();
$bender->enqueue( "Bender/demo/assets/css/bootstrap.css" );
$bender->enqueue( "Bender/demo/assets/css/bootstrap-theme.css" );
$bender->enqueue( "Bender/demo/assets/js/jquery-1.10.2.js" );
$bender->enqueue( "Bender/demo/assets/js/bootstrap.js" );
echo $bender->output( "Bender/demo/cache/stylesheet.css" );
?>
</head>

<body>

<div class="container">
    <div class="row">
        <div class="jumbotron">
            <div class="container">
                <h1>Hello, world!</h1>
                <p>This is a Bender demo</p>
                <p><a class="btn btn-primary btn-lg" href="http://www.esiteq.com/projects/bender/">Learn more &raquo;</a></p>
            </div>
        </div>
    </div>
</div>
<?php
echo $bender->output( "Bender/demo/cache/javascript.js" );
?>
</body>
</html>