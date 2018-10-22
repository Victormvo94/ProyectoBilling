<?php
//--------------------------------------------------
// $api_hostname = 'mybilling.itsolucionesmx.com';
// $api_login = 'alberto';
// $api_password = 'Jesus1993';
//--------------------------------------------------
$api_hostname = 'mybilling.itsolucionesmx.com';
$api_login = 'alberto';
$api_password = 'Jesus1993';
# for self-signed certificates
$verify_hostname = false;
$api_url = "https://$api_hostname/rest";
// $post_data = array(
//  'params' => json_encode(array('login' => $api_login,
// 'password' => $api_password)),
//  );
// $curl = curl_init();
// curl_setopt_array($curl,
//  array(
//  //CURLOPT_VERBOSE => true,
//  CURLOPT_URL => $api_url . '/Session/login',
//  CURLOPT_SSL_VERIFYPEER => $verify_hostname,
//  CURLOPT_SSL_VERIFYHOST => $verify_hostname,
//  CURLOPT_RETURNTRANSFER => true,
//  CURLOPT_POST => true,
//  CURLOPT_POSTFIELDS => http_build_query($post_data),
//  )
//  );
// $reply = curl_exec($curl);
// if(! $reply) {
//  echo curl_error($curl);
//  curl_close($curl);
//  exit;
// }
// $data = json_decode($reply);
// $session_id = $data->{'session_id'};
// echo "Sesión iniciada ", $session_id, "\n";
// // fetch available currency
// $post_data = array(
//  'auth_info' => json_encode(array('session_id' => $session_id)),
//  'params' => json_encode( new stdClass() ),
//  );


// // curl_setopt_array($curl,
// //  array(
// //  CURLOPT_URL => $api_url .
// // '/User/get_user_list',
// //  CURLOPT_POST => true,
// //  CURLOPT_POSTFIELDS => http_build_query($post_data),
// //  )
// //  );
// // $reply = curl_exec($curl);
// // if(! $reply) {
// //  echo curl_error($curl);
// //  curl_close($curl);
// //  exit;
// // }
// // $data = json_decode($reply);
// // foreach ($data->user_list as $key) {
// //     printf($key->i_user." - ".$key->login." - ".$key->email. "\n");
// // }
// $post_data = array(
//     'auth_info' => json_encode(array('session_id' => $session_id)),
//     'params' => json_encode(array('i_user' => 5130)),
//     );
// curl_setopt_array($curl,
//  array(
//  CURLOPT_URL => $api_url .
// '/User/get_user_info/',
//  CURLOPT_POST => true,
//  CURLOPT_POSTFIELDS => http_build_query($post_data),
//  )
//  );
// $reply = curl_exec($curl);
// if(! $reply) {
//  echo curl_error($curl);
//  curl_close($curl);
//  exit;
// }
// $data = json_decode($reply);
// foreach ($data->user_info as $key) {
//     echo $key."\n";
// }

// $post_data = array(
//     'auth_info' => json_encode(array('session_id' => $session_id)),
//     'params' => json_encode(array('i_user' => 5130)),
//     );
// curl_setopt_array($curl,
//  array(
//  CURLOPT_URL => $api_url .
// '/User/delete_user/',
//  CURLOPT_POST => true,
//  CURLOPT_POSTFIELDS => http_build_query($post_data),
//  )
//  );
// $reply = curl_exec($curl);
// if(! $reply) {
//  echo curl_error($curl);
//  curl_close($curl);
//  exit;
// }
// $data = json_decode($reply);
// foreach ($data as $key) {
//     echo $key."\n";
// }

// curl_close($curl);
// exit;
?> 
