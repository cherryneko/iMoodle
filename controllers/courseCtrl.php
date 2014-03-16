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

	 function validateCycle($scholar_cycle){
			$p="/[2][0][0-9]{2}[a-b]$/i";
			if(preg_match($p,$scholar_cycle)==1){
				return $scholar_cycle;
			}
		
		return false;	
		}
		function validateSection($section){
			$p="/^[d][0-9]{2}/i";
			if(preg_match($p,$section)==1){
				return $section;
			}else
				return false;
			
		}
	function validateNrc($NRC){
			$p="/^(0)([0-9]{4})$/i";
			if(preg_match($p,$NRC)==1){
				return $NRC;
			}else
				return false;
			
		}
	function validateAcademy($academy){
			$value=$this->validateName($academy);
			if($value{
				$status=$this->model->select($academy);
				if($status){
					return $academy;
				}
			}
		
		return false;
			
		}
	function validateClass($class_days){
			
			$value=validateDay($class_days);
			if($value){
				return $class_days;
			}else
				return false;
			
		}
	function validateHoursPerDay($hours_per_day){
			$p="/^[1-5]\s{1}/i";
			if(preg_match($p,$hours_per_day)==1){
				return $hours_per_day;
			}else
				return false;
			
		}

	function validateHoursEachDay($hours_each_day){
			$valueDay=validateDay($hours_each_day[0]);
			$valueTime=validateTime($hours_each_day[1]]);
			if($valueDay&&$valueTime){
				return $hours_each_day;
			}
		return false;	
		}


	function validateDay($day){
		$dias= array("lunes","martes" ,"miercoles","jueves","viernes","sabado");
		if(array_search($day, $dias)){
			return true;
		}
		return false;
	}

	function validateTime($time){
		$p="/^([0-2][0-9])[:]([0-5][0-9])$/i";
			if(preg_match($p,$hours_per_day)==1){
				return true;
			}
		return false;
	}

?>