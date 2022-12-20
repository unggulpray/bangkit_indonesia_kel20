import turtle
tu = turtle.Turtle()
tu.screen.bgcolor("black")
tu.pensize(2)
tu.left(90)

tu.backward(100)
tu.speed(200)
tu.shape("turtle")


def bunga(i):
    if i < 10:
        return
    else:
        tu.forward(i)
        tu.color("white")
        tu.circle(2)
        tu.color("red")
        tu.left(30)
        bunga(3*i/4)
        tu.right(60)
        bunga(3*i/4)
        tu.left(30)
        tu.backward(i)


bunga(100)
turtle.done()
