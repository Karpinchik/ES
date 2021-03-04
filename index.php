<?php

use \models\model\Model;
use \controller\feedback\Feedback;

require_once "vendor/autoload.php";
require_once 'app/models/Model.php';
require_once 'app/controllers/FeedBack.php';

require_once 'app/config_db.php';
$pdo = new PDO('mysql:host='. HOST .';dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $results = Model::get_display_reviews($pdo);

}
include 'app/views/header.php';
include 'app/views/reviews.php';

$err = array();
$res = '';
$upload_dir = 'app/uploads/';
//$name_img = '';

if($_POST['btn_submit']) {

    $model = new Model($_POST['name'], $_POST['email'], $_POST['message'], $_FILES['image']['name']);

    // собьект загрузки данных
    $add_db_data = new Feedback();

    //валидация формы
    $err = $add_db_data->data_validate($model);

    if(empty($err)) {

        // загрузил картинку
        $name_img = $add_db_data->upload_image($upload_dir);

        // изменил размер картинки
        $add_db_data->resize_image($upload_dir, $name_img);

        $res = $add_db_data->add_data($model, $pdo);
    } else {
        $err[] = 'ваш отзыв не записан в базу. Данные не прошли валидацию';
    }
}

include 'app/views/form.php';
include 'app/views/footer.php';



