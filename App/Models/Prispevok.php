<?php


namespace App\Models;

use App\Core\Model;
use JsonSerializable;
use stdClass;

class Prispevok extends Model implements JsonSerializable
{
    protected $id;
    protected $user_login;
    protected $nazov;
    protected $text;

    public function __construct($user_login = '', $nazov = '', $text = '')
    {
        $this->user_login = $user_login;
        $this->nazov = $nazov;
        $this->text = $text;
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
    public function getUserLogin()
    {
        return $this->user_login;
    }

    /**
     * @param mixed|string $user_login
     */
    public function setUserLogin($user_login): void
    {
        $this->user_login = $user_login;
    }

    static public function setDbColumns()
    {
        return ["id", "user_login", "nazov", "text"];
    }

    static public function setTableName()
    {
        return "prispevok";
    }

    public function jsonSerialize()
    {
        $o = new stdClass();
        $o->id = $this->id;
        $o->user = $this->user_login;
        $o->name = $this->nazov;
        $o->text = $this->text;
        return $o;
    }
}