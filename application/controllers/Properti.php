<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Properti extends AUTH_Controller
{

    var $template = 'template/index';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Properti_model');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['tittle']         = 'kanpa.co.id | Properti';
        $data['userdata']       = $this->userdata;
        $data['type']           = $this->Properti_model->get_type();
        $data['kota']           = $this->Properti_model->get_kota_select();
        $data['status']         = $this->Properti_model->get_status_select();
        $data['agent']          = $this->Properti_model->get_agent_select();
        $data['content']        = 'page_admin/properti/properti';
        $data['script']         = 'page_admin/properti/properti_js';
        $this->load->view($this->template, $data);
    }

    public function fetch()
    {
        $output = '';
        $limit = $this->input->post('limit');
        $start = $this->input->post('start');
        $search = $this->input->post('search');

        $data = $this->Properti_model->get_properti($limit, $start, $search);
        $total_data = $this->Properti_model->count_properti($search);
        $total_pages = ceil($total_data / $limit);

        $output = '';
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $prop) {
                $date = new DateTime($prop->dibuat);
                $formattedDate = $date->format('j F Y');

                $output .= '
                            <div class="col-lg-12 col-md-12 col-sm-12 pb-3">
                                <!-- Tampilan Desktop -->
                                <div class="row d-none d-md-flex align-items-center p-2">
                                    <div class="card position-relative">
                                        <div class="row">
                                            <div class="image-pro position-relative">
                                            <div class="ribbon ribbon-top-left"><span>' . $prop->jenis_penawaran . '</span></div>
                                                <img class="card-img card-img-left" src="' . base_url('upload/gambar_properti/' . $prop->gambar) . '"
                                                    alt="Card image" />
                                                <a href="' . base_url('Properti/detail/' . $prop->id_properti) . '" class="btn btn-primary btn-view"><i class="menu-icon tf-icons bx bx-bot"></i>Lihat</a>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="desk pt-2 pb-1">
                                                    <div class="row mb-3">
                                                        <div class="col-lg-5">
                                                            <p class="card-text badge bg-warning rounded-3">
                                                                <small class="text-white text-uppercase">' . $prop->nama_type . '</small>
                                                            </p>
                                                        </div>
                                                    </div>';
                                                    $output .= '<h3 class="harga text-primary mb-2">Rp. ' . (floor($prop->harga) == $prop->harga ? number_format($prop->harga, 0, ',', '.') : number_format($prop->harga, 1, ',', '.')) . ' ' . $prop->satuan . '</h3>';

                                                    $output .= '

                                                    <h4 class="display-7 unit pt-0 mb-1 d-flex align-items-center">' . $prop->judul_properti . '
                                                    <span class="badge bg-label-warning ms-2 shadow-lg rounded-3 px-8 py-7 fs-6">' . $prop->luas_bangunan . '/' . $prop->luas_tanah . '</span>
                                                    </h4>
                                                    <p class="card-text">' . $prop->alamat . '</p>
                                                    <div>
                                                        <small class="footer-link me-4">LT : ' . $prop->luas_tanah . ' m2</small>
                                                        <small class="footer-link me-4">LB : ' . $prop->luas_bangunan . ' m2</small>
                                                        <small class="footer-link me-4">KT : ' . $prop->jml_kamar . '</small>
                                                        <small class="footer-link me-4">KM : ' . $prop->jml_kamar_mandi . '</small>
                                                        <small class="footer-link">LV : ' . $prop->level . '</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="position-absolute bottom-0 end-0 p-2 d-flex align-items-center me-3">
                                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                                    class="avatar avatar-md pull-up" title="' . $prop->nama_agent . '">
                                                    <img src="' . base_url('upload/agent/' . $prop->foto_profil) . '" alt="Avatar" class="rounded-circle" />
                                                </li>
                                            </ul>
                                            <span class="ms-2 fs-5 fw-bold">' . $prop->nama_agent . '</span>
                                        </div>
                                        <div class="position-absolute top-0 end-0 mt-2 me-3">
                                            <p class="card-text"><small class="text-muted tayang">Tayang Sejak ' . $formattedDate . '</small></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tampilan Mobile -->
                                <div class="d-block d-md-none">
                                    <div class="card shadow-sm">
                                        <img class="card-img-top" src="' . base_url('upload/gambar_properti/' . $prop->gambar) . '" alt="Card image">
                                        <div class="card-body pt-3">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <p class="card-text badge bg-warning rounded-3 mb-0">
                                                    <small class="text-white text-uppercase">' . $prop->nama_type . '</small>
                                                </p>
                                                <p class="card-text mb-0">
                                                    <small class="text-muted">Tayang Sejak ' . $formattedDate . '</small>
                                                </p>
                                            </div>
                                            <h3 class="harga text-primary mb-2">Rp. ' . (floor($prop->harga) == $prop->harga ? number_format($prop->harga, 0, ',', '.') : number_format($prop->harga, 1, ',', '.')) . '</h3>
                                            <h4 class="unit mb-1">' . $prop->judul_properti . '</h4>
                                            <p class="card-text text-muted mb-2">' . $prop->alamat . '</p>
                                            <div class="d-flex justify-content-between mb-3">
                                                <small class="footer-link">LT : ' . $prop->luas_tanah . ' m2</small>
                                                <small class="footer-link">LB : ' . $prop->luas_bangunan . ' m2</small>
                                                <small class="footer-link">KT : ' . $prop->jml_kamar . '</small>
                                                <small class="footer-link">KM : ' . $prop->jml_kamar_mandi . '</small>
                                                <small class="footer-link">LV : ' . $prop->level . '</small>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <img src="' . base_url('upload/agent/' . $prop->foto_profil) . '" alt="' . $prop->nama_agent . '" class="rounded-circle me-2"
                                                    width="40" height="40">
                                                <div class="d-flex flex-column">
                                                    <span>' . $prop->nama_agent . '</span>
                                                    <small class="text-muted">' . $prop->alamat . '</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
            }

            echo json_encode([
                'data' => $output,
                'total_pages' => $total_pages,
                'total_data' => $total_data
            ]);
        } else {
            echo json_encode([
                'data' => '',
                'total_pages' => $total_pages,
                'total_data' => 0
            ]);
        }
    }

    // code multiple select untuk mengambil data
    public function getKotaByProvinsi()
    {
        $provinsi_id = $this->input->get('id_provinsi');
        $kota = $this->Properti_model->getKotaByProvinsiId($provinsi_id);
        echo json_encode($kota);
    }

    public function store() {
        // Simpan data properti
        $id_kota        = $this->input->post('id_kota');
        $id_type        = $this->input->post('id_type');
        $id_status      = $this->input->post('id_status');
        $area_terdekat  = $this->input->post('area_terdekat');

        if (empty($id_kota) || empty($id_type)) {
            echo json_encode(['status' => 'error', 'message' => 'Kota dan tipe properti harus dipilih.']);
            return;
        }

        $jenis_penawaran = $this->input->post('penawaran') ? $this->input->post('penawaran') : 'Dijual';

        $data_properti = [
            'id_kota'           => $id_kota,
            'id_type'           => $id_type,
            'id_status'         => $id_status,
            'jenis_penawaran'   => $jenis_penawaran,
            'judul_properti'    => $this->input->post('judul_properti'),
            'alamat'            => $this->input->post('alamat'),
            'lokasi'            => $this->input->post('lokasi'),
            'area_terdekat'     => $area_terdekat,
            'dibuat'            => date('Y-m-d H:i:s')
        ];

        $id_properti = $this->Properti_model->insert_properti($data_properti);

       // Update warna peta berdasarkan id_kota
        $data_map = [
            'code' => $id_kota,
            'color' => '#104C98'
        ];

         $this->Properti_model->ubah_warna($data_map);

         // input nama agent ke listing
        $data_agency = [
            'id_properti' => $id_properti,
            'id_agency'   => $this->input->post('id_agency')
        ];

         $this->Properti_model->insert_agency($data_agency);

        // Simpan detail properti
        $data_detail = [
            'id_properti' => $id_properti,
            'jml_kamar' => $this->input->post('jml_kamar'),
            'jml_kamar_mandi' => $this->input->post('jml_kamar_mandi'),
            'luas_bangunan' => $this->input->post('luas_bangunan'),
            'luas_tanah' => $this->input->post('luas_tanah'),
            'daya_listrik' => $this->input->post('daya_listrik'),
            'carport' => $this->input->post('carport'),
            'ruang_tamu' => $this->input->post('ruang_tamu'),
            'taman' => $this->input->post('taman'),
            'ruang_makan' => $this->input->post('ruang_makan'),
            'level' => $this->input->post('level'),
            'balkon' => $this->input->post('balkon'),
            'harga' => $this->input->post('harga'),
            'satuan' => $this->input->post('satuan'),
            'deskripsi' => $this->input->post('deskripsi')
        ];
        $this->Properti_model->insert_detail_properti($data_detail);

        // Cek apakah fasilitas ada di POST sebelum menyimpan
        if ($this->input->post('jalan') || $this->input->post('masjid') || $this->input->post('taman_bermain') ||
        $this->input->post('area_ruko') || $this->input->post('kolam_renang') || $this->input->post('one_gate') ||
        $this->input->post('security') || $this->input->post('cctv')) {

            $data_fasilitas = [
                'id_properti' => $id_properti,
                'jalan' => $this->input->post('jalan'),
                'masjid' => $this->input->post('masjid'),
                'taman_bermain' => $this->input->post('taman_bermain'),
                'area_ruko' => $this->input->post('area_ruko'),
                'kolam_renang' => $this->input->post('kolam_renang'),
                'one_gate' => $this->input->post('one_gate'),
                'security' => $this->input->post('security'),
                'cctv' => $this->input->post('cctv')
            ];
            $this->Properti_model->insert_fasilitas_properti($data_fasilitas);
         }

        // Proses file gambar
        $files = $_FILES['gambar_properti'];
        $error_occurred = false;

        if (!empty($files['name'][0])) {
            $count = count($files['name']);

            for ($i = 0; $i < $count; $i++) {
                // Memisahkan tiap file ke dalam $_FILES
                $_FILES['file']['name'] = $files['name'][$i];
                $_FILES['file']['type'] = $files['type'][$i];
                $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
                $_FILES['file']['error'] = $files['error'][$i];
                $_FILES['file']['size'] = $files['size'][$i];

                // Inisialisasi ulang konfigurasi upload untuk tiap file
                $this->upload->initialize($this->set_upload_options());

                if ($this->upload->do_upload('file')) {
                    $data_gambar = [
                        'id_properti' => $id_properti,
                        'gambar' => $this->upload->data('file_name')
                    ];
                    $this->Properti_model->insert_gambar_properti($data_gambar);
                } else {
                    $error = $this->upload->display_errors();
                    log_message('error', 'Upload error: ' . $error);
                    $error_occurred = true;
                }
            }

            if ($error_occurred) {
                echo json_encode(['status' => 'error', 'message' => 'Terjadi kesalahan saat mengunggah gambar.']);
                return;
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Tidak ada file gambar yang dipilih.']);
            return;
        }

        echo json_encode(['status' => 'success', 'message' => 'Properti berhasil disimpan.']);
    }

    private function set_upload_options() {
        $config = [
            'upload_path' => './upload/gambar_properti',
            'allowed_types' => 'jpg|jpeg|png',
            'max_size' => 2048,
            'overwrite' => false,
            'encrypt_name' => true,
        ];
        return $config;
    }

    public function detail()
    {
        $id_properti = $this->uri->segment(3);
        $data['tittle']         = 'kanpa.co.id | Detail Properti';
        $data['userdata']       = $this->userdata;
        $data['detail']         = $this->Properti_model->get_properti_det($id_properti);
        $data['promo']          = $this->Properti_model->get_promo($id_properti);
        $data['content']        = 'page_admin/detail_properti/detail';
        $data['script']         = 'page_admin/detail_properti/detail_js';
        $this->load->view($this->template, $data);
    }

    public function save_promo() {
        $id_properti = $this->input->post('id_properti');
        $nama_promo = $this->input->post('nama_promo');

        if (!empty($id_properti) && !empty($nama_promo)) {
            $data = [
                'id_properti' => $id_properti,
                'nama_promo' => $nama_promo
            ];

            $insert_id = $this->Properti_model->insert_promo($data);

            if ($insert_id) {
                echo json_encode(['status' => 'success', 'message' => 'Promo berhasil disimpan!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan promo.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Data tidak lengkap.']);
        }
    }

    public function get_promo_by_id()
    {
        $id_promo = $this->input->post('id_promo');
        $promo = $this->Properti_model->get_promo_by_id($id_promo);
        echo json_encode($promo);
    }

    public function update_promo()
    {
        $id_promo = $this->input->post('id_promo');
        $id_properti = $this->input->post('id_properti');
        $nama_promo = $this->input->post('nama_promo');

        $data = array(
            'id_properti' => $id_properti,
            'nama_promo' => $nama_promo
        );

        $this->Properti_model->update_promo($id_promo, $data);

        echo json_encode(['status' => 'success']);
    }

}