<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			 
				redirect('/');
		}elseif ($this->session->userdata('role') == '2') {
			redirect('user');
		}

	}
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['subtitle'] = 'Dashboard';
		$data['role'] = $this->session->userdata('role');

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['options'] = [
            
            '1' => 'Administrator',
            '2' => 'Member',
        ];
		$this->load->view('template/header', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('template/footer', $data);
	}


	public function user()
	{
		$data['title'] = 'User';
		$data['subtitle'] = 'Dashboard';

		$data['us'] = $this->db->get_where('user', ['role' => 2])->result_array();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['options'] = [
            
            '1' => 'Administrator',
            '2' => 'Member',
        ];	

        $this->load->view('template/header', $data);
		$this->load->view('admin/user', $data);
		$this->load->view('template/footer', $data);
	}



	public function adduser()
	{
		$data['title'] = 'User';
		$data['subtitle'] = 'Dashboard';
		$data['sub_title'] = 'Tambah Pelanggan';
		$data['paket'] = $this->db->get('paket')->result_array();
		$data['area'] = $this->db->get('area')->result_array();

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['options'] = [
            
            '1' => 'Administrator',
            '2' => 'Member',
        ];
        
		$this->form_validation->set_rules('nama','Nama Lengkap','trim|required|max_length[225]');


            if($this->form_validation->run() == FALSE)
            {

				$this->load->view('template/header', $data);
				$this->load->view('admin/adduser', $data);
				$this->load->view('template/footer', $data);
            }
            else
            { 

                $nama = $this->input->post('nama');
                $kode = $this->input->post('kode');
                $area = $this->input->post('area');
                $alamat = $this->input->post('alamat');
                $paket = $this->input->post('paket');
                $aktifasi = $this->input->post('aktifasi');
                $tagihan = $this->input->post('tagihan');
                $no_hp = $this->input->post('no_hp');
                $status = $this->input->post('status');


	                $data = [
	                	'kode' => $kode,
	                	'area' => $area,
	                	'alamat' => $alamat,
	                	'paket' => $paket,
	                	'username' => $kode,
	                	'password' => password_hash($kode,PASSWORD_DEFAULT),
	                	'nama' => $nama,
	                	'no_hp' => $no_hp,
	                	'stat' => $status,
	                	'role' => 2,
	                ];
	                $data2 = [
	                	'kode' => $kode,
	                	'aktifasi' => $aktifasi,
	                	'tagihan' => $tagihan,
	                	'status' => 'Belum Lunas',
	                ];
	                
	                $result = $this->db->insert('user', $data);
	                $this->db->insert('tagihan', $data2);
	                if($result > 0)
	                {
	                    $this->session->set_flashdata('success', 'User Baru Berhasil Ditambahkan');
	                }
	                else
	                {
	                    $this->session->set_flashdata('error', 'User Baru Gagal Ditambahkan');
	                }
	                
	                redirect('admin/user');

                


            }
	}

	public function detailuser($id)
	{
		$data['title'] = 'User';
		$data['subtitle'] = 'Dashboard';
		$data['sub_title'] = 'Detail Pelanggan';


		$this->db->select('*');
		$this->db->from('tagihan')
        ->where('user.id', $id);
		$this->db->join('user', 'tagihan.kode = user.kode', 'LEFT');
		$this->db->join('area', 'user.area = area.id_area', 'LEFT');
		$this->db->join('paket', 'user.paket = paket.id_paket', 'LEFT');
		$data['ehe'] = $this->db->get()->result();

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['options'] = [
            
            '1' => 'Administrator',
            '2' => 'Member',
        ];
		// var_dump($data['ehe'][0]->kode);
		// die();



            
				$this->load->view('template/header', $data);
				$this->load->view('admin/detailuser', $data);
				$this->load->view('template/footer', $data);
	}

	public function edituser($id)
	{
		$data['title'] = 'User';
		$data['subtitle'] = 'Dashboard';
		$data['sub_title'] = 'Edit Pelanggan';

		$data['paket'] = $this->db->get('paket')->result_array();
		$data['area'] = $this->db->get('area')->result_array();
		$data['us'] = $this->db->get_where('user',['id' => $id])->row_array();
		$kd = $data['us']['kode'];

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['options'] = [
            
            '1' => 'Administrator',
            '2' => 'Member',
        ];
		// var_dump($data['us']['kode']);
		// die();

		$this->form_validation->set_rules('nama','Nama Lengkap','trim|required|max_length[225]');


            if($this->form_validation->run() == FALSE)
            {

				$this->load->view('template/header', $data);
				$this->load->view('admin/edituser', $data);
				$this->load->view('template/footer', $data);
            }
            else
            { 

                $nama = $this->input->post('nama');
                $kode = $this->input->post('kode');
                $area = $this->input->post('area');
                $alamat = $this->input->post('alamat');
                $paket = $this->input->post('paket');
                $no_hp = $this->input->post('no_hp');
                $status = $this->input->post('status');
                $password = password_hash($kode,PASSWORD_DEFAULT);



	                
					$this->db->set('nama', $nama);
					$this->db->set('kode', $kode);
					$this->db->set('username', $kode);
					$this->db->set('area', $area);
					$this->db->set('alamat', $alamat);
					$this->db->set('paket', $paket);
					$this->db->set('no_hp', $no_hp);
					$this->db->set('stat', $status);
					$this->db->set('password', $password);
					$this->db->where('id' , $id);
					$ha = $this->db->update('user');


					$this->db->where('kode' , $kd);
					$this->db->set('kode', $kode);
					$ha = $this->db->update('tagihan');



	                if($ha > 0)
	                {
	                    $this->session->set_flashdata('success', 'User Berhasil Diedit');
	                }
	                else
	                {
	                    $this->session->set_flashdata('error', 'User Gagal Diedit');
	                }
	                
	                redirect('admin/user');

                


            }
	
	}



	public function hps_user($id)
	{
		$data['us'] = $this->db->get_where('user',['id' => $id])->row_array();
		$kd = $data['us']['kode'];
		$this->db->where('id',$id);
    	$this->db->delete('user');

		$this->db->where('kode',$kd);
    	$this->db->delete('tagihan');
		$this->session->set_flashdata('success', 'Pelanggan Beserta Tagihan Berhasil Dihapus...');
		redirect('admin/User');
	}


