<?php
// Facebook Kullanıcı Token'i
$token = $_SESSION['fb_access_token'];
$ptoken = $_GET['token'];
$pageId = $_GET['id'];
// Sayfa bilgilerini alalım.
$pageInfoQuery = $fb->get('/'.$pageId.'?fields=fan_count,name,id',$ptoken);
$pageInfo = $pageInfoQuery->getGraphNode();

$pageName = $pageInfo['name'];
$fanCount = $pageInfo['fan_count'];

// Sayfanın conversations bilgilerini alalım.
try {
  $convQuery = $fb->get('/'.$pageId.'/conversations?fields=id,updated_time,name,senders',$ptoken);
} catch(Facebook\Exceptions\FacebookResponseException $b) {
  echo 'Graph returned an error: ' . $b->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $b) {
  echo 'Facebook SDK returned an error: ' . $b->getMessage();
  exit;
}
$conversations = $convQuery->getGraphEdge();


?>
<h1 class="mt-5"><?php echo $pageName; ?></h1>
<h6><?php echo $fanCount; ?> beğeni.</h6>

<div class="container">
  <div class="row">
    <div class="col-md-12">
        <h4 class="mb-3 mt-2">Mesajlaşmalar</h4>
    </div>
    <div class="col-md-12 messageBox">
        <div class="col-md-4 messagePerson">
            <div class="messagePersonTitle">Kişiler</div>
            <?php
              foreach($conversations as $key => $value){
            ?>
              <div class="col-md-12 messagePersonLink" tlink="<?php echo $value['id']; ?>"><?php echo $value['senders'][0]['name']; ?></div>
            <?php
              }
            ?>
        </div>
        <div class="col-md-8 messageArea">
            <div class="messageAreaTitle">Sohbeti görüntüleyeceğiniz kişiyi seçiniz.</div>

            <div class="messages">
              
            </div>

        </div>
    </div>
  </div>
</div>
