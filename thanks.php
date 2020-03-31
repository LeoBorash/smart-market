<?php session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/html; charset=utf-8');

$responsible_user_id = 2050639; 
$lead_name = $_POST['product'];
$price = $_POST['price'];
$lead_status_id = '17622814';

if (isset($_SESSION['name'])){
    $contact_name = $_SESSION['name'];
    $contact_phone = $_SESSION['phone'];
}else{
    $contact_name = $_POST['name'];
    $contact_phone = $_POST['phone'];
}

$user=array(
    'USER_LOGIN'=>'tesakulmurza@gmail.com', 
    'USER_HASH'=>'7455fa368d54b0289be736befeff2ebc4f55587f'
);
$subdomain='baga';
$link='https://'.$subdomain.'.amocrm.ru/private/api/auth.php?type=json';
$curl=curl_init(); 
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$link);
curl_setopt($curl,CURLOPT_POST,true);
curl_setopt($curl,CURLOPT_POSTFIELDS,http_build_query($user));
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt');
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt');
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
$out=curl_exec($curl); 
$code=curl_getinfo($curl,CURLINFO_HTTP_CODE); 
curl_close($curl); 
$Response=json_decode($out,true);


$link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/accounts/current'; 
$curl=curl_init(); 

curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$link);
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt');
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); 
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
$out=curl_exec($curl); 
$code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
curl_close($curl);
$Response=json_decode($out,true);
$account=$Response['response']['account'];

$amoAllFields = $account['custom_fields'];
$amoConactsFields = $account['custom_fields']['contacts']; 

$sFields = array_flip(array(
        'PHONE', 
        'EMAIL' 
    )
);

foreach($amoConactsFields as $afield) {
    if(isset($sFields[$afield['code']])) {
        $sFields[$afield['code']] = $afield['id'];
    }
}
$leads['request']['leads']['add']=array(
    array(
        'name' => $lead_name,
        'status_id' => $lead_status_id,
        'responsible_user_id' => $responsible_user_id, 
        //'date_create'=>1298904164, //optional
        'price'=>$price,
        //'tags' => 'Important, USA', #Теги
        //'custom_fields'=>array()
    )
);

$link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/leads/set';
$curl=curl_init(); 
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$link);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($leads));
curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); 
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); 
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
$out=curl_exec($curl); 
$code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
$Response=json_decode($out,true);
//echo '<b>Новая сделка:</b>'; echo '<pre>'; print_r($Response); echo '</pre>';
if(is_array($Response['response']['leads']['add']))
    foreach($Response['response']['leads']['add'] as $lead) {
        $lead_id = $lead["id"]; 
    };

$contact = array(
    'name' => $contact_name,
    'linked_leads_id' => array($lead_id),
    'responsible_user_id' => $responsible_user_id, 
    'custom_fields'=>array(
        array(
            'id' => $sFields['PHONE'],
            'values' => array(
                array(
                    'value' => $contact_phone,
                    'enum' => 'MOB'
                )
            )
        )
    )
);
$set['request']['contacts']['add'][]=$contact;
#Формируем ссылку для запроса
$link='https://'.$subdomain.'.amocrm.ru/private/api/v2/json/contacts/set';
$curl=curl_init(); 
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-API-client/1.0');
curl_setopt($curl,CURLOPT_URL,$link);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($set));
curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_COOKIEFILE,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_COOKIEJAR,dirname(__FILE__).'/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,0);
$out=curl_exec($curl); 
$code=curl_getinfo($curl,CURLINFO_HTTP_CODE);



$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/spasibo";
header("Location: " . $actual_link); /* Redirect browser */
exit();

?>