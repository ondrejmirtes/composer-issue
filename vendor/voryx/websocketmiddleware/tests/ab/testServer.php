<?php

use Ratchet\RFC6455\Messaging\Message;
use React\EventLoop\Factory;
use React\Http\Server;
use Voryx\WebSocketMiddleware\WebSocketConnection;
use Voryx\WebSocketMiddleware\WebSocketMiddleware;

require __DIR__ . '/../../vendor/autoload.php';

$loop = Factory::create();

$ws = new WebSocketMiddleware([], function (WebSocketConnection $conn) {
    $conn->on('message', function (Message $message) use ($conn) {
        $conn->send($message);
    });
}, [], \Voryx\WebSocketMiddleware\WebSocketOptions::getDefault()->withPermessageDeflate());

$server = new Server($loop, $ws);

$server->listen(new \React\Socket\Server('0.0.0.0:4321', $loop));

$loop->run();

