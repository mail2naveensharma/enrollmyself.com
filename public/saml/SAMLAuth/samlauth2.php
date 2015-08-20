<?php 
$xmlpath = realpath("./docs/SAMLDOM3.xml");
$keypath = realpath("./docs/keystore.jks");
$certpath = realpath("./docs/publickey.cer");
exec('java -jar ./docs/SignedSAMLBuilder.jar  '.$xmlpath.' '.$keypath.' '.$certpath, $code);
?>

<html>
</head>
<body>
<form method="POST" action="https://imp1a.healthcare.gov/marketplace/brokerService" name="samlcodeform">
<br>
<b>Posting To Broker Service
<br>
<textarea name="SAMLResponse" cols="150" rows="25" />
<?php echo implode("", $code); ?>
</textarea><br>
<input type="submit" value="Submit" name="submit"/>
</form>
</body>
</html>