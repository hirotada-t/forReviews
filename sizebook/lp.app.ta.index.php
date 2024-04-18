<?php
    //================================================
    //cmkt server script
    //================================================
    if(!isset($cmkt_script)) $cmkt_script = false;
    if(!isset($_COOKIE["cmktsn"])) $_COOKIE["cmktsn"] = "";
    if(!isset($_COOKIE["cmktss"])) $_COOKIE["cmktss"] = "";
    if(!isset($_SERVER["HTTP_REFERER"])) $_SERVER["HTTP_REFERER"] = "";
    if ($cmkt_script != true) {
        $cmktsn=$_COOKIE["cmktsn"];
        $cmktss=$_COOKIE["cmktss"];
        $cmktrn=@md5(uniqid(microtime(true),true));
        if($cmktsn==""){$cmktsn=@md5(uniqid(microtime(true),true));}
        if($cmktss==""){$cmktss=@md5(uniqid(microtime(true),true));}

        $cmkt_jserver_host="cmkt.jp";
        $cmkt_jserver_port=443;
        $cmkt_jserver_limit=0.2;
        $cmkt_protocol = (!empty($_SERVER["HTTPS"])) || strstr($_SERVER["SERVER_PROTOCOL"],"HTTPS") || strstr(getenv("HTTP_X_FORWARDED_PROTO"),"https") ? "https://" : "http://";

        if(getenv("HTTP_CLIENT_IP")){
            $cmktip = getenv("HTTP_CLIENT_IP");
        }else if(getenv("HTTP_X_FORWARDED_FOR")){
            $cmktip = getenv("HTTP_X_FORWARDED_FOR");
        }else if(getenv("HTTP_X_FORWARDED")) {
            $cmktip = getenv("HTTP_X_FORWARDED");
        }else if(getenv("HTTP_FORWARDED_FOR")) {
            $cmktip = getenv("HTTP_FORWARDED_FOR");
        }else if(getenv("HTTP_FORWARDED")) {
            $cmktip = getenv("HTTP_FORWARDED");
        }else if(getenv("REMOTE_ADDR")) {
            $cmktip = getenv("REMOTE_ADDR");
        }else{
            $cmktip = "none";
        }
        if(strrchr($cmktip, ",")){
            $cmktipArr = explode(",",$cmktip);
            $cmktip = trim($cmktipArr[count($cmktipArr)-1]);
        }

        $cmkt_trans_arr=array(
            "id=ABE48002",
            "rn=".$cmktrn,
            "sn=".$cmktsn,
            "ss=".$cmktss,
            "ip=".urlencode($cmktip),
            "ref=".urlencode($_SERVER["HTTP_REFERER"]),
            "url=".urlencode($cmkt_protocol.$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]),
            "ua=".urlencode($_SERVER["HTTP_USER_AGENT"]),
            "lang=".urlencode($_SERVER["HTTP_ACCEPT_LANGUAGE"])
        );

        $cmkt_param=implode("&",$cmkt_trans_arr);

        $cmkt_headers = "GET /req/sspv.php?".$cmkt_param." HTTP/1.0".PHP_EOL."Host: ".$cmkt_jserver_host.":".$cmkt_jserver_port.PHP_EOL."Connection: Close".PHP_EOL.PHP_EOL;
        $cmkt_fp = @fsockopen("ssl://".$cmkt_jserver_host, $cmkt_jserver_port, $errno, $errstr,$cmkt_jserver_limit);
        if ($cmkt_fp) {
            @fwrite($cmkt_fp, $cmkt_headers);
            @fclose($cmkt_fp);
        }
        $cmkt_script = true;
    }
    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
  <!-- Start cmkt-->
  <script type="text/javascript">
    var _cmktrn = "<?php echo $cmktrn;?>";
  </script>
  <!-- End cmkt -->
  <!-- Google Tag Manager -->
  <script>(function (w, d, s, l, i) {
      w[l] = w[l] || []; w[l].push({
        'gtm.start':
          new Date().getTime(), event: 'gtm.js'
      }); var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
          'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-N8C3PBX');</script>
  <!-- End Google Tag Manager -->
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-EC28JH95Y1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'G-EC28JH95Y1');
  </script>
  <title>アプリ広告ならsizebook</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="copyright" content="Copyright (C)sizebook CO., LTD." />
  <meta name="description" content="リスティング広告ならsizebookで決まり。3ヶ月手数料5%ではじめるリスティング。" />
  <meta name="keywords" content="リスティング広告,SEO,コンサルティング,アプリ 集客,アプリ広告,アプリ広告運用代行,インストール数増やしたい" />
  <meta name="robots" content="all" />
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N8C3PBX" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <!-- Begin Mieruca Embed Code -->
  <script type="text/javascript" id="mierucajs">
    window.__fid = window.__fid || [];
    __fid.push([733445432]);
    (function () {
      function mieruca() {
        if (typeof window.__fjsld != "undefined") return;
        window.__fjsld = 1;
        var fjs = document.createElement('script');
        fjs.type = 'text/javascript';
        fjs.async = true;
        fjs.id = "fjssync";
        var timestamp = new Date;
        fjs.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://hm.mieru-ca.com/service/js/mieruca-hm.js?v=' + timestamp.getTime();
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(fjs, x);
      };
      setTimeout(mieruca, 500);
      document.readyState != "complete" ? (window.attachEvent ? window.attachEvent("onload", mieruca) : window.addEventListener("load", mieruca, false)) : mieruca();
    })();
  </script>
  <!-- End Mieruca Embed Code -->
  <div class="target">
    <div id="flyin" class="stopanimate">
      <div class="sp_cta sp">
        <a href="tel:0120339070"><img class="" src="img/tel_cta_sp.png"></a>
        <button class="flyinclose button"></button>
      </div>
      <div class="pc">
        <div class="pc_cta1">
          <a href="tel:0120339070"><img class="" src="img/tel_cta_pc.png"></a>
        </div>
        <div class="pc_cta2">
          <a href="#contact"><img class="" src="img/mail_cta_pc.png"></a>
        </div>
        <button class="flyinclose button"></button>
      </div>
    </div>
  </div>
  <section class="wrapper">
    <!--header-->
    <header>
      <div class="header_inner">
        <div class="head_logo">
          <img src="img/logo.png" alt="sizebookロゴ">
        </div>
        <div class="head_tel">
          <a href="tel:0120339070">
            <img src="img/header_tel_pc.png" alt="" class="tel pc">
            <img src="img/header_tel_sp.png" alt="" class="tel sp">
          </a>
        </div>
      </div>
    </header>
    <div class="fv">
      <img src="img/fv_pc.png" class="pc" width="1920" height="995">
      <img src="img/fv_sp.png" class="sp" width="750" height="1297">
    </div>

    <!-- 231205 動画埋め込み(一部変更) -->
    <div class="tv_voice_contents_bg">
      <div class="tv_contents_ttl">
        <img src="img/tv_ttl_pc.png" class="tv_ttl_balloon pc " alt="テレビ放映記念">
        <img src="img/tv_ttl_sp.png" class="tv_ttl_balloon sp " alt="テレビ放映記念">
      </div>
      <div class="tv_voice_contents_ttl">
        <img src="img/tv_voice_ttl_pc.png" class="pc " alt="クライアント様からの率直な声もいただいております">
        <img src="img/tv_voice_ttl_sp.png" class="sp " alt="クライアント様からの率直な声もいただいております">
      </div>
      <div class="voice_inner">
        <div class="arm_mov">
          <img src="img/tv_voice_inner01_pc.png" class="pc " alt="株式会社ARMシステム、代表取締役 小林様">
          <img src="img/tv_voice_inner01_sp.png" class="sp " alt="株式会社ARMシステム、代表取締役 小林様">
          <div class="mov youtube_player" data-video-id="77PBgW3I4vw"></div>
        </div>
        <div class="sv_mov">
          <img src="img/tv_voice_inner02_pc.png" class="pc " alt="株式会社スヴェンソン、シニアマネージャー 長坂様">
          <img src="img/tv_voice_inner02_sp.png" class="sp " alt="株式会社スヴェンソン、シニアマネージャー 長坂様">
          <div class="mov youtube_player" data-video-id="G7fo1P8H6tI"></div>
        </div>
      </div>
    </div>
    <!-- 231124 動画埋め込み ここまで　-->

    <div class="crowns">
      <div class="crowns_inner">
        <img src="img/crowns_pc.png" class="pc ">
        <img src="img/crowns_sp.png" class="sp ">
      </div>
      <div class="crown_deco pc">
        <img src="img/crowns_deco.png">
      </div>
    </div>
    <div class="genre">
      <div class="genre_inner">
        <img src="img/genre_pc.png" class="pc ">
        <img src="img/genre_sp.png" class="sp ">
      </div>
    </div>
    <div class="marketing">
      <div class="marketing_ttl">
        <img src="img/policy_01_pc.png" class="pc ">
        <img src="img/policy_01_sp.png" class="sp ">
      </div>
      <div class="marke_inner01">
        <img class="" src="img/policy_02.png">
        <img class="" src="img/policy_03.png">
      </div>
      <div class="marke_inner02">
        <img src="img/policy_04_pc.png" class="pc ">
        <img src="img/policy_04_sp.png" class="sp ">
      </div>
    </div>
    <div class="works">
      <div class="works_inner">
        <img src="img/works_pc.png" class="pc ">
        <img src="img/works_sp.png" class="sp ">
      </div>
    </div>
    <div class="plan_bg01">
      <div class="plan_inner01">
        <img src="img/plan_pc.png" class="pc ">
        <img src="img/plan_sp.png" class="sp ">
      </div>
    </div>
    <div class="plan_bg02">
      <div class="plan_inner02">
        <img src="img/plan_02_pc.png" class="pc ">
        <img src="img/plan_02_sp.png" class="sp ">
      </div>
    </div>
    <!-- CTA -->
    <div class="cta_bg">
      <div class="cta_area">
        <div class="cta_ttl">
          <img src="img/cta_pc.png" class="pc " alt="現在の代理店にご不満がある方・成果に悩んでいる方などお気軽にお問い合わせください">
          <img src="img/cta_sp.png" class="sp " alt="現在の代理店にご不満がある方・成果に悩んでいる方などお気軽にお問い合わせください">
        </div>
        <div class="cta_inner">
          <div class="cta_flx">
            <div class="cta_num">
              <img src="img/cta_num_pc.png" class="pc " alt="0120-339-070">
              <img src="img/cta_num_sp.png" class="sp " alt="0120-339-070">
            </div>
            <div class="cta_btn">
              <a href="#contact">
                <img src="img/cta_form.png" class="" alt="お問い合わせフォームはこちら">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="worries">
      <img src="img/worries_01_pc.png" class="pc ">
      <img src="img/worries_01_sp.png" class="sp ">
      <div class="worries_bg">
        <div class="worries_inner">
          <img src="img/worries_02_pc.png" class="pc ">
          <img src="img/worries_02_sp.png" class="sp ">
        </div>
      </div>
    </div>
    <div class="success">
      <div class="success_ttl">
        <img src="img/success_ttl_pc.png" class="pc ">
        <img src="img/success_ttl_sp.png" class="sp ">
      </div>
      <div class="success_inner01">
        <img src="img/success_01_pc.png" class="pc ">
        <img src="img/success_01_sp.png" class="sp ">
        <img src="img/success_02_pc.png" class="pc ">
        <img src="img/success_02_sp.png" class="sp ">
      </div>
      <div class="success_inner02">
        <img src="img/success_03_pc.png" class="pc ">
        <img src="img/success_04_pc.png" class="pc ">
        <img src="img/success_03_sp.png" class="sp ">
        <img src="img/success_04_sp.png" class="sp ">
      </div>
    </div>
    <!-- CTA -->
    <div class="cta_bg">
      <div class="cta_area">
        <div class="cta_ttl">
          <img src="img/cta_pc.png" class="pc " alt="現在の代理店にご不満がある方・成果に悩んでいる方などお気軽にお問い合わせください">
          <img src="img/cta_sp.png" class="sp " alt="現在の代理店にご不満がある方・成果に悩んでいる方などお気軽にお問い合わせください">
        </div>
        <div class="cta_inner">
          <div class="cta_flx">
            <div class="cta_num">
              <img src="img/cta_num_pc.png" class="pc " alt="0120-339-070">
              <img src="img/cta_num_sp.png" class="sp " alt="0120-339-070">
            </div>
            <div class="cta_btn">
              <a href="#contact">
                <img src="img/cta_form.png" class="" alt="お問い合わせフォームはこちら">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="reason_bg01">
      <div class="reason_ttl01">
        <img src="img/reason_top_pc.png" class="pc ">
        <img src="img/reason_top_sp.png" class="sp ">
      </div>
    </div>
    <div class="reason_bg02">
      <div class="reason01_inner">
        <img src="img/reason_01_pc.png" class="pc ">
        <img src="img/reason_01_sp.png" class="sp ">
      </div>
      <div class="reason02_inner">
        <img src="img/reason_02_pc.png" class="pc ">
        <img src="img/reason_02_sp.png" class="sp ">
      </div>
      <div class="reason03_inner">
        <img src="img/reason_03_pc.png" class="pc ">
        <img src="img/reason_03_sp.png" class="sp ">
      </div>
    </div>
    <div class="price">
      <div class="price_inner">
        <img src="img/price_pc.png" class="pc ">
        <img src="img/price_sp.png" class="sp ">
      </div>
    </div>
    <!-- CTA -->
    <div class="cta_bg">
      <div class="cta_area">
        <div class="cta_ttl">
          <img src="img/cta_pc.png" class="pc " alt="現在の代理店にご不満がある方・成果に悩んでいる方などお気軽にお問い合わせください">
          <img src="img/cta_sp.png" class="sp " alt="現在の代理店にご不満がある方・成果に悩んでいる方などお気軽にお問い合わせください">
        </div>
        <div class="cta_inner">
          <div class="cta_flx">
            <div class="cta_num">
              <img src="img/cta_num_pc.png" class="pc " alt="0120-339-070">
              <img src="img/cta_num_sp.png" class="sp " alt="0120-339-070">
            </div>
            <div class="cta_btn">
              <a href="#contact">
                <img src="img/cta_form.png" class="" alt="お問い合わせフォームはこちら">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section" id="contact">
      <h2>お問い合わせ</h2>
      <div class="inner">
        <div class="table">
          <p class="center"><span class="must2">必須</span>印の項目は必須となりますので、必ず入力してください。</p>
          <form method="POST" action="check.php">
            <table>
              <tr>
                <th scope="row"><span class="must">必須</span>会社名</th>
                <td>
                  <input type="text" name="company" size="" value="" />
                  <div id="company_error_point"></div>
                </td>
              </tr>
              <tr>
                <th scope="row"><span class="must">必須</span>氏名</th>
                <td>
                  <input type="text" name="name" value="" istyle="1" />
                  <div id="name_error_point"></div>
                </td>
              </tr>
              <tr>
                <th scope="row"><span class="must">必須</span>ふりがな</th>
                <td>
                  <input type="text" name="kana" value="" istyle="1" />
                  <div id="kana_error_point"></div>
                </td>
              </tr>
              <tr>
                <th scope="row"><span class="must">必須</span>TEL</th>
                <td>
                  <input type="text" name="tel" value="" istyle="4" />
                  <p>ハイフン(-)は要りません　<br class="sp">例：0345779023</p>
                  <div id="tel_error_point"></div>
                </td>
              </tr>
              <tr>
                <th scope="row"><span class="must">必須</span>Eメール</th>
                <td>
                  <div><input type="text" name="email1" id="email1" value="" istyle="3" /></div>
                  <div id="email1_error_point"></div>
                  <p class="mb"><span class="must2">必須</span>確認のため、再度ご入力ください。</p>
                  <div><input type="text" name="email2" value="" istyle="3" /></div>
                  <div id="email2_error_point"></div>
                </td>
              </tr>
              <tr>
                <th scope="row">ウェブサイトのURL</th>
                <td>
                  <input type="text" name="url" value="" />
                </td>
              </tr>
              <tr>
                <th scope="row"><span class="must">必須</span>お問い合わせ内容</th>
                <td>
                  <ul>
                    <li><label><input type="checkbox" name="message[]" value="まずは詳しい説明が聞きたい">まずは詳しい説明が聞きたい</label></li>
                    <li><label><input type="checkbox" name="message[]" value="他社からの乗換えを検討している">他社からの乗換えを検討している</label>
                    </li>
                    <li><label><input type="checkbox" name="message[]" value="反響の増加">反響の増加</label></li>
                    <li><label><input type="checkbox" name="message[]" value="獲得効率の改善">獲得効率の改善</label></li>
                  </ul>
                  <div id="message_error_point"></div>
                  <p>その他にご相談内容やご質問、ご要望などありましたらご記入お願い致します。</p>
                  <textarea name="inquiry" istyle="1"></textarea>
                  <div id="inquiry_error_point"></div>
                </td>
              </tr>
            </table>
            <p class="must3"><a href="https://sizebook.co.jp/privacy.html"
                target="_blank">プライバシーポリシー</a>に同意の上、送信ください。<br />お送りいただいた内容を確認させて頂き、担当よりお電話差し上げます。</p>
            <div class="submit"><input type="submit" class="button" id="image_btn_conf" value="入力内容を確認する"
                name="submit" /></div>
          </form>
        </div>
      </div>
    </div>

    <footer>
      <a href="https://sizebook.co.jp/" target="_blank">運営者情報</a><br>
      <a href="https://sizebook.co.jp/column/" target="_blank">お役立ちコラム</a>
      <p>株式会社sizebook<br>&copy; 2023 sizebook</p>
    </footer>
  </section>

  <!--下記デラコンタグ-->
  <script src="//vxml4.plavxml.com/sited/ref/ctrk/1582-116680" async> </script>

  <!--LandingHub-->
  <style data-landinghub="fix-style-tag">
    img,
    video {
      height: auto;
    }
  </style>
  <!--End of LandingHub-->
  <!--LandingHub-->
  <script async data-landinghub="optimize-image-script-tag"
    src="https://airport.landinghub.cloud/image-optimize-script/latest/index.js"></script>
  <!--End of LandingHub-->

  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>

  <!-- LandingHub Dispatcher -->
  <!--<script data-landinghub="dispatcher-helper-tag">(function(w,d,i,wl){const u=new URL('https://airport.landinghub.cloud/dispatcher/manifest.json');u.searchParams.set('id',i);u.searchParams.set('location',w.location.href);wl.length&&u.searchParams.set('wl',wl.join(','));const l=d.createElement('link');l.rel='preload';l.as='fetch';l.crossOrigin='anonymous';l.href=u.href;d.head.prepend(l)})(window,document,'ac460cb1-d707-4469-add4-726275915db0',[])</script>-->
  <!--<script src="https://airport.landinghub.cloud/dispatcher/latest/index.js?id=ac460cb1-d707-4469-add4-726275915db0" data-landinghub="dispatcher-tag" referrerpolicy="strict-origin"></script>-->
  <!-- End of LandingHub Dispatcher -->

  <script type="text/javascript">
    $(function () {
      $('input').keypress(function (ev) {
        if ((ev.which && ev.which === 13) || (ev.keyCode && ev.keyCode === 13)) {
          return false;
        } else {
          return true;
        }
      });
      $("form").validate({
        rules: {
          name: {
            required: true
          },
          kana: {
            required: true
          },
          company: {
            required: true
          },
          tel: {
            required: true
          },
          email1: {
            required: true,
            email: true
          },
          email2: {
            required: true,
            email: true,
            equalTo: "#email1"
          },
          'message[]': {
            required: true,
            minlength: 1,
          },

        },
        messages: {
          name: {
            required: "お名前を入力してください"
          },
          kana: {
            required: "ふりがなを入力してください"
          },
          company: {
            required: "会社名を入力してください"
          },
          tel: {
            required: "電話番号を入力してください"
          },
          email1: {
            required: "Eメールを入力してください<br>",
            email: "正しいEメールを入力してください<br>"
          },
          email2: {
            required: "確認用Eメールを入力してください",
            email: "正しいEメールを入力してください",
            equalTo: "Eメールが上と異なります"
          },
          email2: {
            required: "確認用Eメールを入力してください",
            email: "正しいEメールを入力してください",
            equalTo: "Eメールが上と異なります"
          },
          'message[]': {
            required: 'お問い合わせ内容を1つ以上選択してください',
          },
        },
        errorPlacement: function (error, element) {
          if (element.attr("name") == "name") {
            error.insertAfter("#name_error_point");
          } else if (element.attr("name") == "kana") {
            error.insertAfter("#kana_error_point");
          } else if (element.attr("name") == "tel") {
            error.insertAfter("#tel_error_point");
          } else if (element.attr("name") == "email1") {
            error.insertAfter("#email1_error_point");
          } else if (element.attr("name") == "email2") {
            error.insertAfter("#email2_error_point");
          } else if (element.attr("name") == "company") {
            error.insertAfter("#company_error_point");
          } else if (element.attr('name') == 'message[]') {
            error.insertAfter('#message_error_point');
          } else {
            error.insertAfter(element);
          }
        }
      });

    })
  </script>

  <!--下記画像切り替え-->
  <script>
    jQuery(function ($) {
      $('.js-accordion-title').on('click', function () {
        $(this).next().slideToggle(200);
        $(this).toggleClass('open', 200);
      });

    });
  </script>
  <script>
    $(function () {
      $('a[href^="#"]').click(function () {
        let speed = 1500;
        let href = $(this).attr("href");
        let target = $(href == "#" || href == "" ? 'html' : href);
        let position = target.offset().top - 100;
        $("html, body").animate({ scrollTop: position }, speed, "swing");
        return false;
      });
    });
  </script>
  <script>
    $('.slider').slick({
      arrows: true,
      dots: true,
      centerMode: true,
      centerPadding: '15%',
      responsive: [{
        breakpoint: 760,
        settings: {
          centerMode: false
        }
      }]
    });
  </script>
  <script src="https://www.youtube.com/iframe_api"></script>
  <script>

    function onYouTubeIframeAPIReady() {
      const players = document.querySelectorAll('.youtube_player');

      players.forEach((div) => {
        const player = new YT.Player(div, {
          height: '240',
          width: '320',
          videoId: div.dataset.videoId,
          playerVars: {
            autoplay: 1, // 自動再生をオンに設定
            mute: 1, // 初期読み込み時はミュートにする
            loop: 1,
            playlist: div.dataset.videoId
          },
          events: {
            'onReady': (event) => {
              event.target.pauseVideo(); // すぐに一時停止してプレロードを促す
              setupObserver(event.target);
            }
          }
        });
        console.log('ready');
      });
    }

    function setupObserver(player) {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            player.mute();
            player.playVideo();
            console.log('play');
          } else {
            player.pauseVideo();
          }
        });
      }, {
        threshold: 0
      });

      observer.observe(player.getIframe());
    }

  </script>
</body>

</html>