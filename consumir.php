<?php
$location = "http://localhost/PERSONAL_SOAPSERVICE/InsertCategoria.php?wsdl";

$request = "
<soapenv:Envelope xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:ins=\"InsertCategoriaSOAP\">
   <soapenv:Header/>
   <soapenv:Body>
      <ins:InsertCategoriaService soapenv:encodingStyle=\"http://schemas.xmlsoap.org/soap/encoding/\">
         <InsertCategoria xsi:type=\"ins:InsertCategoria\">
            <!--You may enter the following 3 items in any order-->
            <usu_nom xsi:type=\"xsd:string\">.$usuario.</usu_nom>
            <usu_ape xsi:type=\"xsd:string\">.$apellido.</usu_ape>
            <usu_correo xsi:type=\"xsd:string\">.$correo.</usu_correo>
         </InsertCategoria>
      </ins:InsertCategoriaService>
   </soapenv:Body>
</soapenv:Envelope>
";

print("Request : <br>");
print("<pre>".htmlentities($request)."</pre>");

$action = "InsertCategoriaService";
$headers = [
    'Method: POST',
    'Connection: Keep-Alive',
    'User-Agent: PHP-SOAP-CURL',
    'Content-Type: text/xml; charset=utf-8',    //Al parecer este es el mas importante
    'SOAPAction: "InsertCategoriaService"',
];

//Segun documentacion
$ch = curl_init($location);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

$response = curl_exec($ch);
$err_estatus = curl_errno($ch);

print("Request : <br>");
print("<pre>".$response."</pre>");

?>