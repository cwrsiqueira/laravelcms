<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visitor;

class HomeController extends Controller
{
    public function index() {

        // PEGAR O IP E A PÁGINA ACESSADA E SALVAR NO BANCO DE DADOS
        // Function to get the client IP address
        function get_client_ip() {
            $ipaddress = '';
            if (isset($_SERVER['HTTP_CLIENT_IP']))
                $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
            else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_X_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
            else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_FORWARDED'];
            else if(isset($_SERVER['REMOTE_ADDR']))
                $ipaddress = $_SERVER['REMOTE_ADDR'];
            else
                $ipaddress = 'UNKNOWN';
            return $ipaddress;
        }
        $ipUser = get_client_ip();

        $lastPage = Visitor::where('ip', $ipUser)->orderBy('updated_at', 'DESC')->first();
        $lastAccess = Visitor::where('ip', $ipUser)->orderBy('updated_at', 'DESC')->first('updated_at');
        $timeLimit = date('Y-m-d H:i:s', strtotime($lastAccess['updated_at'].'+5 minutes'));

        if (empty($lastPage) || $lastPage['page'] != 'home' || $lastAccess >= $timeLimit) {
            $visitor = new Visitor;
            $visitor->ip = $ipUser;
            $visitor->page = 'home';
            $visitor->save();
        }

        // ------
        // ------

        return view('site.home');
    }
}
