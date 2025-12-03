<?php
foreach ($customScripts as $scriptItem) {
  if ($scriptItem['local'] == "footer") {
    if ($scriptItem['rule'] == "all" || ($isHome && $scriptItem['rule'] == "home") || ($scriptItem['rule'] == "custom" && validCustomPageScript($scriptItem['page_rule'], $scriptItem['page']))) {
      echo $scriptItem['code'];
    }
  }
}
