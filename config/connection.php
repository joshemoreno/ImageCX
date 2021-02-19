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

// POST

function postName($name,$city){
    $names = explode(" ", $name);
    $first = $names[0];
    $last = $names[1];
    $data= array(
        'name' => array(
            'first' => $first,
            "last" => $last
        ),
        'address' => array(
            'city' => $city
            )
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,'https://imaginecx--tst2.custhelp.com/services/rest/connect/v1.3/contacts');
    curl_setopt($ch, CURLOPT_USERPWD, 'ICXCandidate:Welcome2021');
    curl_setopt($ch, CURLOPT_POST, true);
    $data=json_encode($data);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response=curl_exec($ch);
    $newContact=json_decode($response,true);
    curl_close($ch);
    $id = $newContact['id'];
    return $id;
}

function postPhone($id,$phone){
    $data= array('items'=>[
        array("rel" => "canonical")
    ]);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,'https://imaginecx--tst2.custhelp.com/services/rest/connect/v1.3/contacts/757/phones');
    curl_setopt($ch, CURLOPT_USERPWD, 'ICXCandidate:Welcome2021');
    curl_setopt($ch, CURLOPT_POST, true);
    $data=json_encode($data);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response=curl_exec($ch);
    $newContact=json_decode($response,true);
    curl_close($ch);
    var_dump($newContact);
    // $id = $newContact['id'];
    return $newContact;
    // echo($data);
}

// PUT
function getOneByID($id){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,'https://imaginecx--tst2.custhelp.com/services/rest/connect/v1.3/contacts/'.$id);
    curl_setopt($ch, CURLOPT_USERPWD, 'ICXCandidate:Welcome2021');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $data=json_decode($response,true);
    curl_close($ch);
    return $data;
}

function getPhonesLinksByID($data){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $data['phones']['links'][0]['href']);
    curl_setopt($ch, CURLOPT_USERPWD, 'ICXCandidate:Welcome2021');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $data=json_decode($response,true);
    curl_close($ch);
    return $data;
}

function getPhoneByID($data){
    $ch = curl_init();
    $phones="";
    if(isset($data['items'][0]['href'])){
        curl_setopt($ch, CURLOPT_URL, $data['items'][0]['href']);
        curl_setopt($ch, CURLOPT_USERPWD, 'ICXCandidate:Welcome2021');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $phones=json_decode($response,true);
        curl_close($ch);
    }else{
        $phones=['number'=>null];
    }
    return($phones);
}

function getEmailsLinksByID($data){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $data['emails']['links'][0]['href']);
    curl_setopt($ch, CURLOPT_USERPWD, 'ICXCandidate:Welcome2021');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $data=json_decode($response,true);
    curl_close($ch);
    return $data;
}

function getEmailByID($data){
    $ch = curl_init();
    $emails="";
    if(isset($data['items'][0]['href'])){
        curl_setopt($ch, CURLOPT_URL, $data['items'][0]['href']);
        curl_setopt($ch, CURLOPT_USERPWD, 'ICXCandidate:Welcome2021');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $emails=json_decode($response,true);
        curl_close($ch);
    }else{
        $emails=['address'=>null];
    }
    return($emails);
}

function putName($id,$name,$city){
    $names = explode(" ", $name);
    if(count($names)>2){
        $first = $names[0]." ".$names[1];
        $last = $names[2]." ".$names[3];
    }else{
        $first = $names[0];
        $last = $names[1];
    }
    $data= array(
        'name' => array(
            'first' => $first,
            "last" => $last
        ),
        'address' => array(
            'city' => $city
            )
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,'https://imaginecx--tst2.custhelp.com/services/rest/connect/v1.3/contacts/'.$id);
    curl_setopt($ch, CURLOPT_USERPWD, 'ICXCandidate:Welcome2021');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
    $data=json_encode($data);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response=curl_exec($ch);
    $newContact=json_decode($response,true);
    curl_close($ch);
    var_dump($newContact);
}

function putPhone($url,$phone){
    $data= array(
        'number' => $phone
    );
    $ch = curl_init();
    if(isset($url['items'][0]['href'])){
        curl_setopt($ch, CURLOPT_URL, $url['items'][0]['href']);
        curl_setopt($ch, CURLOPT_USERPWD, 'ICXCandidate:Welcome2021');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        $data=json_encode($data);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response=curl_exec($ch);
        $newContact=json_decode($response,true);
        curl_close($ch);
    }else{
        null;
    }
}

function putEmail($url,$email){
    $data= array(
        'address' => $email
    );
    $ch = curl_init();
    if(isset($url['items'][0]['href'])){
        curl_setopt($ch, CURLOPT_URL, $url['items'][0]['href']);
        curl_setopt($ch, CURLOPT_USERPWD, 'ICXCandidate:Welcome2021');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        $data=json_encode($data);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response=curl_exec($ch);
        $newContact=json_decode($response,true);
        curl_close($ch);
    }else{
        null;
    }
}


// DELETE

function deleteByID($id){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,'https://imaginecx--tst2.custhelp.com/services/rest/connect/v1.3/contacts/'.$id);
    curl_setopt($ch, CURLOPT_USERPWD, 'ICXCandidate:Welcome2021');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_exec($ch);
    curl_close($ch);
}


?>

