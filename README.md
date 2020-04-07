####Make .phar executable out of php file/directory
Usage:
```
$ mkdir test2
$ echo '<?php echo "lol";' > test2/index.php
$ php makephar.php test2 lol.phar
lol.phar successfully created
$ ./lol.phar
lol
```
