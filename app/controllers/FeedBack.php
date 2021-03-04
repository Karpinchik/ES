<?php

namespace controller\feedback;

require_once "vendor/autoload.php";

use Intervention\Image\ImageManagerStatic;
use models\model\Model;


class Feedback
{


    /*
     * validating form
     *
     * */
    public function data_validate($model)
    {
        if(empty($model->name) OR empty($model->email) OR empty($model->message)) {
            $err[] = 'Введите данные';
            return $err;
        }

        if(strlen($model->name) >40) {
            $err[] = 'слишком длинное имя';
        }

        $email = filter_var($model->email, FILTER_VALIDATE_EMAIL);
        if(empty($email)) {
            $err[] = 'некорректный адрес';
        }

        if(strlen($model->message) >40) {
            $err[] = 'слишком длинное сообщение';
        }

        if(empty($model->name_image)){
            $err[] = 'не загружен файл';
        }

        if(!empty($err)) return $err;
    }

    /**
     * upload image in server
     *
     * */
    public function upload_image($upload_dir)
    {
        if(isset($_FILES['image']) && !empty($_FILES['image'])) {
            $file_tmp_name = $_FILES['image']['tmp_name'];
            $name_img = $_FILES['image']['name'];
            move_uploaded_file($file_tmp_name, "$upload_dir". $name_img);
            return $name_img;
         }
    }


    public function resize_image($upload_dir, $name_img)
    {
        // добавить иф на размер

        $img = ImageManagerStatic::make("$upload_dir". $name_img);
        $img->resize(320, 240);
        $img->save("$upload_dir". $name_img);
    }

    /**
     * add review to DB
     *
     *
     */
    public function add_data($model, $pdo)
    {
        try {
            $sql = "INSERT INTO feed_back_tbl (name, email, message, created_at, name_image, file_tmp_name) 
VALUES (:name, :email, :message, :created_at, :name_image, :file_tmp_name)";
            $stmt = $pdo->prepare($sql);
            $params = [
                ':name' => $model->name,
                ':email' => $model->email,
                ':message' => $model->message,
                ':created_at' => date("Y-m-d H:i:s"),
                ':name_image' => $model->name_image,
                ':file_tmp_name' => $model->folder_image
            ];
            $stmt->execute($params);

            return 'отзыв сохранен';
        } catch (PDOException $e) {
            return 'отзыв не сохранен';
        }

    }


    //                ':update_at' => date("Y-m-d H:i:s"),


}


