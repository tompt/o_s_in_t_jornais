from newspaper import Article
URL='http://www.cnn.com/2014/01/12/world/asia/north-korea-charles-smith/index.html'
URL='http://thehackernews.com/2017/03/learn-hacking-training.html'

a = Article(URL, keep_article_html=True)

a.download()
a.parse()
x=a.article_html
print (a.article_html)

#escrever ficheiro
#FICHEIRO = TIRAR_ACENTOS_E_OBTER_NOME_FICHEIRO(TITULO)
FICHEIRO="teste.htm"
FICHEIRO = open(FICHEIRO,'w')
#TUDO = ('<h1>%s</h1>\n<h3>Autor(es):%s</h3>\n<h3>Data:%s</h3>\n<h5>URL:%s</h5><img width="707" height="403" src="%s"/>\n<h3>%s</h3>\n\n\n\n\n<h3>Hash SHA512:%s</h3><h3>HTML:</br></h3>%s\n' % (TITULO,AUTORES[0],DATA,URL,IMAGEM,NOTICIA,HASH_TEXTO(NOTICIA),a.article_html))
TUDO = ( "%s" % a.article_html)
FICHEIRO.write(TUDO)