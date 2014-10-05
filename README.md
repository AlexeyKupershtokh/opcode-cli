Opcode-Cli is the command line tool for managing opcode cache.

It allows you:
- invalidate web server opcode cache
- warmup web server opcode cache
- get status information from command line

It can work both via fastcgi interface (no need to expose it under your web root) and via any other web server.

References:
http://php.net/manual/en/book.apc.php
http://php.net/manual/en/book.opcache.php
http://www.alexfu.it/2013/10/08/clearing-apc-php-fpm-command-line.html
https://support.cloud.engineyard.com/entries/26902267-PHP-Performance-I-Everything-You-Need-to-Know-About-OpCode-Caches
https://github.com/engineyard/ey-php-performance-tools
https://github.com/ornicar/ApcBundle
https://github.com/PeeHaa/OpCacheGUI
https://github.com/rlerdorf/opcache-status