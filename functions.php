<?php
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function makeTime($timestamp) {
$ts = $timestamp;
$cts = time();
//$str = "";
$result = $cts-$ts;
if ($result < 31556952) {
if ($result < 2629746) {
if ($result < 86400) {
if ($result < 3600) {
if ($result < 60) { 
$final = $result.($result == 1 ? " second" : " seconds");
}else{
 $n = floor($result/60);
$final = $n.($n == 1? " minute" : " minutes");
 }
            }else{
            $n = floor($result/3600);
                    $final = $n.($n == 1? " hour" : " hours");
            }
        }else{
        $n = floor($result/86400);
        
                    $final = $n.($n == 1? " day" : " days");
        }
    }else{
    $n = floor($result/2629746);
    
                    $final = $n.($n == 1? " month" : " months");
    }
}else{
$n = floor($result/31556952);
                    $final = $n.($n == 1? " year" : " years");
}
return $final;
}
?>
