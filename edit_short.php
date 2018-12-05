<?php
error_reporting(E_ERROR | E_PARSE);

include "smsModel.php";
//require_once "init.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$tshort= new Short();
$edshort_id= $_GET['short_id'];

$nedshort_number = $_POST["nedshort_number"];
$nedshort_type= $_POST["nedshort_type"];

if (!empty($_POST)) {
	if(!isset($_POST['deleteShort'])){
		if(!empty($_POST["nedshort_number"])){
			$tshort->edit_short_number($edshort_id,$nedshort_number);
			//echo "contact number change";
		}
		else {
			//echo "contact number no change";
		}
		
		if(!empty($_POST["nedshort_type"])){
			$tshort->edit_short_type($edshort_id,$nedshort_type);
				//echo "contact name edited";
		}
		else{
			
		}
	}
	else{
		header("Location:delete_short.php?short_id=<?= $edshort_id?>"); 
		
	}
	header("Location: short.php");

	}
include "header.php";
include "footer.php";
?>


     <section class="content">
        <div class="container-fluid">
            <div class="block-header">
			<form method="POST" >
                <h1>Edit Short Number</h1>
				</div>
				<!-- Input -->
				<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $tshort->get_attribute_value("number",$edshort_id); ?>"name="nedshort_number" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $tshort->get_attribute_value("type",$edshort_id); ?>" name="nedshort_type"/>
                                        </div>
										
                                    </div>
									<div class="form-contol text-right">
										<a class="btn btn-default" href="short.php">Cancel</a>
										<button name="submit" type="submit" class="btn btn-primary" id="register">Submit</button>
									</div>
									<div class="text-left">
										
										<a class="btn btn-danger" href="delete_short.php?short_id=<?= $edshort_id?>">Delete</a>
								</div>
								</form>
                                </div>
                            </div>
						</div>
						</div>
						</div>
						</div>
						</section>
