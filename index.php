<?php require_once __DIR__ . '/views/layouts/header.php';?>
<?php
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email,manage_pages,read_page_mailboxes,pages_show_list,publish_pages']; // Gerekli üyelik izinleri
$loginUrl = $helper->getLoginUrl('https://metrofis.com/FacebookLoginApp/fb-callback.php', $permissions);
$p = $_GET['page'];
?>

<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <?php if($_SESSION['login']==true || $_SESSION['fb_access_token']!=""){
          switch($p){
            case "pages"  : include("views/pages.php"); break;
            case "page"  : include("views/page.php"); break;
            case "logout" : session_destroy(); git('https://metrofis.com/FacebookLoginApp'); break;
            default       : include("views/pages.php");
          }
       } else { ?>
        <h1 class="mt-5">Giriş Yap!</h1>
        <p class="lead">Sayfalarını görüntülemek ve mesajlarına erişebilmek için lütfen aşağıdaki butonu kullanarak giriş yapınız!</p>
        <ul class="list-unstyled">
          <li><?php echo '<a href="' . htmlspecialchars($loginUrl) . '">Facebook ile Giriş Yap!</a>'; ?></li>
        </ul>
      <?php } ?>
    </div>
  </div>
</div>
<?php require_once __DIR__ . '/views/layouts/footer.php';?>
