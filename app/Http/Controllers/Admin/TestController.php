<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use InfluxDB;
// use Curl;


class TestController extends Controller
{
    public function test(Request $request){
        try{
            $host = 'localhost';
            $port = 8086;
            $client = new InfluxDB\Client($host, $port);
            $database = $client->selectDB('testdb');
            
            $points = array(
                new InfluxDB\Point(
                    'cpu',
                    0.66,
                    ['host'=>'serverA','region'=>'us_west'],
                    ['cpucount' => 10],
                    strtotime('now')
                )
            );
            $database->writePoints($points,InfluxDB\Database::PRECISION_SECONDS);

            $result = $database->query('select * from cpu LIMIT 8');
            // $result = $database->
            print_r(json_encode($result->getPoints()));
        }catch(\Exception $e){
            return response($e->getMessage(),500);
        }
    }
}
