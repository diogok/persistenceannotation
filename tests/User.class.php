<?
    /** @Persistence('users') */
    class User {

        /** @Persistence(column='id',type='int',props={pk=true,autoIncrement=true}) */
        private $id ;  
        /** @Persistence(column='name') */
        private $name  ; 
        /** @Persistence('pwd') */
        private $pwd ;
        /** @Persistence */
        private $email ;
        /** @Persistence */
        private $phone ;
        /** @Persistence */
        private $sip ;
        /** @Persistence(type='int') */
        private $callback ;
        /** @Persistence(type='int') */
        private $admin ;
        /** @Persistence({'one-to-many','Contact',{ key = 'id_user', name = 'catalog', plural = 'catalog' }}) */
        private $catalog ;


        public function setTableDefinition() {
            $this->setTableName('users');
            $this->index("id");
            $this->hasColumn("id","integer",11,array("primary" => true,"unique" => true));
            $this->hasColumn('name','string',220);
            $this->hasColumn('email','string',220);
            $this->hasColumn('pwd','string',220);
            $this->hasColumn('phone','string',220);
            $this->hasColumn('sip','string',220);
            $this->hasColumn('callback','boolean');
            $this->hasColumn('admin','boolean');
        }

        public function setUp() {
           $this->hasMany("Contact as catalog",array("local" => "id", "foreign" => "id_user"));
        }

        public function getid() {
            return $this->id;
        }
    
        public function setid($id){
            $this->id = $id ;
            return $this ;
        }
    
        public function getName() {
            return $this->name;
        }
    
        public function setName($name){
            $this->name = $name ;
            return $this ;
        }
    
        public function setemail($email){
            $this->email = $email ;
            return $this ;
        }
    
        public function getsip() {
            return $this->sip;
        }
    
        public function setsip($sip){
            $this->sip = $sip ;
            return $this ;
        }
    
        public function getcallback() {
            return $this->callback;
        }
    
        public function setcallback($callback){
            $this->callback = (boolean) $callback ;
            return $this ;
        }
     
        public function getcontacts() {
            return $this->contacts ;
        }

        public function setcontacts($c) {
            $this->contacts = $c;
            return $this ;
        }

        public function getcatalog() {
            return $this->catalog;
        }
    
        public function setcatalog($catalog){
            $this->catalog = $catalog ;
            return $this ;
        }
	    
        public function getadmin() {
            return $this->admin;
        }
    
        public function setadmin($admin){
            $this->admin = (boolean)$admin ;
            return $this ;
        }
	    
        public function getphone() {
            return $this->phone;
        }
    
        public function setphone($phone){
            $this->phone = $phone ;
            return $this ;
        }
	    
        public function getpwd() {
            return $this->pwd;
        }
    
        public function setpwd($password){
            $this->pwd = $password ;
            return $this ;
        }
	}
?>
