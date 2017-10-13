<?php

/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2015 Fuel Development Team
 * @link       http://fuelphp.com
 */
include_once("ip_api.php");
require_once('screenshots/shot.php');
class Controller_Home extends Controller {

    public function action_index() {
    	
        if (Input::method() == "POST") {

            // checa chatpcha
            if (Session::get("captcha_code") != Input::post("captcha")) {

                $return = array("title" => "Error",
                    "msg" => "Wrong Captcha. Please type the numbers exactly as they appear on the image.",
                    "reset" => false
                );

                echo json_encode($return);
                
            } else {

                if ( !$usuario = Model_User::find_by_email(Input::post('email') ) ){
                    $usuario = new Model_User();
                }
                
                if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                	$ip = $_SERVER['HTTP_CLIENT_IP'];
                } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                } else {
                	$ip = $_SERVER['REMOTE_ADDR'];
                }
                    

                $query = IPAPI::query($ip); // ip do usuario

                $usuario->email = Input::post('email');
                $usuario->ip = $ip;
                $usuario->country = $query->country;
                $usuario->country_code = $query->countryCode;
                $usuario->region = $query->region;
                $usuario->region_name = $query->regionName;
                $usuario->city = $query->city;
                $usuario->zip = $query->zip;
                $usuario->lat = $query->lat;
                $usuario->lon = $query->lon;
                $usuario->timezone = $query->timezone;
                $usuario->isp = $query->isp;
                $usuario->org = $query->org;
                $usuario->as = $query->as;
                $usuario->last_update = date("Y-m-d H:i:s");

                //$usuario_salvo = $usuario->save();

                // cria item na lista de trabalho
                $item = new Model_Queue();
                //$item->user = $usuario;
                $item->url = Input::post('url');
                $item->date_time = date("Y-m-d H:i:s");
                $item->email_sent = false;
                $item->processed = false;

                //$item_salvo = $item->save();
                
                $usuario->downloads[] = $item;

                if ($usuario->save()) {
                    
                    $return = array("title" => "Success",
                        "msg" => "Your request has been successfully sent and will be processed soon.<br>Keep checking your emails.",
                        "reset" => true
                    );
                } else {
                    $return = array("title" => "Error",
                        "msg" => "There was an error while processing your request. Please return back later.",
                        "reset" => true
                    );
                }
                echo json_encode($return);
            }
        } else {
            return Response::forge(View::forge('home/index'));
        }
    }
    
    public function action_getImageTemplate() {

        $imagem = new \Screenshot(\Input::get('url'));
        $imagem->create();
                
        die();
    }

}


