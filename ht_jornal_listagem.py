# -*- coding: utf-8 -*-
from newspaper import Article
import nltk
"""------------------------------------------------------------------------------------------------------------------"""

#"LIXO"
import newspaper
PAPEL = 'http://thehackernews.com'
PAPEL = 'http://tek.sapo.pt/parceiro/casa-dos-bits'

cnn_paper = newspaper.build(PAPEL)
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