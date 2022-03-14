<?php
class curl_get extends CI_Model{

    function curl_get($token, $route){
        $curl = curl_init($this->config->item('URL_API').$routes);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        /* set the content type json */
            $headers = [];
            $headers[] = 'Content-Type:application/json';
            $headers[] = "Authorization:".$token;

        //for debug only!
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;

        }
    }

?>