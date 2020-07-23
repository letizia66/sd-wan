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
      if ($entity['role'] == 'customer') {
        $data[] = array(
          "Name" => $entity['username'],
          "E-mail" => $entity['email'],
          "Policy Id" => $entity['policyId']
        );
      }
    }

  return json_decode(json_encode($data));
}

function get_user($name) {
  global $datastore;

  $key = $datastore->key('users',$name);
  $entity = $datastore->lookup($key);
  $data = null;
  if (!is_null($entity)) {
      $data = array(
        "Name" => $entity['username'],
        "E-mail" => $entity['email'],
        "Policy Id" => $entity['policyId']
      );
  }
  return json_encode($data);
}

function delete_user($name) {
  global $datastore;

  $key = $datastore->key('users',$name);
  $entity = $datastore->lookup($key);
  if (!is_null($entity)) {
    $datastore->delete($key);
    return true;
  }
  return false;
}

function create_user($name, $password, $email, $policyid) {
  global $datastore;

  $key = $datastore->key('users',$name);
  $entity = $datastore->lookup($key);
  if (is_null($entity)) {
    $data = $datastore->entity($key, [
      "password" => $password,
      "username" => $name,
      "role" => "customer",
      "policyId" => $policyid,
      "email" => $email
    ]);
    $datastore->upsert($data);
    return get_user($name);
  }
  return null;
}

function is_admin() {
  global $datastore;

  $key = $datastore->key('users',$_SESSION['name']);
  $entity = $datastore->lookup($key);
  if (!is_null($entity)) {
    return ($entity['role'] == 'admin');
  }  
  return false;
}
?>
