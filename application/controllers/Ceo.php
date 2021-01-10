<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ceo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ceo/Omzet_data_model', 'omzet_model');
        $this->load->model('ceo/Data_pegawai_model', 'data_pegawai');
        $this->load->model('ceo/Manajemen_laundry_model', 'manajemen_laundry');
        $this->load->model('ceo/Stok_barang_model', 'stok_barang');
        $this->load->model('ceo/Riwayat_pemesanan_model', 'riwayat_pemesanan');
        $this->load->model('ceo/Gaji_pegawai_model', 'gaji_pegawai');
        // is_logged_in();
    }


    //########################################################### INDEX MANAJER AREA ONLY ###########################################################
    public function index()
    {
        $data['title'] = "Dashboard CEO";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id_entitas = $this->session->userdata('id_entitas');
        $data['omzetPerMonth'] = $this->omzet_model->getOmzetMonthly($id_entitas);
        $data['pelangganPerMonth'] = $this->omzet_model->getOrderMonthly($id_entitas);
        $data['unomzetPerMonth'] = $this->omzet_model->getUnomzetMonthly($id_entitas);
        $data['clearOmzet'] = $this->omzet_model->getClearOmzet($id_entitas);
        $data['omzetThisMonth'] = $this->omzet_model->getOmzetThisMonth($id_entitas);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ceo/index', $data);
        $this->load->view('templates/footer');
    }
    //########################################################### INDEX MANAJER AREA ONLY ###########################################################





    //########################################################### DATA PEGAWAI AREA ONLY ###########################################################
    public function data_pegawai()
    {
        $data['title'] = "Data Pegawai";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id_entitas = $this->session->userdata('id_entitas');
        $data['pegawai'] = $this->data_pegawai->getDataPegawai($id_entitas);

        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('tanggal_keluar', 'Tanggal Keluar');
        $this->form_validation->set_rules('status_aktif', 'Status Aktif', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('ceo/data_pegawai', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_pegawai' => htmlspecialchars($this->input->post('nama_pegawai')),
                'tanggal_keluar' => htmlspecialchars($this->input->post('tanggal_keluar')),
                'status_aktif' => htmlspecialchars($this->input->post('status_aktif')),
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
                redirect('ceo/data_pegawai');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Absensi Pegawai Failure updated :( !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('ceo/data_pegawai');
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


    public function changeActiveAbsen()
    {
        $id = $this->input->post('id_entitas');
        $active = $this->input->post('is_active');

        $this->db->set('is_active', $active);
        $this->db->where('id_entitas', $id);
        $result = $this->db->update('user');
        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Change Sucessfully
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('ceo/data_pegawai');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Changae Failure
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('ceo/data_pegawai');
        }
    }
    //########################################################### DATA PEGAWAI AREA ONLY ###########################################################





    //########################################################### MONITOR LAUNDRY AREA ONLY ###########################################################
    public function monitor_laundry()
    {
        $data['title'] = "Monitor Laundry";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id_entitas = $this->session->userdata('id_entitas');
        $data['cleanIncome'] = $this->manajemen_laundry->getCleanIncome($id_entitas);
        $data['burden'] = $this->manajemen_laundry->getBurden($id_entitas);
        $data['profloss'] = $this->manajemen_laundry->getProfiAndLoss($id_entitas);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ceo/monitor_laundry', $data);
        $this->load->view('templates/footer');
    }
    //########################################################### MONITOR LAUNDRY AREA ONLY ###########################################################





    //########################################################### STOK BARANG AREA ONLY ###########################################################
    public function stok_barang()
    {
        $data['title'] = "Stok Barang";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id_entitas = $this->session->userdata('id_entitas');
        $data['stok'] = $this->stok_barang->getStokBarang($id_entitas);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ceo/stok_barang', $data);
        $this->load->view('templates/footer');
    }
    //########################################################### STOK BARANG AREA ONLY ###########################################################





    //########################################################### RIWAYAT PEMESANAN AREA ONLY ###########################################################
    public function riwayat_pemesanan()
    {
        $data['title'] = "Riwayat Pemesanan";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id_entitas = $this->session->userdata('id_entitas');
        $data['history'] = $this->riwayat_pemesanan->getHistoryOrder($id_entitas);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ceo/riwayat_pemesanan', $data);
        $this->load->view('templates/footer');
    }
    //########################################################### RIWAYAT PEMESANAN AREA ONLY ###########################################################





    //########################################################### GAJI PEGAWAI AREA ONLY ###########################################################
    public function gaji_pegawai()
    {
        $data['title'] = "Gaji Pegawai";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id_entitas = $this->session->userdata('id_entitas');
        $data['salary'] = $this->gaji_pegawai->getSalaryEmploye($id_entitas);

        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('tanggal_gaji', 'Tanggal gaji', 'required');
        $this->form_validation->set_rules('gaji_pokok', 'Gaji Pokok', 'required|regex_match[/^[0-999999]/]');
        $this->form_validation->set_rules('gaji_bonus', 'Gaji Bonus', 'required|regex_match[/^[0-999999]/]');
        $this->form_validation->set_rules('total_gaji_pegawai', 'Total Gaji', 'required|regex_match[/^[0-999999]/]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('ceo/gaji_pegawai', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_pegawai' => htmlspecialchars($this->input->post('nama_pegawai')),
                'tanggal_gaji' => htmlspecialchars($this->input->post('tanggal_gaji')),
                'gaji_pokok' => htmlspecialchars($this->input->post('gaji_pokok')),
                'gaji_bonus' => htmlspecialchars($this->input->post('gaji_bonus')),
                'total_gaji_pegawai' => htmlspecialchars($this->input->post('total_gaji_pegawai')),
                'active' => 1,
                'id_user' => $this->session->userdata('id_entitas'),
            ];
            $gaji = $this->gaji_pegawai->insertSalaryEmploye($data);
            if ($gaji == true) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Gaji Pegawai Sucessfully Added !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('ceo/gaji_pegawai');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gaji Pegawai Failure Added :( !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('ceo/gaji_pegawai');
            }
        }
    }

    function editGajiPegawai()
    {
        $data['title'] = "Gaji Pegawai";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id_entitas = $this->session->userdata('id_entitas');
        $data['salary'] = $this->gaji_pegawai->getSalaryEmploye($id_entitas);

        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('tanggal_gaji', 'Tanggal gaji', 'required');
        $this->form_validation->set_rules('gaji_pokok', 'Gaji Pokok', 'required|regex_match[/^[0-999999]/]');
        $this->form_validation->set_rules('gaji_bonus', 'Gaji Bonus', 'required|regex_match[/^[0-999999]/]');
        $this->form_validation->set_rules('total_gaji_pegawai', 'Total Gaji', 'required|regex_match[/^[0-999999]/]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/ongkos', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_pegawai' => htmlspecialchars($this->input->post('nama_pegawai')),
                'tanggal_gaji' => htmlspecialchars($this->input->post('tanggal_gaji')),
                'gaji_pokok' => htmlspecialchars($this->input->post('gaji_pokok')),
                'gaji_bonus' => htmlspecialchars($this->input->post('gaji_bonus')),
                'total_gaji_pegawai' => htmlspecialchars($this->input->post('total_gaji_pegawai')),
                'active' => 1,
                'id_user' => $this->session->userdata('id_entitas'),
            ];
            //$where = $this->input->post('id_gaji')
            $where = array(
                'id_gaji' => $this->input->post('id_gaji'),
            );
            //$this->db->where($where,'id_gaji');
            $this->db->where($where);
            $updateGaji = $this->db->update('gaji_pegawai', $data);
            if ($updateGaji) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Gaji Pegawai Successfuly updated!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('ceo/gaji_pegawai');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gaji Pegawai Failure updated :( !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('ceo/gaji_pegawai');
            }
        }
    }

    public function changeActiveGaji()
    {
        $id = $this->input->post('id_gaji');
        $active = $this->input->post('active');

        $this->db->set('active', $active);
        $this->db->where('id_gaji', $id);
        $result = $this->db->update('gaji_pegawai');
        if ($result) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Deleted Sucessfully
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('ceo/gaji_pegawai');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Deleted Failure
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('ceo/gaji_pegawai');
        }
    }
    //########################################################### GAJI PEGAWAI AREA ONLY ###########################################################





    public function my_profile()
    {
        $data['title'] = "Manajer Laundry";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('ceo/my_profile', $data);
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
            $this->load->view('ceo/edit_profile', $data);
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
            redirect('ceo/my_profile');
        }
    }
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
            $this->load->view('ceo/change_password', $data);
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
                redirect('ceo/changePassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> New Password cant be same with Current Password ! 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('ceo/changePassword');
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
                    redirect('ceo/changePassword');
                }
            }
        }
    }
}
