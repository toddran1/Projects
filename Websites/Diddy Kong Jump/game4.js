//CSCE 4560
//js to go alogn whith index.html file in folder
var  width = 500
var  height = 500
var  gLoop
var  points = 0
var  state = true

  c = document.getElementById('c'), 
///////////////////////////////////////////////////////////////////////////////////////
//canvas basics
  ctx = c.getContext('2d');


c.width = width;
c.height = height;

var clear = function(){
  ctx.fillStyle = 'red';
  ctx.beginPath();
  ctx.rect(0, 0, width, height);
//box
  ctx.closePath();
  ctx.fill();
}
////////////////////////////////////////////////
var howManyCircles = 10, circles = [];

for (var i = 0; i < howManyCircles; i++) 
  circles.push([Math.random() * width, Math.random() * height, Math.random() * 100, Math.random() / 2]);
//add information about circles into the 'circles' Array

var DrawCircles = function(){
  for (var i = 0; i < howManyCircles; i++) {
    ctx.fillStyle = 'rgba(255, 255, 255, ' + circles[i][3] + ')';
//white and transparent
    ctx.beginPath();
    ctx.arc(circles[i][0], circles[i][1], circles[i][2], 0, Math.PI * 2, true);

    ctx.closePath();
    ctx.fill();
  }
};

var MoveCircles = function(deltaY){
  for (var i = 0; i < howManyCircles; i++) {
    if (circles[i][1] - circles[i][2] > height) {
 
      circles[i][0] = Math.random() * width;
      circles[i][2] = Math.random() * 100;
      circles[i][1] = 0 - circles[i][2];
      circles[i][3] = Math.random() / 2;
    } else {
//move circle Ypixels down
      circles[i][1] += deltaY;
    }
  }
};
////////////////////////////////////////////////////////////////////////////////////////

var player = new (function(){
//create new object based on function and assign 
//what it returns to the 'player' variable

    var that = this;
//using 'that'

//attributes
    that.image = new Image();
    that.image.src = "diddy.png";
//create new Image
    that.width = 100;
    that.height = 100;
//height/width

    that.X = 0;
    that.Y = 0;
//X&Y position

    that.setPosition = function(x, y){
    that.X = x;
    that.Y = y;
}

that.jump = function() {
//initiation of the jump
if (!that.isJumping && !that.isFalling) {
//if objects isn't currently jumping or falling (preventing of 'double jumps', or bouncing from the air
that.fallSpeed = 0;
that.isJumping = true;
that.jumpSpeed = 17;
// initial velocity
}
}

that.checkJump = function() {     
    if (that.Y > height*0.4) {
//if player is under about half of the screen - let him move
        that.setPosition(that.X, that.Y - that.jumpSpeed);        
    } else {
//dont move player up, move platforms and circles down instead
        if (that.jumpSpeed > 10) points++; //here!
        MoveCircles(that.jumpSpeed * 0.5); 
//clouds are in the background

        platforms.forEach(function(platform, ind){
            platform.y += that.jumpSpeed;

            if (platform.y > height) {
//if platform moves outside the screen, we will generate another one on the top
                var type = ~~(Math.random() * 5);
                if (type == 0) 
                    type = 1;
                else 
                    type = 0;
                platforms[ind] = new Platform(Math.random() * (width - platformWidth), platform.y - height, type);
            }
        });
    }
    
    
    that.jumpSpeed--;
    if (that.jumpSpeed == 0) {
        that.isJumping = false;
        that.isFalling = true;
        that.fallSpeed = 1;
    }

}

that.checkFall = function(){
    if (that.Y < height - that.height) {
        that.setPosition(that.X, that.Y + that.fallSpeed);
        that.fallSpeed++;
    } else {
        if (points == 0) 
//allow player to step on the floor at he beginning of the game
            that.fallStop();
        else 
            GameOver();
    }
}

that.fallStop = function(){
//stop falling, start jumping again
that.isFalling = false;
that.fallSpeed = 0;
that.jump();    
}

//new attributes
that.isJumping = false;
that.isFalling = false;
//state of the object described by bool variables - is it rising or falling?

that.jumpSpeed = 0;
that.fallSpeed = 0;
//each - jumping & falling should have its speed values

that.moveLeft = function(){
if (that.X > 0) {
//check whether the object is inside the screen
that.setPosition(that.X - 5, that.Y);
}
}

that.moveRight = function(){
if (that.X + that.width < width) {
//check whether the object is inside the screen
that.setPosition(that.X + 5, that.Y);
}
}

    that.draw = function(){
        try {
            ctx.drawImage(that.image, 0, 0, that.width, that.height, that.X, that.Y, that.width, that.height);
//cutting source image and pasting it into destination one, drawImage(Image Object, source X, source Y, source Width, source Height, destination X (X position), destination Y (Y position), Destination width, Destination height)
        } catch (e) {
//sometimes, if character's image is too big and will not load until the drawing of the first frame, Javascript will throws error and stop executing everything. To avoid this we have to catch an error and retry painting in another frame. It is invisible for the user with 50 frames per second.
        }
    }
})();

