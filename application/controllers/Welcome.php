<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		$this->load->view('welcome_message');
	}

	public function users() {

		$this->load->model('user_model');

		$info = $this->user_model->get_users();
		if ($info) {
			foreach ($info as $row) {
				echo $row->id;
				echo '<br>';
				echo $row->name;
				echo '<br>';
				echo $row->email;
				echo '<br>';
				echo $row->counrty;
				echo '<br>';

			}
		} else {
			return 'no users';
		}

	}
}
