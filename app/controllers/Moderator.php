<?php

namespace controller\moderator;

require_once "app/config_db.php";

class Moderator
{

    /**
     * get display reviews
     *
     * @param $pdo object
     * @param $sort string
     * @return resource
     */
    static function get_display_reviews($pdo, $sort)
    {
        $arr = ['name', 'email', 'created_at'];

        if(in_array($sort, $arr)) {
            $sql = "SELECT * FROM feed_back_tbl WHERE display=1 ORDER BY ".$sort." DESC";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll();
        }

    }


    /**
     * get all reviews
     *
     * @param $pdo object
     * @return mixed
     */
    static function get_all_reviews($pdo)
    {
        $sql = "SELECT * FROM feed_back_tbl";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    }


    /**
     * changing reviews
     *
     * @param $id integer
     * @param $params array
     * @param $pdo object
     */
    static function change_review($id, $params, $pdo)
    {
        $sql = "UPDATE `feed_back_tbl` SET message=?, display=?, updated_at=? WHERE id=$id";
        $stmt = $pdo->prepare($sql);

        if($stmt->execute($params)) {
            echo "<script>window.location.replace('admin.php');</script>";
        } else {
            echo "<script>alert('не удалось изменить данные');</script>";
        }
    }


}
