<!doctype html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ここにタイトル</title>
    <link href="css/reset.css" rel="stylesheet" type="text/css">
    <link href="style.css" rel="stylesheet" type="text/css">
    <style>
        .input-error {
          border: 1px solid red !important;
        }  
        .smg-error {
          color: red !important;
          text-indent: 100px;
        }

    </style>

</head>

  <body>
    <header id="header">
    </header>

    <div class="container">
      <div class="breadcrumbs">
        パンくずリスト > <a href="">パンくずリスト</a>
      </div>
    </div>
      
    <main>
      <?php
          $organization = $sales = $administrators = $code1 = $code2 = $address = $phone = $gmail = $pass = '';

          $organizationErr = $saleErr = $administratorsErr = $code1Err = $code2Err = $addressErr = $phoneErr = $gmailErr = $passErr = '';

          if(isset($_POST['submit'])) {
            $organization = $_POST['organization'];
            $sales = $_POST['sales'];
            $administrators = $_POST['administrators'];
            $code1 = $_POST['code1'];
            $code2 = $_POST['code2'];
            $phone = $_POST['phone'];
            $gmail = $_POST['gmail'];
            $pass = $_POST['pass'];
            $address = $_POST['address'];

            if(empty($organization)) {
              $organizationErr = 'Vui lòng nhập tên tổ chức';
            }

            if(empty($sales)) {
              $saleErr = 'Vui lòng nhập bộ phận bán hàng';
            }

            if(empty($administrators)) {
              $administratorsErr = 'Vui lòng nhập quản trị viên';
            }

            if(empty($code1)) {
              $code1Err = 'Vui lòng nhập mã bưu điện 1';
            } else if(!is_numeric($_POST['code1'])) {
              $code1Err = 'Mã bưu điện 1 không đúng định dạng';
            }

            if(empty($code2)) {
              $code2Err = 'Vui lòng nhập mã bưu điện 2';
            } else if(!is_numeric($_POST['code2'])) {
              $code2Err = 'Mã bưu điện 2 không đúng định dạng';
            }

            if(empty($address)) {
              $addressErr = 'Vui lòng nhập địa chỉ';
            }

            if(empty($phone)) {
              $phone = 'Vui lòng nhập số điện thoại';
            } 

            if(empty($gmail)) {
              $gmailErr = 'Vui lòng nhập email';
            } else if(!filter_var($_POST['gmail'], FILTER_VALIDATE_EMAIL)) {
              $gmailErr = 'Email không đúng định dạng';
            }

            if(empty($pass)) {
              $passErr = 'Vui lòng nhập mật khẩu';
            }

            if($organization && $administrators && $sales && $code1 && $code2 && $phone && $gmail && $pass && $address ) {
              $content .= "<p>Tổ chức của bạn là: ${organization}";
              $content .= "<p>Bộ phận bán hàng của bạn là: ${administrators}";
              $content .= "<p>Quản trị viên của bạn là: ${sales}";
              $content .= "<p>Mã bưu điện 1 của bạn là: ${code1}";
              $content .= "<p>Mã bưu điện 2 của bạn là: ${code2}";
              $content .= "<p>Địa chỉ của bạn là: ${phone}";
              $content .= "<p>Gmail của bạn là: ${gmail}";
              $content .= "<p>Số điện thoại của bạn là: ${pass}";
              $content .= "<p>Mật khẩu của bạn là: ${address}";
            }
          }
      ?>


      <form action="" method="post">
      <section>
        <div class="section_header">
          <h2 class="section_title">お客様登録</h2>
        </div>

        <div class="container">
          <div class="form_frame">

            <div class="form_box">

              <div class="form_headline">
                商品引渡し先
              </div>

              <label class="side_label">
                <input type="radio" name="destination" value="company" checked>会社
              </label>
              <label class="side_label">
                <input type="radio" name="destination" value="school">学校
              </label>
              <label class="side_label">
                <input type="radio" name="destination" value="home">自宅
              </label>

            </div>

            <!-- 会社･勤務先フォーム -->
            <div id="company_form">
              
              <div class="form_box">
                <div class="form_headline">
                  団体名
                </div>
                <input type="text" name="organization" placeholder="株式会社〇〇" class="<?= $organizationErr ? 'input-error' : '' ?>" value="<?= $organization ?>" />
                <?= $organizationErr ? "<div class='smg-error'>{$organizationErr}</div>" : '' ?>
                <br/>
              </div>

              <div class="form_box">
                <div class="form_headline">
                  所属（引渡し先）
                </div>
                <input type="text" name="sales" placeholder="営業部" class="<?= $saleErr ? 'input-error' : '' ?>" value="<?= $sales ?>" />
                <?= $saleErr ? "<div class='smg-error'>{$saleErr}</div>" : '' ?>
              </div>

              <div class="form_box">

                <div class="form_headline">
                  管理者名
                </div>
                <input type="text" name="administrators" placeholder="山田　太郎" class="<?= $administratorsErr ? 'input-error' : '' ?>" value="<?= $administrators ?>" />
                <?= $administratorsErr ? "<div class='smg-error'>{$administratorsErr}</div>" : '' ?>

              </div>


              <div class="form_box">
                <div class="form_headline">
                  郵便番号
                </div>
                <div class="flex_wrap zip_frame">
                  <div>
                    <input type="text" name="code1" maxlength="3" placeholder="000" class="<?= $code1Err ? 'input-error' : '' ?>" value="<?= $code1 ?>" />
                    <?= $code1Err ? "<div class='smg-error'>{$code1Err}</div>" : '' ?>
                  </div>
                  <div>
                    <input type="text" name="code2" maxlength="4" onKeyUp="AjaxZip3.zip2addr('zip31','zip32','pref','pref','addr1');" placeholder="0000" class="<?= $code2Err ? 'input-error' : '' ?>" value="<?= $code2 ?>"  />
                    <?= $code2Err ? "<div class='smg-error'>{$code2Err}</div>" : '' ?>
                  </div>
                </div>
              </div>

              <div class="form_box">
                <div class="form_headline">
                  ご住所
                </div>
                <div class="pref"></div>
                <input type="text" name="address" placeholder="〇〇町1-1　〇〇マンション301" class="<?= $addressErr ? 'input-error' : '' ?>" value="<?= $address ?>" />
                <?= $addressErr ? "<div class='smg-error'>{$addressErr}</div>" : '' ?>
                <br>
              </div>

              <div class="form_box">

                <div class="form_headline">
                  電話番号
                </div>
                <input type="text" name="phone" placeholder="000-0000-0000" class="<?= $phoneErr ? 'input-error' : '' ?>" value="<?= $phone ?>" />
                <?= $phoneErr ? "<div class='smg-error'>{$phoneErr}</div>" : ''?>
              </div>

              <div class="form_box">

                <div class="form_headline">
                  メールアドレス
                </div>
                <input type="email" name="gmail" placeholder="example@example.com" class="<?= $gmailErr ? 'input-error' : '' ?>" value="<?= $gmail ?>">
                <?= $gmailErr ? "<div class='smg-error'>{$gmailErr}</div>" : ''?>

              </div>

              <div class="form_box">

                <div class="form_headline">
                  パスワード
                </div>
                <input type="text" name="pass" placeholder="※半角英数字１５文字以内" class="<?= $passErr ? 'input-error' : '' ?>" value="<?= $pass ?>">
                <?= $passErr ? "<div class='smg-error'>{$passErr}</div>" : ''?>

              </div>
              
            </div>

            <!-- 学校フォーム -->
            <div id="school_form">

              <div class="form_box">
                <div class="form_headline">
                  団体名
                </div>
                <input type="text" name="" placeholder="〇〇中学校">
              </div>

              <div class="form_box">
                <div class="form_headline">
                  所属（学年・クラス）
                </div>
                <input type="text" name="" placeholder="〇年〇組">
              </div>

              <div class="form_box">
                <div class="form_headline">
                  管理者名
                </div>
                <input type="text" name="" placeholder="山田太郎">
              </div>

              <div class="form_box">
                <div class="form_headline">
                  郵便番号
                </div>
                <div class="flex_wrap zip_frame">
                  <div>
                    <input type="text" name="zip31" maxlength="3" placeholder="000">
                  </div>
                  <div>
                    <input type="text" name="zip32" maxlength="4" onKeyUp="AjaxZip3.zip2addr('zip31','zip32','pref','pref','addr1');" placeholder="0000">
                  </div>
                </div>
              </div>

              <div class="form_box">
                <div class="form_headline">
                  ご住所
                </div>
                <div name="pref"></div>
                <input type="text" name="addr1" placeholder="〇〇町1-1　〇〇マンション301">
              </div>

              <div class="form_box">

                <div class="form_headline">
                  電話番号
                </div>
                <input type="text" name="" placeholder="00-0000-0000">

              </div>

              <div class="form_box">

                <div class="form_headline">
                  メールアドレス
                </div>
                <input type="email" name="" placeholder="example@example.com">

              </div>

              <div class="form_box">

                <div class="form_headline">
                  パスワード
                </div>
                <input type="text" name="" placeholder="※半角英数字１５文字以内">

              </div>

            </div>

            <!-- 自宅フォーム -->
            <div id="home_form">
              自宅フォームが表示されます
            </div>

            </div>

          <div class="button">
            <div>
              <input type="submit" class="button01" name="submit" value="確認画面へ">
            </div>
          </div>


        </div>

      </section>
      </form>

      <div class="result">
        <?= $content ?>
      </div>


    </main>

    <footer id="footer">
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <script src="js/scripts.js"></script>

    <script>
      $(function(){
        $("#header").load("header.html");
        $("#footer").load("footer.html");
      });
    </script>


  </body>
</html>