<?php
$titles;
$footer;
$header;
$facebook;
$twitter;
$telegram;
$linkedin;
$zone;
$region;
$telephone;
$email;

$query = mysqli_query($con, "SELECT * FROM web_managements");
while ($row = mysqli_fetch_array($query)) {
  $titles = $row['titles'];
  $footer = $row['footer'];
  $header = $row['header'];
  $facebook = $row['facebook'];
  $twitter = $row['twitter'];
  $telegram = $row['telegram'];
  $linkedin = $row['linkedin'];
  $zone = $row['zone'];
  $region = $row['region'];
  $telephone  = $row['telephone'];
  $email = $row['email'];
}
 ?>
