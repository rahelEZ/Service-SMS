<?php
error_reporting(E_ERROR | E_PARSE);

include "smsModel.php";
//require_once "init.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$tshort=new Short();
$tmessage=new Message();
$message_to_send= $_GET['message_id'];
session_start();
$that= $_SESSION['send_location'];
$number=$_SESSION['send_number'];

if($type=="admin"){
    include "header.php";
}
else{
    include "headerClient.php";
}
include "footer.php";
?>

    <section class="content">
				<!-- Input -->
		
		<div class="container-fluid">
            <div class="block-header">
                <h2>Send Mode</h2>
            </div>
            <!-- Basic Example -->
            <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue-grey">
                           Message from <?php echo $tshort->get_attribute_value("number",$number);?>
                        </div>
                        <div class="body">
                            <?php echo $tmessage->get_attribute_value("message",$message_to_send);?>
                        </div>
                    </div>
                </div>
			</div>
			<div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Services List
							   <small>services message will be sent to</small>
                            </h2>
                            
                        </div>
                        <div class="body">
                            <ul>
                                <?php foreach ($that as $a){ ?>
									<li> <?php echo $tservice->get_attribute_value("name",$a);?> </li>
								<?php  } ?>
                            </ul>
                        </div>
						
                    </div>
                </div>
			<div class="text-left">
				<a href="info_message.php?message_id=<?= $message_to_send ?>" class="btn btn-default">Back  </a>
			</div>	
		</div>	
	</section>
