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
    if($_GET['sort_date']) {
        $sort = $_GET['sort_date'];
        $results = Moderator::get_display_reviews($pdo, $sort);
    } else {
        $results = Moderator::get_display_reviews($pdo, 'created_at');
    }

}

include 'app/views/header.php';
include 'app/views/reviews.php';

$err = array();
$res = '';
$upload_dir = 'app/uploads/';

if($_POST['btn_submit']) {

    $model = new Model($_POST['name'], $_POST['email'], $_POST['message'], $_FILES['image']['name']);
    $add_db_data = new Feedback();
    $err = $add_db_data->data_validate($model);

    if(empty($err)) {

        $name_img = $add_db_data->upload_image($upload_dir);

        if($name_img) {
            $add_db_data->resize_image($upload_dir, $name_img);
            $res = $add_db_data->add_data($model, $pdo);
                echo "<script>window.location.replace('index.php');</script>";
        }

    } else {
        $err[] = 'ваш отзыв не записан в базу. Данные не прошли валидацию';
    }
}

include 'app/views/form.php';
include 'app/views/footer.php';



