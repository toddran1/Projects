# Draws a circle made of squares on a canvus #

import turtle

def draw_square(num):
    for i in range(1,5):
        num.forward(100)
        num.right(90)

def draw_art():
    window = turtle.Screen()
    window.bgcolor("red")

    reggie = turtle.Turtle()
    reggie.shape("turtle")
    reggie.color("yellow")
    reggie.speed(9)
    
    for i in range(1,37):
        draw_square(reggie)
        reggie.right(10)
    
    window.exitonclick()

draw_art()
