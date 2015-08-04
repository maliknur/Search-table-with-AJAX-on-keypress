<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Table extends CI_Model {
  public function all()
  {
    $result =  $this->db->query("SELECT * FROM leads")->result_array();
    return $result;
  }
  
  public function record_count() {
        return $this->db->count_all("leads");
    }

    public function fetch_rows($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("leads");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }


   public function search($limit, $start, $first_name)
   {  
        $this->db->limit($limit, $start);
        $this->db->like('first_name', $first_name);
          $this->db->or_like('last_name', $first_name);
        $query = $this->db->get("leads");

      if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }


   public function from($limit, $start, $from_date)
   {
        $this->db->limit($limit, $start);
        $this->db->where('registered_datetime >', $from_date);
        $query = $this->db->get("leads");

      if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

   public function to($limit, $start, $to_date)
   {
           
        $this->db->limit($limit, $start);
        $this->db->where('registered_datetime <', $to_date);
        $query = $this->db->get("leads");

      if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

   public function fromto($limit, $start, $from_date, $to_date)
   {
        $this->db->limit($limit, $start);
        $this->db->where('registered_datetime >', $from_date);
        $this->db->where('registered_datetime <', $to_date);
        $query = $this->db->get("leads");

      if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
}