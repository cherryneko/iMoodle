<?php
	/*
	 * Student Model
	 */
	
	class studentMdl
	{
		public $connection;
		
		function __construct()
		{
			//Create the database connection
		}
		/**
		  * Method to insert a student in the database
		  */
		function insert($data)
		{
			//calls to the database connection
			//if has been inserted
			return true;
			//else
			return false;
		}
		/**
		  * Method to delete a student in the database
		  */
		function delete($data)
		{
			//calls to the database connection
			//if has been deleted
			return true;
			//else
			return false;
		}
		/**
		  * Method to select a student in the database
		  */
		function select($data)
		{
			//calls to the database connection
			//if has been selected
			return true;
			//else
			return false;
		}
		/**
		  * Method to update a student in the database
		  */
		function update($data)
		{
			//calls to the database connection
			//if has been updated
			return true;
			//else
			return false;
		}
	
	}
?>