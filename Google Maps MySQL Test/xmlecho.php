<?php
$con = mysqli_connect('', '', ''); // Login Details Removed
mysqli_select_db($con, '');

$sql = "SELECT * FROM markers";
$res = mysqli_query($con, $sql);

$xml = new XMLWriter();

$xml->openURI("php://output");
$xml->startDocument();
$xml->setIndent(true);

$xml->startElement('markers');

while ($row = mysqli_fetch_assoc($res)) {
  $xml->startElement("marker");

  $xml->writeAttribute('id', $row['id']);
  $xml->writeAttribute('name', $row['name']);
  $xml->writeAttribute('address', $row['address']);
  $xml->writeAttribute('lat', $row['lat']);
  $xml->writeAttribute('lng', $row['lng']);
  $xml->writeAttribute('type', $row['type']);
  
  $xml->writeRaw($row['marker']);

  $xml->endElement();
}

$xml->endElement();

header('Content-type: text/xml');
$xml->flush();

?>