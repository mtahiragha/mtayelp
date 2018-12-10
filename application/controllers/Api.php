<?php 
require_once(APPPATH.'controllers/Base.php');
class Api extends Base {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('Base_model', 'model');

    }


    public function createUser(){
        $response = array("status" => "0", "message" => "Something went wrong!");
        $user = $this->input->post(NULL, TRUE);
        $user = emptytonull($user);
        $required_fields = ["username", "first_name", "last_name", "email", "gender"];
        if( !empty($user) && checkFields($required_fields, $user) ){
            $response = $this->model->createUser($user);
        }else{
            $response["message"] = "Invalid parameters";
        }

        header('content-type: json');
        echo json_encode($response);
    }

    public function createVendor(){
        $response = array("status" => "0", "message" => "Something went wrong!");
        $vendor = $this->input->post(NULL, TRUE);
        $vendor = emptytonull($vendor);
        $required_fields = ["user_id", "payment_methods"];

        if( !empty($vendor) && checkFields($required_fields, $vendor) ){
            $user = $this->model->getUser(array("id"=>$vendor['user_id']));
            if(empty($user)){
                $response['message']='User not found!';
            }else{
                $user = $user[0];

                //take some from user
                if(!isset($vendor['vendor_name']) || empty($vendor['vendor_name'])){
                    $vendor['vendor_name'] = $user['first_name']." ".$user['last_name'];
                }
                if(!isset($vendor['phone']) || empty($vendor['phone'])){
                    $vendor['phone'] = $user['phone'];
                }

                $response = $this->model->createVendor($vendor, $user);
            }
        }else{
            $response["message"] = "Invalid parameters";
        }

        header('content-type: json');
        echo json_encode($response);
    }

    public function createProduct(){
        $response = array("status" => "0", "message" => "Something went wrong!");
        $product = $this->input->post(NULL, TRUE);
        $product = emptytonull($product);
        $required_fields = ["product", "price", "vendor_id", "description", "categories"];

        if( !empty($product) && checkFields($required_fields, $product) ){
            $vendor = $this->model->getVendor(array("id"=>$product['vendor_id']));
            if(empty($vendor)){
                $response['message']='Vendor not found!';
            }else{
                $vendor = $vendor[0];

                $product['user_id'] = $vendor['user_id'];

                $response = $this->model->createProduct($product);
            }
        }else{
            $response["message"] = "Invalid parameters";
        }

        header('content-type: json');
        echo json_encode($response);
    }

    public function createOrder(){
        $response = array("status" => "0", "message" => "Something went wrong!");
        $order = $this->input->post(NULL, TRUE);
        
        $required_fields = ["vendor_id", "customer_id", "products"];
        $vendor = $this->model->getVendor(array("id"=>$order['vendor_id']));
        $customer = $this->model->getUser(array("id"=>$order['customer_id']));
        
        if( !empty($order) && checkFields($required_fields, $order) && !empty($vendor) && !empty($customer) ){
            $vendor = $vendor[0];
            $customer = $customer[0];

            $products_array = json_decode($order['products']);
            if($products_array){

                $categories=[];
                $count_products = 0;
                $count_quantity = 0;
                $total = 0;

                $sent_products = json_decode($order['products'], true);
                $products_array = [];
                foreach($sent_products as $sp){

                    $key = $sp['product_id'];
                    $value = $sp['quantity'];
                    $comments = ''; 
                    if(isset($sp['comments'])){$comments = $sp['comments'];}

                    $p = $this->model->getProduct(array("id"=>$key), 0);
                    if(empty($p)){
                        echo json_encode(array("status" => "0", "message" => "Illegal Products!"));
                        return;
                        break;
                    }else{
                        $p =$p[0];
                        $p['quantity'] = $value;
                        $p['comments'] = $comments;
                        $products_array[] = $p;

                        // set categories information; (revnue) to update categories table after insertion
                        foreach(json_decode($p['categories']) as $c){
                            if(isset($categories[$c])){
                                $categories[$c] = $categories[$c] + ($value*$p['price']);
                            }else{
                                $categories[$c] =  ($value*$p['price']);
                            }
                        }

                        $count_products++;
                        $count_quantity = $count_quantity+$value;
                        $total = $total + ($value*$p['price']);
                    }
                } //foreach
                
                $extra_info = array(
                    "count_products" => $count_products,
                    "count_quantity" => $count_quantity,
                    "total" => $total
                );

                $response = $this->model->createOrder($vendor, $customer, $order, $products_array, $categories, $extra_info);
                
            }else{
                $response['message']='Improper products.';
            }
        }else{
            $response["message"] = "Invalid parameters";
        }

        header('content-type: json');
        echo json_encode($response);
    }
}