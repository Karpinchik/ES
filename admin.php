<?php
//use \models\model\Model;
use controller\moderator\Moderator;

$login_successful = false;
if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
    $usr = $_SERVER['PHP_AUTH_USER'];
    $pwd = $_SERVER['PHP_AUTH_PW'];
    if ($usr == 'admin' && $pwd == '123'){
        $login_successful = true;
    }
}

if (!$login_successful){
    header('WWW-Authenticate: Basic realm="Secret page"');
    header('HTTP/1.0 401 Unauthorized');
    print "Login failed!";
    die();
}

require_once 'app/config_db.php';
require_once 'app/models/Model.php';
require_once 'app/controllers/Moderator.php';

//получаю все записи
$results = Moderator::get_all_reviews($pdo);

include './app/views/header.php';
include './app/views/moderating.php';
include './app/views/footer.php';



if($_POST['btn-moderation'] == true ) {

    $message = $_POST['message'];
    $id = intval($_POST['id']);
    $chb_value = $_POST['display'] == 'on' ? 1 : 0;

    $params = [
        trim($message),
        intval($chb_value),
        date("Y-m-d H:m:s")
    ];


    Moderator::change_review($id, $params, $pdo);


}