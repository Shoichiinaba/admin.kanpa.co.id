<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner_model extends CI_Model
{

    public function get_properti_select()
    {
        $this->db->select('*');
        $this->db->from('properti');
        $this->db->join('detail_properti', 'detail_properti.id_properti = properti.id_properti', 'left');
        $this->db->group_by('properti.id_properti');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert_banner($data) {
        $this->db->insert('banner', $data);
    }

    public function get_banner($limit, $start, $search = '') {
        if ($start < 0) $start = 0;

        $this->db->select('banner.*, properti.*, detail_properti.*');
        $this->db->from('banner');
        $this->db->join('properti', 'properti.id_properti = banner.id_properti', 'left');
        $this->db->join('detail_properti', 'detail_properti.id_properti = properti.id_properti', 'left');

        if (!empty($search)) {
            $this->db->like('properti.judul_properti', $search);
            $this->db->group_by('properti.id_properti');
        }

        $this->db->order_by("banner.id_banner", "ASC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        return $query;
    }


    public function count_banner($search = '')
    {
        $this->db->select('*');
        $this->db->from('banner');
        $this->db->join('properti', 'properti.id_properti = banner.id_properti', 'left');
        if (!empty($search)) {
            $this->db->like('properto.judul_properti', $search);
        }
        return $this->db->count_all_results();
    }

    public function get_banner_by_id($id_banner) {
        $this->db->where('id_banner', $id_banner);
        $query = $this->db->get('banner');
        return $query->row();
    }

    public function update_banner($id_banner, $data) {
        $this->db->where('id_banner', $id_banner);
        $this->db->update('banner', $data);
    }

    public function delete_banner($id_banner)
    {
        $this->db->where('id_banner', $id_banner);
        return $this->db->delete('banner');
    }
}