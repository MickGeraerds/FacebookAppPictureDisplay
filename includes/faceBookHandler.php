<?php
    require('curl.php');
    class faceBookHandler extends curl {
        private $client_id = "1120654061379519";
        private $app_secret = "422ecadd7cd81cff0cef96d73e286bab";
        
        public function logIn() {            
            
            $id_format = number_format($this->client_id, '0', '.', '');
            
            header('location: https://www.facebook.com/v2.9/dialog/oauth?client_id=' . $this->client_id . '&redirect_uri=http://localhost/facebookApp/index.php&response_type=code&scope=public_profile');
        }
        public function verifyLoggin($code) {
            
            
            $url = 'https://graph.facebook.com/v2.9/oauth/access_token?client_id=' . $this->client_id . '&redirect_uri=http://localhost/facebookApp/index.php&client_secret=' . $this->app_secret . '&code=' . $code;
            
            $accessTokenJson = $this->getContent($url);
            
            
            if(isset($accessTokenJson["error"])) {
                return "something went wrong";
            }
            else {
                $token = $accessTokenJson["access_token"];
                return($this->displayInfo($token));
                
            }
        }
        public function displayInfo($token) {
            $url = 'https://graph.facebook.com/debug_token?input_token=' . $token . '&access_token='.$token.'';
            $userData = $this->getContent($url);
            //return var_dump($userData);
            $img = 'https://graph.facebook.com/v2.9/'.$userData["data"]["user_id"].'/picture';
            $name = 'https://graph.facebook.com/v2.9/'.$userData["data"]["user_id"].'?fields=name&access_token='.$token;
            
            $name = $this->getContent($name);
            
            $userData = array();
            array_push($userData, $img, $name);
            $rendered = '<div id="profile"><div id="name">'.$name["name"].'</div><div id="picture"><img src='.$img.'></div></div>';
            //return(var_dump($userData));
            return($rendered);
        }
    }
?>