<?php
//error_reporting(E_ERROR | E_PARSE);

include "smsModel.php";
//require_once "init.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$tpart=new Part();
$trole=new Role();
$parts= $_GET['for'];
$tpermission= new Permission();
$all_parts= $tpart->all_roles_for($parts);
$err="";
if (!empty($_POST)) {
    $nrole_name = $_POST["nroleName"];
	$nrole_description = $_POST["nroleDescription"];
	$npart= $_POST["checkbox"];
	
	$validation_message = smsModel::require_fields(["nroleName" => "Role Group Name","checkbox" => "Role"], $_POST);
	
	if ($validation_message) {
        $err = $validation_message;
    } 
	else if(!$trole->role_name_available($nrole_name)){
		$err= "Role Group already taken";
	}
	/*else if(isset($_POST["submit"])){
				echo "came here";
		$tservice->new_service($nservice_name,$nservice_description,$nservice_category);
	}
	*/
    else {
		$trole->new_role_group($nrole_name,$nrole_description);
		$role_group_id=$trole->get_attribute_value_table("id",$nrole_name,"role_group","name");
		foreach($_POST['checkbox'] as $check){ 
			$tpermission->new_permission($check,$role_group_id);
			echo $check;
		}
		echo "came here";
		header("Location: role_group.php");
    }
	
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
                            <h2 class="card-inside-title">Role Group Name</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Role Group Name" name="nroleName" />
                                        </div>
                                    </div>
                                </div>
                            </div>
							</br>
						</div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
            <!-- Textarea -->
			 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Roles
                                <small>select a role for the role group</small>
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="demo-switch">
                                <div class="row clearfix">
								
                                    <div class="col-sm-3">
								<?php		
											foreach($all_parts as $apart){
										?>	
                                        <div class="switch">
										<div class="demo-switch-title"><?php echo $tpart->get_attribute_value("name",$apart); ?></div>
                                            <label><input type="checkbox" value="<?php echo $apart;?>" name="checkbox[]"><span class="lever switch-col-lime"></span></label>
											<?php } ?>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Textarea -->
            <!-- Select -->
            
            <!-- #END# Select -->
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <h2 class="card-inside-title">Role Group Description</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" name="nroleDescription" placeholder="Briefly describe the role ..."></textarea>
                                        </div>
                                    </div>
									
									<div class="error-window alert alert-danger"><?= $err ?></div>
										<div class="form-contol text-right">
											<a class="btn btn-default" href="role_group.php">Cancel</a>
											<button name="submit" type="submit" class="btn btn-primary" id="register">Submit</button>
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
					


    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
</body>

</html>
