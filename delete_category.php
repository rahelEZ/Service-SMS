<?php
error_reporting(E_ERROR | E_PARSE);
include "smsModel.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$delete_category_id= $_GET['category_id'];
if (!empty($_POST)) {
    $delete = isset($_POST["deleteCategory"]);
	echo $delete;
	if($delete){
		$tcategory->delete_category($delete_category_id);
	}
     
	header("Location: categories.php");
}
include "header.php";
include "footer.php";
?>


	<section class="content">
        <div class="container-fluid">
            <div class="block-header">
			
                <h1>Delete Category?</h1>
				</div>
				<!-- Input -->
				<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
									<h3> Are you sure you would like to delete "<?php echo $tcategory->get_attribute_value("name",$delete_category_id); ?>"?
											The process is irreversible.</h3>
						</br>
						
				<form method="POST">
						<div class="text-right">
							<a class="btn btn-default" href="edit_category.php?category_id=<?= $delete_category_id ?>"> Cancel</a>
							<button name="deleteCategory" type="submit" class="btn btn-danger" id="delete">Delete</button>
						</div>
					
					
				</form>
                    </div>
           
                  
					</div>
				</div>
			</div>
		</section>
    
