<?
class Persistence extends Annotation {
    
    public $table ;
    public $column ;
    public $type = "varchar" ;
    public $props =null; 

    protected function checkConstraints($target){
        $this->target = $target ;
    }

    public function getTable() {
        if($this->table == null and $this->value != null) {
            $this->table = $this->value ;
        }if($this->table == null) {
            $this->table = $this->target->name ;
        }
        return $this->table ;
    }

    public function getColumn() {
        if($this->column == null and $this->value != null) {
            $this->column = $this->value ;
        }else if($this->column == null) {
            $this->column = $this->target->name ;
        }
        return $this->column ;

    }

    public function getType() {
        return $this->type ;
    }

    public function getProps() {
        return $this->props ;
    }

    public function isAssociation() {
       if(!is_array($this->value) or ( $this->value[0] != 'one-to-many' and $this->value[0] != 'many-to-one')  ) 
            return false;

       $this->type = $this->value[0];
       $this->column = $this->value[1];
       $this->props = $this->value[2];

       return true ;
    }

}
?>
