<?php
	session_start();
	ob_start();
	include_once(__DIR__.'/page_header.php');

	$status=(isset($_SESSION['status']) ? $_SESSION['status'] : null);
	if (is_null($status) || $status!="loggedin") { header("location:login.php?msg=29");}

	try
	{
		
?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Welcome <?php echo $user_details['user_name']; ?>!</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12"> 
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <?php echo "<h4>Hello " . $user_details['user_name'] . "</h4>"; ?>
                </div>
            </div>


<?php

	} catch (Exception $e) {
		echo "<h4 style='color:red'>".$e->getMessage()."</h4>";
	}
?>

<?php include_once(__DIR__.'/page_footer.php');?>