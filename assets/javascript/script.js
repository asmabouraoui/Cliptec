
// visitor index page below
function prompt_menu()
{
    //Position parameters used for drawing the rectangle
var x = 0;
var y = 0;
var width = screen.availWidth;
var height = screen.availHeight;

document.getElementById('menu-btn').style.display='none';

var canvas = document.createElement('canvas'); //Create a canvas element
canvas.setAttribute('id','canva');
//Set canvas width/height
canvas.style.width='100%';
canvas.style.height='100%';
//Set canvas drawing area width/height
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;
//Position canvas
canvas.style.position='absolute';
canvas.style.left=0;
canvas.style.top=0;
canvas.style.zIndex=10000;
canvas.style.pointerEvents='none'; //Make sure you can click 'through' the canvas
document.body.appendChild(canvas); //Append canvas to body element
var context = canvas.getContext('2d');
//Draw rectangle
context.rect(x, y, width, height);
context.fillStyle = '#ff5757';
context.fill();

// animation transition

var rect = document.createElement('div');
    rect.setAttribute('id','rect');
    rect.style.width = '100%';
    rect.style.height = '0%';
    rect.style.position = 'absolute';
    rect.style.bottom = 0;
    rect.style.left = 0;
    rect.style.background = '#ffffff';
    rect.style.zIndex = 10004;
    rect.style.transition = '0.3s ease-in';
    document.body.append(rect);

    // div (rectangle) above 

//login button
var login = document.createElement('img');
login.setAttribute('id','login');
login.setAttribute('src','./assets/images/log in-black.png');
document.body.append(login);
var loginstyle = document.getElementById('login');
loginstyle.style.width='25%';
loginstyle.style.position= 'absolute';
loginstyle.style.top= '35%';
loginstyle.style.right= '37%';
loginstyle.style.zIndex= 10002;


login.addEventListener('mouseenter',function(){
login.setAttribute('src','./assets/images/log in-white.png');
});
login.addEventListener('mouseleave',function(){
    login.setAttribute('src','./assets/images/log in-black.png');
    })
login.addEventListener('click',function(){
    rect.style.height= '100%';
    rect.addEventListener('transitionend', () => {
        window.location= './login.html';
    });
});
// end of login button

//register button
var register = document.createElement('img');
register.setAttribute('id','register');
register.setAttribute('src','./assets/images/register-black.png');
document.body.append(register);
var registerstyle = document.getElementById('register');
registerstyle.style.width='25%';
registerstyle.style.position= 'absolute';
registerstyle.style.top= '50%';
registerstyle.style.right= '37%';
registerstyle.style.zIndex= 10002;
register.addEventListener('mouseenter',function(){
    register.setAttribute('src','./assets/images/register-white.png');
});
register.addEventListener('mouseleave',function(){
    register.setAttribute('src','./assets/images/register-black.png');
    }) 

    register.addEventListener('click',function(){
        rect.style.height= '100%';
        rect.addEventListener('transitionend', () => {
            window.location= './register.html';
        });
    });

// exit button above canva
var exitbtn = document.createElement('img');
exitbtn.setAttribute('id','exit');
exitbtn.setAttribute('src','./assets/images/X-index.png');
document.body.append(exitbtn);
exitbtn.addEventListener('mouseenter',function(){
    exitbtn.setAttribute('src','./assets/images/X-index-black.png');
});
exitbtn.addEventListener('mouseleave',function(){
    exitbtn.setAttribute('src','./assets/images/X-index.png');
    }) 
// end of exit button


exitbtn.addEventListener('click',function() {
    document.body.removeChild(canvas);
    document.getElementById('exit').parentNode.removeChild(document.getElementById('exit'));
    document.getElementById('rect').parentNode.removeChild(document.getElementById('rect'));
    document.getElementById('login').parentNode.removeChild(document.getElementById('login'));
    document.getElementById('register').parentNode.removeChild(document.getElementById('register'));
   // document.getElementById('exit').style.display= 'none';
    document.getElementById('menu-btn').style.display= 'block';
    document.getElementById('menu-btn').style.pointerEvents='painted';

});


}

// visitor index page above

// register page below

function register()
{

    var rectani = document.createElement('div');
    rectani.setAttribute('id','rect');
    rectani.style.width = '100%';
    rectani.style.height = '100%';
    rectani.style.position = 'absolute';
    rectani.style.top = 0;
    rectani.style.left = 0;
    rectani.style.background = '#ffffff';
    rectani.style.zIndex = 10004;
    rectani.style.animationName = 'rectup';
    rectani.style.animationDelay= '0.5s';
    rectani.style.animationDuration = '0.9s';
    rectani.style.animationIterationCount ='1';
    document.body.append(rectani);

    rectani.addEventListener('animationend', () => {
        document.getElementById('rect').parentNode.removeChild(document.getElementById('rect'));
    });


    var rect = document.createElement('div');
    rect.style.width = '25%';
    rect.style.height = '100%';
    rect.style.background = 'black';
    rect.style.position = 'absolute';
    rect.style.top = 0;
    rect.style.left = '37%';
    rect.style.zIndex = 0;
    document.body.append(rect);

    var logo = document.createElement('img');
    logo.setAttribute('id','logo');
    logo.setAttribute('src','./assets/images/logo black bg.png');
    logo.style.zIndex = 1;
    logo.style.width ='30%';
    logo.style.position ='absolute';
    logo.style.top = '-16.5%';
    logo.style.left = '30.5%';
    document.body.append(logo);

    var moonleft = document.createElement('img');
    moonleft.setAttribute('id','moonleft');
    moonleft.setAttribute('src','./assets/images/tothemoonleft.png');
    moonleft.style.width='15%';
    moonleft.style.position ='absolute';
    moonleft.style.top ='12%';
    moonleft.style.left = '7%';
    document.body.append(moonleft);

    var moonright = document.createElement('img');
    moonright.setAttribute('id','moonright');
    moonright.setAttribute('src','./assets/images/tothemoonright.png');
    moonright.style.width='15%';
    moonright.style.position ='absolute';
    moonright.style.top ='12%';
    moonright.style.right = '7%';
    document.body.append(moonright);



  //  rectani.style.animationName ='rectup';
   
    /* rectani.addEventListener('mouseover', () => {
        rectani.style.height ='0%';
    });  */
}

