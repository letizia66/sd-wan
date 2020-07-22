<?php

require_once __DIR__ . '/../vendor/autoload.php';
// Imports the Google Cloud client library
use Google\Cloud\Datastore\DatastoreClient;

$projectId = getenv('GOOGLE_CLOUD_PROJECT');

# Instantiates a client
$datastore = new DatastoreClient([
    'projectId' => $projectId
]);

function get_user_id($name) {
  return $name;
}

function isAuthenticated($name, $password) {
  global $datastore;

  $key = $datastore->key('users',$name);
  $entity = $datastore->lookup($key);
  if (!is_null($entity)) {
       if ($entity['password'] == $password) {
         return true;
       }
   }
  return false;
}

function get_users() {
    global $datastore;
    $query = $datastore->query()
            ->kind('users')
            ->order('username');

    $result = $datastore->runQuery($query);
    $data = array();
    foreach ($result as $entity) {
      $data[] = array(
        "Id" => "",
        "Name" => $entity['username'],
        "E-mail": "",
        "Policy Id": $entity['policyId']
      );
    }

  //$json = file_get_contents('db/users.json', false);
  //$data = json_decode($json);
  return json_encode($data);
}

?>
