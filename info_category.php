<?php
error_reporting(E_ERROR | E_PARSE);

include "smsModel.php";
//require_once "init.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$tshort=new Short();
$detcategory_id= $_GET['category_id'];
$all_services = $tservice->all_services($detcategory_id);
include "header.php";
include "footer.php";
?>


    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>Details for Category: <?php echo $tcategory->get_attribute_value("name",$detcategory_id);?> </h1>
			</div>
		</div>
				<!-- Input -->
		
		<div class="container-fluid">
            <!-- No Header Card -->
            <div class="block-header">
                <h2>Incoming 'n Outgoing numbers</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="body bg-red">
                            Incoming Number: <?php $in=$tcategory->get_attribute_value("incoming",$detcategory_id);
							echo $tshort->get_attribute_value("number",$in);?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="body bg-blue-grey">
                            Outgoing Number: <?php $out=$tcategory->get_attribute_value("outgoing",$detcategory_id);
							echo $tshort->get_attribute_value("number",$out);?>
                        </div>
                    </div>
                </div>
			</div>
		</div>
		<div class="container-fluid">
		<div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Services List
							   <small>Services under this category</small>
                            </h2>
                            
                        </div>
                        <div class="body">
                            <ul>
                                <?php foreach ($all_services as $aservice){ ?>
									<li> <?php echo $tservice->get_attribute_value("name",$aservice);?> </li>
								<?php  } ?>
                            </ul>
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
                        <div class="header bg-blue-grey">
                            <h2>
                                Amharic
                            </h2>
                        </div>
                        <div class="body">
                            <?php echo $tcategory->get_attribute_value("description_amh",$detcategory_id);?>
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
                            <?php echo $tcategory->get_attribute_value("description_eng",$detcategory_id);?>
                        </div>
                    </div>
                </div>
			</div>
			
					<div class="text-left">
						<a class="btn btn-default" href="categories.php">Cancel</a>
						<a href="edit_category.php?category_id=<?= $detcategory_id ?>" class="btn btn-danger">Edit</a>
					</div>
			
		</div>	
	</section>
