properties([buildDiscarder(logRotator(artifactDaysToKeepStr: '', artifactNumToKeepStr: '5', daysToKeepStr: '', numToKeepStr: '5'))])
node {
   stage 'build'
   sh 'rm -rf webister && git clone https://github.com/alwaysontop617/webister.git'
   sh 'cd webister && cp -R * ../'
   sh 'echo "Compiling Packages..."'
   sh 'make clean && make build'
   
   stage 'req'
   
   sh 'wget https://github.com/FriendsOfPHP/PHP-CS-Fixer/releases/download/v2.1.2/php-cs-fixer.phar -O php-cs-fixer'
   parallel 'test': {
   sh 'curl -OL https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar'
   sh 'php phpcs.phar --report-diff=report.diff --ignore=*adminer* --encoding=utf-8 --severity=3 --extensions=php -n -p -l -v application/tmp/webister/interface/ > logstyle.txt || :'
   }
   
   stage 'archive'
   archive 'build.deb'
   archive 'patch.deb'
   archive 'logstyle.txt'

   archive 'report.diff'
   archive 'application/tmp/webister/licence-key'
   
   stage 'clean'
   sh 'rm -rf *'
}


