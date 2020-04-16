<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webpage extends CI_Controller {

	public function index()
	{
		$properties = $this->db->get('properties')->result_array();
		$pages = $this->db->get('pages')->result_array();
		$data = [
			'properties' => $properties,
			'pages' => $pages
		];
		$this->load->view('v_webpage', $data);
	}
	public function blogs()
	{
		$blogs = $this->db->get('blogs')->result_array();
		$pages = $this->db->get('pages')->result_array();
		$data = [
			'blogs' => $blogs,
			'pages' => $pages
		];
		$this->load->view('page/v_header', $data);
		$this->load->view('page/v_blogs', $data);
		$this->load->view('page/v_footer', $data);
	}
	public function properties()
	{
		$properties = $this->db->get('properties')->result_array();
		$pages = $this->db->get('pages')->result_array();
		$data = [
			'properties' => $properties,
			'pages' => $pages
		];
		$this->load->view('page/v_header', $data);
		$this->load->view('page/v_properties', $data);
		$this->load->view('page/v_footer', $data);
	}
	public function page()
	{
		$slug = $this->uri->segment(2);
		$page = $this->db->get_where('pages', ['slug' => $slug])->row_array();
		$pages = $this->db->get('pages')->result_array();
		$data = [
			'title' => $page['title'],
			'slug'  => $slug,
			'page' => $page,
			'pages' => $pages
		];
		$this->load->view('page/v_header', $data);
		$this->load->view('page/v_single', $data);
		$this->load->view('page/v_footer', $data);
	}
	public function blog()
	{
		$slug = $this->uri->segment(2);
		$blog = $this->db->get_where('blogs', ['slug' => $slug])->row_array();
		$pages = $this->db->get('pages')->result_array();
		$data = [
			'title' => 'Blog',
			'slug'  => $slug,
			'blog' => $blog,
			'pages' => $pages
		];
		$this->load->view('page/v_header', $data);
		$this->load->view('page/v_single', $data);
		$this->load->view('page/v_footer', $data);
	}
}
