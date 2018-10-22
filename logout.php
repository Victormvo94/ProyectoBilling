<?php 
    session_start();
    if( !isset($_SESSION['session_id'])){
        header('location: login.php');
    }
    $api_hostname = 'mybilling.itsolucionesmx.com';
    # for self-signed certificates
    $verify_hostname = false;
    $api_url = "https://$api_hostname/rest";
    $post_data = array(
    // 'auth_info' => json_encode(array('session_id' => $_SESSION['session_id'])),
    'params' => json_encode(array('session_id' => $_SESSION['session_id'])),
    );
    $curl = curl_init();
    curl_setopt_array($curl,
    array(
    //CURLOPT_VERBOSE => true,
    CURLOPT_URL => $api_url . '/Session/logout',
    CURLOPT_SSL_VERIFYPEER => $verify_hostname,
    CURLOPT_SSL_VERIFYHOST => $verify_hostname,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query($post_data),
    )
    );
    $reply = curl_exec($curl);
    if(! $reply) {
    echo curl_error($curl);
    curl_close($curl);
    exit;
    } 
    $data = json_decode($reply);
    if( $data->success == 1 ){
        session_destroy();
        header('location: login.php');
    }
?>