<?php
// Burası Ajax ile Post edilecek sayfa.
// Linkine tıklanan sohbetin içeriği oluşturulacak.
session_start();
require_once '../src/Facebook/autoload.php';
require_once '../src/custom.php';
$fb = new \Facebook\Facebook([
  'app_id' => '262413657681286',
  'app_secret' => '75929c699f2b1509c5a4ea5e6144b156',
  'default_graph_version' => 'v3.1',
  //'default_access_token' => '{access-token}', // optional
]);

$token = $_SESSION['fb_access_token'];
$ptoken = $_POST['token'];
$pageId = $_POST['p_id'];
$conversations_id = $_POST['t_id'];

// Sohbetin detaylarına ulaşma.
$convQuery = $fb->get('/'.$conversations_id.'/messages?fields=message,from,created_time',$ptoken);
$conv = $convQuery->getGraphEdge();


// Sohbeti ekrana yazdırma.
foreach ($conv as $key => $value) {
  if($value['from']['id'] == $pageId){$t_class = "messageMe";} else {$t_class = "messageSender";}
  echo "<div class='message ".$t_class."'>".$value['message']."</div>";
}
?>