// Bagian Area #Zaha_Muehehehe
	public function area()
	{
		$data['title'] = 'Area';
		$data['subtitle'] = 'Dashboard';
		$data['area'] = $this->db->get('area')->result_array();

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['options'] = [
            
            '1' => 'Administrator',
            '2' => 'Member',
        ];

		$this->form_validation->set_rules('area','area','trim|required|max_length[225]');

            if($this->form_validation->run() == FALSE)
            {
				$this->load->view('template/header', $data);
				$this->load->view('admin/area', $data);
				$this->load->view('template/footer', $data);
            }
            else
            { 

                $area = $this->input->post('area');

	                $data = ['area' => $area];
	                
	                $result = $this->db->insert('area', $data);
	                if($result > 0)
	                {
	                    $this->session->set_flashdata('success', 'Area Baru Berhasil Ditambahkan');
	                }
	                else
	                {
	                    $this->session->set_flashdata('error', 'Area Baru Gagal Ditambahkan');
	                }
	                
	                redirect('admin/area');

                


            }
	}

	public function editarea()
	{

		$data['title'] = 'Area';
		$data['subtitle'] = 'Dashboard';
		$data['area'] = $this->db->get('area')->result_array();



		$this->form_validation->set_rules('area1','area1','trim|required|max_length[225]');

            if($this->form_validation->run() == FALSE)
            {

				$this->load->view('template/header', $data);
				$this->load->view('admin/area', $data);
				$this->load->view('template/footer', $data);
            }
            else
            { 
                $ar = $this->input->post('area1');
                $id_area = $this->input->post('id');



					$this->db->set('area', $ar);
					$this->db->where('id_area' , $id_area);
					$ha = $this->db->update('area');
					if($ha > 0)
	                {
	                    $this->session->set_flashdata('success', 'Area '.$ar.' Berhasil Diedit');
	                }
	                else
	                {
	                    $this->session->set_flashdata('error', 'Area '.$ar.' Gagal Diedit');
	                }
	                
	                redirect('admin/area');
	            }
	}

	public function hps_area($id)
	{
		$this->db->where('id_area',$id);
    	$this->db->delete('area');
		$this->session->set_flashdata('success', 'Area Berhasil Dihapus...');
		redirect('admin/area');
	}


	//Bagian Paket Internet #Zaha_Muehehehe

	public function paket()
	{
		
		$data['title'] = 'Paket Internet';
		$data['subtitle'] = 'Dashboard';
		$data['paket'] = $this->db->get('paket')->result_array();

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['options'] = [
            
            '1' => 'Administrator',
            '2' => 'Member',
        ];

		$this->form_validation->set_rules('paket','paket','trim|required|max_length[225]');

            if($this->form_validation->run() == FALSE)
            {
				$this->load->view('template/header', $data);
				$this->load->view('admin/paket', $data);
				$this->load->view('template/footer', $data);
            }
            else
            { 

                $paket = $this->input->post('paket');
                $harga = $this->input->post('harga');
                $deskripsi = $this->input->post('deskripsi');

	                $data = [
	                	'paket' => $paket,
	                	'harga' => $harga,
	                	'deskripsi' => $deskripsi,
	                ];
	                
	                $result = $this->db->insert('paket', $data);
	                if($result > 0)
	                {
	                    $this->session->set_flashdata('success', 'Paket Internet Baru Berhasil Ditambahkan');
	                }
	                else
	                {
	                    $this->session->set_flashdata('error', 'Paket Internet Baru Gagal Ditambahkan');
	                }
	                
	                redirect('admin/paket');

                


            }
	}

	public function editpaket()
	{


		
		$data['title'] = 'Paket Internet';
		$data['paket'] = $this->db->get('paket')->result_array();
		$this->form_validation->set_rules('paket1','paket1','trim|required|max_length[225]');

            if($this->form_validation->run() == FALSE)
            {

				redirect('paket');
            }
            else
            { 
                $ar = $this->input->post('paket1');
                $id_paket = $this->input->post('id');
                $harga = $this->input->post('harga');
                $deskripsi = $this->input->post('deskripsi');


					$this->db->set('paket', $ar);
					$this->db->set('harga', $harga);
					$this->db->set('deskripsi', $deskripsi);
					$this->db->where('id_paket' , $id_paket);
					$ha = $this->db->update('paket');
					if($ha > 0)
	                {
	                    $this->session->set_flashdata('success', 'Paket '.$ar.' Berhasil Diedit');
	                }
	                else
	                {
	                    $this->session->set_flashdata('error', 'Paket '.$ar.' Gagal Diedit');
	                }
	                
	                redirect('admin/paket');
	            }
	}

	public function hps_paket($id)
	{
		$this->db->where('id_paket',$id);
    	$this->db->delete('paket');
		$this->session->set_flashdata('success', 'Paket Berhasil Dihapus...');
		redirect('admin/paket');
	}


	//Bagian Tagihan Pending #Zaha_Muehehehe

	public function pending()
	{
		
		$this->load->model('m_tagihan', 'tagihan');
		$bl = [
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


        $m = $this->input->post('min');
        $s = $this->input->post('max');

        if ($m  != null && $s != null ) { 

            $data['tagihan'] = $this->tagihan->sc( $m, $s)->result_array();
			$data['title'] = 'Tagihan Belum Lunas Bulan '.$bl[$m].' '.$s;

			// var_dump($data['tag']);die();

        }else{

			$data['tagihan'] = $this->tagihan->join()->result_array();	
			$data['title'] = 'Tagihan Belum Lunas';
        }

		// var_dump($data['tagihan']['0']['tagihan']);->Penulisan data di controller
		// die();
		$data['subtitle'] = 'Tagihan Belum Lunas';
		$data['kode'] = $this->db->get_where('user', ['role' => 2])->result_array();

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['options'] = [
            
            '1' => 'Administrator',
            '2' => 'Member',
        ];


            if($this->form_validation->run() == FALSE)
            {
				$this->load->view('template/header', $data);
				$this->load->view('admin/tagihan', $data);
				$this->load->view('template/footer', $data);
            }
            else
            { 

                $tagihan = $this->input->post('tagihan');
                $aktifasi = $this->input->post('aktifasi');
                $kode = $this->input->post('kode');

	                $data = [
	                	'tagihan' => $tagihan,
	                	'aktifasi' => $aktifasi,
	                	'kode' => $kode,
	                	'status' => 'Belum Lunas',
	                ];
	                
	                $result = $this->db->insert('tagihan', $data);
	                if($result > 0)
	                {
	                    $this->session->set_flashdata('success', 'Tagihan Baru Berhasil Ditambahkan');
	                }
	                else
	                {
	                    $this->session->set_flashdata('error', 'Tagihan Baru Gagal Ditambahkan');
	                }
	                
	                redirect('admin/pending');

                


            }
	}

	public function ceklis_tagihan($id)
	{
		$this->db->set('status', 'Lunas');
		$this->db->where('id_tagihan',$id);
		$this->db->update('tagihan');
		$this->session->set_flashdata('success', 'Tagihan Lunas !!!...');
		redirect('admin/lunas');
	}

	//Bagian Tagihan Lunas #Zaha_Muehehehe

	public function lunas()
	{
		
		$this->load->model('m_tagihan', 'tagihan');

		// var_dump($data['tag']['total']);
		// die();
		$bl = [
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


        $m = $this->input->post('min');
        $s = $this->input->post('max');

        if ($m  != null && $s != null ) { 

            $data['tagihan'] = $this->tagihan->sc( $m, $s)->result_array();
            $data['tag'] = $this->tagihan->tot_bul( $m, $s)->row_array();
			$data['title'] = 'Tagihan Lunas Bulan '.$bl[$m].' '.$s;

			// var_dump($data['tag']);die();

        }else{

			$data['tagihan'] = $this->tagihan->join()->result_array();	
			$data['tag'] = $this->tagihan->tot()->row_array();
			$data['title'] = 'Tagihan Lunas';
        }

		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['options'] = [
            
            '1' => 'Administrator',
            '2' => 'Member',
        ];
			$data['subtitle'] = 'Tagihan Lunas';
		$this->load->view('template/header', $data);
		$this->load->view('admin/lunas', $data);
		$this->load->view('template/footer', $data);

	}

	public function hps_tagihan($id)
	{
		$this->db->where('id_tagihan',$id);
    	$this->db->delete('tagihan');
		$this->session->set_flashdata('success', 'Tagihan Yang Lunas Berhasil Dihapus...');
		redirect('admin/lunas');
	}


}
