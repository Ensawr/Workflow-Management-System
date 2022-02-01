<?php
session_start();

if(!isset($_SESSION["isLogin"])){
    header('location:../../user_login.php?i=1');
}

if($_SESSION["auth"]!="studio_manager"){
    if($_SESSION["auth"]!="admin"){
    header('location:../others/index.php?i=1');
    }
}

include "../others/master_page.php";
include "../../Controllers/feeders/get_studio_distribution.php";
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Dashboard</title>
    <script type="application/javascript" src="../../Static/javascripts/rpie.js"></script>
</head>
<body>
<center>
	<div class="false-For-Bottom-Text">	
		<div class="mypiechart">	
			<canvas id="myCanvas" style="margin-top:2%" width="500" height="500"></canvas>
		</div>	
			<hr>
				Product Distribution in Studios
			<hr>
		<b>
			<p style="color:#E0BBE4">Studio 1</p>
			<p style="color:#957DAD">Studio 2</p>
			<p style="color:#D291BC">Studio 3</p>
			<p style="color:#95BBAD">Studio 4</p>
		</b>
	</div>
</center>
			
	<script type="text/javascript">

		var obj = {
						values: [
							<?php $datas = get_distribution(); ?>
							<?php echo $datas[0] ?>, <?php echo $datas[1] ?>, <?php echo $datas[2] ?>, <?php echo $datas[3] ?>
								],
						colors: ['#E0BBE4','#957DAD', '#D291BC', '#95BBAD'],
						animation: true,
						animationSpeed: 1,
						fillTextData: true,
						fillTextColor: '#fff',
						fillTextAlign: 1.50, 
						fillTextPosition: 'inner',
						doughnutHoleSize: null,
						doughnutHoleColor: '#fff',
						offset: 1
					  };
		generatePieGraph('myCanvas', obj);

		
		
	</script>

</body>
</html>
	 


