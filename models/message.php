<?php

class Message extends Model {
	
   public function save($data, $id = null) {

	if (!isset($data['name']) || !isset($data['email']) || !isset($data['message'])) {	
	    return false;	
	}

	$id = (int)$id;
        $name =  App::$db->escape($data['name']);
        $email =  App::$db->escape($data['email']);
        $message =  App::$db->escape($data['message']);

	if (!$id) {

            $sql = "INSERT INTO messages
			    SET name = ?,
			        email = ?,
			        message = ?
	           ";

                return $this->db->query($sql, array($name, $email, $message));

        } else {

             $sql = "UPDATE messages
		        SET name = ?,
			    email = ?,
		            message = ?
		      WHERE id = ?	
		   ";

               }
               return $this->db->query($sql, array($name, $email, $message, $id));
	}
	
   public function getList() {

	$sql = "SELECT * FROM messages ORDER BY 'DESC'";
	$this->db->query($sql);
        return $row = $this->db->results();
		
   }
}
