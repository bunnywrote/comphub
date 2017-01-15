<?php
require_once(ROOT."/Views/Shared/header.php");

    if(isset($this->viewBag["message"]))
        echo($this->viewBag["message"]);

    //Helper::varDebug($this->viewBag);

require_once(ROOT."/Views/Shared/footer.php")
?>