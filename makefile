# Build Webister using make.sh file
# Build by Adaclare Technologies
# Install V2 Release
build:
	echo "Preparing Work Area"
	mkdir build
	cp -r webister/* build
	echo "Work Area Copyed"
requirements:
	touch requirements
	sudo add-apt-repository ppa:ondrej/php
	sudo apt-get update
	sudo apt-get install php7.1 php7.1-mysql mysql-server php7.1-curl python python-pip curl
	sudo service mysql start
	sudo mysql_secure_installation
install: build requirements
	echo "Install using make.sh"
	cd build && bash make.sh
clean: build
	rm -rf build