// register page above


// login page below

function login()
{

    var rectani = document.createElement('div');
    rectani.setAttribute('id','rect');
    rectani.style.width = '100%';
    rectani.style.height = '100%';
    rectani.style.position = 'absolute';
    rectani.style.top = 0;
    rectani.style.right = 0;
    rectani.style.background = '#ffffff';
    rectani.style.zIndex = 10004;
    rectani.style.animationName = 'rectup';
    rectani.style.animationDelay= '0.5s';
    rectani.style.animationDuration = '1.2s';
    rectani.style.animationIterationCount ='1';
    document.body.append(rectani); 

    rectani.addEventListener('animationend', () => {
        document.getElementById('rect').parentNode.removeChild(document.getElementById('rect'));
    }); 


    var rect = document.createElement('div');
    rect.style.width = '25%';
    rect.style.height = '75%';
    rect.style.background = 'black';
    rect.style.position = 'absolute';
    rect.style.top = 0;
    rect.style.left = '37%';
    rect.style.zIndex = 0;
    document.body.append(rect);

    var logo = document.createElement('img');
    logo.setAttribute('id','logo');
    logo.setAttribute('src','./assets/images/logo black bg.png');
    logo.style.zIndex = 1;
    logo.style.width ='30%';
    logo.style.position ='absolute';
    logo.style.top = '-16.5%';
    logo.style.left = '30.5%';
    document.body.append(logo);

    var moonleft = document.createElement('img');
    moonleft.setAttribute('id','moonleft');
    moonleft.setAttribute('src','./assets/images/tothemoonleft.png');
    moonleft.style.width='15%';
    moonleft.style.position ='absolute';
    moonleft.style.top ='12%';
    moonleft.style.left = '7%';
    document.body.append(moonleft);

    var moonright = document.createElement('img');
    moonright.setAttribute('id','moonright');
    moonright.setAttribute('src','./assets/images/tothemoonright.png');
    moonright.style.width='15%';
    moonright.style.position ='absolute';
    moonright.style.top ='12%';
    moonright.style.right = '7%';
    document.body.append(moonright);

    rectani.addEventListener('mouseover', () => {
        rectani.style.height ='0%';
    }); 

}

// login page above

// index visitor below

function indexC() {
var userprofile = document.createElement('div');
    userprofile.setAttribute('id','profile');
    userprofile.style.width= '60px';
    userprofile.style.height= '60px';
    userprofile.style.background='black';
    userprofile.style.borderRadius='50%';
    userprofile.style.position='absolute';
    userprofile.style.right='7%';
    userprofile.style.top='12.5%';
    document.body.append(userprofile);

    userprofile.addEventListener('click', () => {
        window.location ='./index.html';
    })

var notification = document.createElement('img');
    notification.setAttribute('id','notification-icon');
    notification.setAttribute('src','./assets/images/notification-icon.png');
    notification.style.width='3.5%';
    notification.style.position='absolute';
    notification.style.right='14%';
    notification.style.top='13.5%';
    document.body.append(notification);

    var logo = document.getElementById('logo').addEventListener('click', () => {
        window.location= './indexC.html';
    });
}

// index visitor above


// dashboard code below 

function dashboard() {

    var i = 0;
var leftrect = document.getElementById('leftrect');
    leftrect.style.background = '#ff5757';
    leftrect.style.width = '7%';
    leftrect.style.height ='100%';
    leftrect.style.position = 'absolute';
    leftrect.style.top=0;
    leftrect.style.left=0;
    leftrect.style.boxShadow = '1px 1px 10px 1px rgba(0,0,255, .2)';

    var toprect = document.getElementById('toprect');
    toprect.style.background = '#ffffff';
    toprect.style.width = '100%';
    toprect.style.height ='13%';
    toprect.style.position = 'absolute';
    toprect.style.top=0;
    toprect.style.left=0;
    toprect.style.boxShadow = '1px 1px 10px 1px rgba(0,0,255, .2)';


}

// dashboard code above 


function events() {
    var userprofile = document.createElement('div');
        userprofile.setAttribute('id','profile');
        userprofile.style.width= '60px';
        userprofile.style.height= '60px';
        userprofile.style.background='black';
        userprofile.style.borderRadius='50%';
        userprofile.style.position='absolute';
        userprofile.style.right='7%';
        userprofile.style.top='12.5%';
        document.body.append(userprofile);
    
        userprofile.addEventListener('click', () => {
            window.location ='./index.html';
        })
    
    var notification = document.createElement('img');
        notification.setAttribute('id','notification-icon');
        notification.setAttribute('src','./assets/images/notification-icon.png');
        notification.style.width='3.5%';
        notification.style.position='absolute';
        notification.style.right='14%';
        notification.style.top='13.5%';
        document.body.append(notification);
    
        var logo = document.getElementById('logo').addEventListener('click', () => {
            window.location= './indexC.html';
        });
    }