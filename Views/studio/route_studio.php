<?php
session_start();
require "../../Controllers/nebim_updater.php";
require "../../Controllers/feeders/get_datetime.php";

if(!isset($_SESSION["isLogin"])){
    header('location:../../user_login.php?i=1');
}

if($_SESSION["auth"]!="studio_manager"){
    if($_SESSION["auth"]!="admin"){
    header('location:../others/index.php?i=1');
    }
}

include "../others/master_page.php";

        if(isset($_GET["i"])){
            if($_GET['i']==1){
                echo '<div class="alert alert-success"><center>Veriler Gönderildi.</center></div>';
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel='stylesheet' href="../../Static/Styles/studio_tables.css" style="text/css"/>
    <script src="../../Static/javascripts/studio_dynamic_table.js" type="text/javascript"></script>

    <title>Route Studio</title>
</head>
<body>

    <div class="search mt-3">
        <input type="text" class="form-control" name="productC" id="productC"  onkeyup="Search()" placeholder="Product Code Search">
        <input type="text" class="form-control" name="productB" id="productB"  onkeyup="SearchBarcode()" placeholder="Barcode Search">
    </div><br>

    <div class="left-table" style="overflow-y:auto">
    
        <table class="table align-middle" id="left_table">
            <thead style="background-color:#E0BBE4;">
                <tr>
                <th scope="col"><img class="icon-margin" src="../../Static/img/info.png" 
                title="This products are came studio from storage. 
                The reason why products are still here when you distribute the products on the pages is products aren't completed yet.
                When the products complete they will vanished.">Product Code</th>
                <th scope="col">Color</th>
                <th scope="col">Color Code</th>
                <th scope="col">Barcode</th>
                <th scope="col">Process</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $datas = get_studio_datas();
                    $dataID = 0;
                    foreach($datas as $data){       
                ?>
                    <tr>
                        <td><?php echo $data[0] ?></td>
                        <td><?php echo $data[1] ?></td>
                        <td><?php echo $data[2] ?></td>
                        <td><?php echo $data[3] ?></td>
                        <td>
                            <button type="button" id="<?php echo $dataID; ?>" onclick="sendtoRight(this.id)" class="btn btn-dark btn-sm px-3">
                                <b>></b>
                            </button>
                        </td>
                    </tr>
                <?php $dataID++; } ?>
            </tbody>
        </table>

    </div>

    <form action="../../Controllers/sending_first_studio.php?data=first_studio_datas" method="post">

    <input type='text' name="datetime" value='<?php echo get_datetime();?>' style="display:none;">

 
    <div class="right-table" style="overflow-y:auto">
        <table class="table align-middle">
                <thead style="background-color:#E0BBE4;">
                    <tr>
                        <th scope="col"><img class="icon-margin" src="../../Static/img/info.png" 
                        title="Boxes are here just for deleting. You have not to click for sending"> Delete</th>
                        <th scope="col">Product Code</th>
                        <th scope="col">Color</th>
                        <th scope="col">Color Code</th>
                        <th scope="col">Barcode</th>
                        <th scope="col" style="display:none">For Hidden Input</th>
                    </tr>
                </thead>
                <tbody class = "table" id="right_table">
                        
                </tbody>
        </table> 
     
    </div>

    <span class="DeleteAndStd">
        <span> <button type="button" onclick="sendBack('right_table')" class="btn btn-danger btn-sm px-3">Delete</button> </span>
        <span> <button type="button" id="showButtons" onclick="openOptions()" class="btn btn-dark btn-sm px-3">Choose Studio</button></span>
    </span>
    <span id="buttons">   
        <button type="submit" name="studio1" value="studio1" class="btn btn-dark btn-sm px-3 space">Studio 1</button>
        <button type="submit" name="studio2" value="studio2" class="btn btn-dark btn-sm px-3 space">Studio 2</button>  
        <button type="submit" name="studio3" value="studio3" class="btn btn-dark btn-sm px-3 space">Studio 3</button>  
        <button type="submit" name="studio4" value="studio4" class="btn btn-dark btn-sm px-3 space">Studio 4</button>  
    </span>
    
    </form>
</body>
</html>