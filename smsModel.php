<?php
require_once "init.php";

class smsModel{
	public $TABLE;
    public $id;

	
    protected function connection()
    {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database = "servicesms";
		// Create connection
		$con = new mysqli($servername, $username, $password, $database);
		return $con;
		$con = new mysqli("localhost", "root", "", "servicesms");
		//$GLOBALS['conn'] = $con;
        //return $GLOBALS['conn'];
    }
	
	function __construct($id = null)
    {
        if ($id != null) {
            $this->fetch_by_field("id", $id);
        }
    }
	
	public function fetch_by_field($field, $value)
    {
        $table = $this->TABLE;
        $sql_string = "select * from $table where $field='$value'";
	
		$con = new mysqli("localhost", "root", "", "servicesms");
        $query = mysqli_query($con, $sql_string);
        $row = $query->fetch_array();
        $this->mapResult($this, $row);
    }
	protected function mapResult($instance, $result)
    {
        foreach ($result as $key => $value) {
            $instance->$key = $value;
        }
        return $instance;
    }
	
	public static function require_fields($fields, $value_set)
	{
    $response = null;
    foreach ($fields as $key => $value) {

        if (!array_key_exists($key, $value_set) || $value_set[$key] == "") {
            $response = $value . " is required";
            break;
        }

    }
    return $response;
	}
	
	protected function fetch_multiple($where, $combine_by = "AND", $external = "")
    {
        $table = $this->TABLE;
        $where_flat = array();
        foreach ($where as $key => $value) {
            $where_flat[] = $key . " = '" . $value . "'";
        }
        $sql_string = "select * from $table where " . implode(" $combine_by ", $where_flat) . " " . $external;
        //echo $sql_string;
        return $this->compose_multiple($sql_string);
    }
	
	protected function compose_multiple($sql_string)
    {

        $class = get_class($this);
		
		$con = new mysqli("localhost", "root", "", "servicesms");
        $query = mysqli_query($con, $sql_string);
        $results = [];
        while ($row = $query->fetch_array()) {

            $instance = new $class;
            $results[] = $this->mapResult($instance, $row);
        }
        return $results;
    }
	
	public function value_with_key_exists($field, $value)
    {
        $table = $this->TABLE;
        $sql_string = "select id from $table  where $field = '$value'";
        $con = new mysqli("localhost", "root", "", "servicesms");
        $query = mysqli_query($con, $sql_string);
        return $query->num_rows > 0;
    }
	public function value_with_keys_exists($field, $value,$field2,$value2)
    {
        $table = $this->TABLE;
        $sql_string = "select id from $table  where $field = '$value' and $field2 = '$value2' ";
		//echo $sql_string ."\n";
        $con = new mysqli("localhost", "root", "", "servicesms");
        $query = mysqli_query($con, $sql_string);
        return $query->num_rows > 0;
    }
	/*
	public function count_all(){
		$table= $this->TABLE;
		$sql_string = "select count(*) from $table";
		//echo $sql_string;
        $con = new mysqli("localhost", "root", "", "servicesms");
        $query = mysqli_query($con, $sql_string);
		
	}
	*/
	
	public function get_all(){
		
		$table= $this->TABLE;
		$sql_string = "select id from $table;";
		//echo $sql_string;
       $con = new mysqli("localhost", "root", "", "servicesms");
        $query = mysqli_query($con, $sql_string);
		
			 $i=0;
			 $result= array();
			 while ($row = mysqli_fetch_assoc($query))
			 {
				$result[$i]= $row['id'];
				$i++;
			 }
			 return $result;
		
	}
	protected function get_where_field_in($field, $collection, &$map_to = null)
    {
        if (empty($collection)) {
            return [];
        }
        $sql_string = "select * from {$this->TABLE} where $field in ('" . implode("','", $collection) . "')";
        $returned_items = $this->compose_multiple($sql_string);

        if ($map_to != null) {
            foreach ($returned_items as $item) {
                $key = $item->$field;
                $map_to[$key] = $item;
            }
        }
        return $this->compose_multiple($sql_string);
    }
	
