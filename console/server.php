<?php
Class Test{
    public $index = 18;
}

Class Server {

    private $server;

    public $test;
    public function __construct()
    {
        $this->server = new swoole_server('0.0.0.0', 9501);
        //设置swoole_server
        $this->server->set([
            'worker_num' => 8,
            'max_request' => 10000,
            'deamonize' => false,
            'task_worker_num' => 8,
        ]);

        $this->server->on('Start', [$this, 'onStart']);
        $this->server->on('Connect', [$this, 'onConnect']);
        $this->server->on('Receive', [$this, 'onReceive']);
        $this->server->on('Close', [$this, 'onClose']);
        $this->server->on('Task', [$this, 'onTask']);
        $this->server->on('Finish', [$this, 'onFinish']);

        $this->server->start();

    }

    public function onStart($server) {
        echo "Start\n";
    }
    //返回数据 在建立连接 $fd描述符
    public function onConnect($server, $fd, $from_id) {
        $server->send($fd, "建立连接 {$fd}");
    }

    public function onReceive(swoole_server $server, $fd, $from_id, $data) {
        $data  = [
            'task' => 'task_demo',
            'params' => $data,
            'fd' => $fd
        ];

        $this->test = new Test();

        var_dump($this->test);
        //投递任务
        $server->task(serialize($this->test));


//        echo "客户端发送过来的消息是{$fd}:{$data}\n";
//        $server->send($fd, $data);
    }

    public function onTask($server, $task_id, $from_id, $data)
    {
        //$data = json_decode($data, true);
        $data = unserialize($data);

        $data->index = 22;

        var_dump($data);

        var_dump($this->test);
//        echo "接受Task:{$data['task']}\n";

//        $server->send($data['fd'] , "接受到数据Success");
        return "Finished";
    }

    public function onFinish($server, $task_id, $data)
    {
        var_dump($this->test);
        echo "Task {$task_id} finish\n";

        echo "完成:{$data}\n";
    }
    public function onClose($server, $fd, $from_id)
    {
        echo "关闭{$fd}客户端请求";
    }
}
//为同步阻塞
$server = new Server();