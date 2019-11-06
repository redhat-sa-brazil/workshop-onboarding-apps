FROM centos:7
USER root
RUN yum -y update && yum install -y httpd httpd-tools php php-mysql ansible git epel-release centos-release-openshift-origin37 screen
RUN yum -y install python-crypto python-pip origin-clients-3.7.0-1.0.7ed6862 git ansible-tower-cli && pip install --upgrade pip 
RUN pip install --upgrade apache-libcloud
RUN pip install --upgrade boto
RUN pip install --upgrade boto3
EXPOSE  8080
RUN echo oi
RUN mkdir -p /etc/ansible/playbooks/tmp && cd /etc/ansible/playbooks && git clone https://github.com/redhat-sa-brazil/workshop-onboarding.git && mkdir /root/.ansible && mkdir /usr/share/httpd/.ssh && touch /etc/ansible/playbooks/ssh_gce
RUN chown -R apache /etc/ansible/playbooks && chown -R apache /root && echo 127.0.0.1 > /etc/ansible/hosts && ln -s /usr/bin/oc /usr/local/bin/oc && chown -R apache /usr/share/httpd && chmod 600 /etc/ansible/playbooks/ssh_gce && chmod -R 777 /etc/ansible/playbooks/tmp
COPY src/ /var/www/html/
COPY src/php.ini /etc/php.ini
COPY src/ansible.cfg /etc/ansible/ansible.cfg
COPY assets/httpd.conf /etc/httpd/conf/httpd.conf
RUN mkdir /workshop-pv/ && chmod -R 777 /run/httpd && chmod -R 777 /etc/httpd/logs && chmod -R 777 /var/lib/php/ && chmod -R 777 /etc/ansible/ && chmod -R 777 /workshop-pv/ && chown -R 12345 /var/www/html/*
# Nao foi possivel usar usuarios dinamicos devido ao ansible
#USER 12345
RUN yum -y install nss_wrapper gettext
RUN mkdir /app && chmod -R 777 /app
COPY assets/passwd.template /app/passwd.template
COPY assets/entrypoint.sh /app/entrypoint.sh
RUN chmod +x /app/entrypoint.sh
#CMD     ["/usr/sbin/httpd","-D","FOREGROUND"]
ENTRYPOINT ["/app/entrypoint.sh"]
RUN chmod 777 /var/www/html/*.php
