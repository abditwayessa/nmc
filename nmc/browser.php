<?php 
echo $_SERVER['HTTP_USER_AGENT'];
$browser=get_browser();
print_r($browser);
// echo get_browser();
// $arr_browsers = array('Opera', 'Edg', 'Chrome', 'Safari', 'Firefox', 'MSIE', 'Trident');
// $agent=$_SERVER['HTTP_USER_AGENT'];
// $user_browser="";
// foreach ($arr_browsers as $browser) {
// 	if (strpos($agent, $browser)!== false) {
// 		$user_browser=$browser;
// 		break;
// 	}
// 	switch ($user_browser) {
// 		case 'MSIE':
// 			$user_browser="Internet Explorer";
// 			break;
// 		case 'Trident':
// 			$user_browser="Internet Explorer";
// 			break;
// 		case 'Edg':
// 			$user_browser="Microsoft Edge";
// 			break;
// 		echo 'You are using '.$user_browser.' browser';
// 	}
// }
 ?>