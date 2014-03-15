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
			if(empty($_GET['scholar_cycle'])||empty($_GET['name'])||empty($_GET['section'])||empty($_GET['NRC'])||empty($_GET['academy'])||empty($_GET['class_days'])||empty($_GET['hours_per_day'])||empty($_GET['hours_each_day'])||){
				include'views/error.php';
			}else{
				$data['scholar_cycle'] = $this->validateCycle($_GET['scholar_cycle']);
				$data['name'] = $this->validateName($_GET['name']);
				$data['section'] = $this->validateSection($_GET['section']);
				$data['NRC'] = $this->validateNrc($_GET['NRC']);
				$data['academy'] = $this->validateAcademy($_GET['academy']);
				$data['class_days'] = $this->validateClass($_GET['class_days']);
				$data['hours_per_day'] = $this->validateHoursPerDay($_GET['hours_per_day']);
				$data['hours_each_day'] = $this->validateHoursEachDay($_GET['hours_each_day']);

				$status = $this->validateIns($data);
				if($status)
					$status = $this->model->insert($data);
				if($status){
					//Load the view for an updated student
					include('views/courseInsert.php');
					//The student has been updated
				}
				else{
					include('views/error.php');
				}
			}
		}
		/**
		  * Method to delete a course
		  */
		function delete(){
			//Permissions validate
			//ins validate
			$data = array();
			if(empty($_GET['scholar_cycle'])||empty($_GET['name'])||empty($_GET['section'])||empty($_GET['NRC'])||empty($_GET['academy'])||empty($_GET['class_days'])||empty($_GET['hours_per_day'])||empty($_GET['hours_each_day'])||){
				include'views/error.php';
			}else{
				$data['scholar_cycle'] = $this->validateCycle($_GET['scholar_cycle']);
				$data['name'] = $this->validateName($_GET['name']);
				$data['section'] = $this->validateSection($_GET['section']);
				$data['NRC'] = $this->validateNrc($_GET['NRC']);
				$data['academy'] = $this->validateAcademy($_GET['academy']);
				$data['class_days'] = $this->validateClass($_GET['class_days']);
				$data['hours_per_day'] = $this->validateHoursPerDay($_GET['hours_per_day']);
				$data['hours_each_day'] = $this->validateHoursEachDay($_GET['hours_each_day']);

				$status = $this->validateIns($data);
				if($status)
					$status = $this->model->delete($data);
				if($status){
					//Load the view for an updated student
					include('views/courseDelete.php');
					//The student has been updated
				}
				else{
					include('views/error.php');
				}
			}
		}
		/**
		  * Method to select a course
		  */
		function select(){
			//Permissions validate
			$data = array();
			if(empty($_GET['scholar_cycle'])||empty($_GET['name'])||empty($_GET['section'])||empty($_GET['NRC'])||empty($_GET['academy'])||empty($_GET['class_days'])||empty($_GET['hours_per_day'])||empty($_GET['hours_each_day'])||){
				include'views/error.php';
			}else{
				$data['scholar_cycle'] = $this->validateCycle($_GET['scholar_cycle']);
				$data['name'] = $this->validateName($_GET['name']);
				$data['section'] = $this->validateSection($_GET['section']);
				$data['NRC'] = $this->validateNrc($_GET['NRC']);
				$data['academy'] = $this->validateAcademy($_GET['academy']);
				$data['class_days'] = $this->validateClass($_GET['class_days']);
				$data['hours_per_day'] = $this->validateHoursPerDay($_GET['hours_per_day']);
				$data['hours_each_day'] = $this->validateHoursEachDay($_GET['hours_each_day']);

				$status = $this->validateIns($data);
				if($status)
					$status = $this->model->select($data);
				if($status){
					//Load the view for an updated student
					include('views/courseSelect.php');
					//The student has been updated
				}
				else{
					include('views/error.php');
				}
			}
		}
		
		/**
		  * Method to update a course
		  */
		function update(){
			//Permissions validate
			$data = array();
			if(empty($_GET['scholar_cycle'])||empty($_GET['name'])||empty($_GET['section'])||empty($_GET['NRC'])||empty($_GET['academy'])||empty($_GET['class_days'])||empty($_GET['hours_per_day'])||empty($_GET['hours_each_day'])||){
				include'views/error.php';
			}else{
				$data['scholar_cycle'] = $this->validateCycle($_GET['scholar_cycle']);
				$data['name'] = $this->validateName($_GET['name']);
				$data['section'] = $this->validateSection($_GET['section']);
				$data['NRC'] = $this->validateNrc($_GET['NRC']);
				$data['academy'] = $this->validateAcademy($_GET['academy']);
				$data['class_days'] = $this->validateClass($_GET['class_days']);
				$data['hours_per_day'] = $this->validateHoursPerDay($_GET['hours_per_day']);
				$data['hours_each_day'] = $this->validateHoursEachDay($_GET['hours_each_day']);

				$status = $this->validateIns($data);
				if($status)
					$status = $this->model->update($data);
				if($status){
					//Load the view for an updated student
					include('views/courseUpdate.php');
					//The student has been updated
				}
				else{
					include('views/error.php');
				}
			}
	 }
?>