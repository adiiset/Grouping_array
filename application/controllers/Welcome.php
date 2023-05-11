<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_welcome');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function get_all()
	{
		$query = $this->m_welcome->get_data()->result_array();
		$result = array();
		foreach ($query as $key => $element) {
			$result[$element['NAMA_OUTLET']][] = $element;
		}
		echo json_encode($query);
	}
}
