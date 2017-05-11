ftp -n <<EOF
open $server
user $usernamex $passwordx
cd mirror.adaclare.com/updates
put patch.deb
EOF
