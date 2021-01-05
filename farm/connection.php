<?php
   $db = mysqli_init();
    $db->ssl_set("./login/my-client-key.pem", "./login/my-client-cert.pem", "./login/my-ca.pem", null, null);
    $db->real_connect('us-cdbr-iron-east-05.cleardb.net', 'b6f458e249484e', 'ef4eed96' , 'heroku_17aa5136e979af4af4');


?>
