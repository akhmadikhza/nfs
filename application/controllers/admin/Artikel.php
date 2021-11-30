<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{


	public function __construct()
	{

		parent::__construct();
		$this->check_login->check();

		// $user = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		// if ($user['role_id'] == 2) {
		// 	$this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">You dont have permission to access this page !</div>');
		// 	redirect('admin/user');
		// }
		$this->load->model('materi_model');
		$this->load->model('kelas_model');
	}

	//listing data berita
	public function index()
	{

		$user = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		if ($user['role_id'] == 2) {
			$this->session->set_flashdata('sukses', '<div class="alert alert-danger" role="alert">You dont have permission to access this page !</div>');
			redirect('admin/user');
		}

		$materi = $this->materi_model->listing();
		$data = array(
			'title' => 'Data Materi(' . count($materi) . ')',
			'materi' => $materi,
			'isi' => 'admin/materi/list'
		);

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	public function tambah()
	{
		if ($this->session->userdata('role_id') == 2) {
			$this->session->set_flashdata('sukses', 'You dont have any privilages to accsess this page!');
			redirect('admin/user');
		}
		$kelas = $this->kelas_model->listing();
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules(
			'judul_materi',
			'Judul_materi',
			'required|trim|is_unique[materi.judul_materi]',
			array(
				'required'		=> '%s harus diisi',
				'is_unique'		=> '%s <strong>' . $this->input->post('judul_materi') .
					'</strong> has been already taken.Try another one!'
			)
		);

		$valid->set_rules(
			'isi_materi',
			'Isi_materi',
			'required',
			array('required'		=> '%s harus diisi')
		);

		if ($valid->run()) {
			$config['upload_path']          = './assets/image/artikel/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 9024;
			$config['max_width']            = '';
			$config['max_height']           = '';
			$config['remove_spaces']        = TRUE;
			$config['file_name'] 			= time() . '-' . $_FILES['file_materi']['name'];
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('file_materi')) {

				$data = array(
					'title' => 'Add Materi ',
					'kelas' => $kelas,
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'admin/materi/tambah'
				);

				$this->load->view('admin/layout/wrapper', $data, FALSE);
			} else {
				$upload_data 				= array('uploads' => $this->upload->data());
				$config['image_library'] 	= 'gd2';
				$config['source_image'] 	= './assets/image/artikel/' . $upload_data['uploads']['file_name'];
				$config['new_image']		= './assets/image/artikel/thumbs/' . $upload_data['uploads']['file_name'];
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width']         	= 600;
				$config['height']       	= 400;
				$config['rotation_angle'] 	= 'hor';
				$config['thumb_marker']		= '';

				$this->load->library('image_lib', $config);

				$this->image_lib->resize();
				$i = $this->input;

				$data = array(
					'id_user '		=> $this->session->userdata('id_user'),
					'id_kelas'	    => $i->post('id_kelas'),
					'slug_materi'	=> url_title($this->input->post('judul_materi'), 'dash', TRUE),
					'judul_materi' 	=> $i->post('judul_materi'),
					'isi_materi'	=> $i->post('isi_materi'),
					'file_materi'		=> $upload_data['uploads']['file_name'],
					'tanggal_post'	=> date('Y-m-d H:i:s')

				);
				$this->materi_model->tambah($data);
				$this->session->set_flashdata('flash', 'Added');
				redirect(base_url('admin/artikel'), 'refresh');
				/*This is the end of tambah $data variabel hh  */
			}
		}
		//masuk database
		$data = array(
			'title' => 'Add Materi ',
			'kelas' => $kelas,
			'isi' => 'admin/materi/tambah'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	public function edit($id_materi)
	{
		$materi = $this->materi_model->detail($id_materi);
		$kelas = $this->kelas_model->listing();
		//validasi
		$valid = $this->form_validation;


		$valid->set_rules(
			'judul_materi',
			'Judul_materi',
			'required',
			array('required'		=> '%s harus diisi')
		);
		$valid->set_rules(
			'isi_materi',
			'Isi_materi',
			'required',
			array('required'		=> '%s harus diisi')
		);

		if ($valid->run()) {
			//jika tidak kosong maka akan di proses
			if (!empty($_FILES['file_materi']['name'])) {
				$config['upload_path']          = './assets/image/artikel/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size']             = 9024;
				$config['max_width']            = '';
				$config['max_height']           = '';
				$config['remove_spaces']        = TRUE;
				$config['file_name'] 			= time() . '-' . $_FILES['file_materi']['name'];

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('file_materi')) {
					$data = array(
						'title' => 'Edit Berita ',
						'kelas' => $kelas,
						'materi'	=> $materi,
						'error_upload' => $this->upload->display_errors(),
						'isi' => 'admin/materi/edit'
					);


					$this->load->view('admin/layout/wrapper', $data, FALSE);
				} else {

					$upload_data = array('uploads' => $this->upload->data());
					$config['image_library'] 	= 'gd2';
					$config['source_image'] 	= './assets/image/artikel/' . $upload_data['uploads']['file_name'];
					$config['new_image']		= './assets/image/artikel/thumbs/' . $upload_data['uploads']['file_name'];
					$config['create_thumb'] 	= TRUE;
					$config['maintain_ratio'] 	= TRUE;
					$config['width']         	= 600;
					$config['height']       	= 400;
					$config['rotation_angle'] 	= 'hor';
					$config['quality']			= '90%';
					$config['thumb_marker']		= '';

					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					$i = $this->input;
					//hapus gambar lama jika ada gambar baru
					if ($materi['file_materi'] != "") {
						unlink('./assets/image/artikel/' . $materi['file_materi']);
						unlink('./assets/image/artikel/thumbs/' . $materi['file_materi']);
					}

					$data = array(
						'id_materi'		=> $id_materi,
						'id_user '		=> $this->session->userdata('id_user'),
						'id_kelas'	=> $i->post('id_kelas'),
						'slug_materi'	=> url_title($this->input->post('judul_materi'), 'dash', TRUE),
						'judul_materi' 	=> $i->post('judul_materi'),
						'isi_materi'	=> $i->post('isi_materi'),
						'file_materi'		=> $upload_data['uploads']['file_name']
					);
					$this->materi_model->edit($data);
					$this->session->set_flashdata('flash', 'Edited');
					redirect(base_url('admin/artikel'), 'refresh');
				}
			} else {


				$i = $this->input;

				$data = array(
					'id_materi'		=> $id_materi,
					'id_user '		=> $this->session->userdata('id_user'),
					'id_kelas'	   => $i->post('id_kelas'),
					'slug_materi'	=> url_title($this->input->post('judul_materi'), 'dash', TRUE),
					'judul_materi' 	=> $i->post('judul_materi'),
					'isi_materi'	=> $i->post('isi_materi')
					// 'file_materi'		=> $upload_data['uploads']['file_name']

				);
				$this->materi_model->edit($data);
				$this->session->set_flashdata('flash', 'Edited');
				redirect(base_url('admin/artikel'), 'refresh');
			}
		}
		//  	
		//masuk database
		$data = array(
			'title' => 'Edit Materi ',
			'kelas' => $kelas,
			'materi'	=> $materi,
			'isi' => 'admin/materi/edit'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}




	public function delete($id_materi)
	{
		$materi = $this->materi_model->detail($id_materi);

		//hapus image
		if ($materi['file_materi'] != "") {
			unlink('./assets/image/artikel/' . $materi['file_materi']);
			unlink('./assets/image/artikel/thumbs/' . $materi['file_materi']);
		}
		$data = array('id_materi'	=> $materi['id_materi']);
		$this->materi_model->delete($data);
		$this->session->set_flashdata('flash', 'Deleted');
		redirect('admin/artikel');
	}

	//kategori
	public function category($slug_kelas)
	{

		$kelas 		= $this->kelas_model->read($slug_kelas);

		$id_kelas  	= $kelas['id_kelas'];
		$id_kela 	= $kelas['id_kelas'];


		/*Listing berita pagination*/

		$this->load->library('pagination');

		$config['base_url'] = base_url('admin/artikel/category/' . $slug_kelas . '/index/');
		$config['total_rows'] = count($this->materi_model->total_kelas($id_kelas));

		$config['per_page'] = 3;
		$config['uri_segment'] = 6;

		/*Style Pagination*/

		$config['full_tag_open']    = '<nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav>';

		$config['first_link']       = 'First';
		$config['first_tag_open']   = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link']        = 'Last';
		$config['last_tag_open']    = '<li class="page-item">';
		$config['last_tag_close']  = '</li>';



		$config['next_link']        = 'Next';
		$config['next_tag_open']    = '<li class="page-item">';
		$config['next_tagl_close']  = '</li>';


		$config['prev_link']        = 'Prev';
		$config['prev_tag_open']    = '<li class="page-item">';
		$config['prev_tag_close']  = '</li>';

		$config['cur_tag_open']     = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close']    = '</a></li>';


		$config['num_tag_open']     = '<li class="page-item">';
		$config['num_tag_close']    = '</li>';



		$config['attributes'] = array('class' => 'page-link');





		/*End*/
		//limit dan start
		$limit 	= $config['per_page'];
		$start  = ($this->uri->segment(6)) ? ($this->uri->segment(6)) : 0;

		$this->pagination->initialize($config);

		$materi = $this->materi_model->materi_kelas($id_kelas, $limit, $start);
		$namket = $this->kelas_model->namket($id_kela);


		// $namket = $this->berita_model->namket($id_kelas);



		$data = array(
			'title'	=> 'Kelas  - ' . $kelas['nama_kelas'],
			'pagination' => $this->pagination->create_links(),
			'materi'	=> $materi,
			'namket'	=> $namket,
			'limit'		=> $limit,
			'total'	=> $config['total_rows'],
			'isi'	=> 'admin/materi/kelas'


		);
		if ($kelas['slug_kelas']) {

			$this->load->view('admin/layout/wrapper', $data, FALSE);
		} else {
			redirect('oops');
		}
	}


	//methode read 
	public function read($slug_materi)
	{

		$materi = $this->materi_model->read($slug_materi);
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$komen  = $this->materi_model->komen();
		$coba = $this->materi_model->listing();


		$data =
			array(

				'title' 	=> 	$materi['judul_materi'],
				'materi'	=> $materi,
				'komen'		=> $komen,
				'user'		=> $user,
				'coba'		=> $coba,
				'slug'		=> $materi['slug_materi'],
				'isi'	=> 'admin/materi/read'


			);

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}




	public function kirim()
	{

		// Uploads files
		if (isset($_POST['submit'])) { // if save button on the form is clicked
			// name of the uploaded file
			$filename = $_FILES['file_baru']['name'];

			// destination of the file on the server
			$destination = 'assets/upload/lampiran/' . $filename;

			// get the file extension
			$extension = pathinfo($filename, PATHINFO_EXTENSION);

			// the physical file on a temporary uploads directory on the server
			$file = $_FILES['file_baru']['tmp_name'];

			// move the uploaded (temporary) file to the specified destination
			if (move_uploaded_file($file, $destination)) {

				$slug_materi    = $this->input->post('slug_materi');
				$id_user		= $this->session->userdata('id_user');
				$id_materi      = $this->input->post('id_materi');
				$id_kelas       = $this->input->post('id_kelas');
				$isi_komen      = $this->input->post('isi_komen');
				$file_baru      = $_FILES['file_baru']['name'];
				$tanggal_post   = date('Y-m-d H:i:s');


				$this->db->query("INSERT INTO komen VALUES('','$slug_materi','$id_user','$id_materi','$id_kelas','$isi_komen','$file_baru','$tanggal_post')");
				$this->session->set_flashdata('sukses', 'Your message was successfully sent!');
				redirect('admin/materi/read/' . $slug_materi);
			} else {
				$slug_materi    = $this->input->post('slug_materi');
				$id_user		= $this->session->userdata('id_user');
				$id_materi      = $this->input->post('id_materi');
				$id_kelas       = $this->input->post('id_kelas');
				$isi_komen      = $this->input->post('isi_komen');
				$file_baru       = '';
				$tanggal_post   = date('Y-m-d H:i:s');


				$this->db->query("INSERT INTO komen VALUES('','$slug_materi','$id_user','$id_materi','$id_kelas','$isi_komen','$file_baru','$tanggal_post')");
				$this->session->set_flashdata('sukses', 'Your message was successfully sent!');
				redirect('admin/artikel/read/' . $slug_materi);
			}
		}
	}


	public function komentar()
	{
		$slug_materi    = $this->input->post('slug_materi');
		$comment_materi    = 0;
		$id_user		= $this->session->userdata('id_user');
		$id_materi      = $this->input->post('id_materi');
		$id_kelas       = $this->input->post('id_kelas');
		$isi_komen      = $this->input->post('isi_komen');
		$tanggal_post   = date('Y-m-d H:i:s');
		$this->db->query("INSERT INTO komen VALUES('','$slug_materi',$comment_materi,'$id_user','$id_materi','$id_kelas','$isi_komen','$tanggal_post')");
		$this->session->set_flashdata('flash', 'Added');
		redirect('admin/artikel/read/' . $slug_materi);
	}



	public function balas()
	{
		$id_komen = $this->input->post('id_komen');
		$slug_materi    = $this->input->post('slug_materi');
		$id_user		= $this->session->userdata('id_user');
		$id_materi      = $this->input->post('id_materi');
		$id_kelas       = $this->input->post('id_kelas');
		$isi_komen      = $this->input->post('isi_komen');
		$file_baru       = '';
		$tanggal_post   = date('Y-m-d H:i:s');
		$this->db->query("INSERT INTO komen VALUES('','$id_komen','$slug_materi','$id_user','$id_materi','$id_kelas','$isi_komen','$file_baru','$tanggal_post')");
		redirect('admin/artikel/read/' . $slug_materi);
	}




	public function edit_komen($id_komen)
	{

		$komen = $this->materi_model->detail_komen($id_komen);
		$valid = $this->form_validation;

		$valid->set_rules(
			'isi_komen',
			'Isi komen',
			'required',
			array('required'		=> '%s wajib diisi!')
		);

		if ($valid->run() == FALSE) {
			$data = array(
				'title' => 'Edite your reply',
				'komen' => $komen,
				'isi' => 'admin/materi/edit_komen'
			);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		} else {
			$i = $this->input;
			$data = [
				'id_komen' => $id_komen,
				'slug_materi' => $i->post('slug_materi'),
				'id_user '	=> $this->session->userdata('id_user'),
				'id_materi'	=> $i->post('id_materi'),
				'id_kelas'	=> $i->post('id_kelas'),
				'isi_komen'	=> $i->post('isi_komen'),
			];
			$this->materi_model->edit_komen($data);
			$this->session->set_flashdata('flash', 'Updated');
			redirect('admin/artikel/read/' . $komen['slug_materi']);
		}
	}


	public function reply_komen($id_komen)
	{

		$komen = $this->materi_model->detail_komen($id_komen);
		$valid = $this->form_validation;

		$valid->set_rules(
			'isi_komen',
			'Isi komen',
			'required',
			array('required'		=> '%s wajib diisi!')
		);

		if ($valid->run() == FALSE) {
			$data = array(
				'title' => 'Reply Comment ',
				'komen' => $komen,
				'isi' => 'admin/materi/reply_komen'
			);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		} else {
			$i = $this->input;
			$data = [
				'slug_materi' => $i->post('slug_materi'),
				'comment_status' => $i->post('comment_status'),
				'id_user '	=> $this->session->userdata('id_user'),
				'id_materi'	=> $i->post('id_materi'),
				'id_kelas'	=> $i->post('id_kelas'),
				'isi_komen'	=> $i->post('isi_komen'),
				'tanggal_post' =>  date('Y-m-d H:i:s'),
			];
			$this->db->insert('komen', $data);
			$this->session->set_flashdata('flash', 'Added!');
			redirect('admin/artikel/read/' . $komen['slug_materi']);
		}
	}


	public function reply_net($id_komen)

	{
		$komen = $this->materi_model->detail_komen($id_komen);
		$valid = $this->form_validation;

		$valid->set_rules(
			'isi_komen',
			'Isi komen',
			'required',
			array('required'		=> '%s wajib diisi!')
		);

		if ($valid->run() == FALSE) {
			$data = array(
				'title' => 'Reply Comment ',
				'komen' => $komen,
				'isi' => 'admin/materi/reply_net'
			);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		} else {
			$i = $this->input;
			$data = [
				'slug_materi' => $i->post('slug_materi'),
				'comment_status' => $i->post('comment_status'),
				'id_user '	=> $this->session->userdata('id_user'),
				'id_materi'	=> $i->post('id_materi'),
				'id_kelas'	=> $i->post('id_kelas'),
				'isi_komen'	=> $i->post('isi_komen'),
				'tanggal_post' =>  date('Y-m-d H:i:s'),
			];
			$this->db->insert('komen', $data);
			$this->session->set_flashdata('flash', 'Added!');
			redirect('admin/artikel/read/' . $komen['slug_materi']);
		}
	}

	public function courses()
	{

		$courses = $this->menu_model->show_all();
		$data = array(
			'title' => 'All Courses',
			'courses' => $courses,
			'isi' => 'admin/materi/courses'
		);

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function show()
	{


		/*Listing berita pagination*/

		$this->load->library('pagination');

		$config['base_url'] = base_url('admin/artikel/show/page/');
		$config['total_rows'] = $this->materi_model->total();
		$config['per_page'] = 6;
		$config['uri_segment'] = 5;
		$config['num_links'] = 2;
		/*Style*/
		/*Style Pagination*/

		$config['full_tag_open']    = '<nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav>';

		$config['first_link']       = 'First';
		$config['first_tag_open']   = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link']        = 'Last';
		$config['last_tag_open']    = '<li class="page-item">';
		$config['last_tag_close']  = '</li>';



		$config['next_link']        = 'Next';
		$config['next_tag_open']    = '<li class="page-item">';
		$config['next_tagl_close']  = '</li>';


		$config['prev_link']        = 'Prev';
		$config['prev_tag_open']    = '<li class="page-item">';
		$config['prev_tag_close']  = '</li>';

		$config['cur_tag_open']     = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close']    = '</a></li>';


		$config['num_tag_open']     = '<li class="page-item">';
		$config['num_tag_close']    = '</li>';



		$config['attributes'] = array('class' => 'page-link');


		/*End*/

		//limit dan start
		$limit 	= $config['per_page'];
		$start  = ($this->uri->segment(5)) ? ($this->uri->segment(5)) : 0;

		$this->pagination->initialize($config);

		// $data['artikel'] = $this->materi_model->artikel($limit, $start);


		$data['materi'] = $this->materi_model->artikel($limit, $start);
		$data['title'] = 'Data Artikel';
		$data['pagination'] = $this->pagination->create_links();
		// $data['berita']	= $berita;
		$data['limit']	= $limit;
		$data['total']	= $config['total_rows'];
		$data['isi'] = 'admin/materi/show';


		$this->load->view('admin/layout/wrapper', $data);
	}





	public function delete_komen($id_komen)
	{
		$komen = $this->materi_model->detail_komen($id_komen);
		//hapus image
		if ($komen['file_baru'] != "") {
			unlink('./assets/upload/lampiran/' . $komen['file_baru']);
		}
		$data = array('id_komen'	=> $komen['id_komen']);
		$this->materi_model->delete_komen($data);
		$this->session->set_flashdata('flash', 'Deleted!');
		redirect('admin/artikel/read/' . $komen['slug_materi']);
	}
}//Penutup
