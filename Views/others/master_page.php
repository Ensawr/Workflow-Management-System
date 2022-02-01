<html>
<head>
    <link href="../../Static/styles/sidebar.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</head>
<body>
    <!-- ADMIN SIDEBAR -->
    <?php 
        if($_SESSION["auth"]=="admin"){
    ?>
    
    <div class="area"></div>
    <nav class="main-menu">
        <ul>
            <li>
                <a href="../others/index.php">
                <i class="fa fa-home fa-2x"></i>
                    <span class="nav-text">
                        Main Page
                    </span>
                </a>
            </li>
            <li class="has-subnav">
                <a href="../storage/update_nebim.php">
                <i class="fa fa-repeat fa-2x"></i>
                    <span class="nav-text">
                        Nebim Update
                    </span>
                </a>
            </li>
            <li class="has-subnav">
                <a href="../studio/dashboard.php">
                <i class="fa fa-bar-chart-o fa-2x"></i>
                    <span class="nav-text">
                        Dashboard
                    </span>
                </a>
            </li>
            <li>
                <a href="../studio/route_studio.php">
                <i class="fa fa-arrows-alt"></i>
                    <span class="nav-text">
                        Studio Route
                    </span>
                </a>
            </li>
            <li>
                <a href="../studio/route_edit.php">
                <i class="fa fa-backward"></i>
                    <span class="nav-text">
                        Change First Studio
                    </span>
                </a>
            </li>
            <li>
                <a href="../studio/route_edit_2.php">
                <i class="fa fa-backward"></i>
                    <span class="nav-text">
                        Change Second Studio
                    </span>
                </a>
            </li>
            <li>
                <a href="../studio/product_upload.php">
                <i class="fa fa-camera fa-2x"></i>
                    <span class="nav-text">
                        Product Photo Upload
                    </span>
                </a>
            </li>
            <li>
                <a href="../studio/product_edit.php">
                <i class="fa fa-edit fa-2x"></i>
                    <span class="nav-text">
                        Product Photo Edit
                    </span>
                </a>
            </li>
            <li>
                <a href="../retouch/retouch_download.php">
                <i class="fa fa-download fa-2x"></i>
                    <span class="nav-text">
                        Retouch Download
                    </span>
                </a>
            </li>
            <li>
                <a href="../retouch/retouch_upload.php">
                <i class="fa fa-magic fa-2x"></i>
                    <span class="nav-text">
                        Retouch Photo Upload
                    </span>
                </a>
            </li>
            <li>
                <a href="../retouch/retouch_edit.php">
                <i class="fa fa-edit fa-2x"></i>
                    <span class="nav-text">
                        Retouch Photo Edit
                    </span>
                </a>
            </li>
            <li>
                <a href="../product/product_control.php">
                <i class="fa fa-eye fa-2x"></i>
                    <span class="nav-text">
                        Product Control
                    </span>
                </a>
            </li>
            <li>
                <a href="../product/completed_products.php">
                <i class="fa fa-thumbs-up fa-2x"></i>
                    <span class="nav-text">
                        Completed Products
                    </span>
                </a>
            </li>
        </ul>

        <ul class="logout">
            <li>
                <a href="../others/admin_panel.php">
                <i class="fa fa-cogs fa-2x"></i>
                    <span class="nav-text">
                        Admin Panel
                    </span>
                </a>
            </li>  
            <li>
                <a href="../../Controllers/connect_controllers/logout.php">
                <i class="fa fa-sign-out fa-2x redout"></i>
                    <span class="nav-text redout">
                        Logout
                    </span>
                </a>
            </li>  
        </ul>
    </nav>


    <!-- STORAGE SIDEBAR  -->
    <?php 
        }
        if($_SESSION["auth"]=="storage"){
    ?>

    <div class="area"></div>
    <nav class="main-menu">
        <ul>
            <li>
                <a href="../others/index.php">
                <i class="fa fa-home fa-2x"></i>
                    <span class="nav-text">
                        Main Page
                    </span>
                </a>
            </li>
            <li class="has-subnav">
                <a href="../storage/update_nebim.php">
                <i class="fa fa-repeat fa-2x"></i>
                    <span class="nav-text">
                        Nebim Update
                    </span>
                </a>
            </li>
        </ul>  
        <ul class="logout">
            <li>
                <a href="../../Controllers/connect_controllers/logout.php">
                <i class="fa fa-sign-out fa-2x redout"></i>
                    <span class="nav-text redout">
                        Logout
                    </span>
                </a>
            </li>  
        </ul>
    </nav>
    <!-- STUDIO MANAGE SIDEBAR -->
    <?php 
        }
        if($_SESSION["auth"]=="studio_manager"){
    ?>

    <div class="area"></div>
    <nav class="main-menu">
        <ul>
            <li>
                <a href="../others/index.php">
                <i class="fa fa-home fa-2x"></i>
                    <span class="nav-text">
                        Main Page
                    </span>
                </a>
            </li>
            <li class="has-subnav">
                <a href="../studio/dashboard.php">
                <i class="fa fa-bar-chart-o fa-2x"></i>
                    <span class="nav-text">
                        Dashboard
                    </span>
                </a>
            </li>
            <li>
                <a href="../studio/route_studio.php">
                <i class="fa fa-arrows-alt"></i>
                    <span class="nav-text">
                        Studio Route
                    </span>
                </a>
            </li>
            <li>
                <a href="../studio/route_edit.php">
                <i class="fa fa-backward"></i>
                    <span class="nav-text">
                        Change First Studio
                    </span>
                </a>
            </li>
            <li>
                <a href="../studio/route_edit_2.php">
                <i class="fa fa-backward"></i>
                    <span class="nav-text">
                        Change Second Studio
                    </span>
                </a>
            </li>
        </ul>

        <ul class="logout">
            <li>
            <a href="../../Controllers/connect_controllers/logout.php">
            <i class="fa fa-sign-out fa-2x redout"></i>
                <span class="nav-text redout">
                    Logout
                </span>
            </a>
            </li>  
        </ul>
    </nav>

    <!-- STUDIO USER SIDEBAR -->
    <?php 
        }
        if($_SESSION["auth"]=="studio1" || $_SESSION["auth"]=="studio2" || $_SESSION["auth"]=="studio3" || $_SESSION["auth"]=="studio4"){            
    ?>

    <div class="area"></div>
    <nav class="main-menu">
        <ul>
            <li>
                <a href="../others/index.php">
                <i class="fa fa-home fa-2x"></i>
                    <span class="nav-text">
                        Main Page
                    </span>
                </a>
            </li>

            <li>
                <a href="../studio/product_upload.php">
                <i class="fa fa-camera fa-2x"></i>
                    <span class="nav-text">
                        Product Photo Upload
                    </span>
                </a>
            </li>
            <li>
                <a href="../studio/product_edit.php">
                <i class="fa fa-edit fa-2x"></i>
                    <span class="nav-text">
                        Product Photo Edit
                    </span>
                </a>
            </li>
        </ul>

        <ul class="logout">
            <li>
                <a href="../../Controllers/connect_controllers/logout.php">
                <i class="fa fa-sign-out fa-2x redout"></i>
                    <span class="nav-text redout">
                        Logout
                    </span>
                </a>
            </li>  
        </ul>
    </nav>
    <!-- RETOUCH SIDEBAR -->
    <?php
        }
        if($_SESSION["auth"]=="retouch"){
    ?>

    <div class="area"></div>
    <nav class="main-menu">
        <ul>
            <li>
                <a href="../others/index.php">
                <i class="fa fa-home fa-2x"></i>
                    <span class="nav-text">
                        Main Page
                    </span>
                </a>                   
            </li>

            <li>
                <a href="../retouch/retouch_download.php">
                <i class="fa fa-download fa-2x"></i>
                    <span class="nav-text">
                        Retouch Download
                    </span>
                </a>
            </li>
            <li>
                <a href="../retouch/retouch_upload.php">
                <i class="fa fa-magic fa-2x"></i>
                    <span class="nav-text">
                        Retouch Photo Upload
                    </span>
                </a>
            </li>
            <li>
                <a href="../retouch/retouch_edit.php">
                <i class="fa fa-edit fa-2x"></i>
                    <span class="nav-text">
                        Retouch Photo Edit
                    </span>
                </a>
            </li>
        </ul>

        <ul class="logout"> 
            <li>
                <a href="../../Controllers/connect_controllers/logout.php">
                <i class="fa fa-sign-out fa-2x redout"></i>
                    <span class="nav-text redout">
                        Logout
                    </span>
                </a>
            </li>  
        </ul>
    </nav>
    <?php
        }
        if($_SESSION["auth"]=="product"){
    ?>

    <!-- PRODUCT SIDEBAR -->
    <div class="area"></div>
    <nav class="main-menu">
        <ul>
            <li>
                <a href="../others/index.php">
                <i class="fa fa-home fa-2x"></i>
                    <span class="nav-text">
                        Main Page
                    </span>
                </a>
            </li>

            <li>
                <a href="../product/product_control.php">
                <i class="fa fa-eye fa-2x"></i>
                    <span class="nav-text">
                        Product Control
                    </span>
                </a>
            </li>
            <li>
                <a href="../product/completed_products.php">
                <i class="fa fa-thumbs-up fa-2x"></i>
                    <span class="nav-text">
                        Completed Products
                    </span>
                </a>
            </li>
        </ul>

        <ul class="logout"> 
            <li>
                <a href="../../Controllers/connect_controllers/logout.php">
                <i class="fa fa-sign-out fa-2x redout"></i>
                    <span class="nav-text redout">
                        Logout
                    </span>
                </a>
            </li>  
        </ul>
    </nav>

    <?php
        }
    ?>    
</body>
</html>