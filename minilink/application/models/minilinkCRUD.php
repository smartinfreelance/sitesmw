<?php
class MinilinkCRUD extends CI_Model {

    function MinilinkCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function addMiniLink($link, $str)
	{
        $query = $this->db->query("insert into minilinks(link, str) values ('".$link."','".$str."')");
		return 0;
    }

    function getMinilink($str){
        $query = $this->db->query("select 
                                        minilinks.id as id, 
                                        minilinks.str as str,
                                        minilinks.link as link
                                    from 
                                        minilinks 
                                    where 
                                        minilinks.str = '".$str."'");
        return $query->result();

    }

	
}
?>