<?php

// Parâmetros trackeados
$trackedParams = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'src', 'sck'];
$trackingList = [];
$extraInfos = [];
foreach ($trackedParams as $trackedParam) {
  if (isset($_GET[$trackedParam]) && $_GET[$trackedParam]) {
    $trackingList[$trackedParam] = Tools::protege($_GET[$trackedParam]);
  }
}
if (count($trackingList) > 0) {
  $trackingListJson = json_encode($trackingList);
  Tools::createCookie("tracking", $trackingListJson);
} else if (isset($_COOKIE['tracking']) && $_COOKIE['tracking'] != "") {
  $trackingList = json_decode($_COOKIE['tracking'], true);
}
if (count($trackingList) > 0) {
  $extraInfos['tracking'] = $trackingList;
}

// Geolocalização por IP
$geoInfos = Tools::getLocationIP(Tools::getClientIP());
if ($geoInfos['status'] == "success") {
  $extraInfos['location'] = $geoInfos;
}
