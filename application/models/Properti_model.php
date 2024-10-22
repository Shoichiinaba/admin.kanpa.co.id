<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Properti_model extends CI_Model
{
    function get_type()
    {
        $this->db->select('*');
        $this->db->from('type_properti');
        $query = $this->db->get();
        return $query->result();
    }

    function get_kota_select()
    {
        $this->db->select('*');
        $this->db->from('wilayah_kota');
        $query = $this->db->get();
        return $query->result();
    }

    function get_status_select()
    {
        $this->db->select('*');
        $this->db->from('status_properti');
        $query = $this->db->get();
        return $query->result();
    }

    function get_agent_select()
    {
        $this->db->select('*');
        $this->db->from('agency');
        $this->db->where('position !=', 'Admin');
        $query = $this->db->get();
        return $query->result();
    }


    public function getKotaByProvinsiId($provinsi_id)
    {
        $this->db->select('id_kota, nama_kota');
        $this->db->from('wilayah_kota');
        $this->db->where('provinsi_id', $provinsi_id);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_properti($limit, $start, $search = '')
    {
        if ($start < 0) $start = 0;

        $this->db->select('*');
        $this->db->from('properti');
        $this->db->join('detail_properti', 'detail_properti.id_properti = properti.id_properti', 'left');
        $this->db->join('gambar_properti', 'gambar_properti.id_properti = properti.id_properti', 'left');
        $this->db->join('fasilitas_properti', 'fasilitas_properti.id_properti = properti.id_properti', 'left');
        $this->db->join('type_properti', 'type_properti.id_type = properti.id_type', 'left');
        $this->db->join('wilayah_kota', 'wilayah_kota.id_kota = properti.id_kota', 'left');
        $this->db->join('listing', 'listing.id_properti = properti.id_properti', 'left');
        $this->db->join('agency', 'agency.id_agency = listing.id_agency', 'left');

            if (!empty($search)) {
                $this->db->like('properti.judul_properti', $search);
                $this->db->group_by('properti.id_properti');
            }

        $this->db->order_by("properti.id_properti", "DESC");
        $this->db->group_by('properti.id_properti');
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        return $query;
    }

    public function count_properti($search = '')
    {
        $this->db->select('*');
        $this->db->from('properti');
        if (!empty($search)) {
            $this->db->like('judul_properti', $search);
        }
        return $this->db->count_all_results();
    }

    public function insert_properti($data) {
        $this->db->insert('properti', $data);
        return $this->db->insert_id();
    }

    public function insert_detail_properti($data) {
        return $this->db->insert('detail_properti', $data);
    }

    public function insert_gambar_properti($data) {
        return $this->db->insert('gambar_properti', $data);
    }

    public function insert_fasilitas_properti($data) {
        return $this->db->insert('fasilitas_properti', $data);
    }

    public function ubah_warna($data_map) {
        $this->db->where('code', $data_map['code']);
        return $this->db->update('data_map', ['color' => $data_map['color']]);
    }

    public function insert_agency($data_agency) {
        return $this->db->insert('listing', $data_agency);
    }

    public function get_properti_det($id_properti)
    {
        $this->db->select('
            properti.id_properti,
            properti.id_status,
            properti.id_kota,
            properti.id_type,
            properti.judul_properti,
            properti.alamat,
            properti.lokasi,
            properti.area_terdekat,
            properti.jenis_penawaran,
            properti.viewer,
            properti.dibuat,
            detail_properti.jml_kamar,
            detail_properti.jml_kamar_mandi,
            detail_properti.luas_bangunan,
            detail_properti.luas_tanah,
            detail_properti.daya_listrik,
            detail_properti.carport,
            detail_properti.level,
            detail_properti.ruang_tamu,
            detail_properti.ruang_keluarga,
            detail_properti.taman,
            detail_properti.ruang_makan,
            detail_properti.balkon,
            detail_properti.harga,
            detail_properti.satuan,
            detail_properti.deskripsi,
            GROUP_CONCAT(DISTINCT TRIM(gambar_properti.gambar) ORDER BY gambar_properti.id_gambar ASC SEPARATOR ",") as gambar,
            fasilitas_properti.jalan,
            fasilitas_properti.masjid,
            fasilitas_properti.taman_bermain,
            fasilitas_properti.area_ruko,
            fasilitas_properti.kolam_renang,
            fasilitas_properti.one_gate,
            fasilitas_properti.security,
            fasilitas_properti.cctv,
            type_properti.nama_type,
            type_properti.icon,
            wilayah_kota.nama_kota,
            wilayah_kota.provinsi_id,
            agency.id_agency,
            agency.nama_agent,
            agency.email,
            agency.position,
            agency.no_tlp,
            agency.foto_profil,
            agency.alamat as agency_alamat,
            filter_kota.icon as icon_filter,
            status_properti.status as status_properti
        ');
        $this->db->from('properti');
        $this->db->join('detail_properti', 'detail_properti.id_properti = properti.id_properti', 'left');
        $this->db->join('gambar_properti', 'gambar_properti.id_properti = properti.id_properti', 'left');
        $this->db->join('fasilitas_properti', 'fasilitas_properti.id_properti = properti.id_properti', 'left');
        $this->db->join('type_properti', 'type_properti.id_type = properti.id_type', 'left');
        $this->db->join('wilayah_kota', 'wilayah_kota.id_kota = properti.id_kota', 'left');
        $this->db->join('listing', 'listing.id_properti = properti.id_properti', 'left');
        $this->db->join('agency', 'agency.id_agency = listing.id_agency', 'left');
        $this->db->join('filter_kota', 'filter_kota.id_kota = properti.id_kota', 'left');
        $this->db->join('status_properti', 'status_properti.id_status = properti.id_status', 'left');
        $this->db->where('properti.id_properti', $id_properti);
        $this->db->group_by('properti.id_properti');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->result();

            foreach ($result as $row) {
                $row->gambar = array_map('trim', explode(',', $row->gambar));
            }

            return $result;
        } else {
            return null;
        }
    }

    public function insert_promo($data) {
        return $this->db->insert('promo', $data);
    }

    function get_promo($id_properti)
    {
        $this->db->select('*');
        $this->db->from('promo');
        $this->db->where('id_properti', $id_properti);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_promo_by_id($id_promo)
    {
        return $this->db->get_where('promo', ['id_promo' => $id_promo])->row();
    }

    public function update_promo($id_promo, $data)
    {
        $this->db->where('id_promo', $id_promo);
        $this->db->update('promo', $data);
    }

    public function simpan_gambar($file_name, $id_properti) {
        $data = [
            'gambar' => $file_name,
            'id_properti' => $id_properti
        ];

        $this->db->insert('gambar_properti', $data);
    }

    public function get_gambar($id_properti)
    {
        $this->db->select('gambar');
        $this->db->from('gambar_properti');
        $this->db->where('id_properti', $id_properti);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return [];
        }
    }

    public function get_gambar_by_nama($id_properti, $gambar) {
        $this->db->where('id_properti', $id_properti);
        $this->db->where('gambar', $gambar);
        $query = $this->db->get('gambar_properti');
        return $query->row();
    }

    public function hapus_gambar($id_properti, $gambar) {
        $this->db->where('id_properti', $id_properti);
        $this->db->where('gambar', $gambar);
        return $this->db->delete('gambar_properti');
    }

    public function update_properti($id_properti, $data_properti) {
        $this->db->where('id_properti', $id_properti);
        return $this->db->update('properti', $data_properti);
    }

    public function update_detail($id_properti, $data_detail) {
        $this->db->where('id_properti', $id_properti);
        return $this->db->update('detail_properti', $data_detail);
    }

    public function update_fasilitas($id_properti, $data_fasilitas) {
        $this->db->where('id_properti', $id_properti);
        return $this->db->update('fasilitas_properti', $data_fasilitas);
    }


}