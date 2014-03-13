<?php
	/**
	  * Teacher Controler
	  * @autor 
	  * @since
	  */
	 require('controllers/standarCtrl.php'); 
	 class teacherCtrl extends standarCtrl{
		public $model;
		
		function __construct(){
			//Calls the construct to made this object
			require('models/teacherMdl.php');
			$this->model = new teacherMdl();
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
		  * Method to insert a teacher
		  */
		function insert(){
			//Permissions validate
			//ins validate
			$data = array();
			$data['name'] = $this->validateName($_GET['name']);
			$data['email'] = $this->validateEMail($_GET['email']);
			
			$status = $this->model->insert($data);
			
			if($status){
				//Load the view for an inserted teacher
				include('views/teacherInsert.php');
				//The teacher has been inserted
			}
			else{
				include('views/error.php');
			}
		}
		/**
		  * Method to delete a teacher
		  */
		function delete(){
			//Permissions validate
			//ins validate
			$data = array();
			$data['name'] = $this->validateName($_GET['name']);
			$data['email'] = $this->validateEMail($_GET['email']);
			$status = $this->model->delete($data);
			
			if($status){
				//Load the view for a deleted teacher
				include('views/teacherDelete.php');
				//The teacher has been deleted
			}
			else{
				include('views/error.php');
			}
		}
		/**
		  * Method to select a teacher
		  */
		function select(){
			//Permissions validate
			$data = array();
			$data['name'] = $this->validateName($_GET['name']);
			$data['email'] = $this->validateEMail($_GET['email']);
			$status = $this->model->select($data);
			
			if($status){
				//Load the view for a selected teacher
				include('views/teacherSelect.php');
			}
			else{
				include('views/error.php');
			}
		}
		
		/**
		  * Method to update a teacher
		  */
		function update(){
			//Permissions validate
			$data = array();
			$data['name'] = $this->validateName($_GET['name']);
			$data['email'] = $this->validateEMail($_GET['email']);
			$status = $this->model->update($data);
			
			if($status){
				//Load the view for a updated teacher
				include('views/teacherUpdate.php');
			}
			else{
				include('views/error.php');
			}
		}
	 }
?>