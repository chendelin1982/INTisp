VERSION=6
spinner()
{
    local pid=$!
    local delay=0.75
    local spinstr='+-!;&'
    while [ "$(ps a | awk '{print $1}' | grep $pid)" ]; do
        local temp=${spinstr#?}
        printf " [%c]  " "$spinstr"
        local spinstr=$temp${spinstr%"$temp"}
        sleep $delay
        printf "\b\b\b\b\b\b"
    done
    printf "    \b\b\b\b"
}
echo "_______ _________        _______________ _______ ________ __________"
echo "___    |______  /______ ___  ____/___  / ___    |___  __  ___  ____/"
echo "__  /| |_  __  / _  __  /_  /     __  /  __  /| |__  /_/ /__  __/   "
echo "_  ___ |/ /_/ /  / /_/ / / /___   _  /____  ___ |_  _  _/ _  /___   "
echo "/_/  |_| __ _/    __ _/   ____/   /_____//_/  |_|/_/ |_|  /_____/   "

echo "You are installing adaclare intisp version $VERSION"
echo "

Licensed under the Adaclare Custom Licence; you may not use this file except in compliance with the License.

We follow these licences:
http://www.apache.org/licenses/LICENSE-2.0
https://opensource.org/licenses/MIT

Copyright (C) 2007 Adaclare Technologies <http://www.adaclare.com>
Everyone is permitted to use and distribute verbatim copies
of this license document, but changing it is not allowed.

IntISP/Webister is free software: you can redistribute it and/or modify
it under the terms of the Adaclare Custom Licence as published by
Adaclare Technologies. HOWEVER you are not allowed to distribute
our software AT ALL.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE. IF ANYTHING BREAKS I AM NOT RESPONSIBLE FOR IT.


"
echo -n MySQL Password: 
read PASS
echo "Installing..."
fqdn=$(hostname -f)
result=`echo $fqdn | grep -P '(?=^.{1,254}$)(^(?>(?!\d+\.)[a-zA-Z0-9_\-]{1,63}\.?)+(?:[a-zA-Z]{2,})$)'`
if [[ -z "$result" ]]
then
    echo "$fqdn is NOT a FQDN"
    exit 1;
else
    echo "$fqdn is a FQDN"
fi
# Create Database
BLAH=$(mysql -u root -p"$PASS" -e "CREATE DATABASE webister;")
BLAH=$(service mysql start) & spinner
# Create required folders
BLAH=$(mkdir -p /var/webister) & spinner
BLAH=$(mkdir -p /var/webister/80) & spinner
# Copy Interface
BLAH=$(rm -rf /var/www/html) & spinner
BLAH=$(cp -r website /var/www/html) & spinner
BLAH=$(cp -r interface /var/www/html/) & spinner
BLAH=$(chmod -R 777 /var/www/html) & spinner
# Setup FTP
BLAH=$(cp files/startftp.php /var/webister/) & spinner
BLAH=$(sudo pip install pyftpdlib) & spinner
BLAH=$(sudo cp files/ftpserv.py /var/webister/) & spinner
BLAH=$(cp files/service /etc/init.d/webister) & spinner
BLAH=$(chmod -R 777 /etc/init.d/webister) & spinner
# Setup Vhost
BLAH=$(sudo cp files/service.php /var/webister/) & spinner
BLAH=$(sudo cp files/virtualhost.sh /usr/local/bin/wvhost) & spinner
BLAH=$(sudo chmod +x /usr/local/bin/wvhost) & spinner
# Create Host
BLAH=$(echo 'apache ALL=NOPASSWD: ALL' | sudo EDITOR='tee -a' visudo) & spinner
BLAH=$(wvhost admin.com 80) & spinner
BLAH=$(php install.php $PASS) & spinner
BLAH=$(chmod -R 777 /var/webister/) & spinner
BLAH=$(/etc/init.d/webister) & spinner
BLAH=$(service apache2 start) & spinner
echo "Done"