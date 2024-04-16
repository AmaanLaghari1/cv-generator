<?php
class Action {
    public $db;
    public $helper;

    function __construct()
    {
        $this->db = new Database();
        $this->helper = new Helper();
    }
}