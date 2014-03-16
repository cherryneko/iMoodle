<?php
	/**
	  * Student Controler
	  * @autor 
	  * @since
	  */
	 require('controllers/standarCtrl.php'); 
	 class studentCtrl extends standarCtrl{
		public $model;
		public $data;
		function __construct(){
			//Calls the construct to made this object
			require('models/studentMdl.php');
			$this->model = new studentMdl();
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
			$data = array();
			//Must have data
			if(empty($_GET['code'])||empty($_GET['name'])||empty($_GET['career'])||empty($_GET['email']))
				include 'views/error.php';
			else{
				$data['code'] = $this->validateCode($_GET['code']);
				$data['name'] = $this->validateName($_GET['name']);
				$data['career'] = $this->validateCareer($_GET['career']);
				$data['email'] = $this->validateEMail($_GET['email']);
				$data['password'] = $this->validatePassword($_GET['password']);
				
				//Optional data
				if(isset($_GET['mobile']))
					$data['mobile'] = $this->validateMobile($_GET['mobile']);
				if(isset($_GET['github']))
					$data['github'] = $this->validateGitHub($_GET['github']);
				if(isset($_GET['web_page']))	
					$data['web_page'] = $this->validateURL($_GET['web_page']);	
				
				$status = $this->validateIns($data);
				if($status)
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
		}
		/**
		  * Method to select a student
		  */
		function select(){
			//Permissions validate
			$data = array();
			//Must have data
			if(empty($_GET['code'])||empty($_GET['name'])||empty($_GET['career'])||empty($_GET['email']))
				include 'views/error.php';
			else{
				$data['code'] = $this->validateCode($_GET['code']);
				$data['name'] = $this->validateName($_GET['name']);
				$data['career'] = $this->validateCareer($_GET['career']);
				$data['email'] = $this->validateEMail($_GET['email']);
				$data['password'] = $this->validatePassword($_GET['password']);
				
				//Optional data
				if(isset($_GET['mobile']))
					$data['mobile'] = $this->validateMobile($_GET['mobile']);
				if(isset($_GET['github']))
					$data['github'] = $this->validateGitHub($_GET['github']);
				if(isset($_GET['web_page']))	
					$data['web_page'] = $this->validateURL($_GET['web_page']);	
				
				$status = $this->validateIns($data);
				if($status)
					$status = $this->model->select($data);
				if($status){
					//Load the view for an selected student
					include('views/studentSelect.php');
					//The student has been selected
				}
				else{
					include('views/error.php');
				}
			}
		}
		/**
		  * Method to delete a student
		  */
		function delete(){
			//Permissions validate
			$data = array();
			//Must have data
			if(empty($_GET['code'])||empty($_GET['name'])||empty($_GET['career'])||empty($_GET['email']))
				include 'views/error.php';
			else{
				$data['code'] = $this->validateCode($_GET['code']);
				$data['name'] = $this->validateName($_GET['name']);
				$data['career'] = $this->validateCareer($_GET['career']);
				$data['email'] = $this->validateEMail($_GET['email']);
				$data['password'] = $this->validatePassword($_GET['password']);
				
				//Optional data
				if(isset($_GET['mobile']))
					$data['mobile'] = $this->validateMobile($_GET['mobile']);
				if(isset($_GET['github']))
					$data['github'] = $this->validateGitHub($_GET['github']);
				if(isset($_GET['web_page']))	
					$data['web_page'] = $this->validateURL($_GET['web_page']);	
				
				$status = $this->validateIns($data);
				if($status)
					$status = $this->model->delete($data);
				if($status){
					//Load the view for an deleted student
					include('views/studentDelete.php');
					//The student has been deleted
				}
				else{
					include('views/error.php');
				}
			}
		}
		
		/**
		  * Method to update a student
		  */
		function update(){
			//Permissions validate
			$data = array();
			//Must have data
			if(empty($_GET['code'])||empty($_GET['name'])||empty($_GET['career'])||empty($_GET['email']))
				include 'views/error.php';
			else{
				$data['code'] = $this->validateCode($_GET['code']);
				$data['name'] = $this->validateName($_GET['name']);
				$data['career'] = $this->validateCareer($_GET['career']);
				$data['email'] = $this->validateEMail($_GET['email']);
				$data['password'] = $this->validatePassword($_GET['password']);
				
				//Optional data
				if(isset($_GET['mobile']))
					$data['mobile'] = $this->validateMobile($_GET['mobile']);
				if(isset($_GET['github']))
					$data['github'] = $this->validateGitHub($_GET['github']);
				if(isset($_GET['web_page']))	
					$data['web_page'] = $this->validateURL($_GET['web_page']);	
				
				$status = $this->validateIns($data);
				if($status)
					$status = $this->model->update($data);
				if($status){
					//Load the view for an updated student
					include('views/studentUpdate.php');
					//The student has been updated
				}
				else{
					include('views/error.php');
				}
			}
		}
		
		/**
		  * This functions returns the career if the param is correct,
		  * otherwise returns false
		  * @param $career, this is the code to validate
		  * @return $career(string), if is correct
		  * @return false, if isn't correct
		  */
		function validateCareer($career){
			return $career;
		}
		
		/**
		  * This functions returns the github if the param is correct,
		  * otherwise returns false
		  * @param $github, this is the code to validate
		  * @return $github(string), if is correct
		  * @return false, if isn't correct
		  */
		function validateGitHub($github){
			return $github;
		}
		
		/**
		  * This functions returns the url if the param is correct,
		  * otherwise returns false
		  * @param $url, this is the code to validate
		  * @return $url(string), if is correct
		  * @return false, if isn't correct
		  */
		function validateURL($url){
			return $url;
		}
		
		/**
		  * This functions returns the mobile if the param is correct,
		  * otherwise returns false
		  * @param $mobile, this is the code to validate
		  * @return $mobile(string), if is correct
		  * @return false, if isn't correct
		  */
		function validateMobile($mobile){
			return $mobile;
		}
	 }
?>