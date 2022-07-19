
    function componentToHex(c) {
        var hex = c.toString(16);
        return hex.length == 1 ? "0" + hex : hex;
    }
    
    function rgb(r, g, b) {
        return "#" + componentToHex(r) + componentToHex(g) + componentToHex(b);
    }

    let canvas;
    let context;

    let ms = 0;
    let oldMs = 0;
    let msPassed = 0;
    let fps;

    let balls = new Array();

    var gravity = 0.5;
    var groundFriction = 0.027;
    var airResistance = 0.001;    
    window.onload = OnUserCreate;


var done = false;
    function OnUserCreate() {
        canvas = document.getElementById('canvas');
        context = canvas.getContext('2d');

        for (let i=0; i < 1; i++) {
            balls.push({
               // x: Math.floor(Math.random() * canvas.width),
                x: 450,
              //  y: Math.floor(Math.random() * canvas.height),
                y: 50,
                vx: Math.random() * 20 -10,
                vy: Math.random() * 10 -5,
                bounce: 0.95,
                radius: Math.floor(Math.random() * (30-20) + 20),
                color: rgb(Math.floor(Math.random() * 255),Math.floor(Math.random() * 255),Math.floor(Math.random() * 255))
            });
        }
        if (!done) {
        window.requestAnimationFrame(OnUserUpdate);
        done = !done;
    }
    }
 
 
    function fpsCounter(msPassed) {
        context.font = '12px Arial'; context.fillStyle = 'black';
        context.fillText("FPS: " + Math.round(1 / msPassed) + " - Frametime: " + (Math.round(msPassed * 100) / 100).toFixed(3) + " ms", 10, 30);
    }


    function clear() {
        context.clearRect(0, 0, canvas.width, canvas.height);
    }

    var oldCreateMs=0;
    function OnUserUpdate(ms) {

        // Calculate the number of milliseconds passed since the last frame
        msPassed = (ms - oldMs);
        oldMs = ms;
        msPassed = Math.min(msPassed, 0.01);

        if(ms-oldCreateMs>1000) {
            oldCreateMs=ms;
            OnUserCreate();
        }

        updatePhysics(msPassed);
        clear();
        draw();
        //fpsCounter(msPassed);

        // The loop function has reached it's end. Keep requesting new frames
        window.requestAnimationFrame(OnUserUpdate);
    }

    function updatePhysics(msPassed) {

        balls.forEach((ball) => {
            
            // Keep falling but only if it is in the air
            if (ball.y + ball.radius < canvas.height) ball.vy = ball.vy + gravity;
            
            // If the ball have reached the ground or below
            if (ball.y + ball.radius > canvas.height) {
                
                // If it is on the ground and have y velocity
                if (ball.vy != 0) { 
                    
                    // Bounce the ball
                    ball.vy = ball.vy * (-ball.bounce);
                    
                    // Remove some bounciness so it can stop bouncing in the future
                    ball.bounce = ball.bounce - 0.01;

                    // Make sure it bounces of the ground if it came into the ground
                    ball.y = canvas.height - ball.radius;
                }
            } 

            // Add roll friction if it's on the ground and have some x velocity
            if (ball.vy == 0) {
                if (ball.vx > 0) {
                    ball.vx = ball.vx - groundFriction;
                    if (ball.vx < 0) ball.vx = 0;
                }
                if (ball.vx < 0) {
                    ball.vx = ball.vx + groundFriction;
                    if (ball.vx > 0) ball.vx = 0;
                }
            }            

            // Remove some velocity for all directions 
            // when the ball is in air due to air resistance
            if (ball.vy > 0) {
                ball.vy = ball.vy - airResistance;
                if (ball.vy < 0) ball.vy = 0;
            }

            if (ball.vy < 0) {
                ball.vy = ball.vy + airResistance;
                if (ball.vy > 0) ball.vy = 0;
            }
        
            if (ball.vx > 0) {
                ball.vx = ball.vx - airResistance;
                if (ball.vx < 0) ball.vx = 0;
            }

            if (ball.vx < 0) {
                ball.vx = ball.vx + airResistance;
                if (ball.vx > 0) ball.vx = 0;
            }
            
            // Bounce off walls
            if (ball.x + ball.radius > canvas.width || ball.x - ball.radius < 0) {
                ball.vx = -ball.vx;
            }
            /*
            // Bounce off walls
            if (ball.y + ball.radius > canvas.height || ball.y - ball.radius < 0) {
                ball.vy = -ball.vy;
            }
            */
            // Update the balls position using the new velocities.
            ball.x = ball.x + (ball.vx * (msPassed * 80)); // / (elapsedTime * 100);
            ball.y = ball.y + (ball.vy * (msPassed * 80)); // / (elapsedTime * 100);

        });

    }

    function draw() {
        // Draw all balls

        balls.forEach((ball) => {
        
            context.beginPath();
            context.arc(ball.x, ball.y, ball.radius, 0, Math.PI*2, false);
            context.fillStyle = ball.color;
            context.fill();
            context.closePath();

        });            
    }