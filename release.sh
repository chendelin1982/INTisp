ftp -n <<EOF
open 91.134.24.60
user $usernamex $passwordx
cd mirror.adaclare.com/updates
put patch.deb
EOF
