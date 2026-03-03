<?php
class SuratKelahiran extends CI_Controller
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
            'title' => 'History Surat Pengantar Akte Kelahiran',
            'datas' => $this->M_history->getSpak(),
        );

        $this->M_notifikasi->updateSpak();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('warga/history/spak/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function cetak($id)
    {
        $data = array(
            'title' => 'Cetak Surat Pengantar Akte Kelahiran',
            'data' => $this->M_cetak->cetakSpak($id)
        );

        $this->load->view('warga/history/spak/print', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');

        $old = $this->db->get_where('surat_kelahiran', ['id' => $id])->row();

        $dataUpdate = [
            'ayah' => $this->input->post('ayah'),
            'ibu' => $this->input->post('ibu'),
            'no_kk' => $this->input->post('no_kk'),
            'nama_bayi' => $this->input->post('nama_bayi'),
            'jekel_b' => $this->input->post('jekel_b'),
            'tempat_lahir_b' => $this->input->post('tempat_lahir_b'),
            'tanggal_lahir_b' => $this->input->post('tanggal_lahir_b'),
            'agama_b' => $this->input->post('agama_b'),
            'anak_ke' => $this->input->post('anak_ke'),
            'kewarganegaraan_b' => $this->input->post('kewarganegaraan_b'),
            'alamat_b' => $this->input->post('alamat_b'),
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
        $this->db->update('surat_kelahiran', $dataUpdate);

        $this->session->set_flashdata('success', 'Dokumen berhasil diperbarui');
        redirect('history-surat-kelahiran');
    }
}
