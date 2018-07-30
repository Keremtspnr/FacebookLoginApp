<?php
// Facebook Kullanıcı Tokeni
$token = $_SESSION['fb_access_token'];

// Kullanıcı Bilgilerini çekelim.
try {
  $response = $fb->get('/me?fields=id,name', $token);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
$user = $response->getGraphUser();
?>

<h1 class="mt-5">Hoşgeldin! <?php echo $user['name']; ?></h1>
<p class="lead">Yönetici olduğun sayfalar aşağıda listelenmiştir.</p>
<div class="container">
  <div class="row">
  <?php
  // Kullanıcının yönetici olduğu sayfa bilgilerine ulaşalım.
  try {
    $response2 = $fb->get('/me/accounts',$token);
  } catch(Facebook\Exceptions\FacebookResponseException $b) {
    echo 'Graph returned an error: ' . $b->getMessage();
    exit;
  } catch(Facebook\Exceptions\FacebookSDKException $b) {
    echo 'Facebook SDK returned an error: ' . $b->getMessage();
    exit;
  }
  $graphNode2 = $response2->getGraphEdge();
  foreach($graphNode2 as $key => $value){
    ?>
      <div class="col-md-3">
        <a href="page?id=<?php echo $value['id']; ?>&token=<?php echo $value['access_token'];?>" class="pagesListLinks">
          <div class="pagesListBox">
            <?php echo $value['name']; ?>
          </div>
        </a>
      </div>
    <?php
  }
  ?>
  </div>
</div>
