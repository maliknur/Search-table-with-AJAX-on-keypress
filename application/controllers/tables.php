<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tables extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Table');
		 $this->load->helper("url");
        $this->load->library("pagination");

	}

	public function index()
	{
		$this->load->view('index');
	}


	public function index_html()
	{

		$config = array();
        $config["base_url"] = base_url() . "tables/index_html";
        $config["total_rows"] = $this->Table->record_count();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;


         $this->pagination->initialize($config);	


		$data['tables'] = $this->Table->all();

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->Table->
            fetch_rows($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

         $this->load->view("partials/posts", $data);
	}

	public function search()
	{
		$config = array();
	    $config["base_url"] = base_url() . "/tables";
        // $config["base_url"] = base_url() . "/";
        $config["total_rows"] = $this->Table->record_count();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;



		$name = $this->input->post();
		$first_name = $name['first_name'];

		

		$data['results'] = $this->Table->search($config["per_page"], $page, $first_name);
		  $data["links"] = $this->pagination->create_links();

		  if(!empty($data))
		  {
	     	
		  $this->load->view("partials/posts", $data);
		   
		  } 
	}

	public function from($from)
	{
		$config = array();
	    $config["base_url"] = base_url() . "/tables/";
        // $config["base_url"] = base_url() . "/";
        $config["total_rows"] = $this->Table->record_count();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['results'] = $this->Table->from($config["per_page"], $page, $from);

	  	$data["links"] = $this->pagination->create_links();
	
	  	$this->load->view("partials/posts", $data);

	}

	public function to($to)
	{
		$config = array();
	    $config["base_url"] = base_url() . "/tables";
        // $config["base_url"] = base_url() . "/";
        $config["total_rows"] = $this->Table->record_count();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['results'] = $this->Table->to($config["per_page"], $page, $to);

		$data["links"] = $this->pagination->create_links();
	     	
		$this->load->view("partials/posts", $data);
		 

		}

		public function fromto($from, $to)
		
		{
		$config = array();
	    $config["base_url"] = base_url() . "/tables";
        // $config["base_url"] = base_url() . "/";
        $config["total_rows"] = $this->Table->record_count();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['results'] = $this->Table->fromto($config["per_page"], $page, $from, $to);

		$data["links"] = $this->pagination->create_links();

		$this->load->view("partials/posts", $data);

		}


	public function dates()
	{
		$date = $this->input->post();
		if(!empty($date['to']))
		{
			$to = $date['to'];
			$this->session->set_userdata('to', $to);
			echo "to";

		} 
		else{
			$from = $date['from'];
			$this->session->set_userdata('from', $from);
			echo "from";
		}



		if(!empty($this->session->userdata('from')) && empty($this->session->userdata('to')))
		{	$from = $this->session->userdata('from');
			$this->from($from);		
		}

		if(empty($this->session->userdata('from')) && !empty($this->session->userdata('to')))
		{	
			$to = $this->session->userdata('to');
			$this->to($to);		
		}

		if(!empty($this->session->userdata('from')) && !empty($this->session->userdata('to')))
		{	
			$from = $this->session->userdata('from');
			$to = $this->session->userdata('to');
			$this->fromto($from, $to);
		}

	}

}