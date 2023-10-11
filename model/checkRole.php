<?php
class Result {
    public $users;
    public $countCart;
}
    
    function checkRole() {
        $result = new Result();
    
        if(isset($_COOKIE['user'])) {
            $decodedUser = base64_decode($_COOKIE['user']);
            list($userName, $password) = explode(':', $decodedUser);
            
            $userData = pdo_query_one("SELECT * FROM users WHERE users.user_name = '$userName' AND users.password = '$password'");
            if(!empty($userData)) {
                $result->users = $userData;
                $userId = $userData['id'];
                $cartData = pdo_query("SELECT count(id) as count FROM cart WHERE cart.id_user = $userId");
                $result->countCart = $cartData[0]['count'];
            } else {
                $result->users = null;
                $result->countCart = 0;
            }
        } else {
            $result->users = null;
            $result->countCart = 0;
        }
    
        return $result;
    }
