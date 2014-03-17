<?php
	/**
	  * Course Controller
	  * @author @author Hernandez Mendez Julio Adrian ,Avila Arrezola Irma Araceli
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
					case 'copy':
						$this->copy();
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
			if(empty($_GET['scholar_cycle'])||empty($_GET['name'])||empty($_GET['section'])||empty($_GET['NRC'])||empty($_GET['academy'])||empty($_GET['class_days'])||empty($_GET['hours_per_day'])||empty($_GET['hours_each_day'])){
				$_POST['error']='This action requires mandatory fields';
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
					//Load the view for an updated course
					include('views/courseInsert.php');
					//The course has been updated
				}
				else{
					$_POST['error']='Error to do this action';
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
			if(empty($_GET['scholar_cycle'])||empty($_GET['name'])||empty($_GET['section'])||empty($_GET['NRC'])||empty($_GET['academy'])||empty($_GET['class_days'])||empty($_GET['hours_per_day'])||empty($_GET['hours_each_day'])){
				$_POST['error']='This action requires mandatory fields';
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
					//Load the view for an updated course
					include('views/courseDelete.php');
					//The course has been updated
				}
				else{
					$_POST['error']='Error to do this action';
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
			if(empty($_GET['scholar_cycle'])||empty($_GET['name'])||empty($_GET['section'])||empty($_GET['NRC'])||empty($_GET['academy'])||empty($_GET['class_days'])||empty($_GET['hours_per_day'])||empty($_GET['hours_each_day'])){
				$_POST['error']='This action requires mandatory fields';
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
					//Load the view for an updated course
					include('views/courseSelect.php');
					//The course has been updated
				}
				else{
					$_POST['error']='Error to do this action';
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
			if(empty($_GET['scholar_cycle'])||empty($_GET['name'])||empty($_GET['section'])||empty($_GET['NRC'])||empty($_GET['academy'])||empty($_GET['class_days'])||empty($_GET['hours_per_day'])||empty($_GET['hours_each_day'])){
				$_POST['error']='This action requires mandatory fields';
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
					//Load the view for an updated course
					include('views/courseUpdate.php');
					//The course has been updated
				}
				else{
					$_POST['error']='Error to do this action';
					include('views/error.php');
				}
			}
	 }

		/**
		  * Method to copy a course
		  */
		function copy(){
			//Permissions validate
			//ins validate
			$data = array();
			if(empty($_GET['scholar_cycle'])||empty($_GET['name'])||empty($_GET['section'])||empty($_GET['NRC'])||empty($_GET['academy'])||empty($_GET['class_days'])||empty($_GET['hours_per_day'])||empty($_GET['hours_each_day'])){
				$_POST['error']='This action requires mandatory fields';
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

				if($data['hours_each_day']==false)echo "hola";

				
				if($status)
					$status = $this->model->copy($data);
				if($status){
					//Load the view for an copied course
					include('views/courseCopied.php');
					//The course has been copied
				}
				else{
					$_POST['error']='Error to do this action';
					include('views/error.php');
				}
			}
		}
	/**
		  * This functions returns the cycle if the param is correct,
		  * otherwise returns false
		  * @param $scholar_cycle, this is the code to validate
		  * @return $scholar_cycle(string), if is correct
		  * @return false, if isn't correct
		  */
	 function validateCycle($scholar_cycle){
			$p="/[2][0][0-9]{2}[a-b]$/i";
			if(preg_match($p,$scholar_cycle)==1){
				return $scholar_cycle;
			}
		
		return false;	
		}
	/**
		  * This functions returns the section if the param is correct,
		  * otherwise returns false
		  * @param $section, this is the code to validate
		  * @return $section(string), if is correct
		  * @return false, if isn't correct
		  */
		function validateSection($section){
			$p="/^[d][0-9]{2}/i";
			if(preg_match($p,$section)==1){
				return $section;
			}else
				return false;
			
		}

		/**
		  * This functions returns the NRC if the param is correct,
		  * otherwise returns false
		  * @param $NRC, this is the code to validate
		  * @return $NRC(string), if is correct
		  * @return false, if isn't correct
		  */
		function validateNrc($NRC){
			$p="/^(0)([0-9]{4})$/i";
			if(preg_match($p,$NRC)==1){
				return $NRC;
			}else
				return false;
			
		}
		/**
		  * This functions returns the academy if the param is correct,
		  * otherwise returns false
		  * @param $academy, this is the code to validate
		  * @return $academy(string), if is correct
		  * @return false, if isn't correct
		  */
		function validateAcademy($academy){
			$value=$this->validateName($academy);
			if($value){
				$status=$this->model->select($academy);
				if($status){
					return $academy;
				}
			}
		
		return false;
			
		}
		
		/**
		  * This functions returns the class days if the param is correct,
		  * otherwise returns false
		  * @param $class_days, this is the code to validate
		  * @return $class_days(string), if is correct
		  * @return false, if isn't correct
		  */
		function validateClass($class_days){
			
			$value=$this->validateDay($class_days);
			if($value){
				return $class_days;
			}else
				return false;
			
		}

		/**
		  * This functions returns the hours per day if the param is correct,
		  * otherwise returns false
		  * @param $hours_per_day, this is the code to validate
		  * @return $hours_per_day(string), if is correct
		  * @return false, if isn't correct
		  */
		function validateHoursPerDay($hours_per_day){
			$p="/^[1-5]{1}/i";
			if(preg_match($p,$hours_per_day)==1){
				return $hours_per_day;
			}else
				return false;
			
		}

		/**
		  * This functions returns the hours each day if the param is correct,
		  * otherwise returns false
		  * @param $hours_each_day, this is the code to validate
		  * @return $hours_each_day(string), if is correct
		  * @return false, if isn't correct
		  */
		function validateHoursEachDay($hours_each_day){

			$valueDay=$this->validateDay($hours_each_day[0]);
			$valueTime=$this->validateTime($hours_each_day[1]);
			if($valueDay&&$valueTime){
				return $hours_each_day;
			}
		return false;	
		}

		/**
		  * This functions returns the day if the param is correct,
		  * otherwise returns false
		  * @param $day, this is the code to validate
		  * @return $day(string), if is correct
		  * @return false, if isn't correct
		  */
		function validateDay($day){
			$dias= array("lunes","martes","miercoles","jueves","viernes","sabado");
			if(in_array($day, $dias)==true){
				
				return $day;
			}
			return false;
			}
		/**
		  * This functions returns the time if the param is correct,
		  * otherwise returns false
		  * @param $time, this is the code to validate
		  * @return $time(string), if is correct
		  * @return false, if isn't correct
		  */
		function validateTime($time){
			$p="/^([0-2][0-9])[:]([0-5][0-9])$/i";
				if(preg_match($p,$time)==1){
					return $time;
				}
			return false;
		}
}
?>