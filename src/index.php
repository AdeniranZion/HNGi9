<?php
require_once __DIR__ . '/config.php';
class API {
    function Select(){
        $db = new Connect;
        $user = array();
        $data = $db->prepare('SELECT * FROM user ORDER BY slackUsername');
        $data-> execute();
        while($OutputData = $data-> fetch(PDO::FETCH_ASSOC)){
            $user[$OutputData['slackUsername']] = array(
                'slackUsername' => $OutputData['slackUsername'],
                'backend'       => $OutputData['backend'],
                'age'           => $OutputData['age'],
                'bio'           => $OutputData['bio']
            );
        }
        return json_encode($user);
    }
}

$API = new API;
header('Content-Type: application/json');
echo $API->Select();
?>