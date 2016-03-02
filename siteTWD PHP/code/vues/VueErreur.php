
<?php

if (isset($dVueErreur)) {
    foreach ($dVueErreur as $value) {
        echo "<br> $value";
    }
} else {
    echo "erreur d'appel vue d'erreur";
}