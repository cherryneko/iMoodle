<?php
	/**
	  * Standar Controller
	  * @autor
	  * @since
	  */
	  
	 class standarCtrl {
		
		function __construct(){
			//Calls the construct to made this object
		}
		/**
		  * This functions returns the name if the param is correct,
		  * otherwise returns false
		  * @param $name, this is the name to validate
		  * @return $name(string), if is correct
		  * @return false, if isn't correct
		  */
		function validateName($name){
			return $name;
		}
		/**
		  * This functions returns the email if the param is correct,
		  * otherwise returns false
		  * @param $email, this is the email to validate
		  * @return $email(string), if is correct
		  * @return false, if isn't correct
		  */
		function validateEMail($email){
			return $email;
		}
		
		/**
		  * This functions returns the code if the param is correct,
		  * otherwise returns false
		  * @param $code, this is the code to validate
		  * @return $code(string), if is correct
		  * @return false, if isn't correct
		  */
		function validateCode($code){
			return $code;
		}
		
		/**
		  * This functions returns the password if the param is correct,
		  * otherwise returns false
		  * @param $password, this is the code to validate
		  * @return $password(string), if is correct
		  * @return false, if isn't correct
		  */
		function validatePassword($password){
			return $password;
		}
		
		/**
		  * This functions validates the ins in the array $data
		  * @param $data, this is the code to validate
		  * @return true, if the data not contains the value false
		  * @return false, otherwise
		  */
		function validateIns($data){
			foreach($data as $value)
				if($value == false)
					return false;
			return true;
		}
	}
?>