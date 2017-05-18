<?php
    class curl {
        public function getContent($url) {
            
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_TIMEOUT, 5);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($curl, CURLOPT_POST, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
            //return(var_dump( curl_getinfo($curl)) . '<br/><br/>');
            $data = curl_exec($curl);
            if(curl_exec($curl) === false) {
                echo 'Curl error: ' . curl_error($curl);
                die();
                }
            curl_close($curl);
            
            $decodedData = json_decode($data, true);
            return $decodedData;
        }
    }
?>