<?php
    $code = $_GET["code"];
    echo "$code";
    $url = "puremusic://login?code=$code";
    echo "<script>window.location.href = '$url';</script>";
//    header('Location: '.$url, true, 302);
?>


