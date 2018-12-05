<?php
//error_reporting(E_ERROR | E_PARSE);
include "smsModel.php";
include "header.php";
include "footer.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();

$all_subs = $tsubscription->all_subscription();
if(isset($_POST['unSub'])){
	$tsubscription->delete_subscription($asub);
}
?>

	
	 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>Subscriptions</h1>
            </div>
            <!-- Basic Table -->
          
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
                                        <th>Number</th>
                                        <th>Subscribed Service</th>
										<th>Subscribed Since</th>
										<th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php		
								foreach($all_subs as $asub){
									?>	
								 <tr>
								 <td><?php echo $asub; ?> </td>
								<td><?php $a=$tsubscription->get_attribute_value("sub_contact",$asub); 
								echo $tcontact->get_attribute_value("number",$a);?></td>
								<td><?php $a=$tsubscription->get_attribute_value("sub_service",$asub);
								echo $tservice->get_attribute_value("name",$a);?></td>
								<td><?php echo $tsubscription->get_attribute_value("date_created",$asub); ?></td>
								<td><a href="delete_subscription.php?subscription_id=<?= $asub ?>" class="btn btn-danger">Unsubscribe</a></td>
							   </tr>
								<?php
								
								//<td> <button name="unSub" onclick="unsubscribe()" class="btn btn-danger" >Unsubscribe</button></td>
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
	
   