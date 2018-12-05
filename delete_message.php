<?php
error_reporting(E_ERROR | E_PARSE);
include "smsModel.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$tshort= new Short();
$tmessage=new Message();
$tuser = new User();
$delete_message_id= $_GET['message_id'];
$id=$_SESSION['id'];
if (!empty($_POST)) {
    $delete = isset($_POST["deleteMessage"]);
	echo $delete;
	if($delete){
		$tmessage->delete_message($delete_message_id);
	}
    if($tuser->get_user_category($id)=="admin"){
    	header("Location: to_messages.php");
    }
    else{
    	header("Location: to_message_client.php");
    }
	
}
 if($tuser->get_user_category($id)=="admin"){
    	include "header.php";
    }
    else{
    	include "headerClient.php";
    }

include "footer.php";
?>
	<section class="content">
        <div class="container-fluid">
            <div class="block-header">
			
                <h1>Delete Message?</h1>
				</div>
				<!-- Input -->
				<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
									<h3> Are you sure you would like to delete "<?php echo $tmessage->get_attribute_value("message",$delete_message_id); ?>"?
											The process is irreversible.</h3>
						</br>
						
				<form method="POST">
						<div class="text-right">
							<button name="deleteMessage" type="submit" class="btn btn-danger" id="delete">Delete</button>
							<?php if($tuser->get_user_category($id)=="admin"){
    								$a= "edit_message.php?message_id=$delete_message_id";
								    }
								    else{
								    	$a= "edit_message_client.php?message_id=$delete_message_id";
								    } ?>
							<a class="btn btn-default" href="<?php echo $a; ?>" >Cancel</a>
						</div>
						
				</form>
                    </div>
           
                  
					</div>
				</div>
			</div>
		</section>
    