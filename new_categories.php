<?php
error_reporting(E_ERROR | E_PARSE);
include "smsModel.php";
//require_once "init.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$tshort=new Short();
$all_numbers=$tshort->all_shorts();


if (!empty($_POST)) {
    $ncategory_name = $_POST["ncategoryName"];
	$nincoming = $_POST["nincoming"];
	$noutgoing = $_POST["noutgoing"];
	$ndescrption_am = $_POST["ndescrption_am"];
	$ndescription_en = $_POST["ndescription_en"];
    $validation_message = smsModel::require_fields(["ncategoryName" => "Category Name","nincoming" => "Incoming number"
	,"noutgoing" => "Outgoing Number"], $_POST);
	if ($validation_message) {
        $err = $validation_message;
    } 
	else if (!$tcategory->category_name_available($ncategory_name)) {
        $err = "Category already exists";
    }
    else {
		echo "came here";
		$tcategory->new_category($ncategory_name,$nincoming,$noutgoing,$ndescription_am,$ndescription_en);
		//header("Location: categories.php");
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
    
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
	<!-- Top Bar -->
    
    <!-- #Top Bar -->
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
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
		
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
             
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
        <!-- #END# Right Sidebar -->
    </section>
	

    <section class="content">
        <div class="container-fluid">
            <form method="POST" >
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                       
                        <div class="body">
                            <h2 class="card-inside-title">Category Name</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Category Name" name="ncategoryName" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
            <!-- Textarea -->
          
            <!-- #END# Textarea -->
            <!-- Select -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">
						<h2 class="card-inside-title">Incoming 'n Outgoing numbers</h2>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <select class="form-control show-tick" name="nincoming">
                                        <option value="">-- Incoming Number --</option>
										<?php		
											foreach($all_numbers as $anumber){
										?>	
										<option value="<?php echo $tshort->get_attribute_value("number",$anumber); ?>"><?php echo $tshort->get_attribute_value("number",$anumber); ?></option>
                                         <?php
											}
										 ?>
                                        
                                    </select>
                                </div>
                                
                            </div>
							<div class="row clearfix">
                                <div class="col-sm-6">
                                    <select class="form-control show-tick" name="noutgoing">
                                        <option value="">-- Outgoing Number --</option>
										<?php		
											foreach($all_numbers as $anumber){
										?>	
										<option value="<?php echo $tshort->get_attribute_value("number",$anumber); ?>"><?php echo $tshort->get_attribute_value("number",$anumber); ?></option>
                                         <?php
											}
										 ?>
                                        
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Select -->
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
              
                        <div class="body">
                            <h2 class="card-inside-title">Category Description</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" name="ndescription_am" placeholder="Briefly describe the service in Amharic..."></textarea>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" name="ndescription_en" placeholder="Briefly describe the service ..."></textarea>
                                        </div>
                                    </div>
									<div class="error-window alert alert-danger"><?= $err ?></div>
										<div class="form-contol text-right">
                        <a class="btn btn-default" href="categories.php">Cancel</a>
                        <button name="submit" type="submit" class="btn btn-primary" id="register">Submit</button>
                    </div>
                    <div class="text-left">
					 
                    </div>
					</form>
                                </div>
                            </div>
							
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Checkbox -->
            
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

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
</body>

</html>
