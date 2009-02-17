<?
class AnnotationRecord {

    function setTableDefinition() {
        $configer = new PersistenceAnnotation('mysql:host=localhost;dbname=libhertz','admin','123') ;
        $configer->addClass(get_class($this));
        $config = $configer->getClass(get_class($this));
        $this->setTableName($config['table']);
    }

    function setUp() {
        $configer = new PersistenceAnnotation('mysql:host=localhost;dbname=libhertz','admin','123') ;
        $configer->addClass(get_class($this));
        $config = $configer->getClass(get_class($this));
    }
}
?>
