<?php

error_reporting(E_ERROR | E_PARSE);
include "smsModel.php";
include "header.php";
include "footer.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$tuser=new User();
$trole=new Role();

$all_types = $trole->all_types();
?>
	
	 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>Role Groups</h1>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
               <div class="col-md-2 right">
            <a href="to_new_rg.php" class="btn btn-lg btn-primary btn-circle red">+</a>
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
										<th>Name</th>
										<th>Description </th>
										<th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php		
								foreach($all_types as $arole){
									?>	
								 <tr>
								 <td><?php echo $arole; ?> </td>
								<td><a href="info_role.php?role_id=<?= $arole ?>"><?php echo $trole->get_attribute_value("name",$arole); ?></a></td>
								<td><?php echo $trole->get_attribute_value("description",$arole); ?></td>
								<td><a href="edit_role.php?role_id=<?= $arole ?>" class="btn btn-danger">Edit</a></td>
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
