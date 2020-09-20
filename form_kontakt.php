<?php
$to = "designer@francodesign.se";
$from = $_REQUEST['email'] ;
$name = $_REQUEST['namn'] ;
$headers = "From: $from";
$subject = "Kontakt från webben";

$fields = array();
$fields{"namn"} = "namn";
$fields{"email"} = "email";
$fields{"telefon"} = "telefon";
$fields{"meddelande"} = "meddelande";

$body = "Hej Miguel! Vi har fått följande fråga från vår hemsida \n\n"; 
foreach($fields as $a => $b){ $body .= sprintf("%20s: %s\n",$b,$_REQUEST[$a]); }

$headers2 = "From: team@ithogskolan.se";
$subject2 = "Hej, Vi har tagit emot er e-mail";
$autoreply = "Hej ".$name.", Tack för att du kontaktar oss. 

Vi hoppas att vi har en bra Uppgift!

Tack så mycket!

---
Team IT Högskolan
";

if($from == '') {print "Du har inte ange en e-mail, kom tillbaka och försök igen";}
else {
if($name == '') {print "Du har inte ange ett namn, kom tillbaka och försök igen";}
else {
$send = mail($to, $subject, $body, $headers);
$send2 = mail($from, $subject2, $autoreply, $headers2);
if($send)
{header( "Location: http://www.uxswedesign.se/projekt/tack.html" );}
else
{print "Vi har funnit ett fel i sändning, vänligen meddela webmaster:  designer@francodesign.se"; }
}
}
?> 