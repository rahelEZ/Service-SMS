<?php
//error_reporting(E_ERROR | E_PARSE);

include "smsModel.php";
//require_once "init.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$tshort= new Short();
$edservice_id= $_GET['service_id'];
$err="";

//$onums=$tcategory->get_attribute_value("incoming",$edcategory_id);
//$onum=$tshort->get_attribute_value("number",$onums);

//$cat_services= $tservice->all_services($cat_name);

	if (!empty($_POST)) {
		if(!isset($_POST['deleteService'])){
		$edservice_name = $_POST["edserviceName"];
		$ed_subscription=$_POST["edSubscription"];
		$ed_unsubscription=$_POST["edUnsubscription"];
		$edsdescription_en=$_POST["edSdescription_en"];
		$edsdescription_am=$_POST["edSdescription_am"];
		
		if(!empty($_POST["edserviceName"])){
			$tcategory->edit_service_name($edservice_id,$edservice_name);
			//echo "contact name edited";
			}
		else{
				
		}
		if(!empty($_POST["edUnsubscription"])){
			$tcategory->edit_service_unsubscription($edservice_id,$ed_unsubscription);
			//echo "contact name edited";
			}
		else{
				
		}
		if(!empty($_POST["edSubscription"])){
			$tcategory->edit_service_subscription($edservice_id,$ed_subscription);
			//echo "contact name edited";
			}
		else{
				
		}
		if(!empty($_POST["edsdescription_am"])){
			$tcategory->edit_service_description_am($edservice_id,$edsdescription_am);
			//echo "contact name edited";
			}
		else{
				
		}
		if(!empty($_POST["edsdescription_en"])){
			$tcategory->edit_service_description_en($edservice_id,$edsdescription_en);
			//echo "contact name edited";
			}
		else{
				
		}
		
	}
	else{
		
		//$tservice->delete_service($edcategory_id);
			//echo "camee_here";
	}
	//header("Location: categories.php");
	}

include "header.php";
include "footer.php";
?>
        <!-- #END# Right Sidebar -->
		<section class="content">
        <div class="container-fluid">
            <form method="POST" >
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <h2 class="card-inside-title">Service Name</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $tservice->get_attribute_value("name",$edservice_id);?>" name="edserviceName" />
                                        </div>
                                    </div>
                                </div>
                            </div>
							</br>
							<h2 class="card-inside-title">Subscription Code</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $tservice->get_attribute_value("subscription_code",$edservice_id);?>"  name="edSubscription" />
                                        </div>
                                    </div>
                                </div>
                            </div>
							</br>
							<h2 class="card-inside-title">Unsubscription Code</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $tservice->get_attribute_value("unsubscription_code",$edservice_id);?>"  name="edUnsubscription" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
            <!-- Textarea -->
          
            <!-- #END# Textarea -->
            <!-- Select -->
           
            <!-- #END# Select -->
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
              
                        <div class="body">
                            <h2 class="card-inside-title">Service Description {AMH/ENG}</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" name="edSdescription_am" value="<?php echo $tservice->get_attribute_value("description_am",$edservice_id);?>"></textarea>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" name="edSdescription_en" value="<?php echo $tservice->get_attribute_value("description_en",$edservice_id);?>"></textarea>
                                        </div>
                                    </div>
									<div class="form-contol text-right">
										<a class="btn btn-default" href="services.php">Cancel</a>
										<button name="submit" type="submit" class="btn btn-primary" id="register">Submit</button>
										
									</div>
									<div class="text-left">
										<a class="btn btn-danger" href="delete_service.php?service_id=<?=$edservice_id;?>">Delete</a>
										
									</div>
                    
					</form>
                  </div>
                 </div>
							
                </div>
               </div>
           </div>
         </div>
		  
            <!-- #END# Checkbox -->
            
        </div>
    </section>
	