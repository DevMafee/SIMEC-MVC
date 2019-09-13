<?php

function base_url($what){
	if ($what == 'site_link') {
		return "http://localhost:8080/simec-mvc/";
	}elseif ($what == 'title') {
		return 'SIMEC';
	}else{
		return 'NOTHING';
	}
}

function url($link){
	if ($link == './' || $link == '/' || $link == '') {
		return "http://localhost:8080/simec-mvc/";
	}else{
		return "http://localhost:8080/simec-mvc/".$link."/";
	}
}


?>