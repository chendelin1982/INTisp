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
dpkg-deb --build application
echo "Installing Package..."
rm -rf /var/webister
rm -rf /tmp/webister
dpkg -i application.deb
mv application.deb webister-$(cat application/tmp/webister/interface/data/version).deb