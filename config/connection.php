<?php
// trae el id
function getAll(){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,'https://imaginecx--tst2.custhelp.com/services/rest/connect/v1.3/contacts');
    curl_setopt($ch, CURLOPT_USERPWD, 'ICXCandidate:Welcome2021');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $data=json_decode($response,true);
    for ($i = 0; $i <= count($data['items']); $i++) {
        if(isset($data['items'][$i]['id'])){
        $id[$i] = $data['items'][$i]['id'];
        }
    }
    return $id;
}
// trae nombre, ciudad
function getEach($id){
    $data=array();
    for ($i = 0; $i <= 10; $i++) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,'https://imaginecx--tst2.custhelp.com/services/rest/connect/v1.3/contacts/'.$id[$i]);
        curl_setopt($ch, CURLOPT_USERPWD, 'ICXCandidate:Welcome2021');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $data[$i]=json_decode($response,true);
        curl_close($ch);
    }
    return $data;
}
// trae primer link phone
function getPhonesLinks($data){
    $phone=array();
    for ($i = 0; $i <= 10; $i++) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $data[$i]['phones']['links'][0]['href']);
        curl_setopt($ch, CURLOPT_USERPWD, 'ICXCandidate:Welcome2021');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $data[$i]=json_decode($response,true);
        curl_close($ch);
    }
    return $data;
}
// trae el segundo link para phone 
function getPhone($data){
    $phones=array();
    for ($i = 0; $i <= 10; $i++) {
        if(isset($data[$i]['items'][0]['href'])){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $data[$i]['items'][0]['href']);
            curl_setopt($ch, CURLOPT_USERPWD, 'ICXCandidate:Welcome2021');
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $phones[$i]=json_decode($response,true);
            curl_close($ch);
        }
        else{
                $phones[$i]=NULL;
            }
    }
    return($phones);
}
// trae primer link email
function getEmailsLinks($data){
    $phone=array();
    for ($i = 0; $i <= 10; $i++) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $data[$i]['emails']['links'][0]['href']);
        curl_setopt($ch, CURLOPT_USERPWD, 'ICXCandidate:Welcome2021');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $data[$i]=json_decode($response,true);
        curl_close($ch);
    }
    return $data;
}
// trae el segundo link para email
function getEmail($data){
    $emails=array();
    for ($i = 0; $i <= 10; $i++) {
        if(isset($data[$i]['items'][0]['href'])){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $data[$i]['items'][0]['href']);
            curl_setopt($ch, CURLOPT_USERPWD, 'ICXCandidate:Welcome2021');
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $emails[$i]=json_decode($response,true);
            curl_close($ch);
        }
        else{
                $emails[$i]=NULL;
            }
    }
    return($emails);
}

?>

