<?php 
require_once(APPPATH.'controllers/admin/Admin_base.php');
class Login extends Admin_base {

    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
    }

    public function index(){
        if(!empty($this->data['admin'])){
            redirect('admin');
            exit;
        }

        $credentials = $this->input->post(NULL, TRUE);
        if(!empty($credentials)){
            $admin = $this->getAdmin($credentials);
            if($admin){
                $this->session->set_userdata(array("admin"=>$admin));
                redirect('admin');
                return;
                exit;
            }else{
                $this->data['error']= 'Invalid credentials';
            }
        }
        $this->load->view('admin/login', $this->data);
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('admin');
    }



    //private functions

    private function getAdmin($credentials){
        $credentials['password'] = md5($credentials['password']);
        $result = $this->model->getAdmin($credentials);
        return $result;
    }

}