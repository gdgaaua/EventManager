<?php
/**
 * Created by PhpStorm.
 * User: IJATUYI OLASUNKANMI
 * Date: 08/04/2017
 * Time: 04:13 AM
 */

require_once("Class/User.php");
$user = new User();


// Start XML file, create parent node

$title = $_GET['title'];
function parseToXML($htmlStr)
{
    $xmlStr=str_replace('<','&lt;',$htmlStr);
    $xmlStr=str_replace('>','&gt;',$xmlStr);
    $xmlStr=str_replace('"','&quot;',$xmlStr);
    $xmlStr=str_replace("'",'&#39;',$xmlStr);
    $xmlStr=str_replace("&",'&amp;',$xmlStr);
    return $xmlStr;
}

// Select all the rows in the markers table


header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';
$lan = 0;
// Iterate through the rows, printing XML nodes for each
$getEvent = $user->getEventByTitle($title);
 foreach($getEvent as $row){
    // Add to XML document node
    echo '<marker ';
    echo 'id="' . $row['event_id'] . '" ';
    echo 'name="' . parseToXML($row['title']) . '" ';
    echo 'address="' . parseToXML($row['location']) . '" ';
    echo 'lat="" ';
    echo 'lng=" " ';
    echo 'type="' . $row['type'] . '" ';
    echo '/>';
}

// End XML file
echo '</markers>';

?>