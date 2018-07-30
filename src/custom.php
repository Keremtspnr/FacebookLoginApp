<?php
  // Sayfa  yönlendirmeleri için Header komutunun çalışmadığı yerlerde kullanılacak.
  function git($link){
    echo "<script> window.location.replace('".$link."') </script>";
  }
?>
