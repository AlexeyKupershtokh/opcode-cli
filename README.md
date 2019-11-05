Deprecated
==========

This repo is deprecated and not maintained anymore. Use https://github.com/gordalina/cachetool instead.

Opcode-Cli
==========

Opcode-Cli is the command line tool for managing opcode cache.

It allows you:
- invalidate web server opcode cache
- get status information from command line

It can work both via fastcgi interface (no need to expose it under your web root) and via any other web server.

Installation
============
```bash
composer require alexey-kupershtokh/opcode-cli
```

Usage
=====

Get opcode cache status:
```
php vendor/bin/opcode-cli.php --action=status
php vendor/bin/opcode-cli.php --action=status --port 9000
php vendor/bin/opcode-cli.php --action=status --sock=/var/run/php5-fpm.sock
```

Clear opcode cache:
```
php vendor/bin/opcode-cli.php --action=clear
php vendor/bin/opcode-cli.php --action=clear --port 9000
php vendor/bin/opcode-cli.php --action=clear --sock=/var/run/php5-fpm.sock
```

References
==========
- http://php.net/manual/en/book.apc.php
- http://php.net/manual/en/book.opcache.php
- http://www.alexfu.it/2013/10/08/clearing-apc-php-fpm-command-line.html
- https://support.cloud.engineyard.com/entries/26902267-PHP-Performance-I-Everything-You-Need-to-Know-About-OpCode-Caches
- https://github.com/engineyard/ey-php-performance-tools
- https://github.com/ornicar/ApcBundle
- https://github.com/PeeHaa/OpCacheGUI
- https://github.com/rlerdorf/opcache-status
