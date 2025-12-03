<?php
define('PATH_ATUAL',        dirname( __FILE__ ) );
define('CONF_PATH',         realpath(PATH_ATUAL . '/conf'));
define('APP_PATH',          realpath(PATH_ATUAL . '/app'));
define('PAINEL_PATH',       realpath(PATH_ATUAL . '/painel'));
define('UP_PATH',           realpath(PATH_ATUAL . '/uploads'));
define('SRC_PATH',          realpath(PATH_ATUAL . '/src'));
define('LOGS_PATH',         realpath(PATH_ATUAL . '/logs'));
define('ACOES_PAINEL_PATH', realpath(PATH_ATUAL . '/acoes/painel'));
define('ACOES_APP_PATH',    realpath(PATH_ATUAL . '/acoes/app'));
define('ACOES_API',         realpath(PATH_ATUAL . '/acoes/api'));
