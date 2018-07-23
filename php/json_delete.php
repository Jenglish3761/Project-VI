<?php
  function deleteJson(int $index) {
    //  Get json data.
  	$data = file_get_contents('../json/login.json');
  	//	Decode into json array.
  	$json_arr = json_decode($data, true);
  	unset(json_arr[$c]);
  }
?>
