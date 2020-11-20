<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Data_pemesanan_model', 'data_pemesanan');
        $this->load->model('admin/Absensi_pegawai_model', 'absensi_pegawai');
        $this->load->model('admin/Stok_barang_model', 'stok_barang');
        $this->load->model('admin/Ongkos_model', 'ongkos_model');
        is_logged_in();
    }


    //########################################################### INDEX AREA ONLY ###########################################################
    public function index()
    {
        //dimkasudkan untuk diletakan di sidebar dan nama user
        $data['title'] = "Dashboard Admin";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id_entitas = $this->session->userdata('id_entitas');
        $data['data_pem'] = $this->data_pemesanan->getDataPemesanan($id_entitas);

        // var_dump($id_entitas);

        $this->form_validation->set_rules('no_pemesanan', 'No Pemesanan', 'required');
        $this->form_validation->set_rules('nama_customer', 'Nama Customer', 'required');
        $this->form_validation->set_rules('nama_kasir', 'Nama Kasir Pemesanan', 'required');
        $this->form_validation->set_rules('berat_cucian', 'Berat Cucian', 'required|regex_match[/^[0-9]/]');
        $this->form_validation->set_rules('paket_cucian', 'Paket Cucian', 'required');
        $this->form_validation->set_rules('jenis_cucian', 'Jenis Cucian', 'required');
        $this->form_validation->set_rules('parfum_cucian', 'Parfum Cucian', 'required');
        $this->form_validation->set_rules('waktu_pemesanan', 'Waktu Pemesanan', 'required');
        $this->form_validation->set_rules('tanggal_pemesanan', 'Tanggal Pemesanan', 'required');
        $this->form_validation->set_rules('no_telp_customer', 'no_telp_customer', 'required|regex_match[/^[0-12]/]');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('total_pemesanan', 'Total Pemesanan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'no_pemesanan' => htmlspecialchars($this->input->post('no_pemesanan')),
                'nama_customer' => htmlspecialchars($this->input->post('nama_customer')),
                'nama_kasir' => htmlspecialchars($this->input->post('nama_kasir')),
                'jenis_cucian' => htmlspecialchars($this->input->post('jenis_cucian')),
                'paket_cucian' => htmlspecialchars($this->input->post('paket_cucian')),
                'berat_cucian' => htmlspecialchars($this->input->post('berat_cucian')),
                'parfum_cucian' => htmlspecialchars($this->input->post('parfum_cucian')),
                'waktu_pemesanan' => htmlspecialchars($this->input->post('waktu_pemesanan')),
                'tanggal_pemesanan' => htmlspecialchars($this->input->post('tanggal_pemesanan')),
                'no_telp_customer' => htmlspecialchars($this->input->post('no_telp_customer')),
                'status' => htmlspecialchars($this->input->post('status')),
                'total_pemesanan' => htmlspecialchars($this->input->post('total_pemesanan')),
                'active' => 1,
                'id_user' => $this->session->userdata('id_entitas'),
            ];
            // var_dump($data);
            $datpem = $this->data_pemesanan->insertDataPemesanan($data);
            if ($datpem) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Data Pemesanan Added
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
                redirect('admin/index');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to add New Data
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            }
        }
    }
    //########################################################### UPDATE AREA ONLY ###########################################################
    public function editIndex($id = null)
    {
        $where = array('id_pemesanan' => $id);
        $data['editDataPemesanan'] = $this->data_pemesanan->editDataPemesanan($where, 'data_pemesanan')->result();

        $data['title'] = "Edit Pemesanan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = "Edit Pemesanan";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/edit/edit_index', $data);
        $this->load->view('templates/footer');
    }
    public function updateIndex()
    {
        $data = [
            'no_pemesanan' => htmlspecialchars($this->input->post('no_pemesanan')),
            'nama_customer' => htmlspecialchars($this->input->post('nama_customer')),
            'nama_kasir' => htmlspecialchars($this->input->post('nama_kasir')),
            'jenis_cucian' => htmlspecialchars($this->input->post('jenis_cucian')),
            'paket_cucian' => htmlspecialchars($this->input->post('paket_cucian')),
            'berat_cucian' => htmlspecialchars($this->input->post('berat_cucian')),
            'parfum_cucian' => htmlspecialchars($this->input->post('parfum_cucian')),
            'waktu_pemesanan' => htmlspecialchars($this->input->post('waktu_pemesanan')),
            'tanggal_pemesanan' => htmlspecialchars($this->input->post('tanggal_pemesanan')),
            'no_telp_customer' => htmlspecialchars($this->input->post('no_telp_customer')),
            'status' => htmlspecialchars($this->input->post('status')),
            'total_pemesanan' => htmlspecialchars($this->input->post('total_pemesanan')),
            'active' => 1,
            'id_user' => $this->session->userdata('id_entitas'),
        ];
        $where = array(
            'id_pemesanan' => $this->input->post('id_pemesanan'),
        );
        $this->data_pemesanan->updateDataPemesanan($where, $data, 'data_pemesanan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Data Success !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('admin');
    }
    //########################################################### UPDATE AREA ONLY ###########################################################
    public function cetakStruk($id = null)
    {
        $where = array('id_pemesanan' => $id);
        $data['user'] = $this->data_pemesanan->editDataPemesanan($where, 'data_pemesanan')->result();
        $this->load->view('admin/cetak_struk', $data);
    }
    public function changeActive()
    {
        $id = $this->input->post('id_pemesanan');
        $active = $this->input->post('active');

        $this->db->set('active', $active);
        $this->db->where('id_pemesanan', $id);
        $result = $this->db->update('data_pemesanan');
        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Deleted Sucessfully
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('admin/index');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Deleted Failure
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('admin/index');
        }
    }
    //########################################################### INDEX AREA ONLY ###########################################################






    //########################################################### ABSENSI AREA ONLY ###########################################################
    public function absensi_pegawai()
    {
        $data['title'] = "Absensi Pegawai";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id_entitas = $this->session->userdata('id_entitas');
        $data['absensi'] = $this->absensi_pegawai->getAbsensiPegawai($id_entitas);

        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('tanggal_hadir', 'Tanggal Hadir', 'required');
        $this->form_validation->set_rules('jam_masuk', 'Jam Masuk', 'required');
        $this->form_validation->set_rules('jam_keluar', 'Jam Keluar', 'required');
        $this->form_validation->set_rules('presensi', 'Presensi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/absensi_pegawai', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_pegawai' => htmlspecialchars($this->input->post('nama_pegawai')),
                'tanggal_hadir' => htmlspecialchars($this->input->post('tanggal_hadir')),
                'jam_masuk' => htmlspecialchars($this->input->post('jam_masuk')),
                'jam_keluar' => htmlspecialchars($this->input->post('jam_keluar')),
                'presensi' => htmlspecialchars($this->input->post('presensi')),
                'active' => 1,
                'id_user' => $this->session->userdata('id_entitas'),
            ];
            $absensi = $this->absensi_pegawai->insertAbsensiPegawai($data);
            if ($absensi) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Absensi Pegawai Successfuly added!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('admin/absensi_pegawai');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Absensi Pegawai Failure added :( !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            }
        }
    }

    //########################################################### UPDATE AREA ONLY ###########################################################
    public function editAbsensiPegawai()
    {
        $data['title'] = "Absensi Pegawai";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id_entitas = $this->session->userdata('id_entitas');
        $data['absensi'] = $this->absensi_pegawai->getAbsensiPegawai($id_entitas);

        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('tanggal_hadir', 'Tanggal Hadir', 'required');
        $this->form_validation->set_rules('jam_masuk', 'Jam Masuk', 'required');
        $this->form_validation->set_rules('jam_keluar', 'Jam Keluar', 'required');
        $this->form_validation->set_rules('presensi', 'Presensi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/absensi_pegawai', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_pegawai' => htmlspecialchars($this->input->post('nama_pegawai')),
                'tanggal_hadir' => htmlspecialchars($this->input->post('tanggal_hadir')),
                'jam_masuk' => htmlspecialchars($this->input->post('jam_masuk')),
                'jam_keluar' => htmlspecialchars($this->input->post('jam_keluar')),
                'presensi' => htmlspecialchars($this->input->post('presensi')),
                'active' => 1,
                'id_user' => $this->session->userdata('id_entitas'),
            ];
            $where = array(
                'id_absen' => $this->input->post('id_absen'),
            );
            $this->db->where($where);
            $updateAbsensi = $this->db->update('absensi_pegawai', $data);
            if ($updateAbsensi) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Absensi Pegawai Successfuly updated!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('admin/absensi_pegawai');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Absensi Pegawai Failure updated :( !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            }
        }
    }
    //########################################################### UPDATE AREA ONLY ###########################################################
    public function changeActiveAbsen()
    {
        $id = $this->input->post('id_absen');
        $active = $this->input->post('active');

        $this->db->set('active', $active);
        $this->db->where('id_absen', $id);
        $result = $this->db->update('absensi_pegawai');
        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Deleted Sucessfully
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('admin/absensi_pegawai');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Deleted Failure
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('admin/absensi_pegawai');
        }
    }
    //########################################################### ABSENSI AREA ONLY ###########################################################





    //########################################################### STOK AREA ONLY ###########################################################
    public function stok_barang()
    {
        $data['title'] = "Stok Barang";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id_entitas = $this->session->userdata('id_entitas');
        $data['stok'] = $this->stok_barang->getStokBarang($id_entitas);

        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required|is_unique[stok_barang.kode_barang]', [
            'is_unique' => 'this Kode Barang already registered !'
        ]);
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('tanggal_barang', 'Tanggal Barang', 'required');
        $this->form_validation->set_rules('harga_satuan', 'Harga Satuan', 'required|regex_match[/^[0-999999]/]');
        $this->form_validation->set_rules('jumlah_barang', 'Jumlah barang', 'required|regex_match[/^[0-99]/]');
        $this->form_validation->set_rules('digunakan', 'Digunakan', 'required|regex_match[/^[0-99]/]');
        $this->form_validation->set_rules('total_harga_barang', 'Total Harga', 'required');
        $this->form_validation->set_rules('tersedia', 'Tersedia', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/stok_barang', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kode_barang' => htmlspecialchars($this->input->post('kode_barang')),
                'nama_barang' => htmlspecialchars($this->input->post('nama_barang')),
                'harga_satuan' => htmlspecialchars($this->input->post('harga_satuan')),
                'jumlah_barang' => htmlspecialchars($this->input->post('jumlah_barang')),
                'total_harga_barang' => htmlspecialchars($this->input->post('total_harga_barang')),
                'digunakan' => htmlspecialchars($this->input->post('digunakan')),
                'tersedia' => htmlspecialchars($this->input->post('tersedia')),
                'tanggal_barang' => htmlspecialchars($this->input->post('tanggal_barang')),
                'active' => 1,
                'id_user' => $this->session->userdata('id_entitas'),
            ];
            $stok = $this->stok_barang->insertStokBarang($data);
            if ($stok == true) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Stok Barang Sucessfully Added !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('admin/stok_barang');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Stok Barang Failure Added :( !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('admin/stok_barang');
            }
        }
    }

    //########################################################### UPDATE AREA ONLY ###########################################################
    public function editStokBarang()
    {
        $data['title'] = "Stok Barang";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id_entitas = $this->session->userdata('id_entitas');
        $data['stok'] = $this->stok_barang->getStokBarang($id_entitas);

        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('tanggal_barang', 'Tanggal Barang', 'required');
        $this->form_validation->set_rules('harga_satuan', 'Harga Satuan', 'required|regex_match[/^[0-999999]/]');
        $this->form_validation->set_rules('jumlah_barang', 'Jumlah barang', 'required|regex_match[/^[0-99]/]');
        $this->form_validation->set_rules('digunakan', 'Digunakan', 'required|regex_match[/^[0-99]/]');
        $this->form_validation->set_rules('total_harga_barang', 'Total Harga', 'required');
        $this->form_validation->set_rules('tersedia', 'Tersedia', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/stok_barang', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kode_barang' => htmlspecialchars($this->input->post('kode_barang')),
                'nama_barang' => htmlspecialchars($this->input->post('nama_barang')),
                'harga_satuan' => htmlspecialchars($this->input->post('harga_satuan')),
                'jumlah_barang' => htmlspecialchars($this->input->post('jumlah_barang')),
                'total_harga_barang' => htmlspecialchars($this->input->post('total_harga_barang')),
                'digunakan' => htmlspecialchars($this->input->post('digunakan')),
                'tersedia' => htmlspecialchars($this->input->post('tersedia')),
                'tanggal_barang' => htmlspecialchars($this->input->post('tanggal_barang')),
                'active' => 1,
                'id_user' => $this->session->userdata('id_entitas'),
            ];
            $where = array(
                'id_stok' => $this->input->post('id_stok'),
            );
            $this->db->where($where);
            $updateStok = $this->db->update('stok_barang', $data);
            if ($updateStok) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Stok Barang Successfuly updated!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('admin/stok_barang');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Stok Barang Failure updated :( !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('admin/stok_barang');
            }
        }
    }
    //########################################################### UPDATE AREA ONLY ###########################################################

    public function changeActiveStok()
    {
        $id = $this->input->post('id_stok');
        $active = $this->input->post('active');

        $this->db->set('active', $active);
        $this->db->where('id_stok', $id);
        $result = $this->db->update('stok_barang');
        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Deleted Sucessfully
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('admin/stok_barang');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Deleted Failure
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('admin/stok_barang');
        }
    }
    //########################################################### STOK AREA ONLY ###########################################################





    //########################################################### STOK AREA ONLY ###########################################################
    public function ongkos()
    {
        $data['title'] = "Ongkos";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id_entitas = $this->session->userdata('id_entitas');
        $data['ongkos'] = $this->ongkos_model->getOngkos($id_entitas);

        $this->form_validation->set_rules('listrik', 'Listrik', 'required|regex_match[/^[0-999999]/]');
        $this->form_validation->set_rules('pajak', 'Pajak', 'required|regex_match[/^[0-999999]/]');
        $this->form_validation->set_rules('total_harga_barang', 'Total Harga Barang', 'required|regex_match[/^[0-999999]/]');
        $this->form_validation->set_rules('total_gaji_pegawai', 'Total Gaji Pegawai', 'required|regex_match[/^[0-999999]/]');
        $this->form_validation->set_rules('total_ongkos', 'Jumlah barang', 'required|regex_match[/^[0-999999]/]');
        $this->form_validation->set_rules('tanggal_ongkos', 'Tanggal Ongkos', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/ongkos', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'listrik' => htmlspecialchars($this->input->post('listrik')),
                'pajak' => htmlspecialchars($this->input->post('pajak')),
                'total_harga_barang' => htmlspecialchars($this->input->post('total_harga_barang')),
                'total_gaji_pegawai' => htmlspecialchars($this->input->post('total_gaji_pegawai')),
                'total_ongkos' => htmlspecialchars($this->input->post('total_ongkos')),
                'tanggal_ongkos' => htmlspecialchars($this->input->post('tanggal_ongkos')),
                'active' => 1,
                'id_user' => $this->session->userdata('id_entitas'),
            ];
            $ongkosAdd = $this->ongkos_model->insertOngkos($data);
            if ($ongkosAdd == true) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ongkos Sucessfully Added !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('admin/ongkos');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Ongkos Failure Added :( !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                redirect('admin/ongkos');
            }
        }
    }


    //########################################################### UPDATE AREA ONLY ###########################################################
    function editOngkos()
    {
        $data['title'] = "Ongkos";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id_entitas = $this->session->userdata('id_entitas');
        $data['ongkos'] = $this->ongkos_model->getOngkos($id_entitas);

        $this->form_validation->set_rules('listrik', 'Listrik', 'required|regex_match[/^[0-999999]/]');
        $this->form_validation->set_rules('pajak', 'Pajak', 'required|regex_match[/^[0-999999]/]');
        $this->form_validation->set_rules('total_harga_barang', 'Total Harga Barang', 'required|regex_match[/^[0-999999]/]');
        $this->form_validation->set_rules('total_gaji_pegawai', 'Total Gaji Pegawai', 'required|regex_match[/^[0-999999]/]');
        $this->form_validation->set_rules('total_ongkos', 'Jumlah barang', 'required|regex_match[/^[0-999999]/]');
        $this->form_validation->set_rules('tanggal_ongkos', 'Tanggal Ongkos', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/ongkos', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'listrik' => htmlspecialchars($this->input->post('listrik')),
                'pajak' => htmlspecialchars($this->input->post('pajak')),
                'total_harga_barang' => htmlspecialchars($this->input->post('total_harga_barang')),
                'total_gaji_pegawai' => htmlspecialchars($this->input->post('total_gaji_pegawai')),
                'total_ongkos' => htmlspecialchars($this->input->post('total_ongkos')),
                'tanggal_ongkos' => htmlspecialchars($this->input->post('tanggal_ongkos')),
                'active' => 1,
                'id_user' => $this->session->userdata('id_entitas'),
            ];
            $id = $this->input->post('id_ongkos');
            $this->ongkos_model->updateOngkos($data, $id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ongkos Sucessfully Updated !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('admin/ongkos');
        }
    }
    //########################################################### UPDATE AREA ONLY ###########################################################


    public function changeActiveOngkos()
    {
        $id = $this->input->post('id_ongkos');
        $active = $this->input->post('active');

        $this->db->set('active', $active);
        $this->db->where('id_ongkos', $id);
        $result = $this->db->update('ongkos');
        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Deleted Sucessfully
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('admin/ongkos');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Deleted Failure
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('admin/ongkos');
        }
    }
    //########################################################### STOK AREA ONLY ###########################################################




    //########################################################### PROFILE ONLY ###########################################################
    public function my_profile()
    {
        $data['title'] = "My Profile";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/my_profile', $data);
        $this->load->view('templates/footer');
    }
    public function editProfile()
    {
        $data['title'] = "Edit Profile";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('testi', 'Testimoni', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'No Telpon', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/edit/edit_profile', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name')),
                'testi' => htmlspecialchars($this->input->post('testi')),
                'no_telp' => htmlspecialchars($this->input->post('no_telp')),
            ];

            //cek jika ada gambar yang akan diupload

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['max_width'] = '200';
                $config['max_height'] = '200';
                $config['upload_path'] = './assets/images/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/images/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $where = $this->input->post('email');

            $this->db->where('email', $where);
            $this->db->update('user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Congrtas! Your Account Updated ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/my_profile');
        }
    }
    //########################################################### PROFILE ONLY ###########################################################





    public function changePassword()
    {
        $data['title'] = "Change Password";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/change_password', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Current Password ! 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('admin/changePassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> New Password cant be same with Current Password ! 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('admin/changePassword');
                } else {
                    //password bener
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Change Password Successfully ! 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('admin/changePassword');
                }
            }
        }
    }
}
