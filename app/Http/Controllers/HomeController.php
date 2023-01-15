<?php

namespace App\Http\Controllers;

use App\Models\ListNumber;
use Exception;
use Illuminate\Http\Request;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function sendToRabbitMQ(Request $request)
    {
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();

        $channel->exchange_declare('squared_exchange', 'direct', false, false, false);

        $data = $request->input('integer_value');
        if (empty($data)) {
            $data = 0;
        }
        $msg = new AMQPMessage($data);

        $channel->basic_publish($msg, 'squared_exchange', 'squared_routing_key');

        $channel->close();
        $connection->close();

        return redirect()->route('home.index');
    }

    public function store(Request $request)
    {
        try {
            $response = [
                'status' => true,
                'data' => $request->input('integer_value')
            ];

            return response()->json($response, 200);
        } catch (Exception $e) {
            $response = [
                'status'  => false,
                'message'  => $e
            ];

            return response($response, 500);
        }
    }
}