	public function get_attribute_value($attribute,$id){
		
		 $table = $this->TABLE;
		 
		 $sql_string= "SELECT $attribute as att from $table where id= '$id';";
		 //echo $sql_string;
		 $con = new mysqli("localhost", "root", "", "servicesms");
		 $query= mysqli_query($con,$sql_string);
		 $row= mysqli_fetch_assoc($query);
		
		
        return $row['att'];
	}
	
	
	public function get_single_attribute_multi_value($get_attribute,$where1,$id1,$where2,$id2){
		
		 $table = $this->TABLE;
		 
		 $sql_string= "SELECT $attribute as att from $table where $where1= '$id1' and $where2 = '$id2';";
		 
		 $query= mysqli_query($this->connection(),$sql_string);
		
		$row= mysqli_fetch_assoc($query);
		
        return $row['att'];
	}
	
	public function get_attribute_value_table($attribute,$where,$table,$attribute_to_get){
		 
		 $sql_string= "SELECT $attribute as att from $table where $attribute_to_get= '$where';";
		 ///echo $sql_string;
		 $query= mysqli_query($this->connection(),$sql_string);
		
		 $row= mysqli_fetch_assoc($query);
		
        return $row['att'];
	}
	
	
	 public function get_multiple_attribute_value($attribute_to_get,$attribute,$where){
		 $table = $this->TABLE;
		 $sql_string= "SELECT $attribute_to_get as att from $table WHERE $attribute='$where';";
		 //echo $sql_string;
		 $query= mysqli_query($this->connection(),$sql_string);
		 if(!(is_bool($query))){
			 $i=0;
			 $result= array();
			 while ($row = mysqli_fetch_assoc($query))
			 {
				$result[$i]= $row['att'];
				$i++;
			 }
			 return $result;
		  }
			 else{
				 return;
			 }
	}

	public function get_distinct_multiple_attribute_value($attribute_to_get,$attribute,$where){
		 $table = $this->TABLE;
		 $sql_string= "SELECT Distinct $attribute_to_get as att from $table WHERE $attribute='$where';";
		 //echo $sql_string;
		 $query= mysqli_query($this->connection(),$sql_string);
		 if(!(is_bool($query))){
			 $i=0;
			 $result= array();
			 while ($row = mysqli_fetch_assoc($query))
			 {
				$result[$i]= $row['att'];
				$i++;
			 }
			 return $result;
		  }
			 else{
				 return;
			 }
	}
	
	public function get_attribute_multi_value($to_get,$att1,$where1,$att2,$where2){
		 $table = $this->TABLE;
		 $sql_string= "SELECT $to_get as att from $table WHERE $att1='$where1' and $att2='$where2';";
		 //echo $sql_string;
		 $query= mysqli_query($this->connection(),$sql_string);
		 if(!(is_bool($query))){
			 $i=0;
			 $result= array();
			 while ($row = mysqli_fetch_assoc($query))
			 {
				$result[$i]= $row['att'];
				$i++;
			 }
			 return $result;
		}
			 else{
				 return;
			 }
	}
	
	public function get_distinct_value($attribute){
		$table = $this->TABLE;
		 $sql_string= "SELECT Distinct $attribute as att from $table";
		 //echo $sql_string;
		 $query= mysqli_query($this->connection(),$sql_string);
		 if(!(is_bool($query))){
			 $i=0;
			 $result= array();
			 while ($row = mysqli_fetch_assoc($query))
			 {
				$result[$i]= $row['att'];
				$i++;
			 }
			 return $result;
		}
			 else{
				 return;
			 }
	}
	
