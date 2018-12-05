<?php
//error_reporting(E_ERROR | E_PARSE);

include "smsModel.php";
//require_once "init.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$tshort= new Short();
$err="";

if (!empty($_POST)) {
    $number = $_POST["number"];
	$ntype = $_POST["ntype"];
	
    $validation_message = smsModel::require_fields(["ntype" => "Number Type", "number" => "Number"], $_POST);
	if ($validation_message) {
        $err = $validation_message;
    } 
	else if(!$tshort->short_number_available($number)){
		$err= "Short number in database";
	}
    else {
		echo "came here";
		$tshort->new_short_number($ntype,$number);
		header("Location: short.php");
    }
	
}
include "header.php";
include "footer.php";
?>
	
	 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
			<form method="POST" >
                <h2>ADD Short Number</h2>
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
                                            <input type="text" class="form-control" placeholder="Short number" name="number" />
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Number Type" name="ntype"/>
                                        </div>
										
                                    </div>
									<div class="error-window alert alert-danger"><?= $err ?></div>
									<div class="form-contol text-right">
										<a class="btn btn-default" href="short.php">Cancel</a>
										<button name="submit" type="submit" class="btn btn-primary" id="register">Submit</button>
									</div>
								</form>
                                </div>
                            </div>
						</div>
					</div>
				</div>
				</div>