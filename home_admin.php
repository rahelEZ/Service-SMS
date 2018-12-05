<?php
error_reporting(E_ERROR | E_PARSE);
include "smsModel.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$number_of_contacts= $tcontact->count_all();
echo $number_of_contacts;

$all_subs = $tsubscription->all_subscription();
$number_of_categories= $tcategory->count_all();
$number_of_services= $tservice->count_all();
$number_of_subscription= $tsubscription->count_all();
include "header.php";
include "footer.php";
?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_box</i>
                        </div>
                        <div class="content">
                            <div class="text">Contacts</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $number_of_contacts;?>" data-speed="15" data-fresh-interval="1"></div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="content">
                            <div class="text">Subscriptions</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $number_of_subscription; ?>" data-speed="1000" data-fresh-interval="1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">text_fields</i>
                        </div>
                        <div class="content">
                            <div class="text">Categories</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $number_of_categories;?>" data-speed="1000" data-fresh-interval="1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">swap_calls</i>
                        </div>
                        <div class="content">
                            <div class="text">Services</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $number_of_services;?>" data-speed="1000" data-fresh-interval="1"></div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            
            <!-- #END# CPU Usage -->
            
                <!-- #END# Visitors -->
                <!-- Latest Social Trends -->
               
                <!-- #END# Latest Social Trends -->
                <!-- Answered Tickets -->
               
                <!-- #END# Answered Tickets -->
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
					 <div class="header">
					 <h2>Recent Subscriptions</h2>
					 </div>
                        <div class="body table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>id#</th>
                                        <th>Subscriber's Name</th>
                                        <th>Subscribed Service</th>
										<th>Subscribed Since</th>
										
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
								<td><?php $a= $tsubscription->get_attribute_value("sub_service",$asub);
								echo $tservice->get_attribute_value("name",$a);?></td>
								<td><?php echo $tsubscription->get_attribute_value("date_created",$asub); ?></td>
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
        </div>
    </section>
