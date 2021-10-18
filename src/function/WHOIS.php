<?php
include __DIR__.'/../modules/whois/whois.php';
if(isset($_POST['domain'])){ 
	$domain = $_POST['domain'];	
	$domain = trim($domain);
	if(substr(strtolower($domain), 0, 7) == "http://") $domain = substr($domain, 7);
	if(substr(strtolower($domain), 0, 8) == "https://") $domain = substr($domain, 8);
	if(substr(strtolower($domain), 0, 4) == "www.") $domain = substr($domain, 4);
	if(validateDomain($domain)) {
		 echo '<hr><pre>'.lookUpDomain($domain).'</pre>';
	} else {
		 echo "Invalid Input!";
	}
}
?>