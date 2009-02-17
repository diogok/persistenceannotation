<?
    class Tester {
        
        public $class ;
        public $obj ;
        
        function __construct($obj = null) {
            $this->obj = $obj ;
            $this->class = get_class($obj);
        }
        
        function test($function,$result,$param1=null,$param2=null,$param3=null,$param4=null,$param5=null) {
            $param_arr = array($param1,$param2,$param3,$param4,$param5);
            if(is_object($this->obj)) 
              $r = $this->obj->$function($param1,$param2,$param3,$param4,$param5);
            else
              $r = call_user_func_array(array($this->class,$function), $param_arr);
              
            if($r === $result) {
              //echo '<br>PASSED for '.$function.' on '.$this->class;var_dump($r);
            } else {
                echo "FAILED $function on ".$this->class." on test at line <b>".xdebug_call_line()."</b>";
                $args = func_get_args();
                var_dump($args);
                var_dump($this->obj);
                var_dump($r);
                //throw new exception ;
                exit ;
            }
        }
    }
?>