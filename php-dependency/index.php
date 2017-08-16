<?php
    include_once "vendor/autoload.php";

    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    $log = new Logger('name');
    $log->pushHandler(new StreamHandler('mylog.log',Logger::WARNING));

    $log->warning('I warned you!');
    $log->error('I errored you!');

    class TestMe {
        private $var1;
        public function returnSomething()
        {
            return 'something';
        }
    }
?>