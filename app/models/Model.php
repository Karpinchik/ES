<?php

namespace models\model;

class Model
{
    public $name;
    public $email;
    public $message;
    public $name_image;
    public $folder_image = "app/uploads/";

    public function __construct($name, $email, $message, $name_image)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
        $this->name_image = $name_image;
//        $this->folder_image = $folder_image;
    }

    public function get_reviews($id, $pdo)
    {

        $sql = "SELECT * FROM feed_back_tbl WHERE id=:id";
        $stmt = $pdo->prepare($sql);

        $params = [':id' => $id];

        if ($result = $stmt->execute($params)) {
            echo "ошибка получения записи";
        } else {
            return $result;
        }


        $sql = "SELECT * FROM feed_back_tbl WHERE id=";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    }

//    /**
//     * get display reviews
//     *
//     */
//    static function get_display_reviews($pdo)
//    {
//        $sql = "SELECT * FROM feed_back_tbl WHERE display=1";
//        $stmt = $pdo->query($sql);
//        return $stmt->fetchAll();
//    }
//
//    static function get_all_reviews($pdo)
//    {
//        $sql = "SELECT * FROM feed_back_tbl";
//        $stmt = $pdo->query($sql);
//        return $stmt->fetchAll();
//    }

}


