<?php
error_reporting(E_ERROR | E_PARSE);
include "smsModel.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$delete_service_id= $_GET['service_id'];
if (!empty($_POST)) {
    $delete = isset($_POST["deleteService"]);
	echo $delete;
	if($delete){
		$tservice->delete_service($delete_service_id);
	}
     
	header("Location: services.php");
}

include "header.php";
include "footer.php";
?>

	<section class="content">
        <div class="container-fluid">
            <div class="block-header">
			
                <h1>Delete Service?</h1>
				</div>
				<!-- Input -->
				<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
									<h3> Are you sure you would like to delete "<?php echo $tservice->get_attribute_value("name",$delete_service_id); ?>"?
											The process is irreversible.</h3>
						</br>
						
				<form method="POST">
						<div class="text-right">
							<a class="btn btn-default" href="edit_services.php?service_id=<?= $delete_service_id ?>"> Cancel</a>
							<button name="deleteService" type="submit" class="btn btn-danger" id="delete">Delete</button>
						</div>
					
					
				</form>
                    </div>
           
                  
					</div>
				</div>
			</div>
		</section>
    
