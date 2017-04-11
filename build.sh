echo "Licencing Product... (This may take a while)"
echo "This is normal, just in case we plan to add a paid version, this will be used."
A=$(openssl rand -base64 12)
B=$(openssl rand -base64 12)
C=$(openssl rand -base64 12)
D=$(openssl rand -base64 12)
echo "$A-$B-$C-$D" > application/tmp/webister/licence-key
echo "Licence Key is:"
echo "$A-$B-$C-$D"
echo "Press Any Key to Continue"
read pa
echo "Compiling Packages..."
sudo add-apt-repository ppa:neurobin/ppa
sudo apt-get update
sudo apt-get install shc
cd application/tmp/webister/ && zip -r --password "$A-$B-$C-$D" interface.zip install.php interface website files && cd ../../../
shc -f insproc -o application/tmp/webister/build
echo "Creating Enviroment"
mkdir build
mkdir build/tmp
mkdir build/tmp/webister
cp application/tmp/webister/interface.zip build/tmp/webister/
cp application/tmp/webister/build build/tmp/webister/
cp application/tmp/webister/licence-key build/tmp/webister/
mkdir build/DEBIAN
cp application/DEBIAN/* build/DEBIAN/
dpkg-deb --build build
echo "Installing Package..."
rm -rf /var/webister
rm -rf /tmp/webister
dpkg -i build.deb
mv build.deb webister-$(cat application/tmp/webister/interface/data/version).deb