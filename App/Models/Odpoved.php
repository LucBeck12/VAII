<?php


namespace App\Models;

use App\Core\Model;
use JsonSerializable;
use stdClass;

class Odpoved extends Model implements JsonSerializable
{
    protected $id;
    protected $user;
    protected $prispevok;
    protected $text;

    public function __construct($user = '', $prispevok = '', $text = '')
    {
        $this->user = $user;
        $this->prispevok = $prispevok;
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getPrispevok()
    {
        return $this->prispevok;
    }

    /**
     * @param mixed $prispevok
     */
    public function setPrispevok($prispevok): void
    {
        $this->inzerat = $prispevok;
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

    /**
     * @return mixed|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed|string $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed|string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed|string $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    static public function setDbColumns()
    {
        return ["id", "user", "prispevok", "text"];
    }

    static public function setTableName()
    {
        return "odpoved";
    }

    public function jsonSerialize()
    {
        $o = new stdClass();
        $o->id = $this->id;
        $o->user = $this->user;
        $o->name = $this->prispevok;
        $o->text = $this->text;
        return $o;
    }
}