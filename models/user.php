<?php

class User extends Model {

   public function getByLogin($login) {
		
	$login = $this->db->escape($login);
	$sql = "SELECT * FROM users WHERE login = ? limit 1";
	$this->db->query($sql, array($login));
        $result = $this->db->results();

	if (isset($result[0])) {

            return $result[0];

	}
	    return false;
   }

   public function getByPassword($password) {

        $password = $this->db->escape(md5(Config::get('salt').$password));
        $sql = "SELECT * FROM users WHERE password = ? limit 1";
        $this->db->query($sql, array($password));
        $result = $this->db->results();

        if (isset($result[0])) {

            return $result[0];

        }
        return false;
   }

}

