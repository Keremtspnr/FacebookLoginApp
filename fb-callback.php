<?php require_once __DIR__ . '/views/layouts/header.php';?>
<?php
  $helper = $fb->getRedirectLoginHelper();
  try {
  $accessToken = $helper->getAccessToken();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }

  if (!isset($accessToken)) {
    if ($helper->getError()) {
      session_destroy();
      git('https://metrofis.com/FacebookLoginApp/');

      header('HTTP/1.0 401 Unauthorized');
      echo "Error: " . $helper->getError() . "\n";
      echo "Error Code: " . $helper->getErrorCode() . "\n";
      echo "Error Reason: " . $helper->getErrorReason() . "\n";
      echo "Error Description: " . $helper->getErrorDescription() . "\n";
    } else {
      header('HTTP/1.0 400 Bad Request');
      echo 'Bad request';
    }
    exit;
  }else{
    $_SESSION['fb_access_token'] = (string) $accessToken;
    $_SESSION['login'] = true;
    git('https://metrofis.com/FacebookLoginApp/');


  }

?>
<?php require_once __DIR__ . '/views/layouts/footer.php';?>
