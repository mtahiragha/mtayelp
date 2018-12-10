<?php

class Base_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function allAndNew(){
        $sql = "SELECT ";
        $sql .= " (SELECT count(id) from users where is_new=1) as new_users, ";
        $sql .= " (SELECT count(id) from users) as all_users, ";
        $sql .= " (SELECT count(id) from vendors where is_new=1) as new_vendors, ";
        $sql .= " (SELECT count(id) from vendors) as all_vendors, ";
        $sql .= " (SELECT count(id) from products where is_new=1) as new_products, ";
        $sql .= " (SELECT count(id) from products) as all_products, ";
        $sql .= " (SELECT count(id) from orders where is_new=1) as new_orders, ";
        $sql .= " (SELECT count(id) from orders) as all_orders ";

        $query = $this->db->query($sql);
        $result = $query->result_array();
        $result = $result[0];
        // display_array($result);
        // exit;
        return $result;
    }

    function getCities(){
        $sql= "Select sum(revenue) as sum, LOWER(city) as city, sum(orders_placed) as orders from vendors group by city";
        $result = $this->db->query($sql)->result_array();
        return $result;
    }

    function getRevenue(){
        $sql= "Select sum(revenue) as sum from vendors";
        $result = $this->db->query($sql)->result_array();
        return $result;
    }

    function getNotifications(){
        $sql = "SELECT ";
        $sql .= " (SELECT count(id) from users where is_new=1) as new_users, ";
        $sql .= " (SELECT count(id) from vendors where is_new=1) as new_vendors, ";
        $sql .= " (SELECT count(id) from products where is_new=1) as new_products, ";
        $sql .= " (SELECT count(id) from orders where is_new=1) as new_orders ";

        $query = $this->db->query($sql);
        $result = $query->result_array();
        $result = $result[0];
        return $result;
    }

    function diffuseNotification($table, $id){
        $sql= "update $table set is_new=0 where id='{$id}' ";
        $this->db->query($sql);
    }

    function getAdmin($credentials){
        $query = $this->db->get_where('admins', $credentials, 1, 0);
        $result = $query->result_array();
        if( !empty($result) ) { $result= $result[0]; }
        unset($result['password']); 
        // unset($result['id']);
        return $result;
    }

    function getCategories(){
        $this->db->order_by("category", "asc");
        $query = $this->db->get('categories');
        $result = $query->result_array();
        return $result;
    }

    function addCategory($category){
        $category = fixfordb($category);
        $query_check = $this->db->get_where('categories', $category);
        $result_check = $query_check->result_array();
        if( empty($result_check) ){
            $this->db->insert('categories', $category);
            return true;
        }else{
            return false;
        }
        return $category;
    }

    function editCategory($category){
        $category = fixfordb($category);
        $id = $category['id'];
        unset($category['id']);
        $this->db->update('categories', $category, "id=$id");
    }

    function deleteCategory($category_id){
        $this->db->where('id', $category_id);
        $this->db->delete('categories');
    }


    function getUsers(){
        $this->db->order_by("id", "desc");
        $query = $this->db->get('users');
        $result = $query->result_array();
        return $result;
    }
    function getUser($user){
        $query = $this->db->get_where('users', $user);
        $result = $query->result_array();
        return $result;
    }
    function banUser($user_id, $admin_id){
        $this->db->query("UPDATE users SET is_ban=1, banned_by=? where id=?", array($admin_id, $user_id));
        //todo also ban vendor
    }
    function activateUser($user_id, $admin_id){
        $this->db->query("UPDATE users SET is_ban=0, banned_by=? where id=?", array($admin_id, $user_id));
    }

    function createUser($user){
        $response = array("status"=>"0", "message"=> "Something went wrong!");
        $date = gmdate("Y-m-d H:i:s"); // GMT
        if(isset($user['password'])){
            $user["password"] = md5($user["password"]);
        }
        
        $user["created_at"] = $date;
        $user["updated_at"] = $date;

        $array = array( $user['username'], $user['email'] ) ;
        $sql1 = "SELECT id from users where username=? or email=? ";
        if(isset($user['fb_id'])){
            $sql1 .= " or fb_id=? ";
            $array[] = $user['fb_id'];
        }
        $sql1 .= " limit 1 ";

        $query1 = $this->db->query($sql1, $array);
        $result1 = $query1->result_array();


        if(empty($result1)){
            $this->db->insert('users', $user);
            $response['status']=1; $response['message']='User Created.';
        }else{
            $response['message']="User already exists!";
        }

        return $response;
    }


    function getVendors($filter='')
    {
        if($filter=='banned'){
            $this->db->order_by("is_ban", "desc");
        }elseif($filter=='featured'){
            $this->db->order_by("is_featured", "desc");
        }else{
            $this->db->order_by("id", "desc");
        }
        $query = $this->db->get('vendors');
        $result = $query->result_array();
        return $result;
    }
    function getVendor($vendor){
        $query = $this->db->get_where('vendors', $vendor);
        $result = $query->result_array();
        return $result;
    }   
    function approveVendor($vendor_id, $admin_id){
        $this->db->query("UPDATE vendors SET is_approved=1, approved_by=? where id=?", array($admin_id, $vendor_id));
    }
    function banVendor($vendor_id, $admin_id){
        $this->db->query("UPDATE vendors SET is_ban=1, banned_by=? where id=?", array($admin_id, $vendor_id));
        //todo also ban vendor
    }
    function activateVendor($vendor_id, $admin_id){
        $this->db->query("UPDATE vendors SET is_ban=0, banned_by=? where id=?", array($admin_id, $vendor_id));
    }
    function featureVendor($vendor_id, $admin_id){
        $this->db->query("UPDATE vendors SET is_featured=1, featured_by=? where id=?", array($admin_id, $vendor_id));
    }
    function unFeatureVendor($vendor_id, $admin_id){
        $this->db->query("UPDATE vendors SET is_featured=0, featured_by=? where id=?", array($admin_id, $vendor_id));
    }
    function createVendor($vendor, $user){
        $response = array("status"=>"0", "message"=> "Something went wrong!");
        $date = gmdate("Y-m-d H:i:s"); // GMT
        
        
        $vendor["created_at"] = $date;
        $vendor["updated_at"] = $date;

        $array = array( $user['id'] ) ;
        $sql1 = "SELECT id from vendors where user_id=? ";
        $sql1 .= " limit 1 ";

        $query1 = $this->db->query($sql1, $array);
        $result1 = $query1->result_array();


        if(empty($result1)){
            $this->db->insert('vendors', $vendor);
            $vendor_id = $this->db->insert_id();
            $this->db->update('users', array("vendor_id"=>$vendor_id, "is_vendor"=>1), "id={$user['id']}");
            $response['status']=1; $response['message']='Vendor Created.';
        }else{
            $response['message']="User is  already a vendor!";
        }

        return $response;
    }


    function getProducts($vendor_id=0){
        // $this->db->order_by('is_new', 'DESC');
        if($vendor_id){
            $query = $this->db->query("SELECT products.*, vendors.vendor_name FROM products  INNER JOIN vendors on vendors.id = products.vendor_id where products.vendor_id = ? order by products.is_new DESC", array($vendor_id));
            // $query = $this->db->get_where('products', array('vendor_id'=>$vendor_id));
        }else{
            $query = $this->db->query("SELECT products.*, vendors.vendor_name FROM products  INNER JOIN vendors on vendors.id = products.vendor_id  order by products.is_new DESC");
            // $query = $this->db->get('products');
        }
        $result = $query->result_array();
        return $result;
    }
    function getProduct($product_id, $innerJoin=1){
        if($innerJoin){
            $query = $this->db->query("SELECT products.*, vendors.vendor_name FROM products  INNER JOIN vendors on vendors.id = products.vendor_id where products.id = ? ", array($product_id));
        }else{
            $query = $this->db->query("SELECT products.* FROM products  where products.id = ? ", array($product_id));
        }
        
        $result = $query->result_array();
        return $result;
    }
    function createProduct($product){
        $response = array("status"=>"0", "message"=> "Something went wrong!");
        $date = gmdate("Y-m-d H:i:s"); // GMT
        
        
        $product["created_at"] = $date;
        $product["updated_at"] = $date;


        $this->db->insert('products', $product);
        $product_id = $this->db->insert_id();
        $this->db->query("update vendors set products = products + 1 where id=?", array($product['vendor_id']));
        if(!empty($product['categories'])){
            $categories = json_decode($product['categories']);
            foreach($categories as $category){
                $this->db->query("update categories set products = products + 1 where id=?", array($category));
            }
        }
        $response['status']=1; $response['message']='Product Created.';
        

        return $response;
    }



    function getOrders($array = 0){
        $sql = "SELECT orders.*, vendors.vendor_name, users.first_name, users.last_name FROM orders INNER JOIN vendors ON orders.vendor_id = vendors.id INNER JOIN users ON orders.customer_id = users.id ";
        if(is_array($array)){
            $sql .= " where orders.".$array['column']." = '".$array['value']."' ";
        }
        $sql .= " order by orders.is_new desc";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    function getOrder($order_id){
        $sql = "select orders.*, vendors.vendor_name, vendors.phone, users.first_name, users.last_name, users.phone as u_phone, users.email as u_email, order_products.product, order_products.product_id, order_products.quantity as p_quantity, order_products.price as p_price ";
        $sql .= " from orders ";
        $sql .= " inner join vendors on vendors.id = orders.vendor_id ";
        $sql .= " inner join users on users.id = orders.customer_id ";
        $sql .= " inner join order_products on order_products.order_id = orders.id ";
        $sql .= " where orders.id=?  ";

        $query = $this->db->query($sql, array($order_id));
        $result = $query->result_array();
        return $result;

    }
    function createOrder($vendor, $customer, $order, $products_array, $categories, $extra_info){
        $response = array("status"=>"0", "message"=> "Something went wrong!");
        $date = gmdate("Y-m-d H:i:s"); // GMT
        
        
        $order["created_at"] = $date;
        $order['status'] = "pending";

        $this->db->trans_start();
        
        $c = [];
        foreach($categories as $key=>$value){
            $c[] = $key;
            $this->db->query("update categories set orders = orders+1, revenue = revenue+'{$value}' where id = '{$key}' ");
        }
        $order['categories'] = json_encode($c);
        $order['products'] = $extra_info['count_products'];
        $order['quantity'] = $extra_info['count_quantity'];
        $order['total'] = $extra_info['total'];
        $order['city'] = $vendor['city'];
        $order['state'] = $vendor['state'];
        $order['country'] = $vendor['country'];

        

            $this->db->query("update vendors set orders_placed = orders_placed+1, revenue = revenue+'{$order['total']}' where id = '{$vendor['id']}' ");
            $this->db->query("update users set orders_placed = orders_placed+1, expenditure = expenditure+'{$order['total']}' where id = '{$customer['id']}' ");


            $this->db->insert('orders', $order);
            $order_id = $this->db->insert_id();

            $data = [];
            foreach($products_array as $prod){
                $data[] = array(
                    "order_id"=>$order_id,
                    "product_id" => $prod['id'],
                    "quantity" => $prod['quantity'],
                    "product" => json_encode($prod),
                    "price" => $prod['price'],
                    "comments" => $prod['comments']
                );
                //update products orders, revenue
                $this_revenue = $prod['price'] * $prod['quantity'];
                $this->db->query("update products set orders = orders + 1, revenue = revenue+'{$this_revenue}' where id='{$prod['id']}'");
            }
            $this->db->insert_batch('order_products', $data);

    
            

        
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            $response['status']=0; $response['message']='Failed!';
        }else{
            $response['status']=1; $response['message']='Order Created.';
        }

        
        return $response;
    }

}