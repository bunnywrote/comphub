<?php
require_once(ROOT."/Views/Shared/header.php");
   
    echo("controller: home, action: index");
    Helper::varDebug($this->viewBag);

require_once(ROOT."/Views/Shared/footer.php")
?>