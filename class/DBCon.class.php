<?php
class DBCon{

 //PDO连接Mysql数据库
 public $HOST; //数据库地址
 public $DBNAME; //数据库用户名
 public $DBPASSWORD;  //数据库密码

 public $myPdo; //pdo对象
 public $myStm; //stm对象

    public function __construct(){
        $this->HOST = "mysql:host=localhost:3306;dbname=vote"; //设置数据库地址
        $this->DBNAME = "vote"; //设置数据库用户名
        $this->DBPASSWORD ="662425"; //设置数据库密码
        $this->myPdo = new PDO($this->HOST,$this->DBNAME,$this->DBPASSWORD);
        $this->myPdo->exec("set names utf8");
    }

    public function executeQuery($sql){
        $this->myStm = $this->myPdo->prepare($sql);
        $this->myStm->execute();
        $rows = $this->myStm->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    

    public function executeUpdate($sql){
        $this->myStm = $this->myPdo->prepare($sql);
        return $this->myStm->execute();
    }
}
