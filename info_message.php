<?php
error_reporting(E_ERROR | E_PARSE);

include "smsModel.php";
//require_once "init.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$tshort=new Short();
$tuser= new User();
$trole= new Role();
$tmessage=new Message();
$detmessage_id= $_GET['message_id'];
$id=$_SESSION['id'];
$type=$tuser->get_user_category($id);

$cat_id= $tmessage->get_attribute_value("cat_id",$detmessage_id);
if($type=="admin"){
    $all_services=$tservice->get_all_services($cat_id);
    $a="messages.php?category_id=cat_id";
}
else{
    $role_group_id=$tuser->get_attribute_value("role_group",$id);
    $all_services = $trole->get_services_for($role_group_id);
    $a="messages_client.php?category_id=cat_id";
}



if (!empty($_POST)) {
		$edmessage = $_POST["editMessage"];
		$test_number= $_POST["nTestNumber"];
		$to_pass=$_POST["checklist"];
		$short=$_POST['short'];
		if(isset($_POST['testIt'])){
			//$tmessage->edit_message_text($detmessage_id,$edmessage);
			$tmessage->edit_message_test($detmessage_id);
			$test_number= $detmessage_id.",".$test_number;
			header("Location:test_message.php?idtest_phone=$test_number");	
		}
		else if(isset($_POST['messageEdit'])){
			$tmessage->edit_message_text($detmessage_id,$edmessage);
			echo "test It . $test_number";
		}
		else{
			$_SESSION['send_location']=$to_pass;
			$_SESSION['send_number']=$short;
			$tmessage->edit_message_sent($detmessage_id);
			header("Location:send_message.php?message_id=$detmessage_id");	
			echo "send All";
		}
}
	
if($type=="admin"){
    include "header.php";
}
else{
    include "headerClient.php";
}
include "footer.php";
?>

<section class="content">
    <div class="container-fluid">
		<form method="POST">
            <div class="block-header">
                <h2>Message Controls</h2>
            </div>
            <!-- Input -->
          
            <!-- #END# Input -->
            <!-- Textarea -->
			
            <div class="row clearfix">
			<form method="POST">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit Message</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea name="editMessage" rows="4" class="form-control no-resize" placeholder="<?php echo $tmessage->get_attribute_value("message",$detmessage_id);?>"></textarea>
                                        </div>
                                    </div>
									<div class="form-contol text-right">
										<a class="btn btn-danger" href="delete_message.php?message_id=<?=$detmessage_id;?>">Delete</a>
										<button name="messageEdit" type="submit" class="btn btn-primary" id="register">Edit</button>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Textarea -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Test</h2>
                        </div>
                        <div class="body">
							<div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" placeholder="Test Number" name="nTestNumber" />
									 <?php //$test_number= $_POST["nTestNumber"]; $id_test= $detmessage_id.",".$test_number;
									 //echo $id_test;?>
                                 </div>
							</div>
							
								<div class="form-contol text-right">
								
									<?php //$test_number= $id_test=$detmessage_id.",".$test_number;
									//echo $id_test;?>
									<button class="btn btn-primary" id="register" type="submit" name="testIt">Test</button>
								</div>
							</div>
                        </div>
                    </div>
            </div>
            <!-- Checkbox -->
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Services
                                <small>select services to send message to</small>
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="demo-switch">
                                <div class="row clearfix">
                                    <div class="col-sm-3">
									<?php		
									foreach($all_services as $mservice){
                                        if(!$mservice==null){
										?>	
                                        <div class="switch">
										<div class="demo-switch-title"><?php echo $tservice->get_attribute_value("name",$mservice); ?></div>
                                            <label><input type="checkbox" value="<?php echo $mservice;?>" name="checklist[]"><span class="lever switch-col-orange"></span></label>
											<?php } }?>
										</div>
                                    </div>
                                </div>
                            </div>
							</br>
							</br>
                        </br>
                        <div class="row clearfix">
                        <div class="col-sm-3">
							<h4> Send from: </h4>
                            
                            <div class="demo-radio-button">
                                <input name="short" value="<?php $cat=$tmessage->get_attribute_value("cat_id",$detmessage_id);
                                $fin=$tcategory->get_attribute_value("incoming",$cat); echo $fin;?>" type="radio" id="radio_3" class="with-gap radio-col-purple"  />
                                <label for="radio_3"><?php echo $tshort->get_attribute_value("number",$fin);
                                ?></label>
                                <input name="short" value="<?php $cat=$tmessage->get_attribute_value("cat_id",$detmessage_id);
                                $fin= $tcategory->get_attribute_value("outgoing",$cat); echo $fin;?>" type="radio" id="radio_4" class="with-gap radio-col-purple"  />
                                <label for="radio_4"><?php echo $tshort->get_attribute_value("number",$fin);
                                ?></label>
                            </div>
							</br>
							<div class="form-contol text-right">
								<a class="btn btn-default" href="<?php echo $a; ?>">Cancel</a>
								<button class="btn btn-primary" name="sendAll">Send</button>
							</div>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
            </div>
            <!-- #END# Checkbox -->
                     
		</form>
    </div>
 </section>
