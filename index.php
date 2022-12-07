<?php
if(!isset($_GET['back'])){
  exit("Parameters Missing!");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recaptcha Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src='https://www.google.com/recaptcha/api.js' async defer ></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <style>
      body{
       background:#252525;
      }
      .footer {
  position: fixed;
  left: 0;
  bottom: 0;
  height: 3.1rem;
  width: 100%;
  background-color: #00bfff;
  color: white;}
 /* text-align: center;*/
 .footer p,a{
   margin:7px;
   padding: 4px;
   color: white;
 }
    </style>
  </head>
  <body>
    
     <nav class="navbar" style="box-shadow: 2px 10px 60px grey;background:#00bfff;">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Captcha Verification</span>
  </div>
</nav>
<br><br><br>
 <div style="margin-top:50%;background-color:#00bfff; color:#252525; margin:10px;text-align:center;" class="alert alert-primary" role="alert">
 <h1>You Need To Complete The Captcha For Verify YourSelf </h1><br><br>
 <form action="" method="post">
 <center><div class="g-recaptcha" data-sitekey='6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI'></div><br></center><br>
<center> <div class="d-grid gap-2">
  <button style="width:100%;" class="btn btn-outline-dark" name="submit" type="submit">Confirm</button>
</div></center></form>
</div>
<?php
if(isset($_POST['submit'])){
  $res=$_POST['g-recaptcha-response'];
   if(!empty($res)){
         $secret = '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe';
$ch=curl_init();
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$res");
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
$verifyResponse=curl_exec($ch);
$js=json_decode ($verifyResponse);
$status = $js->success;
if($status==true){
  $ip=$_SERVER['REMOTE_ADDR'];
  $webhook=$_GET['webhookUrl'];
  $data='{
  "status":"true",
  "result":"Success",
  "ip":"'.$ip.'"
  }';
  echo '<script>   
       const data = JSON.stringify('.$data.')
       $.ajax({
      url:"'.$webhook.'",
      type:"post",
      data:data,
      success:function(returna){
      }
    })</script>';
         echo "<script>const Toast = Swal.mixin({
  toast: true,
  position: 'top',
  showConfirmButton: false,
  timer: 4500,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('', Swal.stopTimer)
    toast.addEventListener('', Swal.resumeTimer)
  }
})
Toast.fire({
  icon: 'success',
  title:'Verification Success'
})</script>";
echo '<meta http-equiv="refresh" content="4 url='.$_GET["back"].'">';
}
   }else{
     echo "<script>const Toast = Swal.mixin({
  toast: true,
  position: 'top',
  showConfirmButton: false,
  timer: 4500,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('', Swal.stopTimer)
    toast.addEventListener('', Swal.resumeTimer)
  }
})
Toast.fire({
  icon: 'error',
  title:'Please Verify Captcha'
})</script>";
   }
}
?>
<footer class="footer"><p>© Copyright :<a href="https://t.me/botcodes123" style="text-decoration:none;">@BotCodes123</a></p></footer>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script>

  </script>
  </body>
</html>