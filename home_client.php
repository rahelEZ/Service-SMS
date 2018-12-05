<?php
error_reporting(E_ERROR | E_PARSE);
include "smsModel.php";
$tpermission= new Permission();
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$trole= new Role();
$tsubscription=new Subscription();
$tuser=new User();
$tpart= new Part();

$id=$_SESSION['id'];
echo $id;
$role_group_id=$tuser->get_attribute_value("role_group",$id);
$number_of_services= $tpermission->get_rg_services_count($role_group_id);
$all_services = $trole->get_services_for($role_group_id);
$all_subss = $trole->get_subscription_for($role_group_id);

$number_of_subscription= count($all_subss);
include "headerClient.php";
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
            <div class="container-fluid">
             <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Services List
                               <small>Services you can access</small>
                            </h2>
                            <div class="body table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Service</th>
                                        <th>Category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php       
                                        foreach($all_services as $aservice){
                                            if($aservice!=""){
                                        ?>  
                                 <tr>
                                <td><?php echo $tservice->get_attribute_value("name",$aservice);?></td>                   
                                <td><?php $a=$tservice->get_attribute_value("ser_cat",$aservice);
                                echo $tcategory->get_attribute_value("name",$a);?></td>
                               </tr>
                               <?php
                                }}
                                 ?>
                                </tbody>
                            </table>
                        </div>
                        </div>
                       
                        
                    </div>
                </div>
            </div>
        </div>          
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
					 <div class="header">
					 <h2>Recent Subscriptions</h2>
                      <small>Subscribers under your service</small>
					 </div>
                        <div class="body table-responsive" class="pagination">
                            
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>id#</th>
                                        <th>Subscriber's Number</th>
                                        <th>Subscribed Service</th>
										<th>Subscribed Since</th>
										
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php       
                                        foreach($all_subss as $all_subs){
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
