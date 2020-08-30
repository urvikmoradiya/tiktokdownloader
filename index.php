<?php

function getContent($url)
  {
    $ch = curl_init();
    $options = array(
        CURLOPT_URL            => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/28.0',
        CURLOPT_ENCODING       => "utf-8",
        CURLOPT_AUTOREFERER    => true,
        CURLOPT_CONNECTTIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_MAXREDIRS      => 10,
    );
    curl_setopt_array( $ch, $options );
    if (defined('CURLOPT_IPRESOLVE') && defined('CURL_IPRESOLVE_V4')) {
      curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    }
    $data = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return strval($data);
  }

  function getKey($playable)
  {
    $ch = curl_init();
    $headers = [
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
    'Accept-Encoding: gzip, deflate, br',
    'Accept-Language: en-US,en;q=0.9',
    'Range: bytes=0-200000'
    ];

    $options = array(
        CURLOPT_URL            => $playable,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_HTTPHEADER     => $headers,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/28.0',
        CURLOPT_ENCODING       => "utf-8",
        CURLOPT_AUTOREFERER    => true,
        CURLOPT_CONNECTTIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_MAXREDIRS      => 10,
    );
    curl_setopt_array( $ch, $options );
    if (defined('CURLOPT_IPRESOLVE') && defined('CURL_IPRESOLVE_V4')) {
      curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    }
    $data = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    $tmp = explode("vid:", $data);
    if(count($tmp) > 1){
        $key = trim(explode("%", $tmp[1])[0]);
    }
    else
    {
        $key = "";
    }
    return $key;
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>TikTok Video Downloader</title>

    <link href='libs/fontawesome/css/fontawesome.min.css' rel='stylesheet' />

   <!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->

     <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link href="https://fonts.googleapis.com/css2?family=Gotu&display=swap" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
    html, body
    {
        font-family: 'Poppins', sans-serif;
    }
    input
    {
        padding: 5px;
        border-radius: 30px;
        border-style: groove;
        
        transition-duration: 0.5s;
        width: 80%;
        background-color: black;
        color: #525252;
        
        font-size: 13px;
        font-weight: 80;
        letter-spacing: 1.5px;
        height: 38px;
        /*border: none;*/

    }
    input:focus
    {
        border-color: #333c;
        transition-duration: 0.5s;
    }

input[type=text] {
color: white;
padding-left: 15px;
}




    .btn-Download
    {

    }

@media only screen and (max-width: 600px) {
  body {
    background-color: #0088ff1f;
  }
}

/*    .navscroll {
    background-color: white;
    border-bottom: 1px solid #e6e6e6;
    -webkit-box-shadow: 0px 2px 10px 0px rgba(0, 0, 0, 0.12);
    box-shadow: 0px 2px 10px 0px rgba(0, 0, 0, 0.12);
}

.navbar {
    z-index: 16;
    position: fixed;
    top: 0;
    width: 100%;
    -webkit-transition: all .2s ease;
    -o-transition: all .2s ease;
    transition: all .2s ease;
    height: 77px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-direction: row;
    flex-direction: row;
    border-bottom: 1px solid transparent;
}

@media (min-width: 768px)
.navbar {
    border-radius: 4px;
}*/


.btn-bubble {
  color: white;
  background-color: #488ff9f5;
  background-repeat: no-repeat;
  border-radius: 50px;
  border: none;
  
}
.btn-bubble:hover, .btn-bubble:focus {
  -webkit-animation: bubbles 1s forwards ease-out;
          animation: bubbles 1s forwards ease-out;
          color: white;
  background: radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 22% 81% / 1.01em 1.01em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 101% 136% / 0.88em 0.88em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 84% 138% / 0.8em 0.8em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 73% 121% / 1.17em 1.17em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 74% 136% / 0.54em 0.54em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) -7% 80% / 0.59em 0.59em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 24% 144% / 0.96em 0.96em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) -3% 90% / 0.95em 0.95em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 80% 133% / 0.82em 0.82em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 42% 114% / 0.92em 0.92em, radial-gradient(circle at center, rgba(0, 0, 0, 0) 30%, #eeeeff 60%, #eeeeff 65%, rgba(0, 0, 0, 0) 70%) 43% 130% / 1.05em 1.05em;
  background-color: black;
  background-repeat: no-repeat;
outline-color: none;
  border: none;
}

@-webkit-keyframes bubbles {
  100% {
    background-position: 32% -364%, 107% -232%, 89% -227%, 70% -305%, 67% -1%, -5% -83%, 28% -76%, -4% -36%, 90% 44%, 41% 52%, 45% -397%;
    box-shadow: inset 0 -6.5em 0 #0072c4;
  }
}

@keyframes bubbles {
  100% {
    background-position: 32% -364%, 107% -232%, 89% -227%, 70% -305%, 67% -1%, -5% -83%, 28% -76%, -4% -36%, 90% 44%, 41% 52%, 45% -397%;
    box-shadow: inset 0 -6.5em 0 #0072c4;
  }
}




