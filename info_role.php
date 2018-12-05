<?php
error_reporting(E_ERROR | E_PARSE);

include "smsModel.php";
//require_once "init.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$tshort=new Short();
$trole=new Role();
$tpart=new Part();
$tpermission= new Permission();
$detrole_id= $_GET['role_id'];
$role_roles= $tpermission->get_permissions_for_role($detrole_id);

include "header.php";
include "footer.php";
?>
    <section class="content">
        <div class="container-fluid">
        <div class="block-header">
           <h1>Details for: <?php echo $trole->get_attribute_value("name",$detrole_id);?> </h1>
		</div>
		</div>
				<!-- Input -->
		<div class="container-fluid">
            
            <!-- Basic Table -->
            
            <!-- #END# Basic Table -->
            <!-- Striped Rows -->
            
				<div class="block-header">
						<h2>Roles</h2>
				</div>
				<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<?php foreach ($role_roles as $crole){ ?>
					<div class="card">
                        <div class="body bg-cyan">
                           <?php echo $tpart->get_attribute_value("name",$crole); ?></a>
                        </div>
                    </div>
					<?php }?>
				</div>
			</div>
                        
		</div>	

			
			
		<div class="container-fluid">
            <div class="block-header">
                <h2>Role Group Description</h2>
            </div>
            <!-- Basic Example -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <?php echo $trole->get_attribute_value("description",$detrole_id);?>
                        </div>
                    </div>
                </div>
			</div>
		<div class="text-left">
			<a href="edit_role.php?role_id=<?= $detrole_id ?>" class="btn btn-danger">Edit  </a>
			<a class="btn btn-default" href="role_group.php">Back</a>
		</div>	
					
					
			
		</div>	
	</section>
