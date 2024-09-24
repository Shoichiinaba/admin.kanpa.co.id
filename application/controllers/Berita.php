<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends AUTH_Controller
{
    var $template = 'template/index';

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_berita');
    }

    public function index() {
        $data['tittle'] = 'kanpa.co.id | Data Berita';
        $data['userdata'] = $this->userdata;
        $data['content'] = 'page_admin/berita/berita';
        $data['script'] = 'page_admin/berita/berita_js';
        $this->load->view($this->template, $data);
    }

    function data_artikel_berita() {
        $data['tittle'] = 'kanpa.co.id | Data Berita';
        $data['userdata'] = $this->userdata;
        $id_berita = $this->input->post('id-berita');

        $data['data_artikel_berita'] = $this->M_berita->m_data_artikel_berita($id_berita);
        $data['data_foto_berita'] = $this->M_berita->m_data_foto_berita($id_berita);
        $data['content'] = 'page_admin/berita/data_artikel_berita';
        $this->load->view('page_admin/berita/data_artikel_berita', $data);
    }

    function data_berita() {
        $data['tittle'] = 'kanpa.co.id | Data Berita';
        $data['userdata'] = $this->userdata;
        $filter = $this->input->post('filter');
        $data['data_berita'] = $this->M_berita->m_data_berita($filter);

        $data['content'] = 'page_admin/berita/data_berita';
        $this->load->view('page_admin/berita/data_berita', $data);
    }


    function add_content()
    {
        $config['upload_path'] = "./upload/article/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload("file-foto-btn")) {
            $data = array('upload_data' => $this->upload->data());
            $file_foto_btn = $data['upload_data']['file_name'];
            $data = array(

                'berita_id' => $this->input->post('id-berita'),
                'text_berita' => $this->input->post('text-berita'),
                'file_foto_btn' => $file_foto_btn,
                'link_btn' => $this->input->post('link-btn'),
            );
        } else {
            $data = array(

                'berita_id' => $this->input->post('id-berita'),
                'text_berita' => $this->input->post('text-berita'),
            );
        }
        $insert = $this->m_berita->m_add_content($data);
        echo json_encode($insert);
    }
    function edit_content()
    {
        $config['upload_path'] = "./upload/article/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("file-foto-btn")) {
            $data = array('upload_data' => $this->upload->data());
            $file_foto_btn = $data['upload_data']['file_name'];
            $id_data_berita = $this->input->post('id-data-berita');
            $text_berita = $this->input->post('text-berita');
            $link_btn = $this->input->post('link-btn');
        } else {
            $id_data_berita = $this->input->post('id-data-berita');
            $text_berita = $this->input->post('text-berita');
            $link_btn = $this->input->post('link-btn');
        }
        $foto_lama = $this->input->post('foto-btn-lama');
        if ($foto_lama == '') {
        } else {
            unlink('./upload/article/' . $foto_lama);
        }
        $updeta = $this->m_berita->m_edit_content($id_data_berita, $text_berita, $file_foto_btn, $link_btn);
        echo json_encode($updeta);
    }
    function delete_artikel()
    {
        $id_berita = $this->input->post('id-berita');
        $sql = "SELECT * FROM berita WHERE berita.id_berita = '$id_berita'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $berita) {
                unlink('./upload/article/' . $berita->foto_berita);
                echo $id_berita;
            }
        }
        $data_berita_id = '';
        $sql = "SELECT * FROM data_berita, foto_berita
        WHERE data_berita.id_data_berita = foto_berita.data_berita_id
        AND data_berita.berita_id = '$id_berita'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                unlink('./upload/article/' . $berita->meta_foto);
                unlink('./upload/article/' . $data->file_foto_berita);
                $data_berita_id = $data->data_berita_id;
                echo $data_berita_id;
            }
        }
        $this->M_berita->m_delete_artikel($id_berita, $data_berita_id);
    }
    function delete_content()
    {
        $id_data_berita = $this->input->post('id-data-berita');
        $sql = "SELECT * FROM foto_berita WHERE data_berita_id=$id_data_berita";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data_foto) {
                $file_foto_berita = $data_foto->file_foto_berita;
                unlink('./upload/article/' . $file_foto_berita);
            }
        }
        $updeta = $this->m_berita->m_delete_content($id_data_berita);
        echo json_encode($updeta);
    }

    function simpan_foto_berita()
    {
        $config['upload_path'] = "./upload/article/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload("foto-berita-other")) {
            $data = array('upload_data' => $this->upload->data());
            $data_berita_id = $this->input->post('id-berita');
            $file_foto_berita = $data['upload_data']['file_name'];
            $uploadedImage = $this->upload->data();
            $this->resizeImage($uploadedImage['file_name']);
            $insert = $this->m_berita->m_simpan_foto_berita($data_berita_id, $file_foto_berita);
            echo json_encode($insert);
        }
        exit;
    }
    function delete_foto_berita()
    {
        $file_foto_berita = $this->input->post('file-foto-berita');
        unlink('./upload/article/' . $file_foto_berita);
        $id_foto_berita = $this->input->post('id-foto-berita');
        $delete = $this->m_berita->m_delete_foto_berita($id_foto_berita);
        echo json_encode($delete);
    }
    function simpan_data_berita()
    {
        $judul_berita = $this->input->post('judul-berita');
        $tgl_berita = $this->input->post('tgl-berita');
        $meta_desk = $this->input->post('meta-desk');
        $tag_berita = $this->input->post('tag-berita');
        $config['upload_path'] = "./upload/article/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload("foto-berita")) {
            $data = array('upload_data' => $this->upload->data());
            $foto_berita = $data['upload_data']['file_name'];
            $uploadedImage = $this->upload->data();
            $this->resizeImage($uploadedImage['file_name']);
        }

        $insert = $this->M_berita->m_simpan_data_berita($judul_berita, $tgl_berita, $meta_desk, $tag_berita,  $foto_berita);
        echo json_encode($insert);
    }
    function edit_data_berita()
    {
        $action_change_berita = $this->input->post('ceklis-ubah-foto-berita');
        if ($action_change_berita == 'change-foto-berita') {
            $foto_lama = $this->input->post('foto-lama');
            unlink('./upload/article/' . $foto_lama);

            $id_berita = $this->input->post('id-berita');
            $judul_berita = $this->input->post('judul-berita');
            $tgl_berita = $this->input->post('tgl-berita');
            $meta_desk = $this->input->post('meta-desk');
            $tag_berita = $this->input->post('tag-berita');
            $config['upload_path'] = "./upload/article/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload("foto-berita")) {
                $data = array('upload_data' => $this->upload->data());
                $foto_berita = $data['upload_data']['file_name'];
                $uploadedImage = $this->upload->data();
            }

            $this->resizeImage($uploadedImage['file_name']);

            $update = $this->m_berita->m_edit_data_foto_berita($id_berita, $judul_berita, $tgl_berita, $meta_desk, $tag_berita, $foto_berita);
            echo json_encode($update);
            exit;
        } else {
            $id_berita = $this->input->post('id-berita');
            $judul_berita = $this->input->post('judul-berita');
            $tgl_berita = $this->input->post('tgl-berita');
            $meta_desk = $this->input->post('meta-desk');
            $tag_berita = $this->input->post('tag-berita');
            $update = $this->m_berita->m_edit_berita($id_berita, $judul_berita, $tgl_berita, $meta_desk, $tag_berita);
            echo json_encode($update);
        }
    }
    function add_meta_foto()
    {

        $id_berita = $this->input->post('id-berita');
        $sql = "SELECT meta_foto, id_berita FROM berita WHERE id_berita = '$id_berita'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $meta) {
                if ($meta->meta_foto == '') {
                } else {
                    unlink('./upload/article' . $meta->meta_foto);
                }
            }
        }
        $config['upload_path'] = "./upload/article";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload("meta-foto")) {
            $data = array('upload_data' => $this->upload->data());
            $meta_foto = $data['upload_data']['file_name'];
            $uploadedImage = $this->upload->data();
        }

        $this->resizeImage_meta($uploadedImage['file_name']);
        $update = $this->m_berita->m_add_meta_foto($id_berita, $meta_foto);
        echo json_encode($update);
    }
    function delete_data_berita()
    {
        $foto_lama = $this->input->post('foto-berita');
        unlink('./upload/article/' . $foto_lama);
        $id_berita = $this->input->post('id-berita');
        $delete = $this->m_berita->m_delete_berita($id_berita);
        echo json_encode($delete);
    }

    function add_view_berita()
    {
        $id_berita =  preg_replace("![^a-z0-9]+!i", " ", $this->input->post('id-berita'));

        $sql = "SELECT * FROM berita WHERE judul_berita = $id_berita";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data_view) {
                $id_berita = $data_view->id_berita;
                $add_view = $data_view->view_berita + 1;
                $update_view = $this->db->set('view_berita', $add_view)
                    ->where('id_berita', $id_berita)
                    ->update('berita');
                return $update_view;
            }
        }
    }
    function resizeImage($filename)
    {
        $source_path = 'upload/article/' . $filename;
        $target_path = 'upload/article/';
        $config = [
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            'quality' => '50%',
            'width' => '1440',
            'height' => 'auto',
        ];
        $this->load->library('image_lib', $config);
        if (!$this->image_lib->resize()) {
            return [
                'status' => 'error compress',
                'message' => $this->image_lib->display_errors()
            ];
        }
        $this->image_lib->clear();
        // return 1;
    }

    function resizeImage_meta($filename)
    {
        $source_path = 'upload/article/' . $filename;
        $target_path = 'upload/article/';
        $config = [
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            'quality' => '70%',
            'width' => '140',
            'height' => '140',
        ];
        $this->load->library('image_lib', $config);
        if (!$this->image_lib->resize()) {
            return [
                'status' => 'error compress',
                'message' => $this->image_lib->display_errors()
            ];
        }
        $this->image_lib->clear();
        // return 1;
    }

    function select_data_tag()
    {
        echo '<option value=""></option>';
        $sql = "SELECT * FROM berita Group BY tag_berita ORDER BY tag_berita ASC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                echo '<option value="' . $data->tag_berita . '">' . $data->tag_berita . '</option>';
            }
        }
        echo '<option value="add tag">Add Tag</option>';
    }
    function data_meta_foto()
    {
        $id_berita = $this->input->post('id-berita');
        $sql = "SELECT meta_foto, id_berita FROM berita WHERE id_berita = '$id_berita'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                if ($data->meta_foto == '') {
                    echo '<img id="preview-foto-meta-berita" src="https://media.istockphoto.com/id/1365197728/id/vektor/tambahkan-plus-tombol-cross-round-medis-ikon-vektor-3d-gaya-kartun-minimal.jpg?s=612x612&w=0&k=20&c=NKmTHM4TqtP5AuSrB779A6iMvktncz9t33fspLQWxlQ=" class="img-grid-news">';
                } else {
                    echo '<img id="preview-foto-meta-berita" src="' . base_url("upload/article") . "/" . $data->meta_foto . '" class="img-grid-news">';
                }
            }
        }
    }

    function validasi_index()
    {
        $id_berita = $this->input->post('id-berita');
        $status_berita = $this->input->post('status-berita');
        $update = $this->m_berita->m_validasi_index($id_berita, $status_berita);
        echo json_encode($update);
    }
    function load_count_berita()
    {
        // $all = 0;
        $permintaan = 0;
        $terindex = 0;
        $error = 0;
        $sql = "SELECT * FROM berita";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $count) {
                // $all++;
                if ($count->status_berita == 'Permintaan') {
                    $permintaan++;
                } else if ($count->status_berita == 'Terindex') {
                    $terindex++;
                } else if ($count->status_berita == 'Error') {
                    $error++;
                }
            }
        }
        echo '<script>';
        echo '$("#all").text("' . $query->num_rows() . '");';
        echo '$("#permintaan").text("' . $permintaan . '");';
        echo '$("#terindex").text("' . $terindex . '");';
        echo '$("#error").text("' . $error . '");';
        echo '</script>';
    }
}