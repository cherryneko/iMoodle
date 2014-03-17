<?php
	/**
	  * Assists Controller
	  * @author @author Hernandez Mendez Julio Adrian ,Avila Arrezola Irma Araceli
	  * @since
	  */
	 require('controllers/standarCtrl.php'); 
	 class assistsCtrl extends standarCtrl{
		public $model;
		
		function __construct(){
			//Calls the construct to made this object
			require('models/assistsMdl.php');
			$this->model = new assistsMdl();
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
		  * Method to insert a assists
		  */
		function insert(){
			//Permissions validate
			//ins validate
			$data = array();
			if(empty($_GET['students'])||empty($_GET['date'])){
				include'views/error.php';
			}else{
			$data['students'] = $this->validateStudents($_GET['students']);
			$data['date']=$this->validateDate($_GET['date']);
			
				
				$status = $this->validateIns($data);
				if($status)
					$status = $this->model->insert($data);
				if($status){
					//Load the view for an updated student
					include('views/assistsInsert.php');
					//The student has been updated
				}
				else{
					$_POST['error']='Error to do this action';
					include('views/error.php');
				}

			}
		}
		/**
		  * Method to delete a assists
		  */
		function delete(){
			//Permissions validate
			//ins validate
			$data = array();
			if(empty($_GET['students'])||empty($_GET['date'])){
				include'views/error.php';
			}else{
				
			$data['students'] = $this->validateStudents($_GET['students']);
			$data['date']=$this->validateDate($_GET['date']);
			
				
				$status = $this->validateIns($data);
				if($status)
					$status = $this->model->delete($data);
				if($status){
					//Load the view for an updated student
					include('views/assistsDelete.php');
					//The student has been updated
				}
				else{
					$_POST['error']='Error to do this action';
					include('views/error.php');
				}

			}	
		}
		/**
		  * Method to select a assists
		  */
		function select(){
			//Permissions validate
			$data = array();
			if(empty($_GET['students'])||empty($_GET['date'])){
				include'views/error.php';
			}else{
				$data['students'] = $this->validateStudents($_GET['students']);
			$data['date']=$this->validateDate($_GET['date']);
			
				
				$status = $this->validateIns($data);
				if($status)
					$status = $this->model->select($data);
				if($status){
					//Load the view for an updated student
					include('views/assistsSelect.php');
					//The student has been updated
				}
				else{
					$_POST['error']='Error to do this action';
					include('views/error.php');
				}

			}
		}
		
		/**
		  * Method to update a assists
		  */
		function update(){
			//Permissions validate
			$data = array();
			if(empty($_GET['students'])||empty($_GET['date'])){
				include'views/error.php';
			}else{
				$data['students'] = $this->validateStudents($_GET['students']);
			$data['date']=$this->validateDate($_GET['date']);
			
				$status = $this->validateIns($data);
				if($status)
					$status = $this->model->update($data);
				if($status){
					//Load the view for an updated student
					include('views/assistsUpdate.php');
					//The student has been updated
				}
				else{
					$_POST['error']='Error to do this action';
					include('views/error.php');
				}

			}
	 	}
	 	/**
		  * This functions returns the students if the param is correct,
		  * otherwise returns false
		  * @param $students, this is the code to validate
		  * @return $students(array), if is correct
		  * @return false, if isn't correct
		  */
	 	function validateStudents($students){
			foreach ($students as $value) {
				$status=$this->validateName($value);
				if(!$status){
					return $students;
				}
			}

			return false;
		}
		/**
		  * This functions returns the date if the param is correct,
		  * otherwise returns false
		  * @param $date, this is the code to validate
		  * @return $date(string), if is correct
		  * @return false, if isn't correct
		  */

		function validateDate($date){
			$p="/^([0-3][0-9][\/][0-1][1-9][\/][0-9][1-9])$/i";
			if(preg_match($p,$date)==1){
				return $date;
			}
		return false;
		}
	 }
?>