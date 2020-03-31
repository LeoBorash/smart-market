<?php

class Login extends Connect
{
    private function checkLog($log)
    {
        $stmt = $this->connectToDb()->query("
        SELECT * FROM clients WHERE client_name = '$log'");

        $count = $stmt->rowCount();
        if($count > 0) {
            return true;
        }else{
            return false;
        }
    }
    private function checkPass($pass){
        $stmt = $this->connectToDb()->query("
        SELECT * FROM clients WHERE client_name = '$pass'");
        while ($row = $stmt->fetch($stmt)){

        }
    }

    public function goAuth($log,$pass){
        if($this->checkLog($log)){
            echo 'Такой чел есть';
        }else{
            return false;
        }
    }
}