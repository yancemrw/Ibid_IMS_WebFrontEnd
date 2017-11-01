<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable_model extends CI_Model { 

    // _get_datatables_query
    public function datatable($table , $column_order = array() , $column_search = array() , $orderin = array())
    { 
        // setting lutfi database schema lain 
        // menggunakan tambahan settingan di database.php  
        $master = $this->db->from($table);   

        $i = 0;
        foreach ($column_search as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
                }
                $i++;
            }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']); 
        }
        else  
        {
            $order = $orderin;
            $this->db->order_by(key($order), $order[key($order)]);
            // $this->db->order_by($orderin);
        }
    }

    function get_datatables($table , $column_order = array() , $column_search = array() , $orderin = array()){
        $this->datatable($table , $column_order , $column_search  , $orderin );
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered($table , $column_order = array() , $column_search = array() , $orderin = array()){
        // $this->datatable();
        $this->datatable($table , $column_order , $column_search  , $orderin );
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all($table){
        $this->db->from($table);
        return $this->db->count_all_results();
    }	

}

/* End of file Lists_model.php */
/* Location: ./application/models/auth/Lists_model.php */
