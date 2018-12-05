<?php
error_reporting(E_ERROR | E_PARSE);

include "smsModel.php";
//require_once "init.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$tshort=new Short();
$tuser=new User();
$trole=new Role();
$detuser_id= $_GET['user_id'];

include "header.php";
include "footer.php";
?>
    <section class="content">
        <div class="container-fluid">
        <div class="block-header">
           <h1>Details for: <?php echo $tuser->get_attribute_value("user_name",$detuser_id);?> </h1>
		</div>
		</div>
		</br>
		</br>
				<!-- Input -->
		<div class="container-fluid">
            <!-- No Header Card -->
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="body bg-cyan">
                            Name: <?php echo $tuser->get_attribute_value("name",$detuser_id);?>
                        </div>
                    </div>
				    <div class="card">
                        <div class="body bg-orange">
                            Password: <?php echo $tuser->get_attribute_value("password",$detuser_id);?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body bg-lime">
                            Role Group: <?php $a=$tuser->get_attribute_value("role_group",$detuser_id);
							echo $trole->get_attribute_value("name",$a);?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="body bg-indigo">
                            Status: <?php echo $tuser->get_attribute_value("status",$detuser_id); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body bg-purple">
                            User Category: <?php echo $tuser->get_attribute_value("user_category",$detuser_id); ?>
                        </div>
                    </div>
                </div>
				
			</div>
			<div class="text-left">
						<a href="edit_user.php?user_id=<?= $detuser_id ?>" class="btn btn-danger">Edit  </a>
						<a class="btn btn-default" href="users.php">Back</a>
					</div>	
		</div>	
		
		</div>	
	</section>
