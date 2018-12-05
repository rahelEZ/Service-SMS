<?php
//error_reporting(E_ERROR | E_PARSE);

include "smsModel.php";
//require_once "init.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$edsubscription_id= $_GET['subscription_id'];
$err="";
$all_services = $tservice->get_all_services();
$to_contact=$tsubscription->get_attribute_value("sub_contact",$edsubscription_id);
$in = $tsubscription->validate_subscription($tsubscription->get_attribute_value("sub_contact",$edsubscription_id),$tsubscription->get_attribute_value("sub_service",$edsubscription_id));

$osub=$tsubscription->get_attribute_value("sub_service",$edsubscription_id);

if (!empty($_POST)) {
	if(!isset($_POST["unsubscribe"])){
		 $nsub_service = $_POST["newService"];
		 $validation_message = smsModel::require_fields(["newService"=>"Service"], $_POST);
		 if ($validation_message) {
			$err = $validation_message;
		} 
		else if(!$in){
			//echo "came here";
			$err = "Subscription already Exists!";
		}
		
		else {
			echo "came here";
			$tsubscription->edit_subscription($edsubscription_id,$nsub_service);
		}
	}
    else {
		echo "came here";
		$tsubscription->delete_subscription($edsubscription_id);
    }
	header("Location: subscription.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Manage Subscription</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="../../plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="../../plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
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
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
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
                    <div class="email">john.doe@admin.com</div>
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
                        <a href="subscription.php">
                            <i class="material-icons">assignment</i>
                            <span>Subscription</span>
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
	</section>
        <!-- #END# Right Sidebar -->
	<section class="content">
        <div class="container-fluid">
            <form method="POST" >
            <!-- Input -->
       
            <!-- #END# Input -->
            <!-- Textarea -->
          
            <!-- #END# Textarea -->
            <!-- Select -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h4 >Manage subscription for <?php echo $to_contact; ?></h4>
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <select class="form-control show-tick" name="newService">
                                        <option value="<?php echo $osub; ?>"><?php echo $osub; ?></option>
										<?php		
											foreach($all_services as $aservice){
												$list_sername= $tservice->get_attribute_value("name",$aservice);
												if($osub == $list_sername){ ?>
										<option disabled value ="<?php echo $osub; ?>"><?php echo $osub; ?></option>
											<?php } 
												else { ?>
										<option value="<?php echo $list_sername; ?>"><?php echo $list_sername; ?></option>
											<?php } } ?>
                                    </select>
									</br>
									<div class="error-window alert alert-danger"><?= $err ?></div>
									<div class="form-contol text-right">
										<a class="btn btn-default" href="subscription.php">Cancel</a>
										<button name="submit" type="submit" class="btn btn-primary" id="register">Submit</button>
									</div>
									<div class="text-left">
										<button name="unsubscribe" type="submit" class="btn btn-danger" id="delete">Unsubscribe</button>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			  
            <!-- #END# Select -->
             
            <!-- #END# Checkbox -->
            </form>
        </div>
    </section>					

    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="../../plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="../../plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="../../plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
</body>
</html>

