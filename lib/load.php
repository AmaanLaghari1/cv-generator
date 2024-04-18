<?php

require_once('classes/Helper.php');
require_once('classes/Database.php');
require_once('classes/Session.php');
require_once('classes/Views.php');
require_once('classes/Custom.php');
require_once('classes/Action.php');

$action = new Action();

// echo $action->db->insert('users', 'name, email, age', ['123', '123@a.com', 23]);
// $data = $action->db->select('users', 'id, name', 'order by id desc');

// echo $action->db->delete('users', 'id < 6');
// echo $action->db->update('users', ['name' => 'Amaan', 'email'=> 'laghariamaan@gmail.com'], 'id = 6');