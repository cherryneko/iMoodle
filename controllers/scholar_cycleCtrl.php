<?php
	/**
	  * Scholar Cycle Controller
	  * @autor 
	  * @since
	  */
	 require('controllers/standarCtrl.php'); 
	 class scholar_cycleCtrl extends standarCtrl{
		public $model;
		
		function __construct(){
			//Calls the construct to made this object
			require('models/scholar_cycleMdl.php');
			$this->model = new scholar_cycleMdl();
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
		  * Method to insert a scholar_cycle
		  */
		function insert(){
			//Permissions validate
			//ins validate
			$data = array();
			$data['name'] = $this->validateName($_GET['name']);
			$data['email'] = $this->validateEMail($_GET['email']);
			
			$status = $this->model->insert($data);
			
			if($status){
				//Load the view for an inserted scholar_cycle
				include('views/scholar_cycleInsert.php');
				//The scholar_cycle has been inserted
			}
			else{
				include('views/error.php');
			}
		}
		/**
		  * Method to delete a scholar_cycle
		  */
		function delete(){
			//Permissions validate
			//ins validate
			$data = array();
			$data['name'] = $this->validateName($_GET['name']);
			$data['email'] = $this->validateEMail($_GET['email']);
			$status = $this->model->delete($data);
			
			if($status){
				//Load the view for a deleted scholar_cycle
				include('views/scholar_cycleDelete.php');
				//The scholar_cycle has been deleted
			}
			else{
				include('views/error.php');
			}
		}
		/**
		  * Method to select a scholar_cycle
		  */
		function select(){
			//Permissions validate
			$data = array();
			$data['name'] = $this->validateName($_GET['name']);
			$data['email'] = $this->validateEMail($_GET['email']);
			$status = $this->model->select($data);
			
			if($status){
				//Load the view for a selected scholar_cycle
				include('views/scholar_cycleSelect.php');
			}
			else{
				include('views/error.php');
			}
		}
		
		/**
		  * Method to update a scholar_cycle
		  */
		function update(){
			//Permissions validate
			$data = array();
			$data['name'] = $this->validateName($_GET['name']);
			$data['email'] = $this->validateEMail($_GET['email']);
			$status = $this->model->update($data);
			
			if($status){
				//Load the view for a updated scholar_cycle
				include('views/scholar_cycleUpdate.php');
			}
			else{
				include('views/error.php');
			}
		}
	 }
?>