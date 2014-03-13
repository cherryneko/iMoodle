<?php
	/**
	  * Student Controler
	  * @autor 
	  * @since
	  */
	 require('controllers/standarCtrl.php'); 
	 class studentCtrl extends standarCtrl{
		public $model;
		
		function __construct(){
			//Calls the construct to made this object
			require('models/studentMdl.php');
			$this->modelo = new alumnoMdl();
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
		  * Method to insert a student
		  */
		function insert(){
			//Permissions validate
			//ins validate
			$data = array();
			$data['name'] = $this->validateName($_GET['name']);
			$data['email'] = $this->validateEMail($_GET['email']);
			
			$status = $this->model->insert($data);
			
			if($status){
				//Load the view for an inserted student
				include('views/studentInsert.php');
				//The student has been inserted
			}
			else{
				include('views/error.php');
			}
		}
		/**
		  * Method to delete a student
		  */
		function delete(){
			//Permissions validate
			$status = $this->model->delete($data);
			
			if($status){
				//Load the view for a deleted student
				include('views/studentDelete.php');
				//The student has been deleted
			}
			else{
				include('views/error.php');
			}
		}
		/**
		  * Method to select a student
		  */
		function select(){
			//Permissions validate
			$data = array();
			$data['name'] = $this->validateName($_GET['name']);
			$data['email'] = $this->validateEMail($_GET['email']);
			$status = $this->model->select($data);
			
			if($status){
				//Load the view for a selected student
				include('views/studentSelect.php');
			}
			else{
				include('views/error.php');
			}
		}
		
		/**
		  * Method to update a student
		  */
		function update(){
			//Permissions validate
			$data = array();
			$data['name'] = $this->validateName($_GET['name']);
			$data['email'] = $this->validateEMail($_GET['email']);
			$status = $this->model->update($data);
			
			if($status){
				//Load the view for a updated student
				include('views/studentUpdate.php');
			}
			else{
				include('views/error.php');
			}
		}
	 }
?>