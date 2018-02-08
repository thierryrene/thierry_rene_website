<?php

    function checkConfig() {

            global $pdo;

            $status = $pdo->prepare("SELECT * FROM sis_config");

            if ($status->execute()) {
                $result = $status->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } else {
                return "erro";
            }
    }

    function checkSpecConfig($id) {

            global $pdo;

            $status = $pdo->prepare("SELECT status FROM sis_config WHERE id = {$id}");

            if ($status->execute()) {
                $result = $status->fetch(PDO::FETCH_ASSOC);
                return $result;
            } else {
                return "erro";
            }
    }

    function powerConfig($configId) {
        global $pdo;

        $query = $pdo->prepare("SELECT status FROM sis_config WHERE id = {$configId}");

            if ($query->execute() == 1) {
                // $status = 'on';
                $turnOff = $pdo->prepare("UPDATE system_config SET status = 0 WHERE id = {$configId}");
                $turnOff = $pdo->execute();
            } else {
                // $status = 'off';
                $turnOn = $pdo->prepare("UPDATE system_config SET status = 1 WHERE id = {$configId}");
                $turnOn = $pdo->execute();
            }

    }

function getTableContents($table, $where = '') {
  global $pdo;
  $sql = "SELECT * FROM {$table} {$where};";
  $r = $pdo->query($sql, PDO::FETCH_ASSOC);
  foreach($r as $rs) {
    return $rs;
  }
}

function returnContent($table) {
  global $pdo;
  $sql = "SELECT * FROM {$table} LIMIT 1";
  $r = $pdo->query($sql);
  foreach ($r as $row) {
    echo "{$row['content']}<br>";
  }
}

function logAccess() {
  global $pdo;
  $q = "INSERT INTO access_log (id, host, path, log)
        VALUES (NULL, '{$_SERVER['SERVER_NAME']}', '{$_SERVER['PHP_SELF']}', CURRENT_TIMESTAMP)";
  $r = $pdo->query($q);
}

function checkHost($path) {
  if(HOST == $_SERVER['SERVER_NAME']) {
    header("location:http://" . HOST . "/php/{$path}");
  } else {
    header("location:http://localhost/thierryrenewebdev/php/{$path}");
  }
}

function loginAdmin ($username, $password) {
  global $pdo;
  $a = $pdo->prepare("SELECT * FROM user WHERE uid = ? AND pwd = ? AND status = 1");
  $r = $a->execute(array($username, $password));
  $obj = $a->fetchObject();
  if ($obj) {
    checkHost('admin/');
    $_SESSION['login'] = $_POST['uid'];
    die();
  }
  header("Location:http://" . HOST);
}

function createUser ($name, $lastname, $username, $password) {
  global $pdo;
  $a = $pdo->prepare("INSERT INTO user (first, last, uid, pwd, status) VALUES (?, ?, ?, ?, 1)");
  if( $a->execute(array($name, $lastname, $username, $password)) ) {
    checkHost("admin/create_user.php?user_create={$username}");
  } else {
    echo 'ocorreu um erro ao criar o usuário';
  }
}

function checkUserStatus() {
  if($row['status'] = 1) {
    $row['status'] = '<span class="label label-success">ativo</span>';
  } else {
    $row['status'] = '<span class="label label-danger">desativado</span>';
  }
}

function listActiveUsers () {
  global $pdo;
  $a = $pdo->prepare("SELECT * FROM user WHERE status = 1");
  if ($a->execute()){
    $r = $a->fetchAll(PDO::FETCH_ASSOC);
      echo "<table class='table table-hover table-bordered text-center'>
                  <tr>
                    <th>id</th>
                    <th>username</th>
                    <th>name</th>
                    <th>last name</th>
                    <th>status</th>
                    <th>delete</th>
                    <th>update</th>
                  </tr>";
      foreach ($r as $row) {
        if($row['status'] == 1) {
          $row['status'] = '<span class="label label-success">ativo</span>';
        } else {
          $row['status'] = '<span class="label label-danger">desativado</span>';
        }
        if(HOST == $_SERVER['SERVER_NAME']) {
          echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['uid']}</td>
                  <td>{$row['first']}</td>
                  <td>{$row['last']}</td>
                  <td>{$row['status']}</td>
                  <td><a href='http://" . HOST . "/php/admin/delete_user.php?id={$row['id']}'><button class='btn btn-danger btn-xs'>delete</button></a></td>
                  <td></td>
                </tr>";

        } else {
          echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['uid']}</td>
                  <td>{$row['first']}</td>
                  <td>{$row['last']}</td>
                  <td>{$row['status']}</td>
                  <td><a href='http://" . HOST . "/thierryrenewebdev/php/admin/delete_user.php?id={$row['id']}'><button class='btn btn-danger'>delete</button></a></td>
                  <td></td>
                </tr>";
        }
      }
      echo "</table>";
    }
}

