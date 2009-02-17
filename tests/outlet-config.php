<?

return array ( 
        
        'connection' => array(
                'dsn' => 'mysql:host=localhost;dbname=libhertz',
                'username' => 'admin',
                'dialect' => 'sql',
                'password' => '123'),
        'classes' => array(
            'User' => array(
                'table'=>'users',
                'props'=>array(
                    'id'=> array('id','int',array('pk'=>true,'autoIncrement'=>true)),
                    'name'=>array('name','varchar'),
                    'email'=>array('email','varchar'),
                    'phone'=>array('phone','varchar'),
                    'sip'  =>array('sip','varchar'),
                    'callback'=>array('callback','int'),
                    'admin'=>array('admin','int'),
                    'pwd'=>array('pwd','varchar')
                ),
                'associations'=>array(
                    array('one-to-many','Contact',array('key'=>'id_user','name'=>'catalog','plural'=>'catalog'))
                )
            ), 
            'Contact' => array(
                'table'=>'contacts',
                'props'=>array(
                    'id'=>array('id','int',array('pk'=>true,'autoIncrement'=>true)),
                    'name'=>array('name','varchar'),
                    'id_user'=>array('id_user','int'),
                    'phone'=>array('phone','varchar'),
                    'fastPhone'=>array('fast_phone','varchar')
  //              ),
    //          'associations'=>array(
      //              array('many-to-one','User',array('key'=>'id_user'))
                )
             )
         )
        ) ;


?>
