<?php
class M_berita extends CI_Model
{


    function m_data_berita($filter)
    {
        if ($filter == 'All') {
            $this->db->select('*');
            $this->db->from('berita');
            $this->db->order_by('id_berita', 'desc');
            $query = $this->db->get();
            return $query->result();
        } else {
            $this->db->select('*');
            $this->db->from('berita');
            $this->db->Where('status_berita', $filter);
            $this->db->order_by('id_berita', 'desc');
            $query = $this->db->get();
            return $query->result();
        }
    }
    function m_data_artikel_berita($id_berita)
    {
        $this->db->select('*');
        $this->db->from('data_berita');
        $this->db->where('berita_id', $id_berita);
        // $this->db->order_by('id_data_berita', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_foto_berita($id_berita)
    {
        $this->db->select('*');
        $this->db->from('foto_berita');
        // $this->db->where('data_berita_id', $id_berita);
        // $this->db->order_by('id_data_berita', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    function m_add_content($data)
    {
        $result = $this->db->insert('data_berita', $data);
        return $result;
    }
    function m_delete_content($id_data_berita)
    {
        $delete_foto = $this->db->where('data_berita_id', $id_data_berita)
            ->delete('foto_berita');
        $delete_data_berita = $this->db->where('id_data_berita', $id_data_berita)
            ->delete('data_berita');
        return $delete_foto;
        return $delete_data_berita;
    }
    function m_simpan_foto_berita($data_berita_id, $file_foto_berita)
    {
        $data = array(
            'data_berita_id' => $data_berita_id,
            'file_foto_berita' => $file_foto_berita,
        );
        $result = $this->db->insert('foto_berita', $data);
        return $result;
    }
    function m_delete_foto_berita($id_foto_berita)
    {
        $delete = $this->db->where('id_foto_berita', $id_foto_berita)
            ->delete('foto_berita');
        return $delete;
    }
    function m_simpan_data_berita($judul_berita, $tgl_berita, $meta_desk, $tag_berita, $foto_berita)
    {
        $data = array(
            'judul_berita' => $judul_berita,
            'tgl_berita' => $tgl_berita,
            'meta_desk' => $meta_desk,
            'tag_berita' => $tag_berita,
            'foto_berita' => $foto_berita,
        );
        $result = $this->db->insert('berita', $data);
        return $result;
    }

    function m_edit_content($id_data_berita, $text_berita, $file_foto_btn, $link_btn)
    {
        $update = $this->db->set('text_berita', $text_berita)
            ->set('file_foto_btn', $file_foto_btn)
            ->set('link_btn', $link_btn)
            ->where('id_data_berita', $id_data_berita)
            ->update('data_berita');
        return $update;
    }
    function m_edit_data_foto_berita($id_berita, $judul_berita, $tgl_berita, $meta_desk, $tag_berita, $foto_berita)
    {
        $update = $this->db->set('judul_berita', $judul_berita)
            ->set('tgl_berita', $tgl_berita)
            ->set('meta_desk', $meta_desk)
            ->set('tag_berita', $tag_berita)
            ->set('foto_berita', $foto_berita)
            // ->set('meta_foto', $meta_foto)
            ->where('id_berita', $id_berita)
            ->update('berita');
        return $update;
    }
    function m_edit_berita($id_berita, $judul_berita, $tgl_berita, $meta_desk, $tag_berita)
    {
        $update = $this->db->set('judul_berita', $judul_berita)
            ->set('tgl_berita', $tgl_berita)
            ->set('meta_desk', $meta_desk)
            ->set('tag_berita', $tag_berita)
            ->where('id_berita', $id_berita)
            ->update('berita');
        return $update;
    }
    function m_add_meta_foto($id_berita, $meta_foto)
    {
        $update = $this->db->set('meta_foto', $meta_foto)
            ->where('id_berita', $id_berita)
            ->update('berita');
        return $update;
    }
    function m_delete_berita($id_berita)
    {
        $delete = $this->db->where('id_berita', $id_berita)
            ->delete('berita');
        return $delete;
    }
    function m_validasi_index($id_berita, $status_berita)
    {
        $update = $this->db->set('status_berita', $status_berita)
            ->where('id_berita', $id_berita)
            ->update('berita');
        return $update;
    }

    function m_delete_artikel($id_berita, $data_berita_id)
    {
        $delete_data_artikel = $this->db->where('berita_id', $id_berita)
            ->delete('data_berita');
        $delete_artikel = $this->db->where('id_berita', $id_berita)
            ->delete('berita');
        if ($data_berita_id == '') {
        } else {

            $delete_foto_artikel = $this->db->where('data_berita_id', $data_berita_id)
                ->delete('foto_berita');
            return $delete_foto_artikel;
        }
        return $delete_data_artikel;
        return $delete_artikel;
    }
}
