<?
require_once 'annotations/annotations.php';
require_once 'Persistence.class.php';
class PersistenceAnnotation {

    private $classes ;
    private $dsn ;
    private $user ;
    private $pass ;
    private $dialect="sql";
    private $config = array() ;

    function __construct($dsn=null,$user=null,$pass=null) {
        $this->dsn = $dsn ;
        $this->user = $user;
        $this->pass = $pass ;
        $config['connection'] = array(
                'dsn' => $this->dsn,
                'username' => $this->user,
                'dialect' => $this->dialect,
                'password' => $this->pass
                ) ;
        $this->config = $config ;
    }

    function addClass($class) {
        $this->classes[] = $class; 
        return $this ;
    }

    function getConfig() {
        $config = $this->config ;
        for($i=0;$i<count($this->classes);$i++) {
            $class = $this->classes[$i];
            $config['classes'][$class] = $this->getClass($class);
        }
        return $config ;
    }

    function getClass($class) {
       $config = array();
       $reflection = new ReflectionAnnotatedClass($class);
       $config['table'] = $reflection->getAnnotation("Persistence")->gettable() ;
       $properties = $reflection->getProperties();
       if(count($properties) >= 1)
       foreach($properties as $property) {
           $prop = $this->getProperty($property);
           if($prop === false) continue ;
           else if(is_array($prop['props'])) $config['props'][$property->name] = $prop['props'];
           else if(is_array($prop['associations'])) $config['associations'][] = $prop['associations'];
       }
       return $config ;
    }

    function getProperty($property) {
       if(!$property->hasAnnotation("Persistence")) return false;

       $persistence = $property->getAnnotation("Persistence");
       if($persistence->isAssociation())  {
        $props['associations'] = array($persistence->getType(),$persistence->getColumn(),$persistence->getProps());
       } else {
        $props['props'] = array($persistence->getColumn(),$persistence->getType(),$persistence->getProps());
       }
       return $props;
    }
}
?>
