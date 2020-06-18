<?php
//phpバリデーションチェック
$check_flg = true;
$err_msg = "";
//名前の未入力チェック
if (empty($_POST["name"])) {
  $err_msg = "お名前を入力してください<br>";
  $check_flg = false;
}
//名前の最大値20文字以内でチェック
if (mb_strlen($_POST["name"]) > 20) {
  $err_msg = $err_msg . "お名前は20文字以内で入力してください<br>";
  $check_flg = false;
}
//メールアドレスの形式チェック
if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\?\*\[|\]%'=~^\{\}\/\+!#&\$\._-])*@([a-zA-Z0-9_-])+\.([a-zA-Z0-9\._-]+)+$/", $_POST["email"])) {
  $err_msg = $err_msg . "メールアドレスの形式に誤りがあります。<br>";
  $check_flg = false;
}
//コメントの未入力チェック
if (empty($_POST["message"])) {
  $err_msg = $err_msg . "メッセージを入力してください<br>";
  $check_flg = false;
}
 ?>

<!DOCTYPE html>
<html lang="ja" class="no-js">
    <!-- Begin Head -->
    <head>
        <!-- Basic -->
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>aoraetoa - crafts</title>

        <!-- Web Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">

        <!-- Vendor Styles -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/themify/themify.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/scrollbar/scrollbar.min.css" rel="stylesheet" type="text/css"/>

        <!-- Theme Styles -->
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/global/global.css" rel="stylesheet" type="text/css"/>

        <!-- Favicon -->
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="img/apple-touch-icon.png">

    </head>
    <!-- End Head -->

    <!-- Body -->
    <body>
      <!--========== HEADER ==========-->
      <header class="navbar-fixed-top s-header js__header-sticky js__header-overlay">
        <!-- Navbar -->
        <div class="s-header__navbar">
            <div class="s-header__container">
                <div class="s-header__navbar-row">
                    <div class="s-header__navbar-row-col">
                          <!-- Logo -->
                          <div class="s-header__logo">
                              <a href="index.html" class="s-header__logo-link">
                                  <img class="s-header__logo-img s-header__logo-img-default" src="img/logo.png" alt="aotaetoa Logo">
                                  <img class="s-header__logo-img s-header__logo-img-shrink" src="img/logo-dark.png" alt="aoraetoa Logo">
                              </a>
                          </div>
                          <!-- End Logo -->
                      </div>
                  </div>
              </div>
          </div>
       </header>
      <!--========== END HEADER ==========-->

      <!--========== PAGE CONTENT ==========-->
      <div class="g-position--relative">
        <div class="g-container--md g-padding-y-125--xs">
          <div class="g-text-center--xs g-margin-t-50--xs g-margin-b-80--xs g-font-size-20--sm">
    <?php
    //phpバリデーションチェック
    //名前の未入力チェック
    if ($check_flg == false) {
      echo $err_msg;
      echo "お手数ですが、前のページに戻りもう一度入力お願いします。<br>";
      echo "<br>";
      echo "<a href='javascript:history.back()'>前に戻る</a><br>";
    } else {
    //言語と文字コード設定
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");

    $email = $_POST["email"]; //送信元(問い合わせ者のemail)
    $subject = "aoraetoa_craftsからのお問い合わせ"; //題名
    $message = "名前: " . $_POST["name"] . "\n" . "メールアドレス: " . $email . "\n" . "\n本文: " . $_POST["message"]; //本文
    $to = "erk.apr@gmail.com"; //送信先
    $header = "From: aoraetoa.starfree.jp/crafts\nReply-to: $email\n";

    //送信確認
    if(mb_send_mail($to, $subject, $message, $header)) {
      echo "<u>お問い合わせありがとうございます。</u>";
      echo "<p class='g-font-size-18--sm'>お問い合わせ頂いた内容に関しましては、2〜3日中に返信いたします。<br>返信がない場合は、メールアドレスのお間違いの可能性がございます。<br>
      お手数ですが、再度コンタクトフォームよりご連絡ください。</p>";
      echo "<br>";
      echo "<a href='index.html'>Homeに戻る</a>";
    } else {
      echo "<u>送信に失敗しました。</u>";
      echo "<p class='g-font-size-18--sm'>お手数ですが、前のページに戻りもう一度お試しください。</p><br>";
      echo "<br>";
      echo "<a href='javascript:history.back()'>前に戻る</a>";
    }
    }
    ?>


           <img class="s-mockup-v2" src="img/mockups/letter.png" alt="Letter Image">
         </div>
       </div>
     </div>
     <!--========== END PAGE CONTENT ==========-->

     <!--========== FOOTER ==========-->
     <footer class="g-bg-color--dark">
         <!-- Copyright -->
         <div class="container g-padding-y-90--xs">
             <div class="row">
                 <div class="g-text-right--xs">
                     <p class="g-font-size-14--xs g-margin-b-0--xs g-margin-r-10--xs g-color--white-opacity-light"><a class="copyright">&copy; 2020 aoraetoa</a></p>
                 </div>
             </div>
         </div>
         <!-- End Copyright -->
     </footer>
     <!--========== END FOOTER ==========-->

     <!-- Back To Top -->
     <a href="javascript:void(0);" class="s-back-to-top js__back-to-top"></a>

     <!--========== JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) ==========-->
     <!-- Vendor -->
     <script type="text/javascript" src="vendor/jquery.min.js"></script>
     <script type="text/javascript" src="vendor/jquery.migrate.min.js"></script>
     <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
     <script type="text/javascript" src="vendor/jquery.smooth-scroll.min.js"></script>
     <script type="text/javascript" src="vendor/jquery.back-to-top.min.js"></script>
     <script type="text/javascript" src="vendor/scrollbar/jquery.scrollbar.min.js"></script>

     <!-- General Components and Settings -->
     <script type="text/javascript" src="js/global.min.js"></script>
     <script type="text/javascript" src="js/components/header-sticky.min.js"></script>
     <script type="text/javascript" src="js/components/scrollbar.min.js"></script>
     <!--========== END JAVASCRIPTS ==========-->

 </body>
 <!-- End Body -->
</html>
