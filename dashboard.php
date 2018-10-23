<?php
    include('templates/header.php');
    $api_hostname = 'mybilling.itsolucionesmx.com';
    # for self-signed certificates
    $verify_hostname = false;
    $api_url = "https://$api_hostname/rest";
    $post_data = array(
    'auth_info' => json_encode(array('session_id' => $_SESSION['session_id'])),
    'params' => json_encode(array('i_account' => 336544587)),
    );
    $curl = curl_init();
    curl_setopt_array($curl,
    array(
    //CURLOPT_VERBOSE => true,
    CURLOPT_URL => $api_url . '/Account/get_account_info',
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
    foreach ($data->account_info as $key) {
        echo("<script>console.log('key: ".$key."');</script>");
    }
?>
    <div class="row">
        <div class="col-lg-1"></div>
    </div>
    <nav aria-label="Page navigation" style="margin-left: 40%;">
        <ul class="pagination">
            <li>
            <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
            <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
            </li>
        </ul>
    </nav>
<?php
    include('templates/footer.php');
?>