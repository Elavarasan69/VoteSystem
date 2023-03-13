<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script> 
<?php
  	session_start();
  	if(isset($_SESSION['admin'])){
    	header('location: admin/home.php');
  	}

    if(isset($_SESSION['voter'])){
      header('location: home.php');
    }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page">
<div class="login-box">
  	<div class="login-logo">
  		<b>Voting System</b>
  	</div>
  
  	<div class="login-box-body">
    	<p class="login-box-msg">Sign in to start your session</p>

    	<form action="login.php" method="POST">
      		<div class="form-group has-feedback">
			  	<video id="preview" width="100%"></video>
        		<input type="text" class="form-control" name="voter" id="text" readonyy="" placeholder="Voter's ID" required>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
			  <div class="form-group">
                    <label for="fingerprint" class=" form-control-label">Fingerprint</label>
                    <div class="col-sm-9">
                      <input type="file" id="fingerprint" name="fingerprint">
                    </div>
                </div>

          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
        		</div>
      		</div>
    	</form>
  	</div>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
<script>
let scanner = new Instascan.Scanner({video: document.getElementById('preview')}); 
Instascan.Camera.getCameras().then(function(cameras){
if(cameras.length > 0){
scanner.start(cameras[0]);
} else {
alert('No cameras found');
}
}).catch(function(e) { 
    console.error(e);
});  
scanner.addListener('scan',function(c){
document.getElementById('text').value=c;
});
</script>
<?php include 'includes/scripts.php' ?>
</body>

<footer>
<p>
	<center><b>NOTE:</b> To Create New Voter's ID and Password- Login to <a href="http://localhost/Votesystem/admin/">Admin Panel </a>, Check Voters List and Add New Account. The System Automatically Generates VotersID </p></center>
</div>
</html>