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
   $error_url = '';
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
<link href="contact.css" rel="stylesheet">
</head>
<body>
<div id="container">
<div id="wb_Shape2" style="position:absolute;left:1px;top:1px;width:1199px;height:79px;z-index:29;">
<img src="images/img0059.png" id="Shape2" alt="" style="width:1199px;height:79px;"></div>
<div id="wb_Shape1" style="position:absolute;left:1px;top:80px;width:1199px;height:847px;z-index:30;">
<img src="images/img0031.png" id="Shape1" alt="" style="width:1199px;height:847px;"></div>
<div id="wb_Form1" style="position:absolute;left:736px;top:283px;width:324px;height:559px;z-index:31;">
<form name="contact" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" id="Form1">
<input type="hidden" name="formid" value="form1">
<label for="Combobox1" id="Label1" style="position:absolute;left:10px;top:15px;width:76px;height:16px;line-height:16px;z-index:0;">Subject:</label>
<select name="subject" size="1" id="Combobox1" style="position:absolute;left:104px;top:15px;width:200px;height:28px;z-index:1;" autocomplete="off">
<option selected value="General Feedback">General Feedback</option>
<option value="Contact Request">Contact Request</option>
<option value="Price Quote">Price Quote</option>
<option value="Employment Information">Employment Information</option>
</select>
<label for="Editbox1" id="Label2" style="position:absolute;left:10px;top:48px;width:76px;height:16px;line-height:16px;z-index:2;">Name:</label>
<input type="text" id="Editbox1" style="position:absolute;left:104px;top:48px;width:190px;height:16px;z-index:3;" name="name" value="" spellcheck="false">
<label for="Editbox2" id="Label3" style="position:absolute;left:10px;top:79px;width:76px;height:16px;line-height:16px;z-index:4;">Email:</label>
<input type="text" id="Editbox2" style="position:absolute;left:104px;top:79px;width:190px;height:16px;z-index:5;" name="email" value="" spellcheck="false">
<label for="TextArea1" id="Label4" style="position:absolute;left:10px;top:110px;width:76px;height:16px;line-height:16px;z-index:6;">Address:</label>
<textarea name="Address" id="TextArea1" style="position:absolute;left:104px;top:110px;width:190px;height:90px;z-index:7;" rows="4" cols="29" autocomplete="off" spellcheck="false"></textarea>
<label for="Editbox3" id="Label5" style="position:absolute;left:10px;top:215px;width:76px;height:16px;line-height:16px;z-index:8;">City:</label>
<input type="text" id="Editbox3" style="position:absolute;left:104px;top:215px;width:190px;height:16px;z-index:9;" name="Province" value="" spellcheck="false">
<label for="Editbox4" id="Label6" style="position:absolute;left:10px;top:246px;width:76px;height:16px;line-height:16px;z-index:10;">State:</label>
<input type="text" id="Editbox4" style="position:absolute;left:104px;top:246px;width:190px;height:16px;z-index:11;" name="Province" value="" spellcheck="false">
<label for="Editbox5" id="Label7" style="position:absolute;left:10px;top:277px;width:76px;height:16px;line-height:16px;z-index:12;">Home Phone:</label>
<input type="text" id="Editbox5" style="position:absolute;left:104px;top:277px;width:190px;height:16px;z-index:13;" name="Home Phone" value="" spellcheck="false">
<label for="Editbox6" id="Label8" style="position:absolute;left:10px;top:308px;width:76px;height:16px;line-height:16px;z-index:14;">Work Phone</label>
<input type="text" id="Editbox6" style="position:absolute;left:104px;top:308px;width:190px;height:16px;z-index:15;" name="Work Phone" value="" spellcheck="false">
<label for="" id="Label9" style="position:absolute;left:10px;top:339px;width:219px;height:16px;line-height:16px;z-index:16;">When is the best time to contact you?</label>
<label for="RadioButton1" id="Label10" style="position:absolute;left:10px;top:364px;width:76px;height:16px;line-height:16px;z-index:17;">Morning</label>
<div id="wb_RadioButton1" style="position:absolute;left:104px;top:364px;width:20px;height:20px;z-index:18;">
<input type="radio" id="RadioButton1" name="q[1]" value="Morning" checked style="position:absolute;left:0;top:0;"><label for="RadioButton1"></label></div>
<label for="RadioButton2" id="Label11" style="position:absolute;left:10px;top:389px;width:76px;height:16px;line-height:16px;z-index:19;">Afternoon</label>
<div id="wb_RadioButton2" style="position:absolute;left:104px;top:389px;width:20px;height:20px;z-index:20;">
<input type="radio" id="RadioButton2" name="q[1]" value="Afternoon" style="position:absolute;left:0;top:0;"><label for="RadioButton2"></label></div>
<label for="RadioButton3" id="Label12" style="position:absolute;left:10px;top:414px;width:76px;height:16px;line-height:16px;z-index:21;">Evening</label>
<div id="wb_RadioButton3" style="position:absolute;left:104px;top:414px;width:20px;height:20px;z-index:22;">
<input type="radio" id="RadioButton3" name="q[1]" value="Evening" style="position:absolute;left:0;top:0;"><label for="RadioButton3"></label></div>
<label for="" id="Label13" style="position:absolute;left:10px;top:439px;width:219px;height:16px;line-height:16px;z-index:23;">What is the best way to contact you?</label>
<label for="RadioButton4" id="Label14" style="position:absolute;left:10px;top:464px;width:76px;height:16px;line-height:16px;z-index:24;">Phone</label>
<div id="wb_RadioButton4" style="position:absolute;left:104px;top:464px;width:20px;height:20px;z-index:25;">
<input type="radio" id="RadioButton4" name="q[2]" value="Phone" checked style="position:absolute;left:0;top:0;"><label for="RadioButton4"></label></div>
<label for="RadioButton5" id="Label15" style="position:absolute;left:10px;top:489px;width:76px;height:16px;line-height:16px;z-index:26;">E-mail</label>
<div id="wb_RadioButton5" style="position:absolute;left:104px;top:489px;width:20px;height:20px;z-index:27;">
<input type="radio" id="RadioButton5" name="q[2]" value="E-mail" style="position:absolute;left:0;top:0;"><label for="RadioButton5"></label></div>
<input type="submit" id="Button1" name="" value="Send" style="position:absolute;left:104px;top:514px;width:96px;height:25px;z-index:28;">
</form>
</div>
<div id="wb_Image1" style="position:absolute;left:351px;top:94px;width:469px;height:164px;z-index:32;">
<img src="images/contact_us_banner1.jpg" id="Image1" alt=""></div>
<div id="wb_Image2" style="position:absolute;left:85px;top:297px;width:555px;height:499px;z-index:33;">
<img src="images/flames.png" id="Image2" alt=""></div>
<div id="wb_Text1" style="position:absolute;left:107px;top:812px;width:515px;height:90px;text-align:center;z-index:34;">
<span style="color:#000000;font-family:'Comic Sans MS';font-size:32px;">Taking Computers To The Next Level</span></div>
<div id="wb_Image6" style="position:absolute;left:5px;top:1px;width:77px;height:77px;z-index:35;">
<img src="images/computer-logos-8.png" id="Image6" alt=""></div>
<div id="wb_Text2" style="position:absolute;left:111px;top:5px;width:249px;height:67px;z-index:36;">
<span style="color:#FF0000;font-family:'Comic Sans MS';font-size:48px;">Prinymity</span></div>
<div id="NavigationBar1" style="position:absolute;left:345px;top:27px;width:852px;height:22px;z-index:37;">
<ul class="navbar">
<li id="NavigationBar1_item0"><a href="./index.html"><img alt="Home" title="Home" src="images/img0060_over.png" class="hover"><span><img alt="Home" title="Home" src="images/img0060.png"></span></a></li>
<li id="NavigationBar1_item1"><a href="./about.html"><img alt="About Us" title="About Us" src="images/img0061_over.png" class="hover"><span><img alt="About Us" title="About Us" src="images/img0061.png"></span></a></li>
<li id="NavigationBar1_item2"><a href="./web_explained.html"><img alt="Web Explained" title="Web Explained" src="images/img0062_over.png" class="hover"><span><img alt="Web Explained" title="Web Explained" src="images/img0062.png"></span></a></li>
<li id="NavigationBar1_item3"><a href="./vpn_explained.html"><img alt="VPN Explained" title="VPN Explained" src="images/img0063_over.png" class="hover"><span><img alt="VPN Explained" title="VPN Explained" src="images/img0063.png"></span></a></li>
<li id="NavigationBar1_item4"><a href="./tails_vs_other_os.html"><img alt="Tails vs Other OS" title="Tails vs Other OS" src="images/img0064_over.png" class="hover"><span><img alt="Tails vs Other OS" title="Tails vs Other OS" src="images/img0064.png"></span></a></li>
<li id="NavigationBar1_item5"><a href="./buy_now.php"><img alt="Buy NOw" title="Buy NOw" src="images/img0065_over.png" class="hover"><span><img alt="Buy NOw" title="Buy NOw" src="images/img0065.png"></span></a></li>
<li id="NavigationBar1_item6"><a href="./contact.php"><img alt="Contact Us" title="Contact Us" src="images/img0066_over.png" class="hover"><span><img alt="Contact Us" title="Contact Us" src="images/img0066.png"></span></a></li>
</ul>
</div>
<a href="http://www.wysiwygwebbuilder.com" target="_blank"><img src="images/builtwithwwb15.png" alt="WYSIWYG Web Builder" style="position:absolute;left:9px;top:887px;margin: 0;border-width:0;z-index:250"></a>
<div id="wb_JavaScript1" style="position:absolute;left:261px;top:902px;width:618px;height:32px;z-index:39;">
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