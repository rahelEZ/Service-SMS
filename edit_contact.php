<?php
error_reporting(E_ERROR | E_PARSE);

include "smsModel.php";
include "header.php";
include "footer.php";
//require_once "init.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$nedcontact_name = $_POST["edContactName"];

$nedcontact_number = $_POST["edContactNumber"];
$edcontact_id= $_GET['contact_id'];
if (!empty($_POST)) {
	if(!isset($_POST['deleteContact'])){
		if(!empty($_POST["edContactNumber"])){
			$tcontact->edit_contact_number($edcontact_id,$nedcontact_number);
			//echo "contact number change";
		}
		else {
			//echo "contact number no change";
		}
		
		if(!empty($_POST["edContactName"])){
			$tcontact->edit_contact_name($edcontact_id,$nedcontact_name);
				//echo "contact name edited";
		}
		else{
			
		}
	}
	else{
		header("Location:delete_contact.php?contact_id=<?= $edcontact_id?>"); 
		
	}
	header("Location: contacts.php");

	}
	
?>

     <section class="content">
        <div class="container-fluid">
            <div class="block-header">
			<form method="POST" >
                <h1>Edit CONTACT</h1>
				</div>
				<!-- Input -->
				<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
									  <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $tcontact->get_attribute_value("number",$edcontact_id); ?>" name="edContactNumber"/>
                                        </div>
										
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $tcontact->get_attribute_value("name",$edcontact_id); ?>"name="edContactName" />
                                        </div>
                                    </div>
                                  
									<div class="text-right">
										<a class="btn btn-default" href="contacts.php">Cancel</a>
										<button name="submit" type="submit" class="btn btn-primary" id="register">Submit</button>
									</div>
									<div class="text-left">
										<a class="btn btn-danger" href="delete_contact.php?contact_id=<?= $edcontact_id?>">Delete</a>
								</div>
								</form>
                                </div>
                            </div>
						</div>
						</div>
						</div>
						</div>
						</section>

   