.btn {
  display: inline-block;
  text-decoration: none;
  padding: 1em 2em;
}












</style>
</head>
<body class="bg-light">

    <header>
        <div class="cntr"> <div class="head h_m_w"> <div class="h-nav"> <label for="offcanvas-menu" class="t-btn"></label> </div>
<center>
         <div class="logo"> 

            <div class="amp-logo">


         <a href="https://worldwebcourse.online/amp/" title="World Web Course"> <amp-img src="https://worldwebcourse.online/php_content/uploads/2020/02/cropped-wwc-free-course-download-everyone.png" width="250" height="76" alt="World Web Course" class="amp-logo i-amphtml-element i-amphtml-layout-responsive i-amphtml-layout-size-defined i-amphtml-layout" layout="responsive" i-amphtml-layout="responsive" i-amphtml-auto-lightbox-visited=""><i-amphtml-sizer style="padding-top: 30.4%;"></i-amphtml-sizer>

            <img decoding="async" alt="World Web Course" src="https://worldwebcourse.online/php_content/uploads/2020/02/cropped-wwc-free-course-download-everyone.png" class="i-amphtml-fill-content i-amphtml-replaced-content"></amp-img>
        </a> 


    </div> </div></center>

  
    </header>


<br><br>
    <div class="text-center p-5">
        <img src="images/tiktok.svg" alt="tikok-logo"> 



        <img src="images/tiktok_logo.svg" alt="TikTok">
        

        <h1 class="mt-5">Download 

            <img src="images/tiktok.svg" alt="tikok-logo"> 


            <img src="images/tiktok_logo.svg" alt="TikTok"> video easily!</h1>

<br>

        <h4>Now supports <strong>watermark free version</strong> too and shorturls are subject to change!</h4>

        <br>
    </div>
    <div class="text-center">
        Paste a video url below and press <b>"Download"</b>
          <br>  <br>
        <form method="POST" class="">
            <input type="text" placeholder="https://www.tiktok.com/@username/video/1234567890123456789" class="mb-3" name="tiktok-url"><br>
              <br>



            <button class="btn btn-bubble" type="submit">Download Video</button>
        </form>
    </div>


  
    <?php
        if (isset($_POST['tiktok-url']) && !empty($_POST['tiktok-url'])) {
            $url = $_POST['tiktok-url'];
            $resp = getContent($url);
            //echo "$resp";
            $check = explode("\"contentUrl\":\"", $resp);
            if (count($check) > 1){
                $contentURL = explode("\"",$check[1])[0];

                $thumb = explode("\"",explode("\"thumbnailUrl\":[\"", $resp)[1])[0];
                $username = explode("/",explode("@",explode("\"",explode("\"url\":\"", $resp)[1])[0])[1])[0];
                $videoKey = getKey($contentURL);
                $cleanVideo = "https://api2.musical.ly/aweme/v1/playwm/?video_id=$videoKey";
            
        ?>
        <br><br>
    <div class="border m-3 mb-5">
        <div class="row m-0 p-2">
            <div class="col-sm-5 col-md-5 col-lg-5 text-center"><img width="210px" height="373px" src="<?php echo $thumb; ?>"></div>

            <div class="col-sm-6 col-md-6 col-lg-6 text-center mt-5"><ul style="list-style: none;padding: 0px">
               <br>
                <li>a video by <b>@<?php echo $username; ?></b></li>
               <br>
                <li><button class="btn btn-bubble mt-3" style="background-color: #5cb85c;
    border-color: #4cae4c;"
    onclick="window.location.href='<?php echo $contentURL; ?>'">Download Video</button>
<br>
<br>
                 <button class="btn btn-bubble mt-3" style="background-color: #337ab7;
    border-color: #2e6da4;"

    onclick="window.location.href='<?php echo $cleanVideo; ?>'">Download Watermark Free!</button></li>
                <li><div class="alert alert-primary mb-0 mt-3">If the video opens directly, try saving it by pressing <b>CTRL+S</b> or on phone, save from three dots in the bottom left corner</div></li>
            </ul></div>
        </div>
    </div>
    <?php
            }
            else
            {
                ?>
                <div class="mx-5 px-5 my-3">
                    <div class="alert alert-danger mb-0"><b>Please double check your url and try again.</b></div>
                </div>

                <?php
            }
        }
    ?>
    <div class="m-5">
        &nbsp;
    </div>
   
    <script type="text/javascript">
        window.setInterval(function(){
            if ($("input[name='tiktok-url']").attr("placeholder") == "https://www.tiktok.com/@username/video/1234567890123456789") {
                $("input[name='tiktok-url']").attr("placeholder", "https://vm.tiktok.com/a1b2c3/");
            }
            else
            {
                $("input[name='tiktok-url']").attr("placeholder", "https://www.tiktok.com/@username/video/1234567890123456789");
            }
        }, 3000);
    </script>

   <script src="libs/jquery/jquery-3.4.1.min.js"></script>
    <script src="libs/bootstrap/js/bootstrap.min.js"></script>


<center>
    <h3><b>Advertisement</b></h3>
</center>
</body>
</html>
