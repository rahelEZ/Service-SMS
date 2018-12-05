<?php
error_reporting(E_ERROR | E_PARSE);
include "smsModel.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$tuser=new User();
$delete_user_id= $_GET['user_id'];
if (!empty($_POST)) {
    $delete = isset($_POST["deleteUser"]);
	echo $delete;
	if($delete){
		$tuser->delete_user($delete_user_id);
		header("Location: users.php");
	}
    //header("Location: users.php");
}


include "header.php";
include "footer.php";
?>
	<section class="content">
        <div class="container-fluid">
            <div class="block-header">
			
                <h1>Delete User?</h1>
				</div>
				<!-- Input -->
				<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
									<h4> Are you sure you would like to delete "<?php echo $tuser->get_attribute_value("user_name",$delete_user_id); ?>"?
											The process is irreversible.</h4>
						</br>
						
				<form method="POST">
						<div class="text-right">
							<a class="btn btn-default" href="edit_user.php?user_id=<?= $delete_user_id ?>"> Cancel</a>
							<button name="deleteUser" type="submit" class="btn btn-danger" id="delete">Delete</button>
						</div>
						
				</form>
                    </div>
           
                  
					</div>
				</div>
			</div>
		</section>
    

