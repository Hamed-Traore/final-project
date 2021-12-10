<?php
require_once 'controllers/functions.php';
require_once 'controllers/DB-connection.php';
use PHPUnit\Framework\TestCase;
class unit_testing extends TestCase{
    public function EmptyInputSignup()
    {
        $run=emptyInputSignup($firstname,$lastname,$phone_number,$email,$password,$conf_password);
        $this->assertTrue($run);
    }
}

?>