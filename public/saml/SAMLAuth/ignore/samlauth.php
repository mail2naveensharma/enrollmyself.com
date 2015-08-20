<?php 
 
require "xmlseclibs.php";
use RobRichards\XMLSecLibs;
 
// Load the XML to be signed
$doc = new DOMDocument();
$doc->load('docs/SAMLDOM3.xml');
$assertionele = $doc->getElementsByTagName("Assertion")->item(0);
 
// Create a new Security object 
$objDSig = new XMLSecurityDSig('');
// Use the c14n exclusive canonicalization
$objDSig->setCanonicalMethod(XMLSecurityDSig::EXC_C14N);
// Sign using SHA-1
$objDSig->addReference(
    $assertionele, 
    XMLSecurityDSig::SHA1, 
    array('http://www.w3.org/2000/09/xmldsig#enveloped-signature')
);
 
// Create a new (private) Security key
$objKey = new XMLSecurityKey(XMLSecurityKey::RSA_SHA1, array('type'=>'private'));
// Load the private key
$objKey->loadKey('./docs/alias.pkcs8', TRUE);
 
//If key has a passphrase, set it using 
// Add the associated public key to the signature
$objDSig->add509Cert(file_get_contents('./docs/publickey.cer'));
 
 
// Sign the XML file
$objDSig->sign($objKey);
 
 
// Append the signature to the XML
$objDSig->appendSignature($assertionele, TRUE);

$objKey = new XMLSecurityKey(XMLSecurityKey::RSA_SHA1, array('type'=>'public'));
// Load the private key
$objKey->loadKey('./docs/publickey.cer', TRUE);
echo $objDSig->verify($objKey);

//Append Reference URI to signature
//$domattr = $doc->createAttribute("URI");
//$domattr->value = "#".($assertionele->getAttribute("ID"));
//$doc->getElementsByTagName("Signature")->item(0)->getElementsByTagName("Reference")->item(0)->appendChild($domattr);

//Append additinoal Transform
$transformele = $doc->createElement("Transform");
$algattr = $doc->createAttribute("Algorithm");
$algattr->value = "http://www.w3.org/2001/10/xml-exc-c14n#";
$transformele->appendChild($algattr);
$inclusiveele = $doc->createElement("InclusiveNamespaces");
$prefixattr = $doc->createAttribute("PrefixList");
$prefixattr->value = "#default saml ds xs xsi";
$xmlnsattr = $doc->createAttribute("xmlns");
$xmlnsattr->value = "http://www.w3.org/2001/10/xml-exc-c14n#";
$inclusiveele->appendChild($prefixattr);
$inclusiveele->appendChild($xmlnsattr);
$transformele->appendChild($inclusiveele);
//$doc->getElementsByTagName("Signature")->item(0)->getElementsByTagName("Transforms")->item(0)->appendChild($transformele);

//Append X509 Subject Name to KeyData
$subjectele = $doc->createElement("X509SubjectName");
$subjectname = $doc->getElementsByTagName("SubjectConfirmation")->item(0)->getElementsByTagName("NameID")->item(0)->nodeValue;
$subjectele->nodeValue = $subjectname;
$x509 = $doc->getElementsByTagName("Signature")->item(0)->getElementsByTagName("X509Data")->item(0);
//$x509->insertBefore($subjectele, $x509->childNodes[0]);

 
//$digest = $objDSig->calculateDigest(XMLSecurityDSig::SHA1, $doc->saveXML($doc->documentElement));
//$doc->getElementsByTagName("DigestValue")->item(0)->nodeValue = $digest;
// Save the signed XML
$doc->save('./output/signedcert.xml');
 
$doctoencode = fopen("./output/signedcert.xml", "r");
$code = base64_encode(fread($doctoencode, filesize("./output/signedcert.xml")));
fclose($doctoencode);

 
?>

<html>
</head>
<body>
<form method="POST" action="https://imp1a.healthcare.gov/marketplace/brokerService">
<br>
<b>Posting To Broker Service
<br>
<textarea name="SAMLResponse" cols="150" rows="25" />
<?php echo $code; ?>
</textarea><br>
<input type="submit" value="Submit" />
</form>
</body>
</html>
