<?php  
class DatabaseMethod{
	// "database-neutral" methods
 public function fetch_array($result_set) {
    return mysql_fetch_array($result_set);
  }
  public function num_rows($result_set) {
   return mysql_num_rows($result_set);
  }
  public function insert_id() {
    // get the last id inserted over the current db connection
    return mysql_insert_id($this->connection);
  }
  public function affected_rows() {
    return mysql_affected_rows($this->connection);
  }
	public function confirm_query($result) {
		if (!$result) {
	    $output = "Database query failed: " . mysql_error() . "<br /><br />";
	    //$output .= "Last SQL query: " . $this->last_query;
	    die( $output );
		}
	}
}
?>