function listNonUsers () {
  global $pdo;
  $a = $pdo->prepare("SELECT * FROM user WHERE status = 0");
  if ($a->execute()){
    $r = $a->fetchAll(PDO::FETCH_ASSOC);
      echo "<table class='table table-hover table-bordered text-center'>
                  <tr>
                    <th>id</th>
                    <th>username</th>
                    <th>name</th>
                    <th>last name</th>
                    <th>status</th>
                    <th>update</th>
                  </tr>";
      foreach ($r as $row) {
        if($row['status'] == 1) {
          $row['status'] = '<span class="label label-success">ativo</span>';
        } else {
          $row['status'] = '<span class="label label-danger">desativado</span>';
        }
        echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['uid']}</td>
                  <td>{$row['first']}</td>
                  <td>{$row['last']}</td>
                  <td>{$row['status']}</td>
                  <td></td>
                </tr>";
      }
      echo "</table>";
    }
}

function deleteUser($userId) {
  global $pdo;
  $a = $pdo->prepare("UPDATE user SET status = 0 WHERE id = {$userId}");
  $a->execute();
}

function checkLogin() {
  if (!$_SESSION['login']) {
    checkHost('');
    $_SESSION['login'] = false;
  }
}

function fileOpen($a) {
  $file = $a;
  $fileHandle = fopen($file, 'r');
  if (!$fileHandle) {
    echo "ocorreu um erro ao tentar ler o arquivo: <pre>{$file}</pre>";
  } else {
    return $file;
  }
}

// get lasfm last songs
function getLastFmSongs($limit) {
					$lasfmApiKey = "2f6af24843eea696c30ffcb0bb425bde";
					$secret = "2dd6c019e21201dfac20a227bb66131f";
					$url = "http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=thiiiii&api_key=2f6af24843eea696c30ffcb0bb425bde&format=json&limit={$limit}";
					$result = file_get_contents($url);
					$json = json_decode($result, true);
					$tracks = $json['recenttracks']['track'];
					return $tracks;
				}

function getInsta($limit) {
					$accessToken = "30604045.bf289e2.1ea23109549e464d83d4c41eef6df6c1";
					$url = "https://api.instagram.com/v1/users/self/media/recent/?access_token={$accessToken}";
					$result = file_get_contents($url);
					$json = json_decode($result, true);
					$photos = array();
					for ($a = 0; $a == $limit; $a++) {
					    $photosResult = $json['data'][$a]['images']['thumbnail'];
					    $photos[] = $photosResult;
					}
					return $photos;
				}

$analytics = initializeAnalytics();
$profile = getFirstProfileId($analytics);
$results = getResults($analytics, $profile);

function initializeAnalytics()
{
  // Creates and returns the Analytics Reporting service object.

  // Use the developers console and download your service account
  // credentials in JSON format. Place them in this directory or
  // change the key file location if necessary.
  $KEY_FILE_LOCATION = 'thierryrenewebsite-13b3166359af.json';

  // Create and configure a new client object.
  $client = new Google_Client();
  $client->setApplicationName("thierryrenewebsite_testes");
  $client->setAuthConfig($KEY_FILE_LOCATION);
  $client->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);
  $analytics = new Google_Service_Analytics($client);

  return $analytics;
}

function getFirstProfileId($analytics) {
  // Get the user's first view (profile) ID.

  // Get the list of accounts for the authorized user.
  $accounts = $analytics->management_accounts->listManagementAccounts();

  if (count($accounts->getItems()) > 0) {
    $items = $accounts->getItems();
    $firstAccountId = $items[0]->getId();

    // Get the list of properties for the authorized user.
    $properties = $analytics->management_webproperties
        ->listManagementWebproperties($firstAccountId);

    if (count($properties->getItems()) > 0) {
      $items = $properties->getItems();
      $firstPropertyId = $items[0]->getId();

      // Get the list of views (profiles) for the authorized user.
      $profiles = $analytics->management_profiles
          ->listManagementProfiles($firstAccountId, $firstPropertyId);

      if (count($profiles->getItems()) > 0) {
        $items = $profiles->getItems();

        // Return the first view (profile) ID.
        return $items[0]->getId();

      } else {
        throw new Exception('No views (profiles) found for this user.');
      }
    } else {
      throw new Exception('No properties found for this user.');
    }
  } else {
    throw new Exception('No accounts found for this user.');
  }
}

function getResults($analytics, $profileId) {

  $t = date('Y-m-d', strtotime('-3000 days'));
  $t2 = date('Y-m-d');

  $params = array(
              'max-results' => 10,
              'dimensions' => 'ga:pagePath',
              'sort' => '-ga:pageviews',
          );

  $a = $analytics->data_ga->get(
       'ga:' . $profileId,
       $t,
       $t2,
       'ga:pageviews,ga:pageviewsPerSession',
       $params);
// r($a['rows']);

   return $a;
}

// function printResults($results) {
//   // Parses the response from the Core Reporting API and prints
//   // the profile name and total sessions.
//   if (count($results->getRows()) > 0) {

//     // Get the profile name.
//     $profileName = $results->getProfileInfo()->getProfileName();

//     r($profileName);

//     // Get the entry for the first entry in the first row.
//     $rows = $results->getRows();
//     // $sessions = $rows[0][0];

//     // foreach($rows[0] as $row) {
//       r($rows);
//     // }

//     // // Print the results.
//     // print "First view (profile) found: $profileName\n";
//     // print "Total sessions: $sessions\n";
//   } else {
//     print "No results found.\n";
//   }
// }
