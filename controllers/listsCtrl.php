<?php
	/**
	  * Lists Controller
	  * @autor 
	  * @since
	  */
	 require('controllers/standarCtrl.php'); 
	 class listsCtrl extends standarCtrl{
		public $model;
		
		function __construct(){
			//Calls the construct to made this object
			require('models/listsMdl.php');
			$this->model = new listsMdl();
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
		  * Method to insert a lists
		  */
		function insert(){
			//Permissions validate
			//ins validate
			$data = array();
			$data['name'] = $this->validateName($_GET['name']);
			$data['email'] = $this->validateEMail($_GET['email']);
			
			$status = $this->model->insert($data);
			
			if($status){
				//Load the view for an inserted lists
				include('views/listsInsert.php');
				//The lists has been inserted
			}
			else{
				include('views/error.php');
			}
		}
		/**
		  * Method to delete a lists
		  */
		function delete(){
			//Permissions validate
			//ins validate
			$data = array();
			$data['name'] = $this->validateName($_GET['name']);
			$data['email'] = $this->validateEMail($_GET['email']);
			$status = $this->model->delete($data);
			
			if($status){
				//Load the view for a deleted lists
				include('views/listsDelete.php');
				//The lists has been deleted
			}
			else{
				include('views/error.php');
			}
		}
		/**
		  * Method to select a lists
		  */
		function select(){
			//Permissions validate
			$data = array();
			$data['name'] = $this->validateName($_GET['name']);
			$data['email'] = $this->validateEMail($_GET['email']);
			$status = $this->model->select($data);
			
			if($status){
				//Load the view for a selected lists
				include('views/listsSelect.php');
			}
			else{
				include('views/error.php');
			}
		}
		
		/**
		  * Method to update a lists
		  */
		function update(){
			//Permissions validate
			$data = array();
			$data['name'] = $this->validateName($_GET['name']);
			$data['email'] = $this->validateEMail($_GET['email']);
			$status = $this->model->update($data);
			
			if($status){
				//Load the view for a updated lists
				include('views/listsUpdate.php');
			}
			else{
				include('views/error.php');
			}
		}
	 }
?>