	 public function create($value_pair)
    {
        $table = $this->TABLE;
        $key_list = implode(",", array_keys($value_pair));
        $value_list = "'" . implode("','", array_values($value_pair)) . "'";
        $sql_string = "INSERT INTO $table ($key_list) VALUES ($value_list);";
		//echo $sql_string;
        $query = mysqli_query($this->connection(), $sql_string);
    }
	
    public function delete($value_pair)
    {
        $table = $this->TABLE;
        $key_list = implode(",", array_keys($value_pair));
        $value_list = "'" . implode("','", array_values($value_pair)) . "'";
        $sql_string = "DELETE FROM $table ($key_list) VALUES ($value_list)";
		//echo $sql_string;
        $query = mysqli_query($this->connection(), $sql_string);
    }
	
	public function delete_by_id($where,$id){
		$table = $this->TABLE;
		$sql_string= "DELETE FROM $table where $where = '$id';";
		//echo $sql_string;
        $query = mysqli_query($this->connection(), $sql_string);
	}
	
	public function delete_by_multi_id($where1,$id1,$where2,$id2){
		$table = $this->TABLE;
		$sql_string= "DELETE FROM $table where $where1 = '$id1' AND $where2 = '$id2';";
		//echo $sql_string;
        $query = mysqli_query($this->connection(), $sql_string);
	}
	/*
	public function is_in_table($table_name,$attribute,$find){
		$sql_string="SELECT * from $table_name WHERE $attribute = $find; ";
		$query =mysqli_query($this->connection(),$sql_string);
		return $query->num_rows > 0;
	}
	*/
	public function edit_attribute($table_name,$attribute,$change,$id, $key){
		$sql_string="update $table_name set $attribute = '$change' where $id ='$key';";
		//echo $sql_string."\n";
		$query =mysqli_query($this->connection(),$sql_string);
		
	}
	
	public function edit_attribute_multi($table_name,$att_to_edit,$to_edit,$whatt1,$where1,$whatt2,$where2){
		$sql_string="update $table_name set $att_to_edit = '$to_edit' where $whatt1='$where1' and $whatt2= '$where2';";
		//echo $sql_string."\n";
		$query =mysqli_query($this->connection(),$sql_string);
		
	}
	
	public function count_all(){
		$table=$this->TABLE;
		$sql_string= "select count('id') as at from $table;";
		//echo $sql_string;
		$query= mysqli_query($this->connection(),$sql_string);
		
		$row= mysqli_fetch_assoc($query);
		
        return $row['at'];
	}
	
}

class User extends smsModel{
	public $TABLE = "users_management";
	

	function new_user($user_name,$password,$name,$status,$role_group,$user_category){
		$date = date('Y/m/d H:i:s');
		$instance= new User();
        $instance->create([
            "name" => $name,
            "password" => MD5($password),
			"status" => $status,
            "role_group" => $role_group,
			"user_category" => $user_category,
            "user_name" => $user_name,
			"date_created"=>$date
        ]);
		$this->fetch_by_field("user_name", $user_name);
    }

	function login()
    {
        $_SESSION['user_name'] = $this->user_name;
    }

	static function validate_login($user_name, $password)
    {
        $instnace = new User();
        //echo "came to validate";
        $user = $instnace->fetch_multiple([
            "user_name" => $user_name,
            "password" => $password,
        ]);
       // echo count($user) > 0;
        return count($user) > 0;
    }

	function get_user_category($user_name){
		$instance= new User();
		return $instance->get_attribute_value_table("user_category",$user_name,"users_management","user_name");
	}

	function user_name_available($name)
    {
        return !$this->value_with_key_exists("user_name", $name);
    }
	
