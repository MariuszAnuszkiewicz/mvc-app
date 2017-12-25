<?php

class Page extends Model {
	
   public function getList($only_published = false) {

      $sql = "SELECT * FROM pages";
		 
	if ($only_published) {	
            $sql .= ' AND is_published = 1';
	}
	$this->db->query($sql);
        return $this->db->results();
	   
   }
	
   public function getByAlias($alias) {
		
	$alias = $this->db->escape($alias);
	$sql = "SELECT * FROM pages WHERE alias = ? limit 1";
	$this->db->query($sql, array($alias));
	$row = $this->db->results();

        for ($i = 0; $i < count($row); $i++) {
            return $row[$i];
        }
  }
	
  public function getById($id) {
		
        $id = (int)$id;
	$sql = "SELECT * FROM pages WHERE id = ? limit 1";
	$this->db->query($sql, array($id));
        $row = $this->db->results();

        for ($i = 0; $i < count($row); $i++) {
            return $row[$i];
        }
  }
	
  public function save($data, $id = null) {
		
	if (!isset($data['alias']) || !isset($data['title']) || !isset($data['content'])) {
            return false;		
	}

	$id = (int)$id;
        $alias =  $this->db->escape($data['alias']);
	$title =  $this->db->escape($data['title']);
	$content =  $this->db->escape($data['content']);
        $is_published = isset($data['is_published']) ? 1 : 0;
		
	if (!$id) {
		
           $sql = "INSERT INTO pages
			   SET alias = ?,
			       title = ?,
			       content = ?,
			       is_published = ?
		   ";

            return $this->db->query($sql, array($alias, $title, $content, $is_published));

	} else {

           $sql = "UPDATE pages
	              SET alias = ?,
			  title = ?,
		          content = ?,
		          is_published = ?
	            WHERE id = ?
			
		 ";

            return $this->db->query($sql, array($alias, $title, $content, $is_published, $id));
	}
  }

  public function delete($id) {

	$id = (int)$id;
	$sql = "DELETE FROM pages WHERE id = ?";
	$this->db->query($sql, array($id));
        return $this->db->results();
	  
  }
	
}



