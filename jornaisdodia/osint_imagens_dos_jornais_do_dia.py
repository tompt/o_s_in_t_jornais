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

#NOME_DO_FICHEIRO=("%s_%s" % (data,"CorreioManha.jpg"))
#download(url,NOME_DO_FICHEIRO)


LISTA=["CorreioManha","Publico","DiarioNoticias","Jornal_i","JornalNoticias","Expresso","JornalEconomico","JornalDeNegocios","Destak","ExpressoEconomia"]
PAGINA_WEB = "./osint_imgs_capas.htm"

data = "20170609" #TESTES
PAGINA_WEB2 = ("osint_capas_jornais/osint_imgs_capas_%s.htm" % (data))

HTML = open(PAGINA_WEB, 'a')
HTML2 = open(PAGINA_WEB2, 'a')

for JORNAL in LISTA:
    data = "20170609" #TESTES

    url=("http://jornaisdodia.tk/imgjornais/%s_%s.jpg" % (data,JORNAL))
    FICHEIRO_IMAGEM = ("osint_capas_jornais/%s_%s.jpg" % (data, JORNAL))
    download(url, FICHEIRO_IMAGEM)
    print (JORNAL)
    #CODIGO1 = ('<h3>%s</h3> Link:<a href="%s">%s</a> <br>Imagem:<br/><img src="%s"/><br><hr>' % (JORNAL, FICHEIRO_IMAGEM, FICHEIRO_IMAGEM, FICHEIRO_IMAGEM))
    #HTML.write(CODIGO1)
    #HTML2.write(CODIGO1)

    #BAIXAR AGORA AS MINIATURAS
    ##data="20170611"
    url=("http://jornaisdodia.tk/imgjornais/%s_%s_t.jpg" % (data,JORNAL))
    #NOME_DO_FICHEIRO = ("%s_%s" % (data, MINIATURA))
    FICHEIRO_MINIATURA = ("osint_capas_jornais/%s_%s_t.jpg" % (data, JORNAL))
    download(url, FICHEIRO_MINIATURA)
    print (url)

    #TUDO FUNCIONA. GRAVAR EM HTML
    CODIGO2 = ('<h3>%s</h3> Link:<a href="%s">%s</a> <br>Imagem:<br/><img src="%s"/><br><hr>' % (JORNAL,FICHEIRO_IMAGEM, FICHEIRO_MINIATURA,FICHEIRO_MINIATURA))
    HTML.write(CODIGO2)
    #so para ficheiro interior da pasta e historico
    FICHEIRO_IMAGEM = ("%s_%s.jpg" % (data, JORNAL))
    FICHEIRO_MINIATURA = ("%s_%s_t.jpg" % (data, JORNAL))
    CODIGO3 = ('<h3>%s</h3> Link:<a href="%s">%s</a> <br>Imagem:<br/><img src="%s"/><br></a><hr>' % (JORNAL,FICHEIRO_IMAGEM, FICHEIRO_MINIATURA,FICHEIRO_MINIATURA))
    HTML2.write(CODIGO3)
HTML.close
HTML2.close


# /////------------------simples mas funcional-------------------
"""
from requests import get  # to make GET request
lista=[]
url = ("%s%s_%s" % ('http://jornaisdodia.tk/imgjornais/',data,'CorreioManha.jpg'))

def download(url, file_name):
    # open in binary mode
    with open(file_name, "wb") as file:
        # get request
        response = get(url)
        # write to file
        file.write(response.content)
"""



