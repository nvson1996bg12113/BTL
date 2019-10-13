<?php
  use Ratchet\Server\IoServer;
  use Ratchet\Http\HttpServer;
  use Ratchet\WebSocket\WsServer;
  use App\Http\Controllers\Websocket\WebsoketServer;
  require __DIR__.'/vendor/autoload.php';
  $server = IoServer::factory(
      new HttpServer(
          new WsServer(
              new WebsoketServer()
          )
      ),
      8080
  );
  $server->run();
 ?>
