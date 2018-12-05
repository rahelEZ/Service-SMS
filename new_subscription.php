<?php
//error_reporting(E_ERROR | E_PARSE);

include "smsModel.php";
//include "header.php";
include "footer.php";
//require_once "init.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$err="";
$all_services = $tservice->get_all_services();
$all_contacts= $tcontact->all_contacts();
if (!empty($_POST)) {
    $sub_contacts = $_POST["subContacts"];
	$sub_services = $_POST["subServices"];
	$service_cats= $tservice->get_attribute_value("ser_cat",$sub_services);
    $validation_message = smsModel::require_fields(["subContacts" => "Contact Name","subServices"=>"Service"], $_POST);
	$already= $tsubscription->validate_subscription($tsubscription->get_attribute_value("sub_contact",$sub_contacts),$tsubscription->get_attribute_value("sub_service",$sub_services));
	if ($validation_message) {
        $err = $validation_message;
		echo $nserviceCategory."  is it";
    } 
	else if(!$already){
		$err= "Already Subscribed to this service";
	}
	/*else if(isset($_POST["submit"])){
				echo "came here";
		$tservice->new_service($nservice_name,$nservice_description,$nservice_category);
	}
	*/
    else {
		echo "came here";
		$tsubscription->new_subscription($sub_contacts,$sub_services,$service_cats);
    }
	header("Location: subscription.php");
}
?>
        
        <!-- #END# Right Sidebar -->
		<section class="content">
        <div class="container-fluid">
            <form method="POST" >
            <!-- Input -->
       
            <!-- #END# Input -->
            <!-- Textarea -->
          
            <!-- #END# Textarea -->
            <!-- Select -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h4 >Contacts List</h4>
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <select class="form-control show-tick" name="subContacts">
                                        <option value="">-- Select a Contact --</option>
										<?php		
											foreach($all_contacts as $wcontact){
										?>	
										<option value="<?php echo $tcontact->get_attribute_value("name",$wcontact); ?>"><?php echo $tcontact->get_attribute_value("name",$wcontact); ?></option>
                                         <?php
											}
										 ?>
                                        
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h4 >Services List</h4>
                    <div class="card">
                       
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
								
                                    <select class="form-control show-tick" name="subServices">
                                        <option value="">-- Select a Service --</option>
										<?php		
											foreach($all_services as $pservice){
										?>	
										<option value="<?php echo $tservice->get_attribute_value("name",$pservice); ?>"><?php echo $tservice->get_attribute_value("name",$pservice);; ?></option>
                                         <?php
											}
										 ?>
                                        
                                    </select>
									<div class="error-window alert alert-danger"><?= $err ?></div>
										<div class="form-contol text-right">
										<a class="btn btn-default" href="services.php">Cancel</a>
										<button name="submit" type="submit" class="btn btn-primary" id="register">Submit</button>
									</div>
									</form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Select -->
             
            <!-- #END# Checkbox -->
            
        </div>
    </section>

