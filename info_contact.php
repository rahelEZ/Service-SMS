<?php
error_reporting(E_ERROR | E_PARSE);

include "smsModel.php";
//include "header.php";
include "footer.php";

$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$detcontact_id= $_GET['contact_id'];
$all_subs_for_contact= $tsubscription->subscription_for_id($detcontact_id);
$all_services = $tservice->get_all_services();

if (!empty($_POST)) {
	$sub_service=$_POST["contactSubs"];
	$service_cat= $tservice->get_attribute_value("ser_cat",$sub_service);
	$validation_message = smsModel::require_fields(["contactSubs" => "Service Name"], $_POST);
	$already= $tsubscription->validate_subscription($tsubscription->get_attribute_value("sub_contact",$detcontact_id),$tsubscription->get_attribute_value("sub_service",$sub_service));
	if ($validation_message) {
        $err = $validation_message;
    } 
	else if($already){
		$err= "Already Subscribed to this service";
	}
	else {
		echo "came here";
		$tsubscription->new_subscription($detcontact_id,$sub_service,$service_cat);		
		header("Location: info_contact.php?contact_id=$detcontact_id");
    }
}	

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | Service SMS</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-indigo">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="home_admin.php">ADMIN- Service SMS</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">?</span>
                        </a>
				<li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
                       
            </div>
        </div>
		
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>
                    <div class="email">john.doe@admin.com </div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="home_admin.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
					<li>
                        <a href="contacts.php">
                            <i class="material-icons">account_box</i>
                            <span>Contacts</span>
                        </a>
                    </li>
					<li>
                        <a href="subscription.php">
                            <i class="material-icons">assignment</i>
                            <span>Subscription</span>
                        </a>
                    </li>
                    <li>
					<li>
                        <a href="short.php">
                            <i class="material-icons">phone</i>
                            <span>Short Numbers</span>
                        </a>
                    </li>
                        <a href="categories.php">
                            <i class="material-icons">text_fields</i>
                            <span>Categories</span>
                        </a>
                    </li>
					<li>
                        <a href="services.php">
                            <i class="material-icons">swap_calls</i>
                            <span>Services</span>
                        </a>
                    </li>
					<li>
                        <a href="messages.php">
                            <i class="material-icons">message</i>
                            <span>Messages</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons col-light-blue">donut_large</i>
                            <span>Information</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018 - 2019 <a href="javascript:void(0);">About design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
		<aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
			</div>
		</aside>
	</section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>Contact Details for <?php echo $tcontact->get_attribute_value("number",$detcontact_id);?> </h1>
			</div>
		</div>
		<div class="block-header">
                <h2>Belongs to: </h2>
        </div>
			<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="body bg-purple">
                            <?php echo $tcontact->get_attribute_value("name",$detcontact_id);?>
                        </div>
                    </div>
            </div>
			</div>
				<!-- Input -->
	<div class="row clearfix">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Services subscribed to: </h3>
			<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
										<th>Sub. id#</th>
                                        <th>Subscribed Service</th>
										<th>Subscribed Since</th>
										<th> </th>
                                    </tr>
                                </thead>
                                <tbody>
								
                                   <?php		
								foreach($all_subs_for_contact as $asubc){
									?>	
								 <tr>
								 <td><?php echo $asubc; ?> </td>
								<td><?php $f=$tsubscription->get_attribute_value("sub_service",$asubc); 
								echo $tservice->get_attribute_value("name",$f);?></td>
								<td><?php echo $tsubscription->get_attribute_value("date_created",$asubc); ?></td>
								<td><a href="delete_subscription.php?subscription_id=<?= $asubc ?>" class="btn btn-danger">Unsubscribe</a></td>
							   </tr>
								<?php
								//<td> <button name="unSub" onclick="unsubscribe()" class="btn btn-danger" >Unsubscribe</button></td>
								   }
								 ?>
								 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
			</div>
			
        </div>
	</div>
	<h4 >Add Subscription</h4>
	<div class="card">
    <div class="body">
        <div class="row clearfix">
            <div class="col-sm-6">
				<div class="form-group">
					<form method=POST >
                     <select class="form-control show-tick" name="contactSubs">
                        <option value="">-- Select a Service --</option>
							<?php		
								foreach($all_services as $sservice){
							?>	
							<option value="<?php echo $sservice; ?>"><?php echo $tservice->get_attribute_value("name",$sservice); ?></option>
                             <?php
								}
							?>
                    </select>
				</div>
				</br>
				</br>
				<div class="error-window alert alert-danger"><?php= $err ?></div>
					<div class="text-right">
						<a class="btn btn-default" href="contacts.php">Cancel</a>
						<button name="submit" type="submit" class="btn btn-primary" id="register">Submit</button>
					</div>
					<div class="text-left">
						<a class="btn btn-danger" href="edit_contact.php?contact_id=<?= $detcontact_id ?>">Edit</a>
					</div>
				</form>
            </div>
        </div>
     </div>
</div>
			
</section>

  