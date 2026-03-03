<?php
class SuratKeteranganPengantar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_history');
        $this->load->model('M_cetak');
    }

    public function index()
    {
        $data = array(
            'title' => 'History Surat Keterangan Pengantar',
            'datas' => $this->M_history->getSkp()
        );

        $this->M_notifikasi->updateSkp();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('warga/history/skp/index', $data);
        $this->load->view('layout/footer');
    }

    public function cetak($id)
    {
        $data = array(
            'title' => 'Cetak Surat Keterangan Pengantar',
            'data' => $this->M_cetak->cetakSkp($id)
        );

        $this->load->view('warga/history/skp/print', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');

        $old = $this->db->get_where('surat_keterangan_pengantar', ['id' => $id])->row();

        $dataUpdate = [
            'keperluan' => $this->input->post('keperluan'),
            'status' => 'Menunggu Verifikasi',
            'komentar' => null
        ];

        $this->load->library('upload');

        /* =======================
           FILE KTP
        ======================= */
        if (!empty($_FILES['file_ktp']['name'])) {
            $config = [
                'upload_path' => './assets/file_ktp/',
                'allowed_types' => 'jpg|jpeg|png',
                'encrypt_name' => true
            ];
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file_ktp')) {
                if ($old->file_ktp && file_exists('./assets/file_ktp/' . $old->file_ktp)) {
                    unlink('./assets/file_ktp/' . $old->file_ktp);
                }
                $dataUpdate['file_ktp'] = $this->upload->data('file_name');
            }
        }

        /* =======================
           FILE KK
        ======================= */
        if (!empty($_FILES['file_kk']['name'])) {
            $config = [
                'upload_path' => './assets/file_kk/',
                'allowed_types' => 'jpg|jpeg|png',
                'encrypt_name' => true
            ];
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file_kk')) {
                if ($old->file_kk && file_exists('./assets/file_kk/' . $old->file_kk)) {
                    unlink('./assets/file_kk/' . $old->file_kk);
                }
                $dataUpdate['file_kk'] = $this->upload->data('file_name');
            }
        }

        $this->db->where('id', $id);
        $this->db->update('surat_keterangan_pengantar', $dataUpdate);

        $this->session->set_flashdata('success', 'Dokumen berhasil diperbarui');
        redirect('history-surat-keterangan-pengantar');
    }
}
