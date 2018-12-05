<?php
//error_reporting(E_ERROR | E_PARSE);
include "smsModel.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();

$all_services = $tservice->get_all_services();

include "header.php";
include "footer.php";
?>
	 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>List of Services</h1>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
               <div class="col-md-2 right">
            <a href="new_service.php" class="red btn btn-lg btn-primary btn-circle red">+</a>
		</div>
            </div>
            <!-- #END# Basic Table -->
            <!-- Striped Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>id#</th>
                                        <th>Service Name</th>
										<th>Category</th>
                                        <th>Date Created</th>
										<th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php		
								foreach($all_services as $aservice){
									?>	
								 <tr>
								 <td><?php echo $aservice; ?> </td>
								<td><a href="info_service.php?service_id=<?= $aservice?>"><?php echo $tservice->get_attribute_value("name",$aservice); ?></a></td>
								<td><?php $ser= $tservice->get_attribute_value("ser_cat",$aservice); 
								echo $tcategory->get_attribute_value("name",$ser);?></td>
								<td><?php echo $tservice->get_attribute_value("date_created",$aservice); ?></td>
								<td><a href="edit_services.php?service_id=<?= $aservice ?>" class="btn btn-danger">Edit</a></td>
								
							   </tr>
								<?php
								   }
								 ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Striped Rows --> 
            <!-- #END# With Material Design Colors -->
        </div>
    </section>
