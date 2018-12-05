<?php
error_reporting(E_ERROR | E_PARSE);
include "smsModel.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();

$all_categories = $tcategory->all_categories();
include "header.php";
include "footer.php";
?>
	 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>List of Categories</h1>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
               <div class="col-md-2 right">
            <a href="new_category.php" class="red btn btn-lg btn-primary btn-circle red">+</a>
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
                                        <th>NAME</th>
                                        <th>Date Created</th>
										<th>Last Updated</th>
										<th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php		
								foreach($all_categories as $acategory){
									?>	
								 <tr>
								 <td><?php echo $acategory; ?> </td>
								<td><a href="info_category.php?category_id=<?= $acategory ?>"><?php echo $tcategory->get_attribute_value("name",$acategory); ?></a></td>
							
								
								<td><?php echo $tcategory->get_attribute_value("date_created",$acategory); ?></td>
								<td><?php echo $tcategory->get_attribute_value("date_updated",$acategory); ?></td>
								<td><a href="edit_category.php?category_id=<?= $acategory ?>" class="btn btn-danger">Edit</a></td>
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
