<?php

require_once __DIR__ . '/../vendor/autoload.php';
// Imports the Google Cloud client library
use Google\Cloud\Datastore\DatastoreClient;

$datastore = new DatastoreClient();
$projectId = getenv('GOOGLE_CLOUD_PROJECT');

# Instantiates a client
$datastore = new DatastoreClient([
    'projectId' => $projectId
]);

function get_user_id($name) {
  return $name;
}

function isAuthenticated($name, $password) {
  $user_exist = datastore.isKey({path: ['users', $name]});
  if ($user_exist) {
      return true; // TODO db access
  } else {
    return false;
  }
}
