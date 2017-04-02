echo "Compiling Packages..."
dpkg-deb --build application
echo "Installing Package..."
rm -rf /var/webister
rm -rf /tmp/webister
dpkg -i application.deb
echo "Cleaning Up.."
rm -rf application.deb