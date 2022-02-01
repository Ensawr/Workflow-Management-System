<?php 
    if(isset($_GET["i"])){
        if($_GET['i']==1){
            echo '<div class="alert alert-danger"><center>You need to login for view this page.</center></div>';
        }
    }
?>

<!DOCTYPE html>
<html lang='tr'>
<head><script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/frytyler/pen/EGdtg" />
<title>Workflow Management System</title>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'><script src='https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js'></script>
<link rel='stylesheet' href="Static/Styles/user_login.css" style="text/css"/>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
    <form class="form" action="Controllers/connect_controllers/login.php" method="POST">

        <?php
            if(isset($_GET["error"])){
                if($_GET['error']==1){
                    echo '<div class="alert alert-danger">Username or password is incorrect !</div>';
                }
                if($_GET['error']==2){
                    echo '<div class="alert alert-danger">You need to login !</div>';
                }
            }
        ?>

        <div class="login">
            <h1><img src="./Static/img/logo.png" width="90%"></h1>
            <form method="post">
                <input type="text" name="username" placeholder="Username" required="required" />
                <input type="password" name="password" placeholder="Password" required="required" />
                <button type="submit" class="btn btn-primary btn-block btn-large">Login</button>
            </form>
        </div>
    </form> 
        <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
</body>
</html>