#-*- coding: utf-8 -*-
#---------so para datas
import time
strings = time.strftime("%Y,%m,%d,%H,%M,%S")
data = time.strftime("%Y%m%d")
print ("Hoje eh %s" % data)
#//////////////so para datas


#------------------simples mas funcional-------------------
from requests import get  # to make GET request
url = ("%s%s_%s" % ('http://jornaisdodia.tk/imgjornais/',data,'CorreioManha.jpg'))

def download(url, file_name):
    # open in binary mode
    with open(file_name, "wb") as file:
        # get request
        response = get(url)
        # write to file
        file.write(response.content)
        print ("Gravada imagem como %s" % url)


NOME_DO_FICHEIRO=("%s_%s" % (data,"CorreioManha.jpg"))
download(url,NOME_DO_FICHEIRO)
# /////------------------simples mas funcional-------------------
"""
from requests import get  # to make GET request
lista=[]
#url = 'http://jornaisdodia.tk/imgjornais/20170609_CorreioManha.jpg'

def download(url, file_name):
    # open in binary mode
    with open(file_name, "wb") as file:
        # get request
        response = get(url)
        # write to file
        file.write(response.content)
"""



