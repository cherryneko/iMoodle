<?php
	/**
	  * Notes Controller
	  * @autor 
	  * @since
	  */
	 require('controllers/standarCtrl.php'); 
	 class notesCtrl extends standarCtrl{
		public $model;
		
		function __construct(){
			//Calls the construct to made this object
			require('models/notesMdl.php');
			$this->model = new notesMdl();
		}
		
		function eject(){
			//Validate the action
			if(isset($_GET['action']))
				switch($_GET['action']){
					case 'insert':
						$this->insert();
						break;
					case 'delete':
						$this->delete();
						break;
					case 'select':
						$this->select();
						break;
					case 'update':
						$this->update();
						break;
				}
		}
		/**
		  * Method to insert a notes
		  */
		function insert(){
			//Permissions validate
			//ins validate
			$data = array();
			$data['activity'] = $this->validateActivity($_GET['activity']);
			$data['percentage'] = $this->validatePercentage($_GET['percentage']);
			
			$status = $this->model->insert($data);
			
			if($status){
				//Load the view for an inserted notes
				include('views/notesInsert.php');
				//The notes has been inserted
			}
			else{
				include('views/error.php');
			}
		}
		/**
		  * Method to delete a notes
		  */
		function delete(){
			//Permissions validate
			//ins validate
			$data = array();
			
			$data['activity'] = $this->validateActivity($_GET['activity']);
			$data['percentage'] = $this->validatePercentage($_GET['percentage']);
			$status = $this->model->delete($data);
			
			if($status){
				//Load the view for a deleted notes
				include('views/notesDelete.php');
				//The notes has been deleted
			}
			else{
				include('views/error.php');
			}
		}
		/**
		  * Method to select a notes
		  */
		function select(){
			//Permissions validate
			$data = array();
			$data['activity'] = $this->validateActivity($_GET['activity']);
			$data['percentage'] = $this->validatePercentage($_GET['percentage']);
			$status = $this->model->select($data);
			
			if($status){
				//Load the view for a selected notes
				include('views/notesSelect.php');
			}
			else{
				include('views/error.php');
			}
		}
		
		/**
		  * Method to update a notes
		  */
		function update(){
			//Permissions validate
			$data = array();
			$data['activity'] = $this->validateActivity($_GET['activity']);
			$data['percentage'] = $this->validatePercentage($_GET['percentage']);
			$status = $this->model->update($data);
			
			if($status){
				//Load the view for a updated notes
				include('views/notesUpdate.php');
			}
			else{
				include('views/error.php');
			}
		}

	 }
	 function validateActivity($activity){
	 	$p="/^[a-zA-ZÃ±Ã‘\s\W]+([\s][a-zA-ZÃ±Ã‘\s\W]+([0-9]*))*$/i";
	 	if(preg_match($p,)==1){
	 		return $activity;
	 	}
	 	return false;
	 }

	 function validatePercentage($percentage){
	 	$p="/^([0-9]{1,3}[%])$/i";
	 	if(preg_match($p,$percentage)){
	 		return $percentage;
	 	}
	 	return false;
	 }
	 
?>