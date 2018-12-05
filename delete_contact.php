<?php
error_reporting(E_ERROR | E_PARSE);
include "smsModel.php";
include "header.php";
include "footer.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$delete_contact_id= $_GET['contact_id'];
if (!empty($_POST)) {
    $delete = isset($_POST["deleteContact"]);
	echo $delete;
	if($delete){
		$tcontact->delete_contact($delete_contact_id);
		header("Location: contacts.php");
	}
    header("Location: contacts.php");
}
?>
	<section class="content">
        <div class="container-fluid">
            <div class="block-header">
			
                <h1>Delete CONTACT?</h1>
				</div>
				<!-- Input -->
				<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
									<h4> Are you sure you would like to delete <?php echo $tcontact->get_attribute_value("number",$delete_contact_id); ?>?
											The process is irreversible.</h4>
						</br>
						
				<form method="POST">
						<div class="text-right">
							<a class="btn btn-default" href="edit_contact.php?contact_id=<?= $delete_contact_id ?>"> Cancel</a>
							<button name="deleteContact" type="submit" class="btn btn-danger" id="delete">Delete</button>
						</div>
						
				</form>
                    </div>
           
                  
					</div>
				</div>
			</div>
		</section>
    

