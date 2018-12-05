<?php
//error_reporting(E_ERROR | E_PARSE);

include "smsModel.php";
//require_once "init.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$tshort= new Short();
$trole= new Role();
$edrole_id= $_GET['role_id'];
$err="";

//$onums=$tcategory->get_attribute_value("incoming",$edcategory_id);
//$onum=$tshort->get_attribute_value("number",$onums);

//$cat_services= $tservice->all_services($cat_name);

	if (!empty($_POST)) {
		if(!isset($_POST['deleteRole'])){
		$edrole_name = $_POST["edroleName"];
		$edrole_description=$_POST["edroleDescription"];
		
		if(!empty($_POST["edroleName"])){
			$trole->edit_role_name($edrole_id,$edrole_name);
			//echo "contact name edited";
			}
		else{
				
		}
		if(!empty($_POST["edroleDescription"])){
			$trole->edit_role_description($edrole_id,$edrole_description);
			//echo "contact name edited";
			}
		else{
				
		}
	}
	else{
		
		//$tservice->delete_service($edcategory_id);
			//echo "camee_here";
	}
	header("Location: role_group.php");
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
                                            <input type="text" class="form-control" value="<?php echo $trole->get_attribute_value("name",$edrole_id);?>" name="edroleName" />
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
                                            <textarea rows="4" class="form-control no-resize" name="edroleDescription" value="<?php echo $trole->get_attribute_value("description",$edrole_id);?>"></textarea>
                                        </div>
                                    </div>
									<div class="form-contol text-right">
										<a class="btn btn-default" href="role_group.php">Cancel</a>
										<button name="submit" type="submit" class="btn btn-primary" id="register">Submit</button>
										
									</div>
									<div class="text-left">
										<a class="btn btn-danger" href="delete_role.php?role_id=<?=$edrole_id;?>">Delete</a>
										
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
	