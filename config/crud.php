<?php 
	Class CRUD {
		function insert_data($data,$table) {
			require('koneksi.php');

			$field = "";
			$valdt = "";

			foreach($data as $row => $value) {
				$field .= $row.',';
				$valdt .= '"'.$value.'",';
			}

			// Hilangkan koma yang terakhir
			$field = rtrim($field,',');
			$valdt = rtrim($valdt,',');

			$query = "INSERT INTO ".$table."(".$field.") VALUES(".$valdt.")";
			return mysqli_query($con,$query);
		}

		function update_data($data,$table,$where) {
			require('koneksi.php');

			$statemnt = "";
			$wheree = "";

			foreach($data as $row => $value) {
				$statemnt .= $row.'="'.$value.'", ';
			}

			// Hilangkan koma yang terakhir
			$statemnt = rtrim($statemnt, ', ');

			foreach($where as $row => $value) {
				$wheree .= $row."=".$value;
			}

			$query = "UPDATE ".$table." SET ".$statemnt." WHERE ".$wheree;
			mysqli_query($con,$query);
		}

		function delete_data($table,$where) {
			require('koneksi.php');

			$wheree = "";

			foreach($where as $row => $value) {
				$wheree .= $row.'="'.$value.'"';
			}

			$query = "DELETE FROM ".$table." WHERE ".$wheree;
			mysqli_query($con,$query);
		}
	}
?>