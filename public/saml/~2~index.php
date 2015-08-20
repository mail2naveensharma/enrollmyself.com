<html>
</head>
<body>
<form method="POST" action="https://imp1a.healthcare.gov/marketplace/brokerService">
<br>
<b>Posting To Broker Service
<br>
<textarea name="SAMLResponse" cols="150" rows="25" />



<samlp:Response ID="_d645f885-b6b9-4712-ba57-0b3cab551fab" Version="2.0"
    IssueInstant="2015-7-27T15:12:16.155Z" xmlns:samlp="urn:oasis:names:tc:SAML:2.0:protocol">
    <saml:Issuer xmlns:saml="urn:oasis:names:tc:SAML:2.0:assertion">Modglin Inc</saml:Issuer>
    <samlp:Status>
        <samlp:StatusCode Value="urn:oasis:names:tc:SAML:2.0:status:Success"/>
        <samlp:StatusMessage>Success</samlp:StatusMessage>
    </samlp:Status>
    <saml:Assertion Version="2.0" ID="_77a92d43-56db-4ed5-b07b-928db05cd67d"
        IssueInstant="2015-7-27T15:12:16.141Z" xmlns:saml="urn:oasis:names:tc:SAML:2.0:assertion">
        <saml:Issuer Format="urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified"
            >Modglin Inc</saml:Issuer>
        <Signature xmlns="http://www.w3.org/2000/09/xmldsig#">
            <SignedInfo>
                <CanonicalizationMethod Algorithm="http://www.w3.org/2001/10/xml-exc-c14n#"/>
                <SignatureMethod Algorithm="http://www.w3.org/2000/09/xmldsig#rsa-sha1"/>
                <Reference URI="#_77a92d43-56db-4ed5-b07b-928db05cd67d">
                    <Transforms>
                        <Transform Algorithm="http://www.w3.org/2000/09/xmldsig#enveloped-signature"/>
                        <Transform Algorithm="http://www.w3.org/2001/10/xml-exc-c14n#">
                            <InclusiveNamespaces PrefixList="#default saml ds xs xsi"
                                xmlns="http://www.w3.org/2001/10/xml-exc-c14n#"/>
                        </Transform>
                    </Transforms>
                    <DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"/>
                    <DigestValue></DigestValue>
                </Reference>
            </SignedInfo>
            <SignatureValue></SignatureValue>
            <KeyInfo>
                <X509Data>
                    <X509SubjectName>CN=Modglin Inc, OU=Modglin Inc, O=Modglin Inc, L=Holiday, ST=Florida, C=U
S</X509SubjectName>
                    <X509Certificate>MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEArt6GLtqRjqv6gI1aiEUL
M07jB8YGa7xNqOKwyLIunl88IQbXt8yhPvg2Vx4doFS/afHPIqr7T6B4zL4Zq0sK
MiH522uM9rMrmSmWbJ73fPA4Ty7mi0Oscn+pQL8sxLPfPc/yUQHEFFDJZvnQGwP6
uSlqMjFjysMlxzbhyLWl29Y4pXZJnulpYwo9V6BixfXIrdTWS2zQebCb1OCC6kU9
/aOmheEjPw3ND0mEIMbBo6ACczweDpHfA4q/BNqxOs6Ko6WZ6KEuNlrhJxQdtMG1
xDISvebsPiTBKEOcltrX/mM0y5ASVg6FRLcdwNTbaxIupjiZIOCFjoiTxNLz6Hbz
jwIDAQAB=</X509Certificate>
                </X509Data>
            </KeyInfo>
        </Signature>
        <saml:Subject>
            <saml:NameID Format="urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified"
                >04.MAA.FL*.813.229</saml:NameID>
            <saml:SubjectConfirmation Method="urn:oasis:names:tc:SAML:2.0:cm:sender-vouches">
                <saml:NameID>CN=Modglin Inc, OU=Modglin Inc, O=Modglin Inc, L=Holiday, ST=Florida, C=U
S</saml:NameID>
            </saml:SubjectConfirmation>
        </saml:Subject>
        <saml:Conditions NotBefore="2015-7-27T14:12:16.141Z"
            NotOnOrAfter="2015-7-27T16:12:16.141Z"/>
        <saml:AttributeStatement>
            <saml:Attribute Name="State Exchange Code"
                NameFormat="urn:oasis:names:tc:SAML:2.0:attrname-format:unspecified">
                <saml:AttributeValue>FL0</saml:AttributeValue>
            </saml:Attribute>
            <saml:Attribute Name="Partner Assigned Consumer ID"
                NameFormat="urn:oasis:names:tc:SAML:2.0:attrname-format:unspecified">
                <saml:AttributeValue>aaaaaaaa-d5ee-11e2-8b8b-0800200c9a66</saml:AttributeValue>
            </saml:Attribute>
            <saml:Attribute Name="User Type"
                NameFormat="urn:oasis:names:tc:SAML:2.0:attrname-format:unspecified">
                <saml:AttributeValue>Agent/Broker</saml:AttributeValue>
            </saml:Attribute>
            <saml:Attribute Name="Transfer Type"
                NameFormat="urn:oasis:names:tc:SAML:2.0:attrname-format:unspecified">
                <saml:AttributeValue>Direct Enrollment</saml:AttributeValue>
            </saml:Attribute>
            <saml:Attribute Name="Return URL"
                NameFormat="urn:oasis:names:tc:SAML:2.0:attrname-format:unspecified">
                <saml:AttributeValue>http://dev.enrollmyself.com/saml/response.php</saml:AttributeValue>
            </saml:Attribute>
        </saml:AttributeStatement>
        <saml:AuthnStatement AuthnInstant="2015-7-27T15:12:16.141Z">
            <saml:SubjectLocality Address=""/>
            <saml:AuthnContext>
                <saml:AuthnContextClassRef>urn:oasis:names:tc:SAML:2.0:ac:classes:Password</saml:AuthnContextClassRef>
            </saml:AuthnContext>
        </saml:AuthnStatement>
</saml:Assertion>
</samlp:Response>



</textarea><br>
<input type="submit" value="Submit" />
</body>
</html>
</form>