	function all_users(){
		$instance=new User();
		return $instance->get_all();
	}
	function delete_user($id)
    {
		$instance=new User();
		$instance->delete_by_id("id",$id);
    }
	function edit_user_name($id,$name){
		$instance= new User();
		$instance->edit_attribute("users_management","name",$name,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("users_management","date_updated",$date,"id",$id);
	}
	function edit_user_username($id,$name){
		$instance= new User();
		$instance->edit_attribute("users_management","user_name",$name,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("users_management","date_updated",$date,"id",$id);
	}
	function edit_user_password($id,$password){
		$instance= new User();
		$instance->edit_attribute("users_management","password",$password,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("users_management","date_updated",$date,"id",$id);
	}
	function edit_user_status($id,$status){
		$instance= new User();
		$instance->edit_attribute("users_management","status",$status,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("users_management","date_updated",$date,"id",$id);
	}
	function edit_user_category($id,$category){
		$instance= new User();
		$instance->edit_attribute("users_management","user_category",$category,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("users_management","date_updated",$date,"id",$id);
	}
	function edit_user_role_group($id,$role_group){
		$instance= new User();
		$instance->edit_attribute("users_management","role_group",$role_group,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("users_management","date_updated",$date,"id",$id);
	}
}
class Role extends smsModel{
	public $TABLE = "role_groups";
	
	function new_role_group($name, $description){
		$date = date('Y/m/d H:i:s');
		$instance= new Role();
        $instance->create([
            "name" => $name,
            "description" => $description,
			"date_created"=>$date
        ]);
        ///echo "camehere too sms";
		
		//$this->fetch_by_field("name", $name);
    }
	
	function role_name_available($name)
    {
        return !$this->value_with_key_exists("name", $name);
    }
	
	function all_types(){
		$instance=new Role();
		return $instance->get_all();
	}
	function delete_role($id)
    {
		$instance=new Role();
		$instance->delete_by_id("id",$id);
    }
	function edit_role_name($id,$name){
		$instance= new Role();
		$instance->edit_attribute("role_groups","name",$name,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("role_groups","date_updated",$date,"id",$id);
	}

	function edit_role_description($id,$description){
		$instance= new Role();
		$instance->edit_attribute("role_groups","description",$description,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("role_groups","date_updated",$date,"id",$id);
	}

	function get_role_group_for($type){
		$spart=new Part();
		$instance=new Role();
		$spermission= new Permission();
		$roles= $spart->all_roles_for($type);
		$result= array();
		$i=0;
		foreach($roles as $trole){
			$result[$i]= $spermission->get_multiple_attribute_value("role_group_id","role_id",$trole);
			$i++;
		}
		return $result;
	}

	function get_subscription_for($type){
		$spermission=new Permission();
		$tsubscription=new Subscription();
		$tservice=new Service();
		$tpart=new Part();
		$all = $spermission->get_rg_services($type);
		$bit=array();
		$j=0;
		foreach($all as $iservice){
			$p= $tpart->get_attribute_value("name",$iservice);
			//echo $p."this is p";
			$bit[$j] = $tservice->get_attribute_value_table("id",$p,"services","name");
			$j++;
		}
		$r=0;
		foreach($bit as $k){
			//echo $bit[$r]. "ids";
		}
		$result= array();
		$i=0;
		foreach($bit as $tservice){
			//echo $bit[$i]."  service id";
			$result[$i]= $tsubscription->get_multiple_attribute_value("id","sub_service",$tservice);
			$i++;
		}
		return $result;
	}

	function get_services_for($type){
		$spermission=new Permission();
		$tsubscription=new Subscription();
		$tservice=new Service();
		$tpart=new Part();
		$all = $spermission->get_rg_services($type);
		$bit=array();
		$j=0;
		foreach($all as $iservice){
			$p= $tpart->get_attribute_value("name",$iservice);
			$bit[$j] = $tservice->get_attribute_value_table("id",$p,"services","name");
			$j++;
		}
		return $bit;
	}

	function get_category_for($type){
		$spermission=new Permission();
		$tsubscription=new Subscription();
		$tservice=new Service();
		$tpart=new Part();
		$all = $spermission->get_rg_services($type);
		$bit=array();
		$j=0;
		foreach($all as $iservice){
			$p= $tpart->get_attribute_value("name",$iservice);
			//echo $p."this is p";
			$bit[$j] = $tservice->get_attribute_value_table("ser_cat",$p,"services","name");
			$j++;
		}
		return $bit;
	}
}

class Permission extends smsModel{
	public $TABLE = "role_permissions";
	
	
	function new_permission($role_id, $role_group_id){
		$date = date('Y/m/d H:i:s');
		$instance= new Permission();
        $instance->create([
            "role_id" => $role_id,
            "role_group_id" => $role_group_id,
			"date_created"=>$date
        ]);
        //echo "camehere too sms";
		
		//$this->fetch_by_field("name", $name);
    }
	function get_permissions_for_role($role_id){
		$instance=new Permission();
		return $instance->get_multiple_attribute_value("role_id","role_group_id",$role_id);
	}

	function get_rg_services($role_group_id){
		$instance=new Permission();
		return $instance->get_multiple_attribute_value("role_group_id","role_id",$role_group_id);
	}
	function get_rg_services_count($role_group_id){
		$instance=new Permission();
		$to_count= $instance->get_multiple_attribute_value("role_group_id","role_id",$role_group_id);
		return count($to_count);
	}

	
}
class Part extends smsModel{
	public $TABLE = "roles";
	
	function all_roles(){
		$instance= new Part();
		return $instance->get_all();
	}
	function all_roles_for($type){
		$instance= new Part();
		return $instance->get_attribute_multi_value("id","status","active","user_category",$type);
	}
	function get_active_roles(){
		$instance= new Part();
		return $instance->get_multiple_attribute_value("id","status","active");
	}
}

class Contacts extends smsModel{
	public $TABLE = "contacts";
	public $name;
	public $number;
	public $date_created;
	public $date_updated;
	
	function new_contact($name, $number){
		$date = date('Y/m/d H:i:s');
		$instance= new Contacts();
        $instance->create([
            "name" => $name,
            "number" => $number,
			"date_created"=>$date
        ]);
       // echo "camehere too sms";
		
		//$this->fetch_by_field("name", $name);
    }
	
	function contact_number_available($number)
    {
        return !$this->value_with_key_exists("number", $number);
    }
	
	function all_contacts(){
		$instance=new Contacts();
		return $instance->get_all();
	}
	function delete_contact($id)
    {
		$instance=new Contacts();
		$instance->delete_by_id("id",$id);
    }
	function edit_contact_name($id,$name){
		$instance= new Contacts();
		$instance->edit_attribute("contacts","name",$name,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("contacts","date_updated",$date,"id",$id);
	}
	function edit_contact_number($id,$number){
		$instance= new Contacts();
		$instance->edit_attribute("contacts","number",$number,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("contacts","date_updated",$date,"id",$id);
	}
	
}

class Category extends smsModel{
	public $TABLE = "categories";
	
	public $name;
    public $incoming;
	public $outgoing;
	public $description_am;
	public $description_en;
    public $date_created;
    public $date_updated;
	
	public static function new_category($name,$incoming,$outgoing,$description_am,$description_en){
		$instance= new Category();
		$date = date('Y/m/d H:i:s');
		$instance->create([
            'name' => $name,
			'incoming'=>$incoming,
			'outgoing'=>$outgoing,
			'description_amh'=>$description_am,
			'description_eng'=>$description_en,
            'date_created' => $date
        ]);	
	}
	
	function category_name_available($name)
    {
		$instance= new Category();
        return !$instance->value_with_key_exists("name", $name);
    }
	
	public static function delete_category($id){
		$instance=new Category();
		$instance->delete_by_id("id",$id);
	}
	function edit_category_name($id,$name){
		$instance= new Category();
		$instance->edit_attribute("categories","name",$name,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("categories","date_updated",$date,"id",$id);
	}
	
	function edit_category_incoming($id,$incoming){
		$instance= new Category();
		$instance->edit_attribute("categories","incoming",$incoming,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("categories","date_updated",$date,"id",$id);
	}
	
	function edit_category_outgoing($id,$outgoing){
		$instance= new Category();
		$instance->edit_attribute("categories","outgoing",$outgoing,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("categories","date_updated",$date,"id",$id);
	}
	function edit_category_description_en($id,$desc_en){
		$instance= new Category();
		$instance->edit_attribute("categories","description_eng",$desc_en,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("categories","date_updated",$date,"id",$id);
	}
	function edit_category_description_am($id,$desc_am){
		$instance= new Category();
		$instance->edit_attribute("categories","description_amh",$desc_am,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("categories","date_updated",$date,"id",$id);
	}
	function all_categories(){
		$instance=new Category();
		return $instance->get_all();
	}
	function add_services($cat_id,$ser_name){
		$instance= new Category();
		$old_ser= get_attribute_value_table("services",$cat_id,"category","id");
		$new_ser= $old_ser.",".$ser_name;
		$instance->edit_attribute("categories","services",$new_ser,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("categories","date_updated",$date,"id",$id);
	} 
	
	function edit_category_services($id,$new_services){
		$instance= new Category();
		$instance->edit_attribute("categories","services",$new_services,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("categories","date_updated",$date,"id",$id);
	}
	
}	

class Service extends smsModel{
	
	public $TABLE = "services";
	
	public $name;
    public $description_am;
	public $description_en;
	public $category;
	
    public $date_created;
    public $date_updated;
	
	public static function new_service($name,$category,$description_en,$description_am,$subscription,$unsubscription){
		$instance= new Service();
		$date = date('Y/m/d H:i:s');
		$instance->create([
            'name' => $name,
            'amharic_name' => $description_am,
			'description' => $description_en,
			'ser_cat' => $category,
			'subscription_code'=>$subscription,
			'unsubscription_code'=>$unsubscription,
            'date_created' => $date
        ]);	
	}
	public static function delete_service($id){
		$instance=new Service();
		$instance->delete_by_id("id",$id);
	}
	
	function edit_service_name($id,$name){
		$instance= new Service();
		$instance->edit_attribute("services","name",$name,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("services","date_updated",$date,"id",$id);
	}
	function edit_service_subscription($id,$sub){
		$instance= new Service();
		$instance->edit_attribute("services","subscription_code",$sub,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("services","date_updated",$date,"id",$id);
	}
	
	function edit_service_unsubscription($id,$sub){
		$instance= new Service();
		$instance->edit_attribute("services","unsubscription_code",$sub,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("services","date_updated",$date,"id",$id);
	}
	function edit_service_description_am($id,$des){
		$instance= new Service();
		$instance->edit_attribute("services","amharic_name",$des,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("services","date_updated",$date,"id",$id);
	}
	function edit_service_description_en($id,$des){
		$instance= new Service();
		$instance->edit_attribute("services","description",$des,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("services","date_updated",$date,"id",$id);
	}
	
	function all_services($category){
		$instance=new Service();
		return $instance->get_multiple_attribute_value("id","ser_cat",$category);
	}
	function get_all_services(){
		$instance=new Service();
		return $instance->get_all();
	}
	
	function edit_service_description($id,$description){
		$instance= new Service();
		$instance->edit_attribute("services","description",$description,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("services","date_updated",$date,"id",$id);
	}
}

class Subscription extends smsModel{
	public $TABLE = "subscriptions";
	
	
	public static function new_subscription($contact_id,$service_id,$sub_cat){
		$instance= new Subscription();
		$date = date('Y/m/d H:i:s');
		$instance->create([
            'sub_contact' => $contact_id,
            'sub_service' => $service_id,
			'sub_cat' =>$sub_cat,
            'date_created' => $date
        ]);	
		//echo "came here";
	}
	public static function edit_subscription($id,$service_id){
		$instance=new Subscription();
		$instance->edit_attribute("subscriptions","sub_service",$service_id,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("subscriptions","date_updated",$date,"id",$id);
	}
	public static function validate_subscription($contact_id,$service_id){
		$instance=new Subscription();
		return $instance->value_with_keys_exists("sub_contact", $contact_id,"sub_service",$service_id);
	}
	public static function delete_subscription($id){
		$instance=new Subscription();
		$instance->delete_by_id("id",$id);
	}
	function subscription_for_id($id){
		$instance= new Subscription();
		return $instance->get_multiple_attribute_value("id","sub_contact",$id);
	}
	function all_subscription(){
		$instance=new Subscription();
		return $instance->get_all();
	}
}

class Short extends smsModel{
	public $TABLE = "short_numbers";
	
	public $type;
    public $number;
    public $date_created;
    public $date_updated;
	
	public static function new_short_number($type,$number){
		$instance= new Short();
		$date = date('Y/m/d H:i:s');
		$instance->create([
            'type' => $type,
            'number' => $number,
            'date_created' => $date
        ]);	
	}
	function short_number_available($number)
    {
        return !$this->value_with_key_exists("number", $number);
    }
	function all_shorts(){
		$instance=new Short();
		return $instance->get_all();
	}
	
	function edit_short_number($id,$number){
		$instance= new Short();
		$instance->edit_attribute("short_numbers","number",$number,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("short_numbers","date_updated",$date,"id",$id);
	}
	function edit_short_type($id,$type){
		$instance= new Short();
		$instance->edit_attribute("short_numbers","type",$type,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("short_numbers","date_updated",$date,"id",$id);
	}
	function delete_short($id){
		$instance=new Short();
		$instance->delete_by_id("id",$id);
	}
	
}

class Message extends smsModel{
	public $TABLE = "messages";

	
	public static function new_message($cat_id,$message,$id){
		$instance= new Message();
		$date = date('Y/m/d H:i:s');
		$instance->create([
            'cat_id' => $cat_id,
			'message' => $message,
            'date_created' => $date,
            'created_by'=>$id
        ]);	
	}
	
	public function all_messages(){
		$instance=new Message();
		return $instance->get_all();
	}
	public function all_messages_for_cat($cat_id){
		$instance=new Message();
		return $instance->get_multiple_attribute_value("id","cat_id",$cat_id);
	}
	public function all_cat(){
		$instance= new Message();
		return $instance->get_distinct_value("cat_id");
	}

	function all_cat_for_user($user){
		$instance=new Message();
		return $instance->get_distinct_multiple_attribute_value("cat_id","created_by",$user);
	}
	
	function all_messages_for_cat_user($detcatm_id,$id){
		$instance=new Message();
		return $instance->get_attribute_multi_value("id","cat_id",$detcatm_id,"created_by",$id);
	}

	function edit_message_subject($id,$subject){
		$instance= new Message();
		$instance->edit_attribute("messages","subject",$subject,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("messages","date_updated",$date,"id",$id);
	}
	function edit_message_category($id,$category){
		$instance= new Message();
		$instance->edit_attribute("messages","cat_id",$category,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("messages","date_updated",$date,"id",$id);
	}
	function edit_message_text($id,$text){
		
		$instance= new Message();
		$instance->edit_attribute("messages","message",$text,"id",$id);
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("messages","date_updated",$date,"id",$id);
	}
	function edit_message_test($id){
		$date = date('Y/m/d H:i:s');
		$instance= new Message();
		$instance->edit_attribute("messages","date_tested",$date,"id",$id);
		$instance->edit_attribute("messages","status","Tested","id",$id);
		$instance->edit_attribute("messages","date_updated",$date,"id",$id);
	}
	function edit_message_sent($id){
		$instance= new Message();
		$date = date('Y/m/d H:i:s');
		$instance->edit_attribute("messages","status","Sent","id",$id);
		$instance->edit_attribute("messages","date_updated",$date,"id",$id);
	}
	function delete_message($id){
		$instance=new Message();
		$instance->delete_by_id("id",$id);
	}
}
?>