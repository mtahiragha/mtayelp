<?php 
require_once(APPPATH.'controllers/Base.php');
class Admin_base extends Base {

    public $data;
    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
            $this->data =[];
            $this->data['permissions'] = array(
                "create_admins",
                "edit_admins",
                "view_admins"
            );
            $this->load->model('base_model', 'model', TRUE);

            //set admin globally if logged in
                $admin = $this->session->userdata('admin');
                if(!empty($admin)){
                    $this->data['admin'] = $admin;
                }
            //--------------------------------
    }

    public function check_session(){
        
        if(empty($this->data['admin'])){
            redirect('admin/login');
            return false;
            exit;
        }
        return true;
    }

    protected function getCategories(){
        $categories = $this->model->getcategories();
    }

}