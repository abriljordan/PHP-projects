<?php
require_once(LIB_PATH.DS.'database.php');
//views
class View_Room_RoomType extends DatabaseObject{
	protected static $table_name="view_room_roomtype";
	protected static $db_fields = array('room_id','roomtype_number', 'room');
	public $room_id;
	public $roomtype_number;
	public $room;
}
class View_Total_Charges extends DatabaseObject{ //version 2
	protected static $table_name="view_total_charges_v2";
	protected static $db_fields = array('id','guestname', 'room', 'check_in_date','check_out_date','total_charges');
	public $id;
	public $guestname;
	public $room;
	public $check_in_date;
	public $check_out_date;
	public $total_charges;
}
class View_ReservationLists extends DatabaseObject{
	protected static $table_name="view_reservationlists";
	protected static $db_fields = array('arrival','dept', 'guestname', 'room_number','roomtype');
	public $arrival;
	public $dept;
	public $guestname;
	public $room_number;
	public $roomtype;
}
class Booking extends DatabaseObject {
	protected static $table_name="booking";
	protected static $db_fields = array('id', 'room_id','guest_id','user_id','date_booking_made','hotel_id','booking_status_id', 'check_in_date','check_out_date','checked_in_date','checked_in_date');
	public $room_id;
	public $guest_id;
	public $user_id;
	public $date_booking_made;
	public $hotel_id;
	public $booking_status_id;
	public $check_in_date;
	public $check_out_date; 
	public $checked_in_date;
	public $checked_out_date;
	public $id;
}
class BookingStatus extends DatabaseObject {
	protected static $table_name="booking_status";
	protected static $db_fields = array('id', 'status');
	public $id;
	public $status;
}
class CardType extends DatabaseObject{
	protected static $table_name="card_type";
	protected static $db_fields = array('id', 'card_type', 'description');
	public $id;
	public $card_type;
	public $description;
}
class Card extends DatabaseObject{
	protected static $table_name="card";
	protected static $db_fields = array('id', 'card_type_id', 'guest_id', 'expiration_date', 'card_number', 'security_code','name_on_card');
	public $id;
	public $card_type_id;
	public $guest_id;
	public $expiration_date;
	public $card_number;
	public $security_code;
	public $name_on_card;
}
class Check extends DatabaseObject{
	protected static $table_name="check";
	protected static $db_fields = array('id', 'check_number', 'account_name', 'date', 'bank_name');
	public $id;
	public $check_number;
	public $account_name;
	public $date;
	public $bank_name;
}
class Facility extends DatabaseObject{
	protected static $table_name="facility";
	protected static $db_fields = array('id', 'name', 'description');
	public $id;
	public $name;
	public $description;
}
class Guest extends DatabaseObject{
	protected static $table_name="guest";
	protected static $db_fields = array('id', 'first_name', 'last_name','email_address', 'phone_number', 'address');
	public $id;
	public $first_name;
	public $last_name;
	public $email_address;
	public $phone_number;
	public $address;
	
	public function full_name() {
    if(isset($this->first_name) && isset($this->last_name)) {
      return $this->first_name . " " . $this->last_name;
    } else {
      return "";
    }
  }
}
class Hotel extends DatabaseObject{
	protected static $table_name="hotel";
	protected static $db_fields = array('id', 'name', 'email','address', 'url');
	public $id;
	public $name;
	public $email;
	public $address;
	public $url;
}
class Housekeeping extends DatabaseObject{
	protected static $table_name="housekeeping";
	protected static $db_fields = array('id', 'user_id', 'description','category_id', 'room_id','priority_id','start_date','end_date');
	public $id;
	public $user_id;
	public $description;
	public $category_id;
	public $room_id;
	public $priority_id;
	public $start_date;
	public $end_date;
}
class HousekeepingCategory extends DatabaseObject{
	protected static $table_name="housekeeping_category";
	protected static $db_fields = array('id','description');
	public $id;
	public $description;
}
class HousekeepingPriority extends DatabaseObject{
	protected static $table_name="housekeeping_priority";
	protected static $db_fields = array('id','description');
	public $id;
	public $description;
}
class HousekeepingStatus extends DatabaseObject{
	protected static $table_name="housekeeping_status";
	protected static $db_fields = array('id','description');
	public $id;
	public $description;
}
class Invoice extends DatabaseObject{
	protected static $table_name="housekeeping_status";
	protected static $db_fields = array('id','guest_id','payment_method_id','date','user_id');
	public $id;
	public $guest_id;
	public $payment_method_id;
	public $date;
	public $user_id;
}
class InvoiceCharges extends DatabaseObject{
	protected static $table_name="invoice_charges";
	protected static $db_fields = array('id','invoice_id','description','amount');
	public $id;
	public $invoice_id;
	public $description;
	public $amount;
}
class PaymentMethod extends DatabaseObject{
	protected static $table_name="payment_method";
	protected static $db_fields = array('id','payment_method','description');
	public $id;
	public $payment_method;
	public $description;
}
class Charges extends DatabaseObject{
	protected static $table_name="charges";
	protected static $db_fields = array('id', 'description', 'comment', 'amount', 'invoice_id');
	public $id;
	public $description;
	public $comment;
	public $amount;
	public $invoice_id;
}
class UserLevel extends DatabaseObject{
	protected static $table_name="userlevel";
	protected static $db_fields = array('id', 'description');
	public $id;
	public $description;
}
class Rate extends DatabaseObject{
	protected static $table_name="rate";
	protected static $db_fields = array('id', 'rate','rate_description');
	public $id;
	public $rate_description;
	public $rate;
}class Room extends DatabaseObject {
	protected static $table_name="room";
	protected static $db_fields = array('id', 'room_number', 'roomtype_id','smoking_YN_id');
	public $id;
	public $room_number;
	public $roomtype_id;
	public $smoking_YN_id;
}
class RoomType extends DatabaseObject{
	protected static $table_name="roomtype";
	protected static $db_fields = array('id', 'roomtype', 'rate_id', 'capacity','description');
	public $id;
	public $roomtype;
	public $rate_id;
	public $capacity;
	public $description;
}
class SmokingYN extends DatabaseObject{
	protected static $table_name="smoking_yn";
	protected static $db_fields = array('id','description');
	public $id;
	public $description;
}
class Users extends DatabaseObject {
	protected static $table_name="users";
	protected static $db_fields = array('id', 'first_name', 'last_name', 'nickname','userlevel_id', 'username','password');
	public $id;
	public $username;
	public $password;
	public $nickname;
	public $first_name;
	public $last_name;
	public $userlevel_id;

		public function full_name() {
			if(isset($this->first_name) && isset($this->last_name)) {
			  return $this->first_name . " " . $this->last_name;
			} else {
			  return "";
			}
		  }
		public static function authenticate($username="", $password="") {
			global $database;
			$username = $database->escape_value($username);
			$password = $database->escape_value($password);
			$sql  = "SELECT * FROM users ";
			$sql .= "WHERE username = '{$username}' ";
			$sql .= "AND password = '{$password}' ";
			$sql .= "LIMIT 1";
			$result_array = self::find_by_sql($sql);
				return !empty($result_array) ? array_shift($result_array) : false;
			}
}