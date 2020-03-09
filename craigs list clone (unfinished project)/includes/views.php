<?php
require_once(LIB_PATH.DS.'database.php');
class Views{
	protected static $table_name="advertisements";
	protected static $db_fields = array('title', 'body','price','contact', 'date_added','caption','filename', 'first_name','category_name','cat_id');
	
	public $title;
	public $body;
	public $price;
	public $contact;
	public $date_added;
	public $caption;
	public $filename;
	public $first_name;
	public $category_name;
	public $cat_id;
	protected $upload_dir="images";
	
	public function image_path() {
	  return $this->upload_dir.DS.$this->filename;
	}
	
	public static function find_all() {
		return self::find_by_sql("SELECT * FROM ".self::$table_name);
  }
  public static function find_by_id($ad_id=0) {
    $result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE ad_id={$ad_id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
  }
  public static function find_by_sql($sql="") {
    global $database;
    $result_set = $database->query($sql);
    $object_array = array();
    while ($row = $database->fetch_array($result_set)) {
      $object_array[] = self::instantiate($row);
    }
    return $object_array;
  }
	public static function count_all() {
	  global $database;
	  $sql = "SELECT COUNT(*) FROM ".self::$table_name;
    $result_set = $database->query($sql);
	  $row = $database->fetch_array($result_set);
    return array_shift($row);
	}
	private static function instantiate($record) {
		// Could check that $record exists and is an array
    $object = new self;	
		// More dynamic, short-form approach:
		foreach($record as $attribute=>$value){
		  if($object->has_attribute($attribute)) {
		    $object->$attribute = $value;
		  }	}return $object;}
	private function has_attribute($attribute) {
	  return array_key_exists($attribute, $this->attributes());
	}
	protected function attributes() { 
	  $attributes = array();
	  foreach(self::$db_fields as $field) {
	    if(property_exists($this, $field)) {
	      $attributes[$field] = $this->$field;
	    }
	  }
	  return $attributes;
	}
	protected function sanitized_attributes() {
	  global $database;
	  $clean_attributes = array();
	  foreach($this->attributes() as $key => $value){
	    $clean_attributes[$key] = $database->escape_value($value);
	  }
	  return $clean_attributes;
	}
	public function save() {
	  return isset($this->ad_id) ? $this->update() : $this->create();
	}
	public function create() {
		global $database;
		$attributes = $this->sanitized_attributes();
	  $sql = "INSERT INTO ".self::$table_name." (";
		$sql .= join(", ", array_keys($attributes));
	  $sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
	
	if($database->query($sql)) {
	    $this->cat_id = $database->insert_id();
	    return true;
	  } else {
	    return false;
	  } 
	}
	public function update() {
	  global $database;
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach($attributes as $key => $value) {
		  $attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE ".self::$table_name." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE ad_id=". $database->escape_value($this->ad_id);
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;
	}

	public function delete() {
		global $database;
	  $sql = "DELETE FROM ".self::$table_name;
	  $sql .= " WHERE ad_id=". $database->escape_value($this->ad_id);
	  $sql .= " LIMIT 1";
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;
	}
	
	}

?>


?>