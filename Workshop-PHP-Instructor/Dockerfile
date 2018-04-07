FROM    centos:7
RUN yum -y update && yum install -y httpd httpd-tools php php-mysql ansible git epel-release centos-release-openshift-origin screen 
RUN yum -y install python-crypto python-pip origin-clients git && pip install --upgrade pip && pip install --upgrade apache-libcloud
EXPOSE  80
RUN mkdir /etc/ansible/playbooks && cd /etc/ansible/playbooks && git clone https://github.com/redhat-sa-brazil/workshop-onboarding.git 
RUN chown -R apache /etc/ansible/playbooks && echo 127.0.0.1 > /etc/ansible/hosts && ln -s /usr/bin/oc /usr/local/bin/oc
COPY src/ /var/www/html/
COPY src/php.ini /etc/php.ini
CMD     ["/usr/sbin/httpd","-D","FOREGROUND"]
