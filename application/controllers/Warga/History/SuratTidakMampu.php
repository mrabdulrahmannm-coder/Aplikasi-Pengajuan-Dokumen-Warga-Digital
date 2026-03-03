<?php
class SuratTidakMampu extends CI_Controller
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
            'title' => 'History Surat Keterangan Tidak Mampu',
            'datas' => $this->M_history->getSktm(),
        );

        $this->M_notifikasi->updateSktm();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('warga/history/sktm/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function cetak($id)
    {
        $data = array(
            'title' => 'Cetak Surat Keterangan Tidak Mampu',
            'data' => $this->M_cetak->cetakSktm($id)
        );

        $this->load->view('warga/history/sktm/print', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');

        $old = $this->db->get_where('surat_tidak_mampu', ['id' => $id])->row();

        $dataUpdate = [
            'tanggungan' => $this->input->post('tanggungan'),
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

        /* =======================
           FILE RUMAH
        ======================= */
        if (!empty($_FILES['file_rumah']['name'])) {
            $config = [
                'upload_path' => './assets/file_rumah/',
                'allowed_types' => 'jpg|jpeg|png',
                'encrypt_name' => true
            ];
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file_rumah')) {
                if ($old->file_rumah && file_exists('./assets/file_rumah/' . $old->file_rumah)) {
                    unlink('./assets/file_rumah/' . $old->file_rumah);
                }
                $dataUpdate['file_rumah'] = $this->upload->data('file_name');
            }
        }

        $this->db->where('id', $id);
        $this->db->update('surat_tidak_mampu', $dataUpdate);

        $this->session->set_flashdata('success', 'Dokumen berhasil diperbarui');
        redirect('history-surat-tidak-mampu');
    }
}
