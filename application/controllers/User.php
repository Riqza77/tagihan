<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('username')) {
			 
				redirect('/');
		}elseif ($this->session->userdata('role') == '1') {
			redirect('admin');
		}


	} 


	public function index()
	{
		$data['title'] = 'Dashboard';
		$this->load->model('m_tagihan', 'tagihan');
		$data['tagihan'] = $this->tagihan->join()->result_array();
		$data['role'] = $this->session->userdata('role');

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();


		$kodee = $data['user']['kode'];
		$data['tagihan'] = $this->tagihan->join_id($kodee)->result_array();		
        $data['options'] = [
            
            '1' => 'Administrator',
            '2' => 'Member',
        ];

		// var_dump($data['user']);
		// die();

		$this->load->view('template/header', $data);
		$this->load->view('user/dashboard', $data);
		$this->load->view('template/footer', $data);
	}


// Bagian Data Pelanggan #Zaha Muehehehe
	public function pribadi()
	{
		$data['title'] = 'Data Pribadi';
		$this->load->model('m_tagihan', 'tagihan');

		$data['role'] = $this->session->userdata('role');

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();	
        $data['options'] = [
            
            '1' => 'Administrator',
            '2' => 'Member',
        ];

		$this->load->view('template/header', $data);
		$this->load->view('user/pribadi', $data);
		$this->load->view('template/footer', $data);
	}

	public function edit()
	{
		

		$this->form_validation->set_rules('nama','nama','trim|required|max_length[225]');

            if($this->form_validation->run() == FALSE)
            {

            	redirect('user/pribadi');
            }
            else
            { 
                $nama = $this->input->post('nama');
                $no_hp = $this->input->post('no_hp');
                $alamat = $this->input->post('alamat');
                $id = $this->input->post('id');



					$this->db->set('nama', $nama);
					$this->db->set('no_hp', $no_hp);
					$this->db->set('alamat', $alamat);
					$this->db->where('id' , $id);
					$ha = $this->db->update('user');
					if($ha > 0)
	                {
	                    $this->session->set_flashdata('success', 'Data '.$nama.' Berhasil Diedit');
	                }
	                else
	                {
	                    $this->session->set_flashdata('error', 'Data '.$nama.' Gagal Diedit');
	                }
	                
	                redirect('user/pribadi');
	            }
	}



// Bagian Tagihan Pending #Zaha Muehehehe
	public function pending()
	{
		$data['title'] = 'Data Tagihan Pending';
		$this->load->model('m_tagihan', 'tagihan');

		$data['role'] = $this->session->userdata('role');

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

   //      $m = $this->input->post('min');
   //      $s = $this->input->post('max');

   //      if ($m  != null && $s != null ) { 

   //          $data['tagihan'] = $this->tagihan->sc($m, $s)->result_array();

   //      }else{

			// $data['tagihan'] = $this->tagihan->join()->result_array();		
   //      }    Jika Ingin menggunakan filter tanggal di admin menggunakan yang diatas.....



		$kodee = $data['user']['kode'];

        $m = $this->input->post('min');
        $s = $this->input->post('max');

        if ($m  != null && $s != null ) { 

            $data['tagihan'] = $this->tagihan->sc_id($kodee, $m, $s)->result_array();

        }else{

			$data['tagihan'] = $this->tagihan->join_id($kodee)->result_array();		
        }



        $data['options'] = [
            
            '1' => 'Administrator',
            '2' => 'Member',
        ];

		// var_dump($data['user']);
		// die();

		$this->load->view('template/header', $data);
		$this->load->view('user/pending', $data);
		$this->load->view('template/footer', $data);
	}

	public function bayar($id)
	{
		$data['title'] = 'Data Tagihan Pending';
		$this->load->model('m_tagihan', 'tagihan');

		$data['role'] = $this->session->userdata('role');


		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$kodee = $data['user']['kode'];

		$data['tagihan'] = $this->tagihan->join_id($kodee, $id)->row_array();	
		// var_dump($data['tagihan']); die();	
        $data['options'] = [
            
            '1' => 'Administrator',
            '2' => 'Member',
        ];
		$this->load->view('template/header', $data);
		$this->load->view('user/bayar', $data);
		$this->load->view('template/footer', $data);

	}

	public function bukti()
	{
        
        

        $id_tagihan = $this->input->post('id_tagihan');
        $kode 		= $this->input->post('kode');


		$foto 		= $_FILES['foto'];

		if ($foto) {
                    $config['allowed_types']    = 'jpg|png|jpeg';
                    $config['max_size']         = '2048';
                    $config['file_name']        = 'Bukti_'.date('dmY').$kode.$id_tagihan;
                    $config['upload_path']      = './assets/bukti';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('foto')) {


                        $image = $this->upload->data('file_name');

                    }else{
                        $error = $this->upload->display_errors();

						$this->session->set_flashdata('success', 'Upload Bukti Gagal !!!...'.$error);
                        redirect('user/bayar/'.$id_tagihan);
                    }
                }
         // var_dump($image);die();
        $this->db->set('bukti', $image);
		$this->db->where('id_tagihan',$id_tagihan);
		$this->db->update('tagihan');
		$this->session->set_flashdata('success', 'Upload Bukti Berhasil Mohon Menunggu Konfirmasi Admin !!!...');
		redirect('user/pending');

	}



// Bagian History Pembayaran #Zaha Muehehehe
	public function history()
	{
		$data['title'] = 'History Pembayaran';
		$this->load->model('m_tagihan', 'tagihan');

		$data['role'] = $this->session->userdata('role');

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$kodee = $data['user']['kode'];

        $m = $this->input->post('min');
        $s = $this->input->post('max');

        if ($m  != null && $s != null ) { 

            $data['tagihan'] = $this->tagihan->sc_id($kodee, $m, $s)->result_array();

        }else{

			$data['tagihan'] = $this->tagihan->join_id($kodee)->result_array();		
        }

        $data['options'] = [
            
            '1' => 'Administrator',
            '2' => 'Member',
        ];

		// var_dump($data['user']);
		// die();

		$this->load->view('template/header', $data);
		$this->load->view('user/history', $data);
		$this->load->view('template/footer', $data);
	}

	public function cetak($id)
	{
		
		$this->load->model('m_tagihan', 'tagihan');

		$data['role'] = $this->session->userdata('role');

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$kodee = $data['user']['kode'];
		$data['tagihan'] = $this->tagihan->join_id($kodee, $id)->row_array();
		$data['bl'] = [
			'01'=> 'Januari',
			'02'=> 'Februari',
			'03'=> 'Maret',
			'04'=> 'April',
			'05'=> 'Mei',
			'06'=> 'Juni',
			'07'=> 'Juli',
			'08'=> 'Agustus',
			'09'=> 'September',
			'10'=> 'Oktober',
			'11'=> 'November',
			'12'=> 'Desember',
		];
		// $dt = date_format(new DateTime($tagihan['tagihan']), 'm')


		// var_dump($data['tagihan']);die();	
		$this->load->view('user/invoice', $data);
        
	}

}