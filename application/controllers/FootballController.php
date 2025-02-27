<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FootballController extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Football";
        $this->load->view('frontend/football', $data);
    }

    public function getStandings($code)
    {
        $url = 'https://api.football-data.org/v4/competitions/' . $code . '/standings';
        $apiKey = '060bd2a2bbe841acaaf3663860a21403';
        $options = [
            "http" => [
                "header" => "X-Auth-Token: $apiKey"
            ]
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        echo $response;
    }

    public function getFinishedMatches($code)
    {
        $url = 'https://api.football-data.org/v4/competitions/' . $code . '/matches?status=FINISHED';
        $apiKey = '060bd2a2bbe841acaaf3663860a21403';
        $options = [
            "http" => [
                "header" => "X-Auth-Token: $apiKey"
            ]
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        echo $response;
    }
    public function getJadwal($code)
    {
        $url = 'https://api.football-data.org/v4/competitions/' . $code . '/matches?status=SCHEDULED';
        $apiKey = '060bd2a2bbe841acaaf3663860a21403';
        $options = [
            "http" => [
                "header" => "X-Auth-Token: $apiKey"
            ]
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        echo $response;
    }
}
