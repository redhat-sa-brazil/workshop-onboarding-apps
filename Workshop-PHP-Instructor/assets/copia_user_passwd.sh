#!/bin/bash
if [ `id -u` -ge 10000 ]; then
    NB_USER=`id -u`;
    mkdir /temporario
    cat /etc/passwd | sed -e "s/^$NB_USER:/builder:/" > /temporario/passwd
    echo "$NB_USER:x:`id -u`:`id -g`:,,,:/home/$NB_USER:/bin/bash" >> /temporario/passwd
    cat /temporario/passwd > /etc/passwd
fi
