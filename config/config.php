<?php

	function home(){
		return "http://localhost:8080/simec-mvc/";
	}
	function base_url($what){
		if ($what == 'site_link') {
			return home();
		}elseif ($what == 'title') {
			return 'SIMEC';
		}else{
			return 'NOTHING';
		}
	}

	function url($link){
		if ($link == './' || $link == '/' || $link == '') {
			return home();
		}else{
			return home().$link;
		}
	}


?>