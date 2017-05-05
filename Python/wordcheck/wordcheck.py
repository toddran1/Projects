#Check a given file for profanity

import urllib

def read_text():
    qoutes = open("movies.txt")
    cof = qoutes.read()
    print(cof)
    qoutes.close()
    verify_text(cof)

def verify_text(text_input):
    connection = urllib.urlopen(" http://www.wdylike.appspot.com/?q=QUERY"+text_input)
    output = connection.read()
    print(output)
    connection.close
    
read_text()
