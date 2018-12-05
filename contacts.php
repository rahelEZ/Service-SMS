<?php

error_reporting(E_ERROR | E_PARSE);
include "smsModel.php";
include "header.php";
include "footer.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();

$all_contacts = $tcontact->all_contacts();

?>
	
	 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>Contact List</h1>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
               <div class="col-md-2 right">
            <a href="new_contact.php" class="btn btn-lg btn-primary btn-circle red">+</a>
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
										<th>Number</th>
                                        <th>NAME</th>
                                        <th>Date Created</th>
										<th>Last Updated</th>
										<th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php		
								foreach($all_contacts as $acontact){
									?>	
								 <tr>
								 <td><?php echo $acontact; ?> </td>
								<td><a href="info_contact.php?contact_id=<?= $acontact ?>"><?php echo $tcontact->get_attribute_value("number",$acontact); ?></a></td>
								<td><?php echo $tcontact->get_attribute_value("name",$acontact); ?></td>
								<td><?php echo $tcontact->get_attribute_value("date_created",$acontact); ?></td>
								<td><?php echo $tcontact->get_attribute_value("date_updated",$acontact); ?></td>
								<td><a href="edit_contact.php?contact_id=<?= $acontact ?>" class="btn btn-danger">Edit</a></td>
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
