apt-get update
apt-get install build-essential libssl-dev libffi-dev python-dev python-pip python-dev git -y
pip install PyYAML jinja2 paramiko
pip install pyasn1 --upgrade
pip install c

git clone https://github.com/ansible/ansible.git
cd ansible

## This is important since core and extra modules are in separate repositories!
git submodule update --init --recursive

## I want to get a stable release, so I checkout a specific tag
git tag -l
git checkout tags/v2.1.1.0-1

## Build Ansible from sources
make install

## If Build fails, then cleanup before retry
make clean

mkdir /etc/ansible
echo "localhost" > /etc/ansible/hosts
