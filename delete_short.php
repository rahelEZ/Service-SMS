<?php
error_reporting(E_ERROR | E_PARSE);
include "smsModel.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$tshort= new Short();
$delete_short_id= $_GET['short_id'];
if (!empty($_POST)) {
    $delete = isset($_POST["deleteShort"]);
	echo $delete;
	if($delete){
		$tshort->delete_short($delete_short_id);
	}
     
	header("Location: short.php");
}
include "header.php";
include "footer.php";
?>

	<section class="content">
        <div class="container-fluid">
            <div class="block-header">
			
                <h1>Delete Short Number?</h1>
				</div>
				<!-- Input -->
				<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
									<h4> Are you sure you would like to delete <?php echo $tshort->get_attribute_value("number",$delete_short_id); ?>?
											The process is irreversible.</h4>
						</br>
						
				<form method="POST">
						<div class="text-right">
							<button name="deleteShort" type="submit" class="btn btn-danger" id="delete">Delete</button>
							<a class="btn btn-default" href="edit_short.php?short_id=<?= $delete_short_id ?>"> Cancel</a>
						</div>
						
				</form>
                    </div>
           
                  
					</div>
				</div>
			</div>
		</section>
    