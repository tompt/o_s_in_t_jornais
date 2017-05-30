# -*- coding: utf-8 -*-
from newspaper import Article
import nltk

url = 'http://fox13now.com/2013/12/30/new-year-new-laws-obamacare-pot-guns-and-drones/'
url = 'https://pplware.sapo.pt/informacao/falha-informatica-cancela-voos-da-british-airways/'
url = 'http://www.jn.pt/desporto/interior/hugo-miguel-utilizou-video-arbitro-sem-alterar-decisoes-8514129.html?utm_source=feedburner&utm_medium=feed&utm_campaign=Feed%3A+JN-ULTIMAS+%28JN+-+Ultimas%29'
url = 'http://www.jn.pt/justica/interior/traficante-apanhado-pela-psp-disse-que-a-droga-era-do-cao-8513279.html?utm_source=jn.pt&utm_medium=recomendadas&utm_campaign=afterArticle&_ga=2.98145244.211586019.1496012241-1777478357.1496012215'
url = "https://pplware.sapo.pt/apple/iphone-culpado-queda-voo-804-egyptair/"

article = Article(url)
article.download()
article.parse()

HTML= article.html
HTML = HTML.encode('utf-8')
HTML = ('Codigo:<br/><xmp>%s</<xmp>' % HTML )


IMAGENS= article.images
IMAGEM=[]
x=0
for img in IMAGENS:
    IMAGEM.append(img)
    x=x+1
    print ("%s - %s" % (x,img))

URL = article.url
TITULO = article.title
AUTORES = article.authors #['Leigh Ann Caldwell', 'John Honway']
DATA = article.publish_date #datetime.datetime(2013, 12, 30, 0, 0)
NOTICIA = article.text #'Washington (CNN) -- Not everyone subscribes to a New Year's resolution...'
IMAGEM = article.top_image #'http://someCDN.com/blah/blah/blah/file.png'
VIDEO = article.movies #['http://youtube.com/path/to/link.com', ...]

print ("URL: %s\n\n " % URL)
print ("TITULO: %s\n\n " % TITULO)
print ("AUTORES: %s\n\n " % AUTORES[0])
print ("DATA: %s\n\n " % DATA)
print ("NOTICIA: %s\n\n " % NOTICIA)
print ("IMAGEM: %s\n\n " % IMAGEM)
print ("VIDEO: %s\n\n " % VIDEO)


#Article.nlp()

PALAVRAS_CHAVE = article.keywords #['New Years', 'resolution', ...]
RESUMO = article.summary #'The study shows that 93% of people ...'

print ("PALAVRAS_CHAVE: %s\n\n " % PALAVRAS_CHAVE)
print ("RESUMO: %s\n\n " % RESUMO)

def TIRAR_ESPACOS(TITULO):
    """----------- TIRAR ACENTOS E TROCAR ESPACOS POR UNDERSCORES"""
    TITULO = TITULO.replace(" ", "_")
    #print(TITULO) #era do cão passa a #era_do_cão
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

def HASH_TEXTO(NOTICIA):
    import hashlib
    HASH512 = NOTICIA.encode('utf-8')
    HASH512 = hashlib.sha512(HASH512).hexdigest()
    return HASH512

def PALAVRAS_CHAVE(PALAVRA,NOTICIA):
    import re,string
    TEXTO=NOTICIA.lower()
    frequency = {}
    match_pattern = re.findall(r'\b[a-z]{7,15}\b', TEXTO)

    for word in match_pattern:
        count = frequency.get(word, 0)
        frequency[word] = count + 1

    frequency_list = frequency.keys()

    for words in frequency_list:
        print (words, frequency[words])

    LISTA=[]
    LISTA=TEXTO.split()
    """--------------------------------------"""
    my_dict = {i: LISTA.count(i) for i in LISTA}

    print (my_dict)  # or print(my_dict) in python-3.x
    #{'a': 3, 'c': 3, 'b': 1}


    LISTA = TEXTO.split()
    PALAVRA="apple"
    for PALAVRAx in PALAVRA:
        if PALAVRAx in LISTA:
            LISTA.append(PALAVRAx)
    print(LISTA)


    LISTA = TEXTO.split()
    wordlist = ['mississippi', 'miss', 'lake', 'que']
    wordlist=LISTA
    letters = set('aqk')
    for word in wordlist:
        if letters & set(word):
            print(word)
    return ""
"""------------------------------------------------------------------------------------------------------------------"""
'''
#"LIXO"
import newspaper

cnn_paper = newspaper.build('http://thehackernews.com')
print ("Artigos:")
x=0
ARTIGOS=[]
for article in cnn_paper.articles:
    x=x+1
    print("%s - %s" % (x,article.url))
    ARTIGOS.append('<br/>%s - %s' % (x,article.url))
    #u'http://www.cnn.com/2013/11/27/justice/tucson-arizona-captive-girls/'
    #u'http://www.cnn.com/2013/12/11/us/texas-teen-dwi-wreck/index.html'

print ("Categorias:")
x=0
lista=[]
for category in cnn_paper.category_urls():
    x=x+1
    print("%s - %s" % (x,category))
    lista.append("<br/>%s - %s" % (x,category))

print (lista)
'''
"""------------------------------------------------------------------------------------------------------------------"""
#obter hash
HASH512= HASH_TEXTO(NOTICIA)
OCORRENCIAS = PALAVRAS_CHAVE("apple",NOTICIA)
print("Houve %s palavras encontradas - noticia" % OCORRENCIAS)
OCORRENCIAS = PALAVRAS_CHAVE("apple",TITULO)
print("Houve %s palavras encontradas - titulo" % OCORRENCIAS)

#escrever ficheiro
FICHEIRO = TIRAR_ACENTOS_E_OBTER_NOME_FICHEIRO(TITULO)
FICHEIRO = open(FICHEIRO,'w')
#TUDO = ('<h1>%s</h1>\n<h3>Autor(es):%s</h3>\n<h3>Data:%s</h3>\n<h5>URL:%s</h5><img width="707" height="403" src="%s"/>\n<h3>%s</h3>\n\nCategorias:%s\n\n\n\nArtigos:\n\n\n<h3>HTML:</br></h3>%s' % (TITULO,AUTORES[0],DATA,URL,IMAGEM,NOTICIA,lista,HTML))
TUDO = ('<h1>%s</h1>\n<h3>Autor(es):%s</h3>\n<h3>Data:%s</h3>\n<h5>URL:%s</h5><img width="707" height="403" src="%s"/>\n<h3>%s</h3>\n\n\n\n\n<h3>Hash SHA512:%s</h3><h3>HTML:</br></h3>%s\n' % (TITULO,AUTORES[0],DATA,URL,IMAGEM,NOTICIA,HASH512,HTML))
#TUDO = TUDO.encode("utf-8")
FICHEIRO.write(TUDO)

