<?php
//error_reporting(E_ERROR | E_PARSE);

include "smsModel.php";
//require_once "init.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$tshort= new Short();
$trole=new Role();
$tuser=new User();
$eduser_id= $_GET['user_id'];
$err="";

//$onums=$tcategory->get_attribute_value("incoming",$edcategory_id);
//$onum=$tshort->get_attribute_value("number",$onums);

//$cat_services= $tservice->all_services($cat_name);

	if (!empty($_POST)) {
		if(!isset($_POST['deleteUser'])){
		$eduser_name = $_POST["eduserName"];
		$edname=$_POST["edName"];
		$edpassword=$_POST["edPassword"];
		$edstatus=$_POST["edStatus"];
		$edcategory=$_POST["edCategory"];
		$edrole=$_POST["edRole"];
		
		if(!empty($_POST["eduserName"])){
			$tuser->edit_user_username($eduser_id,$eduser_name);
			//echo "contact name edited";
			}
		else{
				
		}
		if(!empty($_POST["edName"])){
			$tuser->edit_user_name($eduser_id,$edname);
			//echo "contact name edited";
			}
		else{
				
		}
		if(!empty($_POST["edPassword"])){
			$tuser->edit_user_password($eduser_id,$edpassword);
			//echo "contact name edited";
			}
		else{
				
		}
		if(!empty($_POST["edCategory"])){
			$tuser->edit_user_category($eduser_id,$edCategory);
			//echo "contact name edited";
			}
		else{
				
		}
		if(!empty($_POST["edStatus"])){
			$tuser->edit_user_status($eduser_id,$edstatus);
			//echo "contact name edited";
			}
		else{
				
		}
		if(!empty($_POST["edRole"])){
			$tuser->edit_user_role_group($eduser_id,$edrole);
			//echo "contact name edited";
			}
		else{
				
		}
		header("Location: users.php");
		
	}
	else{
		
		//$tservice->delete_service($edcategory_id);
			//echo "camee_here";
	}
	}
include "header.php";
include "footer.php";

?>
<section class="content">
        <div class="container-fluid">
            <form method="POST" >
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
							<h2 class="card-inside-title">User Name</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $tuser->get_attribute_value("user_name",$eduser_id); ?>" name="eduserName" />
                                        </div>
                                    </div>
                                </div>
                            </div>
							<h2 class="card-inside-title">Password</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" class="form-control" value="<?php echo $tuser->get_attribute_value("password",$eduser_id); ?>" name="edPassword" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2 class="card-inside-title">Name</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $tuser->get_attribute_value("name",$eduser_id); ?>" name="edName" />
                                        </div>
                                    </div>
                                </div>
                            </div>
							<h2 class="card-inside-title">Status</h2>
                            <div class="row clearfix">
                            	<div class="col-sm-12">
                                <div class="demo-radio-button">
		                                    <input name="edStatus" value="active" type="radio" id="radio_190" class="with-gap radio-col-lime"  />
		                                    <label for="radio_190">Active</label>
		                                    <input name="edStatus" value="dormant" type="radio" id="radio_1000" class="with-gap radio-col-lime"  />
		                                    <label for="radio_1000">Dormant</label>
                                 		</div>
                            </div>
                        	</div>
							</br>
							<h2 class="card-inside-title">User Category</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    	<div class="demo-radio-button">
		                                    <input name="edCategory" value="client" type="radio" id="radio_19" class="with-gap radio-col-lime"  />
		                                    <label for="radio_19">Client</label>
		                                    <input name="edCategory" value="admin" type="radio" id="radio_100" class="with-gap radio-col-lime"  />
		                                    <label for="radio_100">Admin</label>
                                 		</div>
                                    </div>
                                </div>
                            </div>
									<div class="error-window alert alert-danger"><?= $err ?></div>
							<div class="form-contol text-right">
								<a class="btn btn-default" href="users.php">Cancel</a>
								<button name="submit" type="submit" class="btn btn-primary" id="register">Submit</button>
							</div>
							<div class="form-contol text-left">
								<a class="btn btn-danger" href="delete_user.php?user_id=<?=$eduser_id;?>">Delete</a>
							</div>
                                </div>
                            </div>
						</form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
            <!-- Textarea -->
          
            <!-- #END# Textarea -->
            <!-- Select -->
            
							
                    
						
         </div>
    </section>