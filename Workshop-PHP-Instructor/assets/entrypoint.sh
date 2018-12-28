export USER_ID=$(id -u)
export GROUP_ID=$(id -g)
envsubst < /app/passwd.template > /app/passwd
export LD_PRELOAD=libnss_wrapper.so
export NSS_WRAPPER_PASSWD=/app/passwd
export NSS_WRAPPER_GROUP=/etc/group
mkdir /app/home
chown -R $USER_ID /app/
/usr/sbin/httpd -D FOREGROUND
