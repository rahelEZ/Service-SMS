<?php
//error_reporting(E_ERROR | E_PARSE);

include "smsModel.php";
//require_once "init.php";
$tcontact= new Contacts();
$tcategory= new Category();
$tservice= new Service();
$tsubscription=new Subscription();
$tshort= new Short();
$edcategory_id= $_GET['category_id'];
$err="";

$onums=$tcategory->get_attribute_value("incoming",$edcategory_id);
$onum=$tshort->get_attribute_value("number",$onums);
$err=$onum;

//$cat_services= $tservice->all_services($cat_name);

	if (!empty($_POST)) {
		if(!isset($_POST['deleteCategory'])){
		$edcategory_name = $_POST["edcategoryName"];
		$edincoming=$_POST["edincoming"];
		$edoutgoing=$_POST["edoutgoing"];
		$eddescription_en=$_POST["eddescription_en"];
		$eddescription_am=$_POST["eddescription_am"];
		
		if(!empty($_POST["edcategoryName"])){
			$tcategory->edit_category_name($edcategory_id,$edcategory_name);
			//echo "contact name edited";
			}
		else{
				
		}
		if(!empty($_POST["edincoming"])){
			$tcategory->edit_category_incoming($edcategory_id,$edincoming);
			//echo "contact name edited";
			}
		else{
				
		}
		if(!empty($_POST["edoutgoing"])){
			$tcategory->edit_category_outgoing($edcategory_id,$edoutgoing);
			//echo "contact name edited";
			}
		else{
				
		}
		if(!empty($_POST["eddescription_am"])){
			$tcategory->edit_category_description_am($edcategory_id,$eddescription_am);
			//echo "contact name edited";
			}
		else{
				
		}
		if(!empty($_POST["eddescription_en"])){
			$tcategory->edit_category_description_en($edcategory_id,$eddescription_en);
			//echo "contact name edited";
			}
		else{
				
		}
		
	}
	else{
		$tcategory->delete_category($edcategory_id);
			//echo "camee_here";
	}
	header("Location: categories.php");
	}
include "header.php";
include "footer.php";
?>
	

    <section class="content">
        <div class="container-fluid">
            <form method="POST" >
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <h3>EDIT Category</h3>
                    <div class="card">
					 <div class="body">
                            <h2 class="card-inside-title">Category Name</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control"  value="<?php echo $tcategory->get_attribute_value("name",$edcategory_id); ?>" name="edcategoryName" />
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
           
            <!-- #END# Select -->
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
              
                        <div class="body">
                            <h2 class="card-inside-title">Category Description {AMH/ENG}</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" name="eddescription_am" value="<?php echo $tcategory->get_attribute_value("description_amh",$edcategory_id); ?>"></textarea>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" name="eddescription_en" value="<?php echo $tcategory->get_attribute_value("description_eng",$edcategory_id); ?>"></textarea>
                                        </div>
                                    </div>
										<div class="form-contol text-right">
                        <a class="btn btn-default" href="categories.php">Cancel</a>
                        <button name="submit" type="submit" class="btn btn-primary" id="register">Submit</button>
                    </div>
                    <div class="text-left">
                        <a class="btn btn-danger" href="delete_category.php?category_id=<?=$edcategory_id;?>">Delete</a>
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

