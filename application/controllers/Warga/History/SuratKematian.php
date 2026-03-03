<?php
class SuratKematian extends CI_Controller
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
            'title' => 'History Surat Keterangan Kematian',
            'datas' => $this->M_history->getSkk(),
        );

        $this->M_notifikasi->updateSk();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('warga/history/skk/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function cetak($id)
    {
        $data = array(
            'title' => 'Cetak Surat Keterangan Kematian',
            'data' => $this->M_cetak->cetakSkk($id)
        );

        $this->load->view('warga/history/skk/print.php', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');

        $old = $this->db->get_where('surat_kematian', ['id' => $id])->row();

        $dataUpdate = [
            'hubungan' => $this->input->post('hubungan'),
            'nama_alm' => $this->input->post('nama_alm'),
            'bin' => $this->input->post('bin'),
            'nik_a' => $this->input->post('nik_a'),
            'jekel_a' => $this->input->post('jekel_a'),
            'tempat_lahir_a' => $this->input->post('tempat_lahir_a'),
            'tanggal_lahir_a' => $this->input->post('tanggal_lahir_a'),
            'kewarganegaraan_a' => $this->input->post('kewarganegaraan_a'),
            'status_perkawinan_a' => $this->input->post('status_perkawinan_a'),
            'pekerjaan_a' => $this->input->post('pekerjaan_a'),
            'alamat_a' => $this->input->post('alamat_a'),
            'hari' => $this->input->post('hari'),
            'tanggal_meninggal' => $this->input->post('tanggal_meninggal'),
            'jam_meninggal' => $this->input->post('jam_meninggal'),
            'tempat_meninggal' => $this->input->post('tempat_meninggal'),
            'sebab_meninggal' => $this->input->post('sebab_meninggal'),
            'tempat_pemakaman' => $this->input->post('tempat_pemakaman'),
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
        $this->db->update('surat_kematian', $dataUpdate);

        $this->session->set_flashdata('success', 'Dokumen berhasil diperbarui');
        redirect('history-surat-kematian');
    }
}
