<?php

namespace App\Models;

use App\Core\Model;
use JsonSerializable;
use stdClass;

class Prispevok extends Model implements JsonSerializable
{
    protected $id;
    protected $user_id;
    protected $nazov;
    protected $text;

    public function __construct($user_id = '', $nazov = '', $text = '')
    {
        $this->user_id = $user_id;
        $this->nazov = $nazov;
        $this->text = $text;
    }

    static public function setDbColumns()
    {
        return ["id", "user_id", "nazov", "text"];
    }

    static public function setTableName()
    {
        return "prispevok";
    }

    /**
     * @return mixed|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed|string
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed|string
     */
    public function getNazov()
    {
        return $this->nazov;
    }

    /**
     * @param mixed|string $popis
     */
    public function setNazov($nazov): void
    {
        $this->nazov = $nazov;
    }

    /**
     * @return mixed|string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed|string $image
     */
    public function setText($text): void
    {
        $this->text = $text;
    }

    public function jsonSerialize()
    {
        $o = new stdClass();
        $o->id = $this->id;
        $o->user = User::getOne($this->user_id)->getLogin();
        $o->name = $this->nazov;
        $o->text = $this->text;
        return $o;
    }
}