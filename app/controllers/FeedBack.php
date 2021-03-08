<?php

namespace controller\feedback;

require_once "vendor/autoload.php";

use Intervention\Image\ImageManagerStatic;
use models\model\Model;


class Feedback
{
    /**
     * @var $width_img integer
     */
    public $width_img = 320;

    /**
     * @var $height_img integer
     */
    public $height_img = 240;

    /**
     * @var $mime_img array
     */
    public $mime_img = ['image/gif', 'image/png', 'image/jpg', 'image/jpeg'];


    /**
     * validating form
     *
     * @param $model object
     * @return mixed
     */
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

        if(strlen($model->message) >191) {
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
     * @param $upload_dir string
     * @return mixed
     */
    public function upload_image($upload_dir)
    {
        if(isset($_FILES['image']) && !empty($_FILES['image'])) {

            $file_tmp_name = $_FILES['image']['tmp_name'];
            $img_data = getimagesize($file_tmp_name);

            if(in_array($img_data['mime'], $this->mime_img)) {
                $name_img = $_FILES['image']['name'];
                move_uploaded_file($file_tmp_name, "$upload_dir". $name_img);
                return $name_img;
            }
        }
    }


    /**
     * @param $upload_dir string
     * @param $name_img string
     */
    public function resize_image($upload_dir, $name_img)
    {
        $img = ImageManagerStatic::make("$upload_dir" . $name_img);

        $img_data = getimagesize("$upload_dir" . $name_img);
        if ($img_data[0] >= $this->width_img OR $img_data[1] >= $this->height_img) {
            $img->resize(320, 240);
            $img->save("$upload_dir" . $name_img);
        }
    }


    /**
     * add review to DB
     *
     * @param $model object
     * @param $pdo object
     * @return string
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
            return 'отзыв не сохранен'.$e->getMessage();
        }
    }


}


