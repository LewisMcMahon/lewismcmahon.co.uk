<?php 

	include_once 'inc/class/entry.php';
	include_once 'inc/class/section.php';
	include_once 'inc/func/dbFunctions.php';

	if(isset($__GET["page"])){
		$page = $__GET["page"];
	}
	else{
		$page = "";
	}
	
	$allSections =  section::getAllSectionsOrdered();
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
    <meta http-equiv="cont-Type" cont="text/html; charset=UTF-8" /> 
    <title>Lewis McMahon | <?php if ($page != ""){echo ucwords($page);}else {echo "Home";}?> </title> 
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/960_12_col.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
    <link rel="shortcut icon" href="favicon.ico"/>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <link href="js/jquery-ui.css" rel="stylesheet" type="text/css" />
    
    <script src="lightbox/js/lightbox.min.js"></script>
	<link href="lightbox/css/lightbox.css" rel="stylesheet" />
      
    <!-- <script type="text/javascript" src="js/jquery-validate.js"></script> -->
</head>

<body>
    <div id="main" class="container_12">			
				
		<?php include ('inc/static/nav.php'); ?> 
		
		<?php include ('inc/static/head.php'); ?> 			       
	       

		<?php 
	            //Gets the cont 
	            if ($page == "")
	            {
	            include("cont/home.php");
	            }
	            else if (file_exists ("cont/".$page.".php"))
	            {
	            include("cont/".$page.".php");
	            }
	            else
	            {
	            include("cont/404.php");
	            } 
        	?>


        <div id="footer">
            <?php 
                include ('inc/static/footer.php'); 
            ?>
        </div> 
    </div>
</body>
</html>
