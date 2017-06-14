sudo apt-get -y install libbz2-dev liblzma-dev libsqlite3-dev libncurses5-dev libgdbm-dev zlib1g-dev libreadline-dev libssl-dev tk-dev build-essential libncursesw5-dev libc6-dev openssl



echo "vamos comecar por baixar o codigo em source"
wget https://www.python.org/ftp/python/3.6.0/Python-3.6.0.tgz
echo "descompactar.."
tar -zxvf Python-3.6.0.tgz
cd Python-3.6.0
echo "instalar...."
./configure
make
sudo make install


echo "se tudo correu bem...python 3.6 foi instalado.."

echo "verificar versao do python - deve ser 3.6.."
python3.6 --version

echo "Fontes: http://bohdan-danishevsky.blogspot.pt/2017/01/building-python-360-on-raspberry-pi-3.html"


echo "verificar versao do pip"
pip3.6 --version




#para o newspaper
sudo apt-get install -y python3-pillow

sudo pip3.6 install newspaper3k

