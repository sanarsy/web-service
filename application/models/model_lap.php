<?php

class Model_lap extends CI_Model{
   
   function get_all()
   {
	   return $this->db->get('ticket');
   }
		
}