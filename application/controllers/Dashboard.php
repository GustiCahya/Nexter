<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username')){
			redirect();
		}
	}

	public function index()
	{
		$data = [
			'pages' => $this->db->get('pages')->num_rows(),
			'blogs' => $this->db->get('blogs')->num_rows(),
			'properties' => $this->db->get('properties')->num_rows()
		];

		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_menu', $data);
		$this->load->view('dashboard/v_footer');
	}
	public function pages()
	{
		$pages = $this->db->get('pages')->result_array();
		$data = [
			'pages' => $pages
		];

		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pages', $data);
		$this->load->view('dashboard/v_footer');
	}
	public function blogs()
	{

		$blogs = $this->db->get('blogs')->result_array();
		$data = [
			'blogs' => $blogs
		];

		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_blogs', $data);
		$this->load->view('dashboard/v_footer');
	}
	public function properties()
	{

		$properties = $this->db->get('properties')->result_array();
		$data = [
			'properties' => $properties
		];

		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_properties', $data);
		$this->load->view('dashboard/v_footer');
	}
	public function page()
	{

		if($this->uri->segment(3)){
			$action = $this->uri->segment(3);
			$id = $this->uri->segment(4);
			switch ($action) {
				case 'edit':

					//Edit
					$this->form_validation->set_rules('title', 'title', 'required|trim');
					$this->form_validation->set_rules('content', 'content', 'required|trim');
					if($this->form_validation->run() == true){
						$title = $this->input->post('title');
						$content = $this->input->post('content');
						$data = [
							'title' => $title,
							'slug'  => strtolower(str_replace(' ', '-', $title)),
							'content' => $content
						];
						$this->db->where('id', $id);
						$this->db->update('pages', $data);
						redirect('dashboard/pages');
					}else{
						$page = $this->db->get_where('pages', ['id' => $id])->row_array();
						$data = [
							'title' => 'Edit',
							'action' => base_url('dashboard/page/edit/'.$id),
							'page'  => $page
						];
						$this->load->view('dashboard/v_header');
						$this->load->view('dashboard/single/v_page', $data);
						$this->load->view('dashboard/v_footer');
					}

				break;
				case 'delete':

					//Delete
					$this->db->where('id', $id);
					$this->db->delete('pages');
					redirect('dashboard/pages');

				break;
				default :
					redirect('dashboard/pages');
			}
		}else{

			// Add
			$this->form_validation->set_rules('title', 'title', 'required|trim');
			$this->form_validation->set_rules('content', 'content', 'required|trim');
			if($this->form_validation->run() == true){
				$title = $this->input->post('title');
				$content = $this->input->post('content');
				$data = [
					'title' => $title,
					'slug'  => strtolower(str_replace(' ', '-', $title)),
					'content' => $content
				];
				$this->db->insert('pages', $data);
				redirect('dashboard/pages');
			}else{
				$data = [
					'title' => 'Add',
					'action' => base_url('dashboard/page')
				];
				$this->load->view('dashboard/v_header');
				$this->load->view('dashboard/single/v_page', $data);
				$this->load->view('dashboard/v_footer');
			}

		}

		
	}
	public function blog()
	{

		if($this->uri->segment(3)){
			$action = $this->uri->segment(3);
			$id = $this->uri->segment(4);
			switch ($action) {
				case 'edit':
					//Edit
					$this->form_validation->set_rules('title', 'title', 'required|trim');
					$this->form_validation->set_rules('content', 'content', 'required|trim');
					if(empty($_FILES['image']['name'])){
						$this->form_validation->set_rules('image', 'image', 'required');
					}
					if($this->form_validation->run() == true){

						$config['upload_path'] = './images/blogs';
						$config['max_size'] = '2048';
						$config['allowed_types'] = 'gif|jpg|jpeg|png';
						$this->load->library('upload', $config);
						
						if($this->upload->do_upload('image')){
							$title = $this->input->post('title');
							$content = $this->input->post('content');
							$image = $this->upload->data()['file_name'];
							$data = [
								'title' => $title,
								'slug'  => strtolower(str_replace(' ', '-', $title)),
								'content' => $content,
								'image' => $image
							];
							$old_image = $this->db->get_where('blogs', ['id'=>$id])->row_array();
							unlink(FCPATH.'images\blogs\\'.$old_image['image']);
							$this->db->where('id', $id);
							$this->db->update('blogs', $data);
							redirect('dashboard/blogs');
						}

					}else{
						$blog = $this->db->get_where('blogs', ['id' => $id])->row_array();
						$data = [
							'title' => 'Edit',
							'action' => base_url('dashboard/blog/edit/'.$id),
							'blog'  => $blog
						];
						$this->load->view('dashboard/v_header');
						$this->load->view('dashboard/single/v_blog', $data);
						$this->load->view('dashboard/v_footer');
					}

				break;
				case 'delete':

					//Delete
					$old_image = $this->db->get_where('blogs', ['id' => $id])->row_array();
					unlink(FCPATH.'images\blogs\\'.$old_image['image']);
					$this->db->where('id', $id);
					$this->db->delete('blogs');
					redirect('dashboard/blogs');

				break;
				default :
					redirect('dashboard/blogs');
			}
		}else{

			// Add
			$this->form_validation->set_rules('title', 'title', 'required|trim');
			$this->form_validation->set_rules('content', 'content', 'required|trim');

			if(empty($_FILES['image']['name'])){
				$this->form_validation->set_rules('image', 'image', 'required');
			}

			if($this->form_validation->run() == true){
				$config['upload_path'] = './images/blogs';
				$config['max_size'] = '2048';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';

				$this->load->library('upload', $config);
				
				if($this->upload->do_upload('image')){
					$title = $this->input->post('title');
					$content = $this->input->post('content');
					$image = $this->upload->data()['file_name'];
					$data = [
						'title' => $title,
						'slug'  => strtolower(str_replace(' ', '-', $title)),
						'content' => $content,
						'image' => $image
					];
					$this->db->insert('blogs', $data);
					redirect('dashboard/blogs');
				}
			}else{
				$data = [
					'title' => 'Add',
					'action' => base_url('dashboard/blog')
				];
				$this->load->view('dashboard/v_header');
				$this->load->view('dashboard/single/v_blog', $data);
				$this->load->view('dashboard/v_footer');
			}
		}

	}
	public function property()
	{
		
		if($this->uri->segment(3)){
			$action = $this->uri->segment(3);
			$id = $this->uri->segment(4);
			switch ($action) {
				case 'edit':
					//Edit
					$this->form_validation->set_rules('title', 'title', 'required|trim');
					$this->form_validation->set_rules('room', 'room', 'required|trim');
					$this->form_validation->set_rules('location', 'location', 'required|trim');
					$this->form_validation->set_rules('area', 'area', 'required|trim');
					$this->form_validation->set_rules('price', 'price', 'required|trim');
					if(empty($_FILES['image']['name'])){
						$this->form_validation->set_rules('image', 'image', 'required');
					}
					if($this->form_validation->run() == true){

						$config['upload_path'] = './images/properties';
						$config['max_size'] = '2048';
						$config['allowed_types'] = 'gif|jpg|jpeg|png';
						$this->load->library('upload', $config);
						
						if($this->upload->do_upload('image')){
							$title = $this->input->post('title');
							$room = $this->input->post('room');
							$location = $this->input->post('location');
							$area = $this->input->post('area');
							$price = $this->input->post('price');
							$image = $this->upload->data()['file_name'];
							$data = [
								'title' => $title,
								'slug'  => strtolower(str_replace(' ', '-', $title)),
								'room' => $room,
								'location' => $location,
								'area' => $area,
								'price' => $price,
								'image' => $image
							];
							$old_image = $this->db->get_where('properties', ['id'=>$id])->row_array();
							unlink(FCPATH.'images\properties\\'.$old_image['image']);
							$this->db->where('id', $id);
							$this->db->update('properties', $data);
							redirect('dashboard/properties');
						}

					}else{
						$property = $this->db->get_where('properties', ['id' => $id])->row_array();
						$data = [
							'title' => 'Edit',
							'action' => base_url('dashboard/property/edit/'.$id),
							'property'  => $property
						];
						$this->load->view('dashboard/v_header');
						$this->load->view('dashboard/single/v_property', $data);
						$this->load->view('dashboard/v_footer');
					}

				break;
				case 'delete':

					//Delete
					$old_image = $this->db->get_where('properties', ['id' => $id])->row_array();
					unlink(FCPATH.'images\properties\\'.$old_image['image']);
					$this->db->where('id', $id);
					$this->db->delete('properties');
					redirect('dashboard/properties');

				break;
				default :
					redirect('dashboard/properties');
			}
		}else{

			// Add
			$this->form_validation->set_rules('title', 'title', 'required|trim');
			$this->form_validation->set_rules('room', 'room', 'required|trim');
			$this->form_validation->set_rules('location', 'location', 'required|trim');
			$this->form_validation->set_rules('area', 'area', 'required|trim');
			$this->form_validation->set_rules('price', 'price', 'required|trim');

			if(empty($_FILES['image']['name'])){
				$this->form_validation->set_rules('image', 'image', 'required');
			}

			if($this->form_validation->run() == true){
				$config['upload_path'] = './images/properties';
				$config['max_size'] = '2048';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';

				$this->load->library('upload', $config);
				
				if($this->upload->do_upload('image')){
					$title = $this->input->post('title');
					$room = $this->input->post('room');
					$location = $this->input->post('location');
					$area = $this->input->post('area');
					$price = $this->input->post('price');
					$image = $this->upload->data()['file_name'];
					$data = [
						'title' => $title,
						'slug'  => strtolower(str_replace(' ', '-', $title)),
						'image' => $image,
						'room' => $room,
						'location' => $location,
						'area' => $area,
						'price' => $price
					];
					$this->db->insert('properties', $data);
					redirect('dashboard/properties');
				}
			}else{
				$data = [
					'title' => 'Add',
					'action' => base_url('dashboard/property')
				];
				$this->load->view('dashboard/v_header');
				$this->load->view('dashboard/single/v_property', $data);
				$this->load->view('dashboard/v_footer');
			}
		}
	}

	public function account()
	{
		$account = $this->db->get('login')->row_array();
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password1', 'Old Password', 'required|trim|min_length[8]');
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[8]|matches[password3]');
		$this->form_validation->set_rules('password3', 'Confirm Password', 'required|trim|min_length[8]|matches[password2]');
		if($this->form_validation->run() == true){
			$username = $this->input->post('username');
			$password1 = $this->input->post('password1');
			$password2 = $this->input->post('password2');
			$password3 = $this->input->post('password3');
			if(password_verify($password1, $account['password'])){
				if($password2 == $password3){
					$data = [
						'username' => $username,
						'password' => password_hash($password2, PASSWORD_DEFAULT)
					];
					$this->db->where('id', $account['id']);
					$this->db->update('login', $data);
					$this->session->sess_destroy();
					redirect();
				}
			}else{
				$this->session->set_flashdata('message', '<div style="color:salmon">Old password is wrong</div>');
			}
		}else{
			$data = [
				'account' => $account
			];
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_account', $data);
			$this->load->view('dashboard/v_footer');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect();
	}
}
