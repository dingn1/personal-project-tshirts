<!DOCTYPE html>

<html>
  <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />

      <meta name="description" content="" />

      <meta name="keywords" content="" />

      <meta name="author" content="" />

      <link rel="stylesheet" type="text/css" href="style/style.css" media="screen" />

      <title>Tryon</title>
      <meta name="google" value="notranslate" />
      <!-- Include CSS to eliminate any default margins/padding and set the height of the html element and
           the body element to 100%, because Firefox, or any Gecko based browser, interprets percentage as
           the percentage of the height of its parent container, which has to be set explicitly.  Fix for
           Firefox 3.6 focus border issues.  Initially, don't display flashContent div so it won't show
           if JavaScript disabled.
      -->
      <style type="text/css" media="screen">
        html, body  { height:100%; }
        body { margin:0; padding:0; overflow:auto; text-align:center;
               background-color: #000000; }
        object:focus { outline:none; }
        #flashContent { display:none; }
      </style>

      <script type="text/javascript" src="swfobject.js"></script>
      <script type="text/javascript">
        // For version detection, set to min. required Flash Player version, or 0 (or 0.0.0), for no version detection.
        var swfVersionStr = "11.1.0";
        // To use express install, set to playerProductInstall.swf, otherwise the empty string.
        var xiSwfUrlStr = "playerProductInstall.swf";
        var flashvars = {};
        var params = {};
        params.quality = "high";
        params.bgcolor = "#000000";
        params.allowscriptaccess = "sameDomain";
        params.allowfullscreen = "true";
        var attributes = {};
        attributes.id = "WebcamFaceDetector";
        attributes.name = "WebcamFaceDetector";
        attributes.align = "middle";
        swfobject.embedSWF(
            "WebcamFaceDetector.swf", "flashContent",
            "640", "480",
            swfVersionStr, xiSwfUrlStr,
            flashvars, params, attributes);
        // JavaScript enabled so display the flashContent div in case it is not replaced with a swf object.
        swfobject.createCSS("#flashContent", "display:block;text-align:left;");
      </script>
  </head>

	<body>

		<div id="wrapper">

      <?php include('includes/header.php'); ?>

      <?php
        session_start();
        if(isset($_SESSION['username'])) {
          include('includes/nav2.php');
          echo "You are logged in as: ".$_SESSION['username'];
          echo "<p>";
          echo "<a href='logout.php'>Click here to lgout</a>";
          if($_SESSION['username']=='ding') {
            header("location:productimage.php");
          }
        } else {
          include('includes/nav.php');
          echo"Please log in.";
        }
      ?>

      <div id="content">

      </div> <!-- end #content -->
       <!-- SWFObject's dynamic embed method replaces this alternative HTML content with Flash content when enough
                   JavaScript and Flash plug-in support is available. The div is initially hidden so that it doesn't show
                   when JavaScript is disabled.
              -->
      <div id="flashContent">
          <p>
              To view this page ensure that Adobe Flash Player version
              11.1.0 or greater is installed.
          </p>
          <script type="text/javascript">
              var pageHost = ((document.location.protocol == "https:") ? "https://" : "http://");
              document.write("<a href='http://www.adobe.com/go/getflashplayer'><img src='"
                              + pageHost + "www.adobe.com/images/shared/download_buttons/get_flash_player.gif' alt='Get Adobe Flash player' /></a>" );
          </script>
      </div>

      <noscript>
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="640" height="480" id="WebcamFaceDetector">
              <param name="movie" value="WebcamFaceDetector.swf" />
              <param name="quality" value="high" />
              <param name="bgcolor" value="#000000" />
              <param name="allowScriptAccess" value="sameDomain" />
              <param name="allowFullScreen" value="true" />
              <!--[if !IE]>-->
              <object type="application/x-shockwave-flash" data="WebcamFaceDetector.swf" width="640" height="480">
                  <param name="quality" value="high" />
                  <param name="bgcolor" value="#000000" />
                  <param name="allowScriptAccess" value="sameDomain" />
                  <param name="allowFullScreen" value="true" />
              <!--<![endif]-->
              <!--[if gte IE 6]>-->
                  <p>
                      Either scripts and active content are not permitted to run or Adobe Flash Player version
                      11.1.0 or greater is not installed.
                  </p>
              <!--<![endif]-->
                  <a href="http://www.adobe.com/go/getflashplayer">
                      <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash Player" />
                  </a>
              <!--[if !IE]>-->
              </object>
              <!--<![endif]-->
          </object>
      </noscript>
      <?php include('includes/footer.php'); ?>

		</div> <!-- End #wrapper -->
	</body>
</html>
