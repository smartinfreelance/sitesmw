<?php
	function populateText($session,$from_controller){
		if($session != ""){ 
			$r = $session;
		}else{
			$r = $from_controller;
		} 

		return $r;
	}

	function populateSelect($session,$fromController,$actual){

		if($session == ""){
			if($fromController==$actual){
				return "selected = 'selected'";
			}
		}else{
			if($session==$actual){
				return "selected = 'selected'";
			}

		}
		return "";	
	}

	function populateRadio($session,$fromController,$actual){

		if($session == ""){
			if($fromController==$actual){
				return "checked";
			}
		}else{
			if($session==$actual){
				return "checked";
			}

		}
		return "";	
	}
?>