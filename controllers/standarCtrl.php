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
		  * This functions return true if the name is correct
		  * @param $name, this is the name to validate
		  * @return true, if is correct
		  * @return false, if isn't correct
		  */
		function validateName($name){
			return true;
		}
		/**
		  * This functions return true if the e-mail is correct
		  * @param $email, this is the email to validate
		  * @return true, if is correct
		  * @return false, if isn't correct
		  */
		function validateEMail($email){
			return true;
		}
	
	}
?>