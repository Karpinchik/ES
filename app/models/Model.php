<?php

namespace models\model;

class Model
{
    /**
     * @var $name string
     */
    public $name;

    /**
     * @var $email string
     */
    public $email;

    /**
     * @var $message string
     */
    public $message;

    /**
     * @var $name_image string
     */
    public $name_image;

    /**
     * @var $folder_image string
     */
    public $folder_image = "app/uploads/";

    /**
     * the models constructor
     *
     * @param $name string
     * @param $email string
     * @param $message string
     * @param $name_image string
     *
     * return $this
     */
    public function __construct($name, $email, $message, $name_image)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
        $this->name_image = $name_image;
        return $this;
    }


}


