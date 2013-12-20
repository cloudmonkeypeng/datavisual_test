<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){

		$this->load->database();

		$this->load->model('guarantee_circle');

		$data['client'] = $this->guarantee_circle->get_client_info();

		$this->load->view('welcome_message',$data);

		$this->db->close();
	}


	public function force_collapsible(){

		$this->load->view('force_collapsible');
	}


	public function pie_chart(){

		$this->load->database();

		$this->load->model('guarantee_circle');

		$client_amount = $this->guarantee_circle->get_each_client_amount();

		$data['data_array'] = '';

		foreach ($client_amount as $row) 
			$data['data_array'] = $data['data_array'].'{client_name:"'.$row['client_name']
			.'",amount:'.$row['amount'].'},';

		$this->load->view('pie_chart',$data);
	}


	public function hello_world(){

		$this->load->view('hello_world');
	}

	public function bar_graph(){

		$this->load->view('bar_graph');
	}

	public function circle(){

		$this->load->view('circle');
	}

	public function ox(){

		$this->load->view('ox');
	}

	public function chord_diagram(){

		$this->load->database();

		$this->load->model('guarantee_circle');

		//还没加数据呢

		$this->load->view('chord_diagram');
	}

	public function force_directed(){

		$this->load->view('force_directed');
	}

	public function svg_test(){

		$this->load->view('svg_test');
	}

	public function drag_zoom(){

		$this->load->view('drag_zoom');
	}

	public function draggable_network(){

		$this->load->view('draggable_network');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */