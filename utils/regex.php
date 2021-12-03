<?php
define("REGEX_NO_NUMBER", "/[A-Za-z-éèêëàâäôöûüîïç' ]+$/");
define("REGEX_NUMBER", "/^[0-9]+$/");
define("REGEX_PSEUDO", "/[A-Za-z0-9-éèêëàâäôöûüîïç]+$/");
define("REGEX_ADRESS","/^[A-Za-z0-9. ]+$/");
define("REGEX_EMAIL","/[A-Za-z0-9.%+-]+@[A-Za-z0-9.-]+.[A-Za-z]{2,4}(;|$)/");
define("REGEX_PHONE","/^0[1-68][0-9]{8}$/");

?>