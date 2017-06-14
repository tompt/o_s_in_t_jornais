# -*- coding: utf-8 -*-
from newspaper import Article
import nltk
""" COMUM """
def HASH_TEXTO(NOTICIA):
    import hashlib
    HASH512 = NOTICIA.encode('utf-8')
    HASH512 = hashlib.sha512(HASH512).hexdigest()
    return HASH512

def TIRAR_ESPACOS(TITULO):
    """----------- TIRAR ACENTOS E TROCAR ESPACOS POR UNDERSCORES"""
    TITULO = TITULO.replace(" ", "_")
    #print(TITULO) #era do cão passa a #era_do_cão
    """tirar barras / """
    TITULO = TITULO.replace("/", "BARRA")
    return TITULO

def REMOVER_ACENTOS(TITULO):
    import unicodedata
    nkfd_form = unicodedata.normalize('NFKD', TITULO)
    TITULO= u"".join([c for c in nkfd_form if not unicodedata.combining(c)]) #cão passa a cao
    #print ("titulo sem acentos:%s" % TITULO)
    return TITULO

def TIRAR_ACENTOS_E_OBTER_NOME_FICHEIRO(TITULO):
    TITULO=TIRAR_ESPACOS(TITULO)
    TITULO=REMOVER_ACENTOS(TITULO)
    TITULO = ("Noticia-%s.htm" % TITULO)
    print("Ficheiro guardado como: %s" % TITULO) #era_do_cao.htm
    return TITULO
""" // COMUM """


from newspaper import Article
URL='http://www.cnn.com/2014/01/12/world/asia/north-korea-charles-smith/index.html'
URL="http://thehackernews.com/2017/05/browser-camera-microphone.html"
URL="http://thehackernews.com/2017/05/shadow-brokers-exploits.html"
URL="https://pplware.sapo.pt/gadgets/voa-na-boa-onde-pilotar-drone/"

a = Article(URL, keep_article_html=True)

a.download()
a.parse()
#print (a.article_html) #JA VAI ABAIXO COMO NOTICIA

TITULO=a.title
HTML=a.article_html
AUTORES = a.authors #['Leigh Ann Caldwell', 'John Honway']
DATA = a.publish_date #datetime.datetime(2013, 12, 30, 0, 0)
NOTICIA = a.text #'Washington (CNN) -- Not everyone subscribes to a New Year's resolution...'
IMAGEM = a.top_image #'http://someCDN.com/blah/blah/blah/file.png'

print ("------------------------\n%s\n" % TITULO)
#u'<div> \n<p><strong>(CNN)</strong> -- Charles Smith insisted Sunda...'
#print ("AUTORES: %s\n\n " % AUTORES[0])
#print ("DATA: %s\n\n " % DATA)
#print ("NOTICIA: %s\n\n " % NOTICIA)
#print ("IMAGEM: %s\n\n " % IMAGEM)
print( "%s<br>\n<br/>FIM" % a.article_html)


#escrever ficheiro
FICHEIRO = TIRAR_ACENTOS_E_OBTER_NOME_FICHEIRO(TITULO)
FICHEIRO = open(FICHEIRO,'w')
#TUDO = ('<h1>%s</h1>\n<h3>Autor(es):%s</h3>\n<h3>Data:%s</h3>\n<h5>URL:%s</h5><img width="707" height="403" src="%s"/>\n<h3>%s</h3>\n\n\n\n\n<h3>Hash SHA512:%s</h3><h3>HTML:</br></h3>%s\n' % (TITULO,AUTORES[0],DATA,URL,IMAGEM,NOTICIA,HASH_TEXTO(NOTICIA),a.article_html))
TUDO = ( "%s<br>FIM" % a.article_html)
FICHEIRO.write(TUDO)


import newspaper
cbs_paper = newspaper.build(URL, memoize_articles=False)
print ("\n--------------------\nTamanho : %s\n----------------------" % cbs_paper.size())
#1030

#extraccao de feeds
print ("\n--------------------\nFeeds\n----------------------")
for feed_url in cbs_paper.feed_urls():
    print (feed_url)
print ("\n--------------------\\Feeds\n----------------------")
#util: https://media.readthedocs.org/pdf/newspaper/latest/newspaper.pdf


"""
>>> import newspaper
>>> cnn1 = newspaper.build('http://cnn.com')
>>> urls1 = set([article.url for article in cnn1.articles])
>>> cnn2 = newspaper.build('http://cnn.com')
>>> urls2 = set([article.url for article in cnn2.articles])
>>> urls1.intersection(urls2)
set() # no urls are shared between calls when caching is on
>>> cnn1_fresh = newspaper.build('http://cnn.com', memoize_articles=False)
>>> urls1_fresh = set([article.url for article in cnn1_fresh.articles])
>>> cnn2_fresh = newspaper.build('http://cnn.com', memoize_articles=False)
>>> urls2_fresh = set([article.url for article in cnn2_fresh.articles])
>>> len(urls1_fresh.intersection(urls2_fresh))
1078 # same same urls are returned because caching is on
"""