<?php
function ValidateEmail($email)
{
   $pattern = '/^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i';
   return preg_match($pattern, $email);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formid']) && $_POST['formid'] == 'form1')
{
   $mailto = 'prinymity@gmail.com';
   $mailfrom = isset($_POST['email']) ? $_POST['email'] : $mailto;
   $subject = 'Contact Information';
   $message = 'Values submitted from web site form:';
   $success_url = './success.html';
   $error_url = './contact.php';
   $eol = "\n";
   $error = '';
   $internalfields = array ("submit", "reset", "send", "filesize", "formid", "captcha_code", "recaptcha_challenge_field", "recaptcha_response_field", "g-recaptcha-response");
   $boundary = md5(uniqid(time()));
   $header  = 'From: '.$mailfrom.$eol;
   $header .= 'Reply-To: '.$mailfrom.$eol;
   $header .= 'MIME-Version: 1.0'.$eol;
   $header .= 'Content-Type: multipart/mixed; boundary="'.$boundary.'"'.$eol;
   $header .= 'X-Mailer: PHP v'.phpversion().$eol;

   try
   {
      if (!ValidateEmail($mailfrom))
      {
         $error .= "The specified email address (" . $mailfrom . ") is invalid!\n<br>";
         throw new Exception($error);
      }
      $message .= $eol;
      $message .= "IP Address : ";
      $message .= $_SERVER['REMOTE_ADDR'];
      $message .= $eol;
      foreach ($_POST as $key => $value)
      {
         if (!in_array(strtolower($key), $internalfields))
         {
            if (!is_array($value))
            {
               $message .= ucwords(str_replace("_", " ", $key)) . " : " . $value . $eol;
            }
            else
            {
               $message .= ucwords(str_replace("_", " ", $key)) . " : " . implode(",", $value) . $eol;
            }
         }
      }
      $body  = 'This is a multi-part message in MIME format.'.$eol.$eol;
      $body .= '--'.$boundary.$eol;
      $body .= 'Content-Type: text/plain; charset=ISO-8859-1'.$eol;
      $body .= 'Content-Transfer-Encoding: 8bit'.$eol;
      $body .= $eol.stripslashes($message).$eol;
      if (!empty($_FILES))
      {
         foreach ($_FILES as $key => $value)
         {
             if ($_FILES[$key]['error'] == 0)
             {
                $body .= '--'.$boundary.$eol;
                $body .= 'Content-Type: '.$_FILES[$key]['type'].'; name='.$_FILES[$key]['name'].$eol;
                $body .= 'Content-Transfer-Encoding: base64'.$eol;
                $body .= 'Content-Disposition: attachment; filename='.$_FILES[$key]['name'].$eol;
                $body .= $eol.chunk_split(base64_encode(file_get_contents($_FILES[$key]['tmp_name']))).$eol;
             }
         }
      }
      $body .= '--'.$boundary.'--'.$eol;
      if ($mailto != '')
      {
         mail($mailto, $subject, $body, $header);
      }
      header('Location: '.$success_url);
   }
   catch (Exception $e)
   {
      $errorcode = file_get_contents($error_url);
      $replace = "##error##";
      $errorcode = str_replace($replace, $e->getMessage(), $errorcode);
      echo $errorcode;
   }
   exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dark Web Dive</title>
<meta name="generator" content="WYSIWYG Web Builder 15 Trial Version - http://www.wysiwygwebbuilder.com">
<link href="dark_web_dive.css" rel="stylesheet">
<link href="buy_now.css" rel="stylesheet">
<script src="jquery-1.12.4.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script src="wb.slideshow.min.js"></script>
<script>
$(document).ready(function()
{
   $("#SlideShow1").slideshow(
   {
      interval: 3000,
      type: 'sequence',
      effect: 'none',
      direction: '',
      pagination: false,
      effectlength: 2000
   });
});
</script>
</head>
<body>
<div id="container">
<div id="wb_Shape6" style="position:absolute;left:1px;top:1px;width:1199px;height:79px;z-index:7;">
<img src="images/img0044.png" id="Shape6" alt="" style="width:1199px;height:79px;"></div>
<div id="wb_Shape1" style="position:absolute;left:1px;top:105px;width:1199px;height:1277px;z-index:8;">
<img src="images/img0021.png" id="Shape1" alt="" style="width:1199px;height:1277px;"></div>
<div id="wb_Shape2" style="position:absolute;left:19px;top:207px;width:552px;height:307px;z-index:9;">
<img src="images/img0007.png" id="Shape2" alt="" style="width:552px;height:307px;"></div>
<div id="wb_Shape3" style="position:absolute;left:626px;top:206px;width:552px;height:307px;z-index:10;">
<img src="images/img0008.png" id="Shape3" alt="" style="width:552px;height:307px;"></div>
<a href="http://www.wysiwygwebbuilder.com" target="_blank"><img src="images/builtwithwwb15.png" alt="WYSIWYG Web Builder" style="position:absolute;left:5px;top:1351px;margin: 0;border-width:0;z-index:250"></a>
<div id="wb_Shape4" style="position:absolute;left:19px;top:564px;width:552px;height:307px;z-index:12;">
<img src="images/img0009.png" id="Shape4" alt="" style="width:552px;height:307px;"></div>
<div id="wb_Shape5" style="position:absolute;left:626px;top:563px;width:552px;height:307px;z-index:13;">
<img src="images/img0010.png" id="Shape5" alt="" style="width:552px;height:307px;"></div>
<div id="wb_Text1" style="position:absolute;left:292px;top:231px;width:253px;height:256px;text-align:center;z-index:14;">
<span style="color:#000000;font-family:Arial;font-size:27px;">Customize your Brand New/2nd hand PC/Laptop with a change of color to suit your personality or&nbsp; not have that boring black or white color</span></div>
<div id="wb_Image1" style="position:absolute;left:632px;top:203px;width:242px;height:306px;z-index:15;">
<img src="images/4689435f1a7eb3335c142ffa37d77e63.png" id="Image1" alt=""></div>
<div id="wb_Text2" style="position:absolute;left:879px;top:215px;width:281px;height:288px;z-index:16;">
<span style="color:#000000;font-family:Arial;font-size:27px;">Sourcing external Customization to your Brand New/2nd hand PC/Laptop with not only a change of color but add RGB, additional hardware, personalize your machine to you.</span></div>
<div id="wb_Image2" style="position:absolute;left:16px;top:211px;width:281px;height:310px;z-index:17;">
<img src="images/flames.png" id="Image2" alt=""></div>
<div id="wb_Text3" style="position:absolute;left:307px;top:588px;width:249px;height:256px;text-align:center;z-index:18;">
<span style="color:#000000;font-family:Arial;font-size:27px;">Build your own PC from scratch installing the OS/Distro including all security features to protect your privacy and be anonymous online.</span></div>
<div id="wb_Image3" style="position:absolute;left:16px;top:567px;width:281px;height:301px;z-index:19;">
<img src="images/post-219412-0-55568600-1427844371.png" id="Image3" alt=""></div>
<div id="wb_Image4" style="position:absolute;left:660px;top:592px;width:468px;height:279px;z-index:20;">
<img src="images/maxresdefault.png" id="Image4" alt=""></div>
<div id="wb_Image5" style="position:absolute;left:632px;top:513px;width:546px;height:49px;z-index:21;">
<img src="images/img0022.jpg" id="Image5" alt=""></div>
<div id="wb_Image6" style="position:absolute;left:19px;top:512px;width:552px;height:50px;z-index:22;">
<img src="images/img0020.jpg" id="Image6" alt=""></div>
<div id="wb_Image8" style="position:absolute;left:629px;top:879px;width:549px;height:50px;z-index:23;">
<img src="images/img0025.jpg" id="Image8" alt=""></div>
<div id="wb_Image9" style="position:absolute;left:28px;top:939px;width:549px;height:50px;z-index:24;">
<img src="images/img0024.jpg" id="Image9" alt=""></div>
<div id="wb_Image7" style="position:absolute;left:28px;top:879px;width:549px;height:50px;z-index:25;">
<img src="images/img0023.jpg" id="Image7" alt=""></div>
<div id="SlideShow1" style="position:absolute;left:147px;top:1009px;width:398px;height:298px;z-index:26;">
<img class="image" src="images/2ppx7jtxqq621.jpg" alt="" title="">
<img class="image" src="images/8ca3160ec2d467ad4b6da2ad192d821b.jpg" style="display:none;" alt="" title="">
<img class="image" src="images/4689435f1a7eb3335c142ffa37d77e63.jpg" style="display:none;" alt="" title="">
<img class="image" src="images/db401899264ed3073faec33c9b9cb7ea.jpg" style="display:none;" alt="" title="">
<img class="image" src="images/flames.jpg" style="display:none;" alt="" title="">
<img class="image" src="images/maxresdefault.jpg" style="display:none;" alt="" title="">
<img class="image" src="images/post-219412-0-55568600-1427844371.jpg" style="display:none;" alt="" title="">
<img class="image" src="images/speedlink300.jpg" style="display:none;" alt="" title="">
</div>
<div id="wb_Form1" style="position:absolute;left:732px;top:1021px;width:298px;height:227px;z-index:27;">
<form name="contact" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" id="Form1">
<input type="hidden" name="formid" value="form1">
<label for="Editbox1" id="Label1" style="position:absolute;left:10px;top:15px;width:50px;height:16px;line-height:16px;z-index:0;">Name:</label>
<input type="text" id="Editbox1" style="position:absolute;left:78px;top:15px;width:190px;height:16px;z-index:1;" name="name" value="" spellcheck="false">
<label for="Editbox2" id="Label2" style="position:absolute;left:10px;top:46px;width:50px;height:16px;line-height:16px;z-index:2;">Email:</label>
<input type="text" id="Editbox2" style="position:absolute;left:78px;top:46px;width:190px;height:16px;z-index:3;" name="email" value="" spellcheck="false">
<label for="TextArea1" id="Label3" style="position:absolute;left:10px;top:77px;width:50px;height:16px;line-height:16px;z-index:4;">Message</label>
<textarea name="TextArea1" id="TextArea1" style="position:absolute;left:78px;top:77px;width:190px;height:90px;z-index:5;" rows="4" cols="29" autocomplete="off" spellcheck="false"></textarea>
<input type="submit" id="Button1" name="" value="Send" style="position:absolute;left:78px;top:182px;width:96px;height:25px;z-index:6;">
</form>
</div>
<div id="wb_Image10" style="position:absolute;left:5px;top:1px;width:77px;height:77px;z-index:28;">
<img src="images/computer-logos-8.png" id="Image10" alt=""></div>
<div id="wb_Text4" style="position:absolute;left:111px;top:5px;width:249px;height:67px;z-index:29;">
<span style="color:#FF0000;font-family:'Comic Sans MS';font-size:48px;">Prinymity</span></div>
<div id="NavigationBar1" style="position:absolute;left:345px;top:27px;width:852px;height:22px;z-index:30;">
<ul class="navbar">
<li id="NavigationBar1_item0"><a href="./index.html"><img alt="Home" title="Home" src="images/img0045_over.png" class="hover"><span><img alt="Home" title="Home" src="images/img0045.png"></span></a></li>
<li id="NavigationBar1_item1"><a href="./about.html"><img alt="About Us" title="About Us" src="images/img0046_over.png" class="hover"><span><img alt="About Us" title="About Us" src="images/img0046.png"></span></a></li>
<li id="NavigationBar1_item2"><a href="./web_explained.html"><img alt="Web Explained" title="Web Explained" src="images/img0054_over.png" class="hover"><span><img alt="Web Explained" title="Web Explained" src="images/img0054.png"></span></a></li>
<li id="NavigationBar1_item3"><a href="./vpn_explained.html"><img alt="VPN Explained" title="VPN Explained" src="images/img0055_over.png" class="hover"><span><img alt="VPN Explained" title="VPN Explained" src="images/img0055.png"></span></a></li>
<li id="NavigationBar1_item4"><a href="./tails_vs_other_os.html"><img alt="Tails vs Other OS" title="Tails vs Other OS" src="images/img0056_over.png" class="hover"><span><img alt="Tails vs Other OS" title="Tails vs Other OS" src="images/img0056.png"></span></a></li>
<li id="NavigationBar1_item5"><a href="./buy_now.php"><img alt="Buy NOw" title="Buy NOw" src="images/img0057_over.png" class="hover"><span><img alt="Buy NOw" title="Buy NOw" src="images/img0057.png"></span></a></li>
<li id="NavigationBar1_item6"><a href="./contact.php"><img alt="Contact Us" title="Contact Us" src="images/img0058_over.png" class="hover"><span><img alt="Contact Us" title="Contact Us" src="images/img0058.png"></span></a></li>
</ul>
</div>
<div id="wb_JavaScript1" style="position:absolute;left:279px;top:1360px;width:618px;height:32px;z-index:31;">
<div style="color:#000000;font-size:16px;font-family:Arial;font-weight:normal;font-style:normal;text-align:center;text-decoration:none" id="copyrightnotice"></div>
<script>
   var now = new Date();
   var startYear = "2010";
   var text =  "Copyright &copy; ";
   if (startYear != '')
   {
      text = text + startYear + "-";
   }
   text = text + now.getFullYear() + ", Prinymity. All rights reserved.";
   var copyrightnotice = document.getElementById('copyrightnotice');
   copyrightnotice.innerHTML = text;
</script>


</div>
</div>
</body>
</html>