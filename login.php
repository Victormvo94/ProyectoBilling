<?php 
    if(isset($_POST) && isset($_POST['username']) && isset($_POST['password'])){
        $api_hostname = 'mybilling.itsolucionesmx.com';
        $api_login = $_POST['username'];
        $api_password = $_POST['password'];
        # for self-signed certificates
        $verify_hostname = false;
        $api_url = "https://$api_hostname/rest";
        $post_data = array(
        'params' => json_encode(array('login' => $api_login, 'password' => $api_password)),
        );
        $curl = curl_init();
        curl_setopt_array($curl,
        array(
        //CURLOPT_VERBOSE => true,
        CURLOPT_URL => $api_url . '/Session/login',
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
        if( isset($data->{'session_id'})){
            session_start();
            $_SESSION['session_id'] = $data->{'session_id'};
            $_SESSION['user'] = $api_login;
            header('location: dashboard.php');
        }else{
            echo("<script>alert('Error: Usuario/Contraseña incorrecto');</script>");
        }
    }else{
        session_start();
        if( isset($_SESSION['session_id']) ){
            header('location: dashboard.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="img/netboxico.png" />
        <title>Netbox Solutions</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/header.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><img src="img/dashboardnbx.png" /></a>
                </div>
            </div>
        </nav>
        <br><br>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-1"></div>
            <div class="col-lg-4 col-md-4 col-xs-10">
                <img src="img/nbx.png" width="70%" style="margin-left:15%;" />
            </div>
            <div class="col-lg-4 col-md-4 col-xs-1"></div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-1"></div>
            <div class="col-lg-4 col-md-4 col-xs-10">
                <form class="form" action="login.php" method="post" id="login">
                    <div class="form-group">
                        <label for="username" class="text-white">Username:</label><br>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-white">Password:</label><br>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group" style="margin-left:36%;">
                        <input type="submit" name="submit" class="btn btn-primary" value="Iniciar Sesión" style=" background-color: #303c81;">
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-1"></div>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>