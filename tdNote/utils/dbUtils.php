<?php
$DB = NULL;
function connect() {
    global $DB;
    if ($DB== NULL) {
        $dbType = "mysql";
        $host = "localhost";
        $port = 3306;
        $dbname = "blog";
        $user = "root";
        $password = "";
        try {
            $DB = new PDO("$dbType:host=$host;port=$port;dbname=$dbname",$user,$password);    
        } catch(Exception $e) {
            die('Erreur:'.$e->getMessage());    
        }
    }
    return $DB;
}

function execute ($request, $data=null) { //= NULL car peut être égal à NULL
    $request->execute($data);
    if ($request->errorInfo()[2]) {
        throw new Exception($request->errorInfo()[2]);
    }
}

?>