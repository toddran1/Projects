# Program that opens a youtube link and #
# plays a video after a specific time #

import webbrowser
import time

total = 3
count = 0

while(count < total):
    time.sleep(60)
    print("This program will start at "+time.ctime())
    webbrowser.open("https://www.youtube.com/watch?v=CTFtOOh47oo")
    count = count + 1
