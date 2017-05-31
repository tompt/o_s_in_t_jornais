# -*- coding: utf-8 -*-
from newspaper import Article
import nltk
"""------------------------------------------------------------------------------------------------------------------"""

#"LIXO"
import newspaper
PAPEL = 'http://thehackernews.com'
#PAPEL = 'http://tek.sapo.pt/parceiro/casa-dos-bits'
PAPEL = "https://arstechnica.co.uk/security/2017/"

cnn_paper = newspaper.build(PAPEL)
print ("Artigos:")
x=0
ARTIGOS=[]
for article in cnn_paper.articles:
    x=x+1
    print("%s - %s" % (x,article.url))
    ARTIGOS.append(article.url)
    #u'http://www.cnn.com/2013/11/27/justice/tucson-arizona-captive-girls/'
    #u'http://www.cnn.com/2013/12/11/us/texas-teen-dwi-wreck/index.html'

print ("Categorias:")
x=0
lista=[]
for category in cnn_paper.category_urls():
    x=x+1
    print("%s - %s" % (x,category))
    lista.append(category)
print (lista)

"""------------------------------------------------------------------------------------------------------------------"""
"""
import newspaper
sina_paper = newspaper.build('http://tek.sapo.pt/parceiro/casa-dos-bits', language='pt')

for category in sina_paper.category_urls():
    print(category)
'''
http://health.sina.com.cn
http://eladies.sina.com.cn
http://english.sina.com
'''

article = sina_paper.articles[0]
article.download()
article.parse()

print(article.text)
print(article.title)
"""

#escrever ficheiro
#FICHEIRO = TIRAR_ACENTOS_E_OBTER_NOME_FICHEIRO(TITULO)
FICHEIRO="ht_jornal_listagem.htm"
FICHEIRO = open(FICHEIRO,'w')
#TUDO = ('<h1>%s</h1>\n<h3>Autor(es):%s</h3>\n<h3>Data:%s</h3>\n<h5>URL:%s</h5><img width="707" height="403" src="%s"/>\n<h3>%s</h3>\n\n\n\n\n<h3>Hash SHA512:%s</h3><h3>HTML:</br></h3>%s\n' % (TITULO,AUTORES[0],DATA,URL,IMAGEM,NOTICIA,HASH_TEXTO(NOTICIA),a.article_html))
#TUDO = ( "%s" % a.article_html)

for objecto in lista:
    x=x+1
    print("%s - %s" % (x,objecto))
    FICHEIRO.write("%s - %s<br/>" % (x,objecto))