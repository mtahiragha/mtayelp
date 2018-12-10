<?php 
require_once(APPPATH.'controllers/admin/Admin_base.php');
class Dashboard extends Admin_base {

    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
            $this->check_session();
            $this->data['categories'] = $this->getCategories();
            // $this->data['notifications'] = $this->getNotifications();
    }

    public function index(){
        $this->data['title'] = "Dashboard";
        $this->data['allAndNew'] = $this->model->allAndNew();

        $barData1 = []; $barData2 = [];
        foreach($this->data['categories'] as $c){
            $array=array(
                "y" => $c['category'],
                "a" => $c['orders']
            );
            $barData1[] = $array;

            $array=array(
                "y" => $c['category'],
                "a" => $c['revenue']
            );
            $barData2[] = $array;
        }
        $this->data['barData1'] = json_encode($barData1);
        $this->data['barData2'] = json_encode($barData2);

        $cities = $this->model->getCities();

        $barData3 = []; $barData4 = [];
        foreach($cities as $c){
            $array=array(
                "y" => $c['city'],
                "a" => $c['orders']
            );
            $barData3[] = $array;

            $array=array(
                "y" => $c['city'],
                "a" => $c['sum']
            );
            $barData4[] = $array;
        }
        $this->data['barData3'] = json_encode($barData3);
        $this->data['barData4'] = json_encode($barData4);

        $revenue = $this->model->getRevenue()[0];
        $this->data['revenue'] = $revenue['sum'];

        $this->data['scripts'] = array('morris');
        $this->load->view('admin/dashboard', $this->data);
    }

    public function categories(){
        $form = $this->input->post(NULL, TRUE);
        if( !empty($form) ){
            if( isset($form['id']) ) {
                $this->model->editCategory($form);
            }else{
                $this->addCategory($form);
            }
            
        }
        $this->data['title'] = "Categories";
        $this->data['categories'] = $this->getCategories();
        $this->data['categories_markup'] = $this->getCategories(1);
        
        $this->data['create_edit_title'] = "Create Category";

        $edit = $this->input->get(NULL, TRUE);
        if(isset($edit['edit']) && isset($edit['category']) && isset($edit['parent']) ){
            $category = urldecode($edit['category']);
            $this->data['edit'] = $edit;
            $this->data['create_edit_title'] = "Edit: ".ucwords($category);
        }
        $this->data['scripts'] = array('modal', 'tree');
        $this->load->view('admin/categories', $this->data);
    }

    public function users(){
        
        $this->data['title'] = "Users";
        $this->data['users'] = $this->getUsers();
        

        $this->data['scripts'] = array('modal', 'datatables');
        $this->load->view('admin/users', $this->data);
    }

    public function editUser($user_id){
        $user = $this->getuser(array("id"=>$user_id));
        if(empty($user)){redirect(base_url('admin'));}

        $this->data['title'] = "Profile";
        $this->data['scripts'] = array('modal');

        $this->data['user'] = $user;        
        $this->data['orders'] = $this->getOrders(array("column"=>"customer_id", "value"=>$user_id));
        $this->load->view('admin/users/editUser', $this->data);
    }

    public function vendors($filter='all'){
        if(!in_array($filter, array('all', 'banned', 'featured')) ){$filter='all';}

        $this->data['title'] = "Vendors";
        $this->data['vendors'] = $this->getVendors($filter);
        

        $this->data['scripts'] = array('modal', 'datatables');
        $this->load->view('admin/vendors', $this->data);
    }

    public function editVendor($vendor_id){
        $vendor = $this->getVendor(array("id"=>$vendor_id));
        if(empty($vendor)){redirect(base_url('admin'));}

        $this->data['title'] = "vendor Profile";
        $this->data['scripts'] = array('modal');

        $this->data['vendor'] = $vendor;        
        $this->data['orders'] = $this->getOrders(array("column"=>"vendor_id", "value"=>$vendor_id));
        $this->load->view('admin/vendors/editVendor', $this->data);
    }


    public function products($vendor_id=0){
        $products = $this->model->getProducts($vendor_id);
        $this->data['vendor'] = [];
        // display_array($products);exit;

        $this->data['title'] = "Products";
        if($vendor_id){
            $this->data['vendor'] = $this->getVendor(array("id"=>$vendor_id));
            $this->data['title'] = "Products: ".$this->data['vendor']['vendor_name'];
        }
        $this->data['products'] = $products;
        $this->data['scripts'] = array('modal', 'datatables');

        $this->load->view('admin/products', $this->data);
    }


    public function product($product_id){
        $product = $this->model->getProduct(array("id"=>$product_id));
        if(empty($product)){redirect(base_url('admin'));return;exit;}
        $product = $product[0];
        

        $this->data['title'] = "Product";
        $this->data['product'] = $product;
        $this->data['scripts'] = array('modal');

        $this->load->view('admin/products/editProduct', $this->data);
    }


    public function orders(){
        $this->data['title'] = "Orders";
        $this->data['orders'] = $this->getOrders();
        

        $this->data['scripts'] = array('modal', 'datatables');
        $this->load->view('admin/orders', $this->data);
    }
    public function editOrder($order_id){

        $order = $this->getOrder(array("id"=>$order_id));
        if(empty($order)){redirect(base_url('admin'));}

        $this->data['title'] = "Order";
        $this->data['scripts'] = array('modal');

        $this->data['order'] = $order;        
        $this->load->view('admin/orders/editOrder', $this->data);
    }


    // ^^^^^^^^^^^^^^^^PAGES^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

    public function getNotifications(){
        $result = $this->model->getNotifications();
        if($this->input->is_ajax_request()){
            echo json_encode($result);
        }else{
            return $result;
        }
    }
    public function diffuseNotification(){
        $table = $this->input->post('from');
        $id = $this->input->post('which');
        if(in_array($table, array('users', 'vendors', 'products', 'orders'))){
            $this->model->diffuseNotification($table, $id);
        }
    }

    public function banUser($user_id){
        $this->model->banUser($user_id, $this->data['admin']['id']);
        redirect(base_url('admin/dashboard/editUser/'.$user_id));
    }
    public function activateUser($user_id){
        $this->model->activateUser($user_id, $this->data['admin']['id']);
        redirect(base_url('admin/dashboard/editUser/'.$user_id));
    }

    public function addCategory($category){
        if(!empty(trim($category['category']))){
            $result = $this->model->addCategory($category);
        }
    }
    public function deleteCategory($category_id){
        $this->model->deleteCategory($category_id);
        redirect(base_url('admin/dashboard/categories'));
    }

    public function approveVendor($vendor_id){
        $this->model->approveVendor($vendor_id, $this->data['admin']['id']);
        redirect(base_url('admin/dashboard/editVendor/'.$vendor_id));
    }
    public function banVendor($vendor_id){
        $this->model->banVendor($vendor_id, $this->data['admin']['id']);
        redirect(base_url('admin/dashboard/editVendor/'.$vendor_id));
    }
    public function activateVendor($vendor_id){
        $this->model->activateVendor($vendor_id, $this->data['admin']['id']);
        redirect(base_url('admin/dashboard/editVendor/'.$vendor_id));
    }
    public function featureVendor($vendor_id){
        $this->model->featureVendor($vendor_id, $this->data['admin']['id']);
        redirect(base_url('admin/dashboard/editVendor/'.$vendor_id));
    }
    public function unFeatureVendor($vendor_id){
        $this->model->unFeatureVendor($vendor_id, $this->data['admin']['id']);
        redirect(base_url('admin/dashboard/editVendor/'.$vendor_id));
    }

    


    //private functions
    protected function getCategories($markup=0){
        $categories = $this->model->getCategories();
        if($markup){
            $tree =  nested2ul($categories);
            return $tree;
        }else{
            return $categories;
        }
        
        exit;
    }
    protected function getUsers(){
        $users = $this->model->getUsers();
        return $users;
    }
    protected function getUser($user){
        $user = $this->model->getuser($user);
        if(!empty($user)){
            $user = $user[0];
            unset($user['password']);
        }

        return $user;
    }
    
    protected function getVendors($filter){
        return $this->model->getVendors($filter);    
    }
    protected function getVendor($vendor){
        $vendor = $this->model->getvendor($vendor);
        if(!empty($vendor)){
            $vendor = $vendor[0];
        }
        return $vendor;
    }
    
    protected function getOrders($array=0){
        $users = $this->model->getOrders($array);
        return $users;
    }
    protected function getOrder($order){
        return $this->model->getOrder(array("id"=>$order['id']));
    }

}