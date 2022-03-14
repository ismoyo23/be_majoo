<?php
class curl extends CI_Model{

    function curl($routes, $data){
            // API URL to send data
            $url = $this->config->item('URL_API').$routes;

            // curl initiate
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);

            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

            // SET Method as a POST
            curl_setopt($ch, CURLOPT_POST, 1);

            // Pass user data in POST command
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Execute curl and assign returned data
            $response  = curl_exec($ch);

            // Close curl
            curl_close($ch);

            // See response if data is posted successfully or any error
            
            return json_decode($response);

        }
    }

?>