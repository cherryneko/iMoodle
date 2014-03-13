<?php
	/**
	  * Course Controller
	  * @autor 
	  * @since
	  */
	 require('controllers/standarCtrl.php'); 
	 class courseCtrl extends standarCtrl{
		public $model;
		
		function __construct(){
			//Calls the construct to made this object
			require('models/courseMdl.php');
			$this->model = new courseMdl();
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
		  * Method to insert a course
		  */
		function insert(){
			//Permissions validate
			//ins validate
			$data = array();
			$data['name'] = $this->validateName($_GET['name']);
			$data['email'] = $this->validateEMail($_GET['email']);
			
			$status = $this->model->insert($data);
			
			if($status){
				//Load the view for an inserted course
				include('views/courseInsert.php');
				//The course has been inserted
			}
			else{
				include('views/error.php');
			}
		}
		/**
		  * Method to delete a course
		  */
		function delete(){
			//Permissions validate
			//ins validate
			$data = array();
			$data['name'] = $this->validateName($_GET['name']);
			$data['email'] = $this->validateEMail($_GET['email']);
			$status = $this->model->delete($data);
			
			if($status){
				//Load the view for a deleted course
				include('views/courseDelete.php');
				//The course has been deleted
			}
			else{
				include('views/error.php');
			}
		}
		/**
		  * Method to select a course
		  */
		function select(){
			//Permissions validate
			$data = array();
			$data['name'] = $this->validateName($_GET['name']);
			$data['email'] = $this->validateEMail($_GET['email']);
			$status = $this->model->select($data);
			
			if($status){
				//Load the view for a selected course
				include('views/courseSelect.php');
			}
			else{
				include('views/error.php');
			}
		}
		
		/**
		  * Method to update a course
		  */
		function update(){
			//Permissions validate
			$data = array();
			$data['name'] = $this->validateName($_GET['name']);
			$data['email'] = $this->validateEMail($_GET['email']);
			$status = $this->model->update($data);
			
			if($status){
				//Load the view for a updated course
				include('views/courseUpdate.php');
			}
			else{
				include('views/error.php');
			}
		}
	 }
?>