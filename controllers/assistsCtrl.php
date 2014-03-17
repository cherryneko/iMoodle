<?php
	/**
	  * Assists Controller
	  * @autor 
	  * @since
	  */
	 require('controllers/standarCtrl.php'); 
	 class assistsCtrl extends standarCtrl{
		public $model;
		
		function __construct(){
			//Calls the construct to made this object
			require('models/assistsMdl.php');
			$this->model = new assistsMdl();
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
		  * Method to insert a assists
		  */
		function insert(){
			//Permissions validate
			//ins validate
			$data = array();
			if(empty($_GET['activity'])||empty($_GET['percentage'])){
				$_POST['error']='This action requires mandatory fields';
				include 'views/error.php';
			}
			else{
				$data['activity'] = $this->validateActivity($_GET['activity']);
				$data['percentage'] = $this->validatePercentage($_GET['percentage']);
				
				$status = $this->validateIns($data);
				if($status)
					$status = $this->model->insert($data);
				if($status){
					//Load the view for an updated student
					include('views/assistsInsert.php');
					//The student has been updated
				}
				else{
					$_POST['error']='Error to do this action';
					include('views/error.php');
				}

			}
		}
		/**
		  * Method to delete a assists
		  */
		function delete(){
			//Permissions validate
			//ins validate
			$data = array();
			if(empty($_GET['activity'])||empty($_GET['percentage'])){
				$_POST['error']='This action requires mandatory fields';
				include 'views/error.php';
			}
			else{
				$data['activity'] = $this->validateActivity($_GET['activity']);
				$data['percentage'] = $this->validatePercentage($_GET['percentage']);
				
				$status = $this->validateIns($data);
				if($status)
					$status = $this->model->delete($data);
				if($status){
					//Load the view for an updated student
					include('views/assistsDelete.php');
					//The student has been updated
				}
				else{
					$_POST['error']='Error to do this action';
					include('views/error.php');
				}

			}	
		}
		/**
		  * Method to select a assists
		  */
		function select(){
			//Permissions validate
			$data = array();
			if(empty($_GET['activity'])||empty($_GET['percentage'])){
				$_POST['error']='This action requires mandatory fields';
				include 'views/error.php';
			}
			else{
				$data['activity'] = $this->validateActivity($_GET['activity']);
				$data['percentage'] = $this->validatePercentage($_GET['percentage']);
				
				$status = $this->validateIns($data);
				if($status)
					$status = $this->model->select($data);
				if($status){
					//Load the view for an updated student
					include('views/assistsSelect.php');
					//The student has been updated
				}
				else{
					$_POST['error']='Error to do this action';
					include('views/error.php');
				}

			}
		}
		
		/**
		  * Method to update a assists
		  */
		function update(){
			//Permissions validate
			$data = array();
			if(empty($_GET['activity'])||empty($_GET['percentage'])){
				$_POST['error']='This action requires mandatory fields';
				include 'views/error.php';
			}
			else{
				$data['activity'] = $this->validateActivity($_GET['activity']);
				$data['percentage'] = $this->validatePercentage($_GET['percentage']);
				
				$status = $this->validateIns($data);
				if($status)
					$status = $this->model->update($data);
				if($status){
					//Load the view for an updated student
					include('views/assistsUpdate.php');
					//The student has been updated
				}
				else{
					$_POST['error']='Error to do this action';
					include('views/error.php');
				}

			}
	 	}
		/**
		  * This functions returns the activity if the param is correct,
		  * otherwise returns false
		  * @param $activity, this is the activity to validate
		  * @return $activity(string), if is correct
		  * @return false, if isn't correct
		  */
		function validateActivity($activity){
			return true;
			return false;
		}
	
		/**
		  * This functions returns the percentage if the param is correct,
		  * otherwise returns false
		  * @param $percentage, this is the percentage to validate
		  * @return $percentage(string), if is correct
		  * @return false, if isn't correct
		  */
		function validatePercentage($percentage){
			return true;
			return false;
		}
	}
?>