<?php
	/**
	  * Scholar Cycle Controller
	  * @autor 
	  * @since
	  */
	 require('controllers/standarCtrl.php'); 
	 class scholar_cycleCtrl extends standarCtrl{
		public $model;
		public $data;
		
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
			$data = array();
			//Must have data
			if(empty($_GET['cycle_format'])||empty($_GET['start_date'])||empty($_GET['end_date'])||empty($_GET['nolaboral_days'])){
				$_POST['error']='This action requires mandatory fields';
				include 'views/error.php';
			}
			else{
				$data['cycle_format'] = $this->validateCycleFormat($_GET['cycle_format']);
				$data['start_date'] = $this->validateDate($_GET['start_date']);
				$data['end_date'] = $this->validateDate($_GET['end_date']);
				$data['nolaboral_days'] = $this->validateNoLaboralDays($_GET['nolaboral_days']);
				
				$status = $this->validateIns($data);
				if($status)
					$status = $this->model->insert($data);
				if($status){
					//Load the view for an inserted scholar_cycle
					include('views/scholar_cycleInsert.php');
					//The scholar_cycle has been inserted
				}
				else{
					$_POST['error']='Error to do this action';
					include('views/error.php');
				}
			}
		}
		/**
		  * Method to delete a scholar_cycle
		  */
		function delete(){
			//Permissions validate
			$data = array();
			//Must have data
			if(empty($_GET['cycle_format'])||empty($_GET['start_date'])||empty($_GET['end_date'])||empty($_GET['nolaboral_days']))
				include 'views/error.php';
			else{
				$data['cycle_format'] = $this->validateCycleFormat($_GET['cycle_format']);
				$data['start_date'] = $this->validateDate($_GET['start_date']);
				$data['end_date'] = $this->validateDate($_GET['end_date']);
				$data['nolaboral_days'] = $this->validateNoLaboralDays($_GET['nolaboral_days']);
				
				$status = $this->validateIns($data);
				if($status)
					$status = $this->model->delete($data);
				if($status){
					//Load the view for an deleted scholar_cycle
					include('views/scholar_cycleDelete.php');
					//The scholar_cycle has been deleted
				}
				else{
					$_POST['error']='Error to do this action';
					include('views/error.php');
				}
			}
		}
		/**
		  * Method to select a scholar_cycle
		  */
		function select(){
			//Permissions validate
			$data = array();
			//Must have data
			if(empty($_GET['cycle_format'])||empty($_GET['start_date'])||empty($_GET['end_date'])||empty($_GET['nolaboral_days']))
				include 'views/error.php';
			else{
				$data['cycle_format'] = $this->validateCycleFormat($_GET['cycle_format']);
				$data['start_date'] = $this->validateDate($_GET['start_date']);
				$data['end_date'] = $this->validateDate($_GET['end_date']);
				$data['nolaboral_days'] = $this->validateNoLaboralDays($_GET['nolaboral_days']);
				
				$status = $this->validateIns($data);
				if($status)
					$status = $this->model->select($data);
				if($status){
					//Load the view for an selected scholar_cycle
					include('views/scholar_cycleDelete.php');
					//The scholar_cycle has been selected
				}
				else{
					$_POST['error']='Error to do this action';
					include('views/error.php');
				}
			}
		}
		
		/**
		  * Method to update a scholar_cycle
		  */
		function update(){
			//Permissions validate
			$data = array();
			//Must have data
			if(empty($_GET['cycle_format'])||empty($_GET['start_date'])||empty($_GET['end_date'])||empty($_GET['nolaboral_days']))
				include 'views/error.php';
			else{
				$data['cycle_format'] = $this->validateCycleFormat($_GET['cycle_format']);
				$data['start_date'] = $this->validateDate($_GET['start_date']);
				$data['end_date'] = $this->validateDate($_GET['end_date']);
				$data['nolaboral_days'] = $this->validateNoLaboralDays($_GET['nolaboral_days']);
				
				$status = $this->validateIns($data);
				if($status)
					$status = $this->model->update($data);
				if($status){
					//Load the view for an updated scholar_cycle
					include('views/scholar_cycleUpdate.php');
					//The scholar_cycle has been updated
				}
				else{
					$_POST['error']='Error to do this action';
					include('views/error.php');
				}
			}
		}
		
		/**
		  * This functions returns the cycle format if the param is correct,
		  * otherwise returns false
		  * @param $cycle_format, this is the cycle format to validate
		  * @return $cycle_format(string), if is correct
		  * @return false, if isn't correct
		  */
		function validateCycleFormat($cycle_format){
			$p="/[2][0][0-9]{2}[a-b]$/i";
			if(preg_match($p,$cycle_format)==1){
					return $cycle_format;		
			}
			return false;
		}
		/**
		  * This functions returns the date if the param is correct,
		  * otherwise returns false
		  * @param $date, this is the date to validate
		  * @return $date(string), if is correct
		  * @return false, if isn't correct
		  */
		function validateDate($date){
			$dias= array("lunes","martes" ,"miercoles","jueves","viernes","sabado");
			if(array_search($date, $dias)){
				return $date;
			}
		return false;
		}
		
		/**
		  * This functions returns the no laboral days if the param is correct,
		  * otherwise returns false
		  * @param $nolaboral_days (array), this are the no laboral days to validate
		  * @return $nolaboral_days(array), if is correct
		  * @return false, if isn't correct
		  */
		function validateNoLaboralDays($nolaboral_days){
			
			return $nolaboral_days;
		}
	 }
?>