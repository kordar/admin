<?php
namespace kordar\yak\models\admin;

trait PersonalTrait
{
    public function getAvatar($default)
    {
        return empty($this->avatar) ?  $default : $this->avatar;
    }

    public function getName()
    {
        return empty($this->name) ? $this->username : $this->name;
    }
}