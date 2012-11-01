<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curl extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index(){
		$this->lister();
	}
	public function lister()
	{
		$this->load->model("m_liens");
		
		$data['liens'] = $this->m_liens->get_liens();
		
		$data['vue']=$this->load->view('lister', $data,true);
		$this->load->view('vue',$data);
	}
	
	
	public function afficher(){
		
		
		
		$url=$this->input->post('liens');
		
		$cl = curl_init();
		curl_setopt($cl, CURLOPT_URL, $url);
		curl_setopt ($cl, CURLOPT_RETURNTRANSFER, 1);				
		$html= curl_exec($cl);
		curl_close ($cl);
		
		$dom = new DomDocument();
		@$dom -> loadHtml($html);
	
		$titre = $dom->getElementsByTagName('title')->item(0)->nodeValue;
		
		$nodes = $dom ->getElementsByTagName('meta');
	
		foreach($nodes as $node)
		{
		    if(strtolower($node->getAttribute("name"))=="description")
		    {
			$description = $node->getAttribute('content');
		    }
		}
	
		$nodes = $dom -> getElementsByTagName('img');
	
		foreach($nodes as $node)
		{
			if(preg_match('#http#', $node->getAttribute('src')))
			{
			    $images[] = $node->getAttribute('src');
			}
			else
			{
			    $images []= $url.$node->getAttribute('src');
			}
		}
		$data['url'] = $url;
		$data['titre'] = $titre;
		$data['description'] = $description;
		$data['images'] = $images;
		
	
		
		
		
		$data['vue']=$this->load->view('afficher', $data,true);
		$this->load->view('vue',$data);
		
		
		
		}
		public function ajouter(){
			
			$data['title']=$this->input->post('tr');
			$data['meta']=$this->input->post('des');
			$data['url']=$this->input->post('url');
		
			$this->load->model("m_liens");
			
			$this->m_liens->create($data);
			redirect('curl/lister');
			
			
		}
		public function supprimer(){
			
			$data['id_lien']=$this->input->post('id_lien');
			$this->load->model("m_liens");
			
			$this->m_liens->delete($data);
			redirect('curl/lister');
		}
		public function modifier(){
			$data['title']="modif titre";
			$data['meta']="modif meta";
			$data['url']="modif url";
			$data['lien_id']="73";
		
			$this->load->model("m_liens");
			
			$this->m_liens->update($data);
			redirect('curl/lister');
		}
}

