<?php
error_reporting(E_ERROR | E_PARSE);
include "smsModel.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$tmessage= new Message();

$detcatm_id= $_GET['category_id'];
$all_messages = $tmessage->all_messages_for_cat($detcatm_id);
include "header.php";
include "footer.php";
?>
	 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>Messages</h1>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
               <div class="col-md-2 right">
            <a href="new_message.php" class="red btn btn-lg btn-primary btn-circle red">+</a>
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
										<th>Message</th>
                                        <th>Category</th>
										<th>Date Created</th>
										<th>Status</th>
										<th>Test Date</th>
										<th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php		
								foreach($all_messages as $amessage){
									?>	
								 <tr>
								 <td><a href="info_message.php?message_id=<?= $amessage ?>"><?php echo $amessage; ?></a></td>
								<td><?php echo $tmessage->get_attribute_value("message",$amessage); ?></td>
								<td><?php $mcat=$tmessage->get_attribute_value("cat_id",$amessage); echo $tcategory->get_attribute_value("name",$mcat) ?></td>
								<td><?php echo $tmessage->get_attribute_value("date_created",$amessage); ?></td>
								<td><?php echo $tmessage->get_attribute_value("status",$amessage); ?></td>
								<td><?php echo $tmessage->get_attribute_value("date_tested",$amessage); ?></td>
								<td><a href="edit_message.php?message_id=<?= $amessage ?>" class="btn btn-danger">Edit</a></td>
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

    