<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

    public function index()
    {
        $data['query'] = $this->input->get_post("q");
        $query = urlencode($data['query']);
        $this->load->view('inc/header', $data);
        $this->load->view('query');
        $this->load->view('inc/footer');
    }
}

/* End of file Search.php */
/* Location: ./application/controllers/Search.php */
