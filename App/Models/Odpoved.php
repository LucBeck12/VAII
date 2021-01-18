<?php

namespace App\Models;

use App\Core\Model;
use JsonSerializable;
use stdClass;

class Odpoved extends Model implements JsonSerializable
{
    protected $id;
    protected $user_id;
    protected $prispevok_id;
    protected $text;

    public function __construct($user_id = '', $prispevok_id = '', $text = '')
    {
        $this->user_id = $user_id;
        $this->prispevok_id = $prispevok_id;
        $this->text = $text;
    }

    static public function setDbColumns()
    {
        return ["id", "user_id", "prispevok_id", "text"];
    }

    static public function setTableName()
    {
        return "odpoved";
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
     * @return mixed
     */
    public function getPrispevokId()
    {
        return $this->prispevok_id;
    }

    /**
     * @param mixed $prispevok_id
     */
    public function setPrispevokId($prispevok_id): void
    {
        $this->prispevok_id = $prispevok_id;
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
        $o->name = $this->prispevok_id;
        $o->text = $this->text;
        return $o;
    }
}