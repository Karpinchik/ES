<?php

use \models\model\Model;
use \controller\feedback\Feedback;
use \controller\moderator\Moderator;

require_once "vendor/autoload.php";
require_once 'app/models/Model.php';
require_once 'app/controllers/FeedBack.php';
require_once 'app/controllers/Moderator.php';

require_once 'app/config_db.php';

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $results = Moderator::get_display_reviews($pdo);
}

include 'app/views/header.php';
include 'app/views/reviews.php';

$err = array();
$res = '';
$upload_dir = 'app/uploads/';

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
    echo "<script>window.location.replace('index.php');</script>";
}

include 'app/views/form.php';
include 'app/views/footer.php';



