<?php
error_reporting(E_ERROR | E_PARSE);

include "smsModel.php";
//require_once "init.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$tshort=new Short();
$detservice_id= $_GET['service_id'];

include "header.php";
include "footer.php";
?>
    <section class="content">
        <div class="container-fluid">
        <div class="block-header">
           <h1>Details for: <?php echo $tservice->get_attribute_value("name",$detservice_id);?> </h1>
		</div>
		</div>
				<!-- Input -->
		<div class="container-fluid">
            <!-- No Header Card -->
			<div class="block-header">
                <h2>Category</h2>
            </div>
			<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="body bg-purple">
                            <?php $in=$tservice->get_attribute_value("ser_cat",$detservice_id);
							echo $tcategory->get_attribute_value("name",$in);?>
                        </div>
                    </div>
            </div>
			</div>
            <div class="block-header">
                <h2>Subscription 'n Unsubscription Code</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="body bg-lime">
                            Subscription Code: <?php echo $tservice->get_attribute_value("subscription_code",$detservice_id);?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="body bg-indigo">
                            Unsubscription Code: <?php echo $tservice->get_attribute_value("unsubscription_code",$detservice_id); ?>
                        </div>
                    </div>
                </div>
			</div>
		</div>	
		<div class="container-fluid">
            <div class="block-header">
                <h2>Descriptions</h2>
            </div>
            <!-- Basic Example -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-pink">
                            <h2>
                                Amharic
                            </h2>
                        </div>
                        <div class="body">
                            <?php echo $tservice->get_attribute_value("description_am",$detservice_id);?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-cyan">
                            <h2>
                                English
                            </h2>
                          
                        </div>
                        <div class="body">
                            <?php echo $tservice->get_attribute_value("description_en",$detservice_id);?>
                        </div>
                    </div>
                </div>
			</div>
					<div class="text-left">
						<a href="edit_services.php?service_id=<?= $detservice_id ?>" class="btn btn-danger">Edit  </a>
						<a class="btn btn-default" href="services.php">Cancel</a>
					</div>	
					
					
			
		</div>	
	</section>
