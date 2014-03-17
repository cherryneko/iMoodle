<?php
	/**
	  * Lists Controller
	  * @author @author Hernandez Mendez Julio Adrian ,Avila Arrezola Irma Araceli
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
			$data['students'] = $this->validateStudents($_GET['students']);
			
			$status = $this->model->insert($data);
			
			if($status){
				//Load the view for an inserted lists
				include('views/listsInsert.php');
				//The lists has been inserted
			}
			else{
				$_POST['error']='Error to do this action';
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
			$data['students'] = $this->validateStudents($_GET['students']);
			$status = $this->model->delete($data);
			
			if($status){
				//Load the view for a deleted lists
				include('views/listsDelete.php');
				//The lists has been deleted
			}
			else{
				$_POST['error']='Error to do this action';
				include('views/error.php');
			}
		}
		/**
		  * Method to select a lists
		  */
		function select(){
			//Permissions validate
			$data = array();
			$data['students'] = $this->validateStudents($_GET['students']);
			$status = $this->model->select($data);
			
			if($status){
				//Load the view for a selected lists
				include('views/listsSelect.php');
			}
			else{
				$_POST['error']='Error to do this action';
				include('views/error.php');
			}
		}
		
		/**
		  * Method to update a lists
		  */
		function update(){
			//Permissions validate
			$data = array();
			$data['students'] = $this->validateStudents($_GET['students']);
			$status = $this->model->update($data);
			
			if($status){
				//Load the view for a updated lists
				include('views/listsUpdate.php');
			}
			else{
				$_POST['error']='Error to do this action';
				include('views/error.php');
			}
		}
		  /*
		  * This functions generate am extra list if the param is correct,
		  * otherwise returns error
		  * 
		  * @return extralist, if is correct
		  * @return error, if isn't correct
		  */
		function generateExtra(){
			//Permissions validate
			$data = array();
			$data['name'] = $this->validateName($_GET['name']);
			$data['email'] = $this->validateEMail($_GET['email']);
			$status = $this->model->generateExtra($data);
			
			if($status){
				//Load the view for an extra generated lists
				include('views/listsCopy.php');
			}
			else{
				$_POST['error']='Error to do this action';
				include('views/error.php');
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
	 }
?>