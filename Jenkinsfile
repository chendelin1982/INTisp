properties([buildDiscarder(logRotator(artifactDaysToKeepStr: '', artifactNumToKeepStr: '5', daysToKeepStr: '', numToKeepStr: '5'))])
node {
   stage 'build'
   sh 'rm -rf webister && git clone https://github.com/alwaysontop617/webister.git'
   sh 'cd webister && cp -R * ../'
   sh 'echo "Compiling Packages..."'
   sh 'echo ${BUILD_NUMBER}-$(date +%Y%m%d) > application/tmp/webister/interface/data/version'
   sh 'A=$(openssl rand -base64 12)'
   sh 'B=$(openssl rand -base64 12)'
   sh 'C=$(openssl rand -base64 12)'
   sh 'D=$(openssl rand -base64 12)'
   sh 'echo "$A-$B-$C-$D" > application/tmp/webister/licence-key'
   sh 'dpkg-deb --build application'
   
   stage 'req'
   
   sh 'wget https://github.com/FriendsOfPHP/PHP-CS-Fixer/releases/download/v2.1.2/php-cs-fixer.phar -O php-cs-fixer'
   parallel 'test': {
   sh 'curl -OL https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar'
   sh 'php phpcs.phar --report-diff=report.diff --ignore=*adminer* --encoding=utf-8 --severity=3 --extensions=php -n -p -l -v application/tmp/webister/interface/ > logstyle.txt || :'
   }
   
   stage 'md5'
   sh 'md5sum logstyle.txt application.deb report.diff> md5.txt'
   
   stage 'patch'
   sh 'cp -R application patch'
   sh 'rm -rf patch/DEBIAN/postinst'
   sh 'rm -rf patch/tmp/webister/interface/config.php'
   sh 'echo "cp -R /tmp/webister/interface/ /var/webister/" > patch/DEBIAN/postinst'
   sh 'chmod -R 0755 patch/DEBIAN/postinst'
   sh 'dpkg-deb --build patch'
   
   stage 'archive'
   archive 'application.deb'
   archive 'patch.deb'
   archive 'logstyle.txt'
   archive 'md5.txt'
   archive 'report.diff'
   archive 'application/tmp/webister/licence-key'
   
   stage 'clean'
   sh 'rm -rf *'
}


