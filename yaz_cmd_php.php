<?php
/**
 * Created by PhpStorm.
 * User: niklas
 * Date: 1/25/19
 * Time: 2:02 PM
 */
#!/usr/local/bin/php
//requires
dl('yaz.dll');
if($argc > 1){

    $host = $argv[1];
    $port = $argv[2];
    $dbname = $argv[3];
    $user = $argv[4];
    $pw = $argv[5];
    $syntax = $argv[6];
    $query = $argv[7];

    echo $host.$port.$dbname.$user.$pw.$syntax.$query." ";
    query();
}
function query(){
    $host = "";
    $port = "";
    $dbname = "";
    $user = "";
    $pw = "";
    $syntax = "";
    $query = "";

    $test = 1;


    if($test == 1){
        $host = "193.30.112.135";
        $port = "9991";
        $dbname = "HBZ01";
        $user = "";
        $pw = "";
        $syntax = "mab";
        $query = "Funktion";
    }


        $session = yaz_connect($host.":".$port."/".$dbname, $user."/".$pw);
        if (yaz_error($session) != "") {
            echo yaz_error($session);
        }
        $ccl_query = $query;
    yaz_syntax($session, $syntax);
    yaz_range($session, 1, 10);

    $ccl_result = array();
    if (!yaz_ccl_parse($session, $ccl_query, $ccl_result)) {
        echo "The query could not be parsed." ;
    }
    else {
        $rpn = $ccl_result["rpn"]; // fetch RPN result from the parser
        yaz_search($session, "rpn", $rpn); // do the actual query
        yaz_wait(); // wait blocks until the query is done

        if (yaz_error($session) != ""){
            echo yaz_error($session);
        }
        if (yaz_hits($session) == 0) {
            echo "hits 0";
        }
        else {
            echo "hits ".yaz_hits($session);
            $yaz_record  = yaz_record($session, 1, "string");
        }

    }


}

