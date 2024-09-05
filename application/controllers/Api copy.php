<?php

require_once APPPATH . 'libraries/REST_Controller.php';

use MP_kanpa\Libraries\REST_Controller;

class Api extends REST_Controller
{
	function __construct($config = 'rest')
	{
		parent::__construct($config);
	}

	function properti_get()
	{
		$id = $this->get('id_properti');

		$this->db->select('
			properti.id_properti,
			properti.judul_properti,
			properti.alamat,
			properti.lokasi,
			properti.area_terdekat,
			properti.viewer,
			properti.dibuat,
			detail_properti.jml_kamar,
			detail_properti.jml_kamar_mandi,
			detail_properti.luas_bangunan,
			detail_properti.luas_tanah,
			detail_properti.daya_listrik,
			detail_properti.carport,
			detail_properti.ruang_tamu,
			detail_properti.ruang_keluarga,
			detail_properti.taman,
			detail_properti.level,
			detail_properti.ruang_makan,
			detail_properti.balkon,
			detail_properti.harga,
			detail_properti.satuan,
			detail_properti.deskripsi,
			GROUP_CONCAT(gambar_properti.gambar) as gambar,
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
			agency.nama_agent,
			agency.email,
			agency.position,
			agency.no_tlp,
			agency.foto_profil,
			agency.alamat as agency_alamat,
			filter_kota.icon as icon_filter,
			promo.nama_promo

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
		$this->db->join('promo', 'promo.id_properti = properti.id_properti', 'left');

		if ($id) {
			$this->db->where('properti.id_properti', $id);
		}

		$this->db->group_by('properti.id_properti');

		$customer = $this->db->get()->result();

		if ($customer) {
			$this->response($customer, 200);
		} else {
			$this->response(array('status' => 'not found'), 404);
		}
	}

	function properti_put()
	{
		$params = array(
			'viewer' => $this->put('viewer'),
		);
		$this->db->where('id_properti', $this->put('id_properti'));
		$execute = $this->db->update('properti', $params);
		if ($execute) {
			$this->response(array('status' => 'succes'), 201);
		} else {
			return $this->response(array('status' => 'fail'), 502);
		}
	}

	// API reels

	function reels_get()
	{
		$id = $this->get('id_reel');

		$this->db->select('
			reels.id_reel,
			reels.id_properti,
			reels.judul_reels,
			reels.video,
			reels.sosial_media,
			reels.deskripsi,
			reels.uploaded,
			reels.views,
			properti.id_properti,
			properti.judul_properti,
			properti.alamat,
			agency.nama_agent,
			agency.no_tlp,
			agency.foto_profil,
			agency.alamat as agency_alamat,
			detail_properti.jml_kamar,
			detail_properti.jml_kamar_mandi,
			detail_properti.luas_bangunan,
			detail_properti.luas_tanah,
			detail_properti.harga,
			detail_properti.satuan,

		');
		$this->db->from('reels');
		$this->db->join('properti', 'properti.id_properti = reels.id_properti', 'left');
		$this->db->join('detail_properti', 'detail_properti.id_properti = properti.id_properti', 'left');
		$this->db->join('listing', 'listing.id_properti = properti.id_properti', 'left');
		$this->db->join('agency', 'agency.id_agency = listing.id_agency', 'left');

		if ($id) {
			$this->db->where('reels.id_reel', $id);
		}

		$this->db->order_by("reels.id_reel", "DESC");
		$reels = $this->db->get()->result();

		if ($reels) {
			$this->response($reels, 200);
		} else {
			$this->response(array('status' => 'not found'), 404);
		}
	}

	// API Banner

	function banner_get()
	{
		$id = $this->get('id_banner');

		$this->db->select('
			banner.id_banner,
			banner.id_properti,
			banner.type_banner,
			banner.jenis_penawaran,
			banner.foto_banner,
			banner.created,
			properti.judul_properti,
			properti.id_properti,
			properti.jenis_penawaran,
		');
		$this->db->from('banner');
		$this->db->join('properti', 'properti.id_properti = banner.id_properti', 'left');

		if ($id) {
			$this->db->where('banner.id_banner', $id);
		}

		$this->db->order_by("banner.id_banner", "DESC");
		$banner = $this->db->get()->result();

		if ($banner) {
			$this->response($banner, 200);
		} else {
			$this->response(array('status' => 'not found'), 404);
		}
	}
}