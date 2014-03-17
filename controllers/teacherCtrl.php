<?php
	/**
	  * Teacher Controler
	  * @author Hernandez Mendez Julio Adrian ,Avila Arrezola Irma Araceli
	  * @since
	  */
	 require('controllers/standarCtrl.php'); 
	 class teacherCtrl extends standarCtrl{
		public $model;
		public $data;
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
					case 'login':
						$this->login();
						break;
					case 'change_password':
						$this->change_password();
						break;
				}
		}
		/**
		  * Method to insert a teacher
		  */
		function insert(){
			//Permissions validate
			$data = array();
			//Must have data
			if(empty($_GET['code'])||empty($_GET['password'])||empty($_GET['name'])||empty($_GET['email']))
				$_POST['error']='This action requires mandatory fields';
				include 'views/error.php';
			else{
				$data['code'] = $this->validateCode($_GET['code']);
				$data['password'] = $this->validatePassword($_GET['password']);
				$data['name'] = $this->validateName($_GET['name']);
				$data['email'] = $this->validateEMail($_GET['email']);
				
				$status = $this->validateIns($data);
				if($status)
					$status = $this->model->insert($data);
				if($status){
					//Load the view for an inserted teacher
					include('views/teacherInsert.php');
					//The teacher has been inserted
				}
				else{
					$_POST['error']='Error to do this action';
					include('views/error.php');
				}
			}
		}
		/**
		  * Method to delete a teacher
		  */
		function delete(){
			//Permissions validate
			$data = array();
			//Must have data
			if(empty($_GET['code'])||empty($_GET['password'])||empty($_GET['name'])||empty($_GET['email']))
				$_POST['error']='This action requires mandatory fields';
				include 'views/error.php';
			else{
				$data['code'] = $this->validateCode($_GET['code']);
				$data['password'] = $this->validatePassword($_GET['password']);
				$data['name'] = $this->validateName($_GET['name']);
				$data['email'] = $this->validateEMail($_GET['email']);
				
				$status = $this->validateIns($data);
				if($status)
					$status = $this->model->delete($data);
				if($status){
					//Load the view for an deleted teacher
					include('views/teacherDelete.php');
					//The teacher has been deleted
				}
				else{
					$_POST['error']='Error to do this action';
					include('views/error.php');
				}
			}
		}
		/**
		  * Method to select a teacher
		  */
		function select(){
			//Permissions validate
			$data = array();
			//Must have data
			if(empty($_GET['code'])||empty($_GET['password'])||empty($_GET['name'])||empty($_GET['email']))
				$_POST['error']='This action requires mandatory fields';
				include 'views/error.php';
			else{
				$data['code'] = $this->validateCode($_GET['code']);
				$data['password'] = $this->validatePassword($_GET['password']);
				$data['name'] = $this->validateName($_GET['name']);
				$data['email'] = $this->validateEMail($_GET['email']);
				
				$status = $this->validateIns($data);
				if($status)
					$status = $this->model->select($data);
				if($status){
					//Load the view for an selected teacher
					include('views/teacherSelect.php');
					//The selected has been deleted
				}
				else{
					$_POST['error']='Error to do this action';
					include('views/error.php');
				}
			}
		}
		
		/**
		  * Method to update a teacher
		  */
		function update(){
			//Permissions validate
			$data = array();
			//Must have data
			if(empty($_GET['code'])||empty($_GET['password'])||empty($_GET['name'])||empty($_GET['email']))
				$_POST['error']='This action requires mandatory fields';
				include 'views/error.php';
			else{
				$data['code'] = $this->validateCode($_GET['code']);
				$data['password'] = $this->validatePassword($_GET['password']);
				$data['name'] = $this->validateName($_GET['name']);
				$data['email'] = $this->validateEMail($_GET['email']);
				
				$status = $this->validateIns($data);
				if($status)
					$status = $this->model->update($data);
				if($status){
					//Load the view for an updated teacher
					include('views/teacherUpdate.php');
					//The selected has been updated
				}
				else{
					$_POST['error']='Error to do this action';
					include('views/error.php');
				}
			}
		}
	
		/**
		  * Method to login for a teacher
		  */
		function login(){
			//Permissions validate
			$data = array();
			//Must have data
			if((empty($_GET['password'])&&empty($_GET['code']))||(empty($_GET['password'])&&empty($_GET['email'])))
				$_POST['error']='This action requires mandatory fields';
				include 'views/error.php';
			else{
				$data['password'] = $this->validatePassword($_GET['password']);
				if(isset($_GET['code']))
					$data['code'] = $this->validateName($_GET['code']);
				if(isset($_GET['email']))	
					$data['email'] = $this->validatePassword($_GET['email']);	
				
				$status = $this->model->login($data);
				
				if($status){
					//Load the view for an success logged teacher
					include('views/teacherLogged.php');
					//The teacher has been logged
				}
				else{
					$_POST['error']='Error to do this action';
					include('views/error.php');
				}
			}
		}
	
		/**
		  * Method to change the password for a teacher
		  */
		function change_password(){
			//Permissions validate
			$data = array();
			//Must have data
			if((empty($_GET['password'])&&empty($_GET['code']))||(empty($_GET['password'])&&empty($_GET['email'])))
				$_POST['error']='This action requires mandatory fields';
				include 'views/error.php';
			else{
				$data['password'] = $this->validatePassword($_GET['password']);
				if(isset($_GET['code']))
					$data['code'] = $this->validateName($_GET['code']);
				if(isset($_GET['email']))	
					$data['email'] = $this->validatePassword($_GET['email']);	
				
				$status = $this->model->change_password($data);
				
				if($status){
					//Load the view for an success change password for a teacher
					include('views/teacherChangedPassword.php');
					//The teacher has been changed his password
				}
				else{
					$_POST['error']='Error to do this action';
					include('views/error.php');
				}
			}
		}			
		
	 }
?>