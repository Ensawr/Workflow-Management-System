<?php 
include '../Controllers/connect_controllers/connection.php';

if(isset($_GET["data"])){

    // Creating User

	if($_GET["data"]=="createUser"){

        $sql = mysqli_query($conn, "select * from users where username = '".$_POST["uname"]."' ");
        $qry = mysqli_num_rows($sql);

        if($qry == 1){

            header("location:../Views/others/admin_panel.php?i=1");
        }
        else{

            $sql = "insert into users set username='".$_POST["uname"]."', name='".$_POST["name"]."', password='".$_POST["pswd"]."', auth='".$_POST["auth"]."'";
            $result = $conn->query($sql);
            header("location:../Views/others/admin_panel.php?i=2");
        }
    }

    // Deleting User

    if($_GET["data"]=="deleteUser"){

		$sql = "delete from users where username='".$_GET["uname"]."'";
		$conn->query($sql);
		header("location:../Views/others/admin_panel.php?i=3");

    }
}
       


