<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Access_model extends CI_Model
{
    public function users()
    {
        $queryUsers = "SELECT `users`.*, `user_role` . `role_id`
                                                FROM `users` JOIN `user_role`
                                                ON `users` . `role_id` = `user_role` . `id`
                                            ";
        return $this->db->query($queryUsers)->result_array();
    }
}
