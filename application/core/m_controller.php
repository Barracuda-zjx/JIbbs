<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        
        //$this->output->enable_profiler(TRUE);
        //ȫ�ִ�����վ��������
        //$this->load->model('site_m');
        //$site_settings = $this->site_m->get_site_settings();
        //$this->load->vars($site_settings);
    }
}

class Front_Controller extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        //�����û��顢��������������
        /*if ($this->session->userdata('uid')) {
            $this->db->where('uid', $this->session->userdata('uid'));
            $query = $this->db->get('letsbbs_user');
            $user_info = $query->row_array();
            $this->session->set_userdata('notification', $user_info['notice']);
            $this->session->set_userdata('group_id', $user_info['group_id']);
            $this->session->set_userdata('is_active', $user_info['is_active']);
        }*/
    }
}

class Admin_Controller extends Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        //admin���ʿ���
        //$this->load->helper('auth');
        //is_admin_exit();
    }
}



?>