player.setPosition(~~((width-player.width)/2),  ~~((height - player.height)/2));
player.jump(); //here

document.onmousemove = function(e){
if (player.X + c.offsetLeft > e.pageX) {
//if mouse is on the left side of the player.
player.moveLeft();
} else if (player.X + c.offsetLeft < e.pageX) {
//right
player.moveRight();
}
}
///////////////////////////////////////////////////////////////////////////////////////////////

var Platform = function(x, y, type){
//function takes position and platform
var that=this;

that.firstColor = '#FF8C00';
that.secondColor = '#EEEE00';
that.onCollide = function(){
player.fallStop();
};

   that.isMoving = ~~(Math.random() * 2);
//first, let's check if platform will be able to move (1) or not (0)
    that.direction= ~~(Math.random() * 2) ? -1 : 1;
//and then in which direction

//if platform type is different than 1, set right color & collision function (in this case just call player's fallStop() method we defined last time
if (type === 1) {
//but if type is equal '1', set different color and set jumpSpeed to 50. After such an operation checkJump() method will takes substituted '50' instead of default '17' we set in jump().
that.firstColor = 'blue';//'#AADD00';
that.secondColor = 'green';//'#698B22';
that.onCollide = function(){
player.fallStop();
player.jumpSpeed = 50;
};
}

that.x = ~~x;
that.y = y;
that.type = type;

that.draw = function(){
ctx.fillStyle = 'rgba(255, 255, 255, 1)';
var gradient = ctx.createRadialGradient(that.x + (platformWidth/2), that.y + (platformHeight/2), 5, that.x + (platformWidth/2), that.y + (platformHeight/2), 45);
gradient.addColorStop(0, that.firstColor);
gradient.addColorStop(1, that.secondColor);
ctx.fillStyle = gradient;
ctx.fillRect(that.x, that.y, platformWidth, platformHeight);
//drawing gradient inside rectangular platform
};

return that;
};
var nrOfPlatforms = 7, 
platforms = [],
platformWidth = 70,
platformHeight = 20;

var generatePlatforms = function(){
var position = 0, type;
//'position' is Y of the platform, to place it in quite similar intervals it starts from 0
for (var i = 0; i < nrOfPlatforms; i++) {
type = ~~(Math.random()*5);
if (type == 0) type = 1;
else type = 0;
//it's 5 times more possible to get 'ordinary' platform than 'super' one
platforms[i] = new Platform(Math.random()*(width-platformWidth),position,type);
//random X position
if (position < height - platformHeight) 
position += ~~(height / nrOfPlatforms);
}
//and Y position interval
}();

var checkCollision = function(){
platforms.forEach(function(e, ind){
//check every plaftorm
if (
(player.isFalling) && 
//only when player is falling
(player.X < e.x + platformWidth) && 
(player.X + player.width > e.x) && 
(player.Y + player.height > e.y) && 
(player.Y + player.height < e.y + platformHeight)
//and is directly over the platform
) {
e.onCollide();
}
})
}



var GameLoop = function(){
    clear();
    DrawCircles();

    if (player.isJumping) player.checkJump();
    if (player.isFalling) player.checkFall();
 
    player.draw();
//moving player.draw() above drawing platforms will draw player before
    platforms.forEach(function(platform, index){
        if (platform.isMoving) {
//if platform is able to move
            if (platform.x < 0) {
//and if is on the end of the screen
                platform.direction = 1;
            } else if (platform.x > width - platformWidth) {
                platform.direction = -1;
//switch direction and start moving in the opposite direction
            }
            platform.x += platform.direction * (index / 2) * ~~(points / 100);
//with speed dependent on the index in platforms[] array (to avoid moving all the displayed platforms with the same speed, it looks ugly) and number of points
        }
        platform.draw();
    });

checkCollision();

	ctx.fillStyle = "Black";
//change active color to black
ctx.fillText("YOUR SCORE:" + points, 10, height-10);
//and add text in the left-bottom corner of the canvas

  player.draw();
 if (state)
        gLoop = setTimeout(GameLoop, 1000 / 50);
}

//GameOver screen
var GameOver = function(){
    state = false;
//set state to false
    clearTimeout(gLoop);
//stop calling another frame
    setTimeout(function(){
//wait for already called frames to be drawn and then clear everything and render text
        clear(); 
        ctx.fillStyle = "Black";
        ctx.font = "10pt Arial";
        ctx.fillText("GAME OVER", width / 2 - 60, height / 2 - 50);
        ctx.fillText("YOUR RESULT:" + points, width / 2 - 60, height / 2 - 30);
	ctx.fillText("CLICK REPLAY" , width / 2 - 60, height / 2 - 10);
    }, 100);
};

GameLoop();