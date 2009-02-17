<?

include 'User.class.php';
include 'Contact.class.php';
//include '../../outlet/Outlet.class.php';
//include '../../annotations/annotations.php';
//include '../Persistence.class.php' ;
include '../PersistenceAnnotation.class.php' ;
include 'Tester.class.php';
 

    $configer = new PersistenceAnnotation('mysql:host=localhost;dbname=libhertz','admin','123') ;

    $tester = new Tester($configer);
    $conn = array( 'connection' => array(
                'dsn' => 'mysql:host=localhost;dbname=libhertz',
                'username' => 'admin',
                'dialect' => 'sql',
                'password' => '123')
            ) ;
 
    $config = $configer->getConfig();
    if($conn['connection'] !== $config['connection']) {
        echo "\nERRO -> Connection Config errado!\n";
        print_r($orig['connection']) ;
        print_r($config['connection']);
    }
     
    $configer->addClass("User")->addClass("Contact");
    

    $user = array();
    $user['table'] = 'users';
    $user['props']['id'] = array('id','int',array('pk'=>true,'autoIncrement'=>true));
    $user['props']['name'] = array('name','varchar',null);
    $user['props']['pwd'] = array('pwd','varchar',null);
    $user['props']['email'] = array('email','varchar',null);
    $user['props']['phone'] = array('phone','varchar',null);
    $user['props']['sip'] = array('sip','varchar',null);
    $user['props']['callback'] = array('callback','int',null);
    $user['props']['admin'] = array('admin','int',null) ;
    $user['associations'][] = array('one-to-many','Contact',array('key'=>'id_user','name'=>'catalog','plural'=>'catalog') ) ;

    $tester->test("getClass",$user,"User");

    $contact = array() ;
    $contact['table'] = 'contacts';
    $contact['props']['id'] = array('id','int',array('pk'=>true,'autoIncrement'=>true));
    $contact['props']['name'] = array('name','varchar',null);
    $contact['props']['phone'] = array('phone','varchar',null);
    $contact['props']['fastPhone'] = array('fast_phone','varchar',null);

    $tester->test("getClass",$contact,"Contact");

    $config = array()  ;
    $config['connection'] = $conn['connection'] ;
    $config['classes']['User'] = $user ;
    $config['classes']['Contact'] = $contact ;

    $tester->test("getConfig",$config);

if(!function_exists("xdebug_time_index")) exit ;
echo "It took ".round(xdebug_time_index(),5)." seconds \n";
echo "Used ".round(xdebug_memory_usage()/1024,5)."Kb of Memory\n";
echo "Used at peak ".round(xdebug_peak_memory_usage()/1024,5)."Kb of Memory\n";
 
?>
