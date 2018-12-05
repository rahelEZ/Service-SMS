<?php
error_reporting(E_ERROR | E_PARSE);
include "smsModel.php";
include "header.php";
include "footer.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$trole=new Role();
$delete_role_id= $_GET['role_id'];
if (!empty($_POST)) {
    $delete = isset($_POST["deleteRole"]);
	echo $delete;
	if($delete){
		$trole->delete_role($delete_role_id);
		header("Location: role_group.php");
	}
    header("Location: role_group.php");
}
header("Location: role_group.php");
?>
	<section class="content">
        <div class="container-fluid">
            <div class="block-header">
			
                <h1>Delete Role Group?</h1>
				</div>
				<!-- Input -->
				<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
									<h4> Are you sure you would like to delete "<?php echo $trole->get_attribute_value("name",$delete_role_id); ?>"?
											The process is irreversible.</h4>
						</br>
						
				<form method="POST">
						<div class="text-right">
							<a class="btn btn-default" href="edit_role.php?role_id=<?= $delete_role_id ?>"> Cancel</a>
							<button name="deleteRole" type="submit" class="btn btn-danger" id="delete">Delete</button>
						</div>
						
				</form>
                    </div>
           
                  
					</div>
				</div>
			</div>
		</section>
    

