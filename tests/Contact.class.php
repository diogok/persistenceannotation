<?
  
    /** @Persistence('contacts') */
    class Contact  {

        /** @Persistence(column='id',type='int',props={pk=true,autoIncrement=true}) */
        private $id ;
        /** @Persistence */
        private $name ;
        /** @Persistence */
        private $phone ;
        /** @Persistence('fast_phone') */
        private $fastPhone ;
        private $id_user ; 

             function setTableDefinition(){
                $this->setTableName("contacts");
                $this->index("id");
                $this->hasColumn("name","string",220);
                $this->hasColumn("phone","string",220);
                $this->hasColumn("fast_phone as fastPhone","string",220);
                $this->hasColumn("name","string",220);
                $this->hasColumn("id_user","string",220);
            }

            function setUp() {
            }
            
            public function getid() {
                return $this->id;
            }
        
        
        public function setid($id){
            $this->id = $id ;
            return $this ;
        }
    
    
        public function getid_user() {
            return $this->id_user;
        }
    
    
        public function setid_user($id){
            $this->id_user = $id ;
            return $this ;
        }
    
        public function getname() {
            return $this->name;
        }
    
    
        public function setname($name){
            $this->name = $name ;
            return $this ;
        }
    
    
        public function getphone() {
            return $this->phone;
        }
    
    
        public function setphone($phone){
            $this->phone = $phone ;
            return $this ;
        }
    
    
        public function getfastPhone() {
            return $this->fastPhone;
        }
    
    
        public function setfastPhone($fastPhone){
            $this->fastPhone = $fastPhone ;
            return $this ;
        }
    


	}
?>
