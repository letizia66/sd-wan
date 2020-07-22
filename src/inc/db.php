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
  print_r($key);

  $entity = $datastore->lookup($key);
  if (!is_null($entity)) {
       return true; // TODO db access
   } else {
     return false;
   }
}
?>
