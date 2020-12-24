<?php 

if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0){
	//Request hash
	$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';	
	if(strcasecmp($contentType, 'application/json') == 0){
		$data = json_decode(file_get_contents('php://input'));
		$hash=hash('sha512', $data->key.'|'.$data->txnid.'|'.$data->amount.'|'.$data->pinfo.'|'.$data->fname.'|'.$data->email.'|||||'.$data->udf5.'||||||'.$data->salt);
		$json=array();
		$json['success'] = $hash;
    	echo json_encode($json);
	
	}
	
}
 
function getCallbackUrl()
{
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . 'response.php';
}

?>
<main class="page-content" id="buy-now">

  <div class="container">
    <div id="top-header-my-account row card" style="padding: 5% 0; background-color: white;margin: 5% 0;">
      <h1 style="background-color: white !important; color: black !important;" class="text-center"><?php echo $title; ?></h1>
    </div>
    <div class="row">

      <div class="col-lg-4 col-md-12 col-sm-12"></div>
      <div class="col-lg-4 col-md-12 col-sm-12 card" style="background-color: white; color: black !important;">
        <img src="<?php echo site_url('assets/images/game_product_featured_images/'.$gameProductData['featured_image']) ?>" style="width: 100%;">
        <div class="card-body">
          <h3 class="card-title" style="background-color: white !important; color: black !important;"><?php echo $gameProductData['title']; ?></h3>
          <p class="card-text"><?php echo $gameProductData['description']; ?></p>
          <form action="#" id="payment_form">
			<input type="hidden" id="udf5" name="udf5" value="BOLT_KIT_PHP7" />
			<input type="hidden" id="surl" name="surl" value="<?php echo getCallbackUrl(); ?>" />
			<div class="dv">
			<span class="text"><label>Merchant Key:</label></span>
			<span><input type="hidden" id="key" name="key" placeholder="Merchant Key" value="lomegegA" /></span>
			</div>
			
			<div class="dv">
			<span class="text"><label>Merchant Salt:</label></span>
			<span><input type="hidden" id="salt" name="salt" placeholder="Merchant Salt" value="X971ICRWjz" /></span>
			</div>
			
			<div class="dv">
			<span class="text"><label>Transaction/Order ID:</label></span>
			<span><input type="hidden" id="txnid" name="txnid" placeholder="Transaction ID" value="<?php echo  "Txn" . rand(10000,99999999)?>" /></span>
			</div>
			
			<div class="dv">
			<span class="text"><label>Amount:</label></span>
			<span><input type="hidden" id="amount" name="amount" placeholder="Amount" value="<?php echo $gameProductData["sale_price"]; ?>" /></span>    
			</div>
			
			<div class="dv">
			<span class="text"><label>Product Info:</label></span>
			<span><input type="hidden" id="pinfo" name="pinfo" placeholder="Product Info" value="<?php echo $gameProductData["description"]; ?>" /></span>
			</div>
			
			<div class="dv">
			<span class="text"><label>First Name:</label></span>
			<span><input type="hidden" id="fname" name="fname" placeholder="First Name" value="<?php echo $_SESSION["first_name"]; ?>" /></span>
			</div>
			
			<div class="dv">
			<span class="text"><label>Email ID:</label></span>
			<span><input type="hidden" id="email" name="email" placeholder="Email ID" value="<?php echo $_SESSION["email"]; ?>" /></span>
			</div>
			
			<div class="dv">
			<span class="text"><label>Mobile/Cell Number:</label></span>
			<span><input type="hidden" id="mobile" name="mobile" placeholder="Mobile/Cell Number" value="<?php if(isset($_SESSION["mobile_number"])){echo $_SESSION["mobile_number"]; }else {
				echo "";
			} ?>" /></span>
			</div>
			
			<div class="dv">
			<span class="text"><label>Hash:</label></span>
			<span><input type="hidden" id="hash" name="hash" placeholder="Hash" value="" /></span>
			</div>
			
			
			<div><input type="submit" class="btn btn-block btn-danger" style='background-color: red !important; margin-top: 3%;  margin-bottom: 3%; color: white !important;' value="Pay" onclick="launchBOLT(); return false;" /></div>
		</form>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12"></div>

    </div>

  </div>

</main>
<script>
$('#payment_form').bind('keyup blur', function(){
	$.ajax({
          url: 'index.php',
          type: 'post',
          data: JSON.stringify({ 
            key: $('#key').val(),
			salt: $('#salt').val(),
			txnid: $('#txnid').val(),
			amount: $('#amount').val(),
		    pinfo: $('#pinfo').val(),
            fname: $('#fname').val(),
			email: $('#email').val(),
			mobile: $('#mobile').val(),
			udf5: $('#udf5').val()
          }),
		  contentType: "application/json",
          dataType: 'json',
          success: function(json) {
            if (json['error']) {
			 $('#alertinfo').html('<i class="fa fa-info-circle"></i>'+json['error']);
            }
			else if (json['success']) {	
				$('#hash').val(json['success']);
            }
          }
        }); 
});

function launchBOLT()
{
	bolt.launch({
	key: $('#key').val(),
	txnid: $('#txnid').val(), 
	hash: $('#hash').val(),
	amount: $('#amount').val(),
	firstname: $('#fname').val(),
	email: $('#email').val(),
	phone: $('#mobile').val(),
	productinfo: $('#pinfo').val(),
	udf5: $('#udf5').val(),
	surl : $('#surl').val(),
	furl: $('#surl').val(),
	mode: 'dropout'	
},{ responseHandler: function(BOLT){
	console.log( BOLT.response.txnStatus );		
	if(BOLT.response.txnStatus != 'CANCEL')
	{
		//Salt is passd here for demo purpose only. For practical use keep salt at server side only.
		var fr = '<form action=\"'+$('#surl').val()+'\" method=\"post\">' +
		'<input type=\"hidden\" name=\"key\" value=\"'+BOLT.response.key+'\" />' +
		'<input type=\"hidden\" name=\"salt\" value=\"'+$('#salt').val()+'\" />' +
		'<input type=\"hidden\" name=\"txnid\" value=\"'+BOLT.response.txnid+'\" />' +
		'<input type=\"hidden\" name=\"amount\" value=\"'+BOLT.response.amount+'\" />' +
		'<input type=\"hidden\" name=\"productinfo\" value=\"'+BOLT.response.productinfo+'\" />' +
		'<input type=\"hidden\" name=\"firstname\" value=\"'+BOLT.response.firstname+'\" />' +
		'<input type=\"hidden\" name=\"email\" value=\"'+BOLT.response.email+'\" />' +
		'<input type=\"hidden\" name=\"udf5\" value=\"'+BOLT.response.udf5+'\" />' +
		'<input type=\"hidden\" name=\"mihpayid\" value=\"'+BOLT.response.mihpayid+'\" />' +
		'<input type=\"hidden\" name=\"status\" value=\"'+BOLT.response.status+'\" />' +
		'<input type=\"hidden\" name=\"hash\" value=\"'+BOLT.response.hash+'\" />' +
		'</form>';
		var form = jQuery(fr);
		jQuery('body').append(form);								
		form.submit();
	}
},
	catchException: function(BOLT){
 		alert( BOLT.message );
	}
});
}
</script>
<style>
label{
	display: none !important;
}
</style>