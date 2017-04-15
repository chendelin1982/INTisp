build:
	eval sh licence.sh
	eval mkdir build
	eval mkdir build/tmp
	eval mkdir build/tmp/webister
	eval cp application/tmp/webister/interface.zip build/tmp/webister/
	eval cp application/tmp/webister/build build/tmp/webister/
	eval mkdir build/DEBIAN
	eval cp application/DEBIAN/* build/DEBIAN/
	eval dpkg-deb --build build
clean:
	eval rm -rf insproc.x.c build application.deb
install:
	rm -rf /var/webister
	rm -rf /tmp/webister
	dpkg -i build.deb
everything:
	eval make clean
	eval make build
	eval make install