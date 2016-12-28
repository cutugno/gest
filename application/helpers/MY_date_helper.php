<?php defined('BASEPATH') OR exit('No direct script access allowed');

	if ( ! function_exists('convertDate')) {
		
		function convertDate ($date) {
			
			$date=explode("-",$date);
			$date=$date[2]."/".$date[1]."/".$date[0];
			
			return $date;
			
		}
		
	}
	
	if ( ! function_exists('revertDate')) {
		
		function revertDate ($date) {
			
			$date=explode("/",$date);
			$date=$date[2]."-".$date[1]."-".$date[0];
			
			return $date;
			
		}
		
	}
	
	if ( ! function_exists('convertDateTime')) {
	
		function convertDateTime ($date,$cleanseconds=1) {
			
			$expldate=explode(" ",$date);
			$date=$expldate[0];
			if ($cleanseconds==1){
				$expldate[1]=substr($expldate[1],0,-3);
			}
			$date=explode("-",$date);
			$date=$date[2]."/".$date[1]."/".$date[0];		
			
			return $date." ".$expldate[1];
			
		}
		
	}
	
	if ( ! function_exists('dateDifference')) {
	
		function dateDifference($date_1,$date_2,$differenceFormat='%a' ) {
			
			$datetime1 = new DateTime($date_1);
			$datetime2 = new DateTime($date_2);
			
			$interval = $datetime1->diff($datetime2);
			
			return $interval->format($differenceFormat);
			
		}
		
	}
	
	if ( ! function_exists('getWeekDay')) {
		
		function getWeekDay($date) {
			
			$ts=strtotime($date);
			$day=date("N",$ts);
			
			switch ($day) {
				case 1:
					$day="Lunedì";
					break;
				case 2:
					$day="Martedì";
					break;
				case 3:
					$day="Mercoledì";
					break;
				case 4:
					$day="Giovedì";
					break;
				case 5:
					$day="Venerdì";
					break;
				case 6:
					$day="Sabato";
					break;
				case 7:
					$day="Domenica";
					break;
			}
			
			return $day;
		}
		
	}
	
?>