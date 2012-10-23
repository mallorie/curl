<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curl extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->model("m_liens");
		
		$data['liens'] = $this->m_liens->get_liens();;
		
		$this->load->view('vue', $data);
	}
	public function lister(){
		
		
	}
	public function voir(){
		
	}
	public function ajouter(){
	$data=$this->input->post('liens');
	
	$this->load->model("m_liens");
	$data= array();
	$data['url']='http://www.journaldugeek.com/';
	$data['title']='Le Journal du Geek - JDG Network';
	$data['images']='http://www.journaldugeek.com/files/2012/10/i_blogp';
	$data['meta']='Le Journal du Geek se veut seulement et simplement...';
	$data['membre_id']='1';
	
	$this->m_liens->create($data);
	
	
	
	
	
	}
}

