wordlist = ['mississippi','miss','lake','que']

letters = set('aqk')

for word in wordlist:
    if letters & set(word):
        print (word)