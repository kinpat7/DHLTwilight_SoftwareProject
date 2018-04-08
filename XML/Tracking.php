<!DOCTYPE html>
<html>
<Head>Test</Head>
<Title>TEST</Title>
<body>
<?php
	echo("DHL Customer Webservice Call Test<br />");
	
	$action='glDHLExpressTrack_providers_services_trackShipment_Binder_trackShipmentRequest';

	$xmlrequest='<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:trac="http://scxgxtt.phx-dc.dhl.com/glDHLExpressTrack/providers/services/trackShipment" xmlns:dhl="http://www.dhl.com">
   <soapenv:Header>
      <wsse:Security soapenv:mustunderstand="1" xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
         <wsse:UsernameToken wsu:id="UsernameToken-5" xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd">
            <!-- ####Please use your test user credentials here#### -->
            <wsse:Username>dhlietestie</wsse:Username>
            <!-- ####Please use your test user credentials here#### -->
            <wsse:Password type="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText">B@7zU^2iL^7l</wsse:Password>
            <wsse:Nonce encodingtype="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-soap-message-security-1.0#Base64Binary">eUYebYfsjztETJ4Urt8AJw==</wsse:Nonce>
            <wsu:Created>2010-02-12T17:40:39.124Z</wsu:Created>
         </wsse:UsernameToken>
      </wsse:Security>
   </soapenv:Header>
   <soapenv:Body>
      <trac:trackShipmentRequest>
         <trackingRequest>
            <dhl:TrackingRequest>
               <Request>
                  <ServiceHeader>
                     <MessageTime>2011-02-18T12:17:20-07:00</MessageTime>
                     <MessageReference>BL1199369</MessageReference>
                  </ServiceHeader>
               </Request>
               <AWBNumber>
                  <ArrayOfAWBNumberItem>5972894351</ArrayOfAWBNumberItem>
               </AWBNumber>
               <LevelOfDetails>ALL_CHECK_POINTS</LevelOfDetails>
               <PiecesEnabled>P</PiecesEnabled>
            </dhl:TrackingRequest>
         </trackingRequest>
      </trac:trackShipmentRequest>
   </soapenv:Body>
</soapenv:Envelope>';

	$url='https://wsbexpress.dhl.com:443/sndpt/glDHLExpressTrack?WSDL';

	$client = new SoapClient($url, array('trace' => 1));

	$output= $client->__doRequest($xmlrequest, $url, $action, 1);
	
    echo ("WSDL URL: ");    
    echo ($url);
    echo("<br />");
    
    echo ("Action: ");        
    echo ($action);
    echo("<br />");
    
    echo("XMLRequest: ");
    echo ($xmlrequest);
    echo("<br />");
    
    echo("Output: ");
    echo ($output);
    echo("<br />");
    

?>


</body>
</html>

