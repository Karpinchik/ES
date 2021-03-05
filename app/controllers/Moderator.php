<?php

namespace controller\moderator;

require_once "app/config_db.php";

class Moderator
{
    /**
     * get display reviews
     *
     */
    static function get_display_reviews($pdo)
    {
        $sql = "SELECT * FROM feed_back_tbl WHERE display=1";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    }

    /**
     * get all reviews
     *
     */
    static function get_all_reviews($pdo)
    {
        $sql = "SELECT * FROM feed_back_tbl";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    }

// редактирование записи администратором
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
