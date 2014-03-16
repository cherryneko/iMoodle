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
			$p="/^[a-zA-ZÃ±Ã‘\s\W]+([\s][a-zA-ZÃ±Ã‘\s\W]+)*$/i";
			if(preg_match($p,$name)==1)
				return $name;
			else
				return false;
		}
		/**
		  * This functions returns the email if the param is correct,
		  * otherwise returns false
		  * @param $email, this is the email to validate
		  * @return $email(string), if is correct
		  * @return false, if isn't correct
		  */
		function validateEMail($email){
			$p="/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]*)$/i";
			if(preg_match($p,$email)==1)
				return $email;
			else			
				return false;
		}
		
		/**
		  * This functions returns the code if the param is correct,
		  * otherwise returns false
		  * @param $code, this is the code to validate
		  * @return $code(string), if is correct
		  * @return false, if isn't correct
		  */
		function validateCode($code){
			$p="/^[a-z]?[0-9]{9,}?/i";
			if(preg_match($p,$code)==1)
				return $code;
			else
				return false;
			
		}
		
		/**
		  * This functions returns the password if the param is correct,
		  * otherwise returns false
		  * @param $password, this is the code to validate(8,15 characters)
		  * @return $password(string), if is correct
		  * @return false, if isn't correct
		  */
		function validatePassword($password){
			$p="/$^[A-Za-z0-9_\-]{8,15}/i";
			if(preg_match($p,$password)==1)
				return $password;
			else
				return false;
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