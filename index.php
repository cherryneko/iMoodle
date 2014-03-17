<?php 
	/**
	  * @author
	  * @since
	  *
	  * This file recive the petition's user
	 */
	 
	if(isset($_GET['controller'])){
		$correctController = false;
		$controller;
		switch($_GET['controller'])
		{
			case 'student':
				require('controllers/studentCtrl.php');
				$controller = new studentCtrl();
				$correctController = true;
				break;
			case 'teacher':
				require('controllers/teacherCtrl.php');
				$controller = new teacherCtrl();
				$correctController = true;
				break;
			case 'course':
				require('controllers/courseCtrl.php');
				$controller = new courseCtrl();
				$correctController = true;
				break;
			case 'scholar_cycle':
				require('controllers/scholar_cycleCtrl.php');
				$controller = new scholar_cycleCtrl();
				$correctController = true;
				break;
			case 'notes':
				require('controllers/notesCtrl.php');
				$controller = new notesCtrl();
				$correctController = true;
				break;
			case 'assists':
				require('controllers/assistsCtrl.php');
				$controller = new assistsCtrl();
				$correctController = true;
				break;
			case 'lists':
				require('controllers/listsCtrl.php');
				$controller = new listsCtrl();
				$correctController = true;
				break;
			case 'assists':
				break;
			default:
				//Code
				break;
		}
	}
	if(isset($correctController) && $correctController){
		$controller->eject();
	}
	else {
		$_POST['error'] = 'The controller does not exists';
		include 'views/error.php';
	}
?>