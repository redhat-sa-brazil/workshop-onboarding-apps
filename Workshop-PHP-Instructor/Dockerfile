FROM    centos:7
USER root
RUN yum -y update && yum install -y httpd httpd-tools php php-mysql ansible git epel-release centos-release-openshift-origin screen 
RUN yum -y install python-crypto python-pip origin-clients git ansible-tower-cli && pip install --upgrade pip 
RUN pip install --upgrade apache-libcloud
EXPOSE  80
RUN mkdir -p /etc/ansible/playbooks/tmp && cd /etc/ansible/playbooks && git clone https://github.com/redhat-sa-brazil/workshop-onboarding.git && mkdir /root/.ansible && mkdir /usr/share/httpd/.ssh && touch /etc/ansible/playbooks/ssh_gce
RUN chown -R apache /etc/ansible/playbooks && chown -R apache /root && echo 127.0.0.1 > /etc/ansible/hosts && ln -s /usr/bin/oc /usr/local/bin/oc && chown -R apache /usr/share/httpd && chmod 600 /etc/ansible/playbooks/ssh_gce && chmod -R 777 /etc/ansible/playbooks/tmp
COPY src/ /var/www/html/
COPY src/php.ini /etc/php.ini
COPY src/ansible.cfg /etc/ansible/ansible.cfg
CMD     ["/usr/sbin/httpd","-D","FOREGROUND"]
