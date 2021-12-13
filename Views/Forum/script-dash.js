
    document.addEventListener('DOMContentLoaded', function () {
        var modeSwitch = document.querySelector('.mode-switch');
      
        modeSwitch.addEventListener('click', function () {                     
        document.documentElement.classList.toggle('dark');
          modeSwitch.classList.toggle('active');
        });
        
        var listView = document.querySelector('.list-view');
        var gridView = document.querySelector('.grid-view');
        var projectsList = document.querySelector('.project-boxes');
        
        listView.addEventListener('click', function () {
          gridView.classList.remove('active');
          listView.classList.add('active');
          projectsList.classList.remove('jsGridView');
          projectsList.classList.add('jsListView');
        });
        
        gridView.addEventListener('click', function () {
          gridView.classList.add('active');
          listView.classList.remove('active');
          projectsList.classList.remove('jsListView');
          projectsList.classList.add('jsGridView');
        });
        
        document.querySelector('.messages-btn').addEventListener('click', function () {
          document.querySelector('.messages-section').classList.add('show');
        });
        
        document.querySelector('.messages-close').addEventListener('click', function() {
          document.querySelector('.messages-section').classList.remove('show');
        });
      });

function indexC() {
    var profile = document.getElementById('profile');
        profile.addEventListener('click', () => {
            window.location ='./userprofile.php';
        })
}

function events() {
        var profile = document.getElementById('profile');
        profile.addEventListener('click', () => {
            window.location ='./index.html';
        })
        document.getElementById('logo').addEventListener('click', () => {
            window.location= './indexC.html';
        });
    }

    function checkRegister() {

        var name = document.getElementById('name');
        var lastname = document.getElementById('lastname');
        var cin = document.getElementById('cin');
        var email = document.getElementById('email');
        var pwd = document.getElementById('pwd');
        var message = document.getElementById('message');
            if(name.value=="")
            {
                message.innerHTML="Name field cannot be empty.";
                message.style.opacity=1;
                name.classList.add('error'); 
                return false;
            }
              else if (name.value.charAt(0)!==name.value.charAt(0).toUpperCase())
            {
                message.innerHTML="Name's first character must be in uppercase.";
                message.style.opacity=1;
                name.classList.add('error');
                return false;
            } else if (name.value.length<3)
            {
                message.innerHTML="Name length must be atleast 3 characters.";
                message.style.opacity=1;
                name.classList.add('error'); 
                return false;
            } else {
                message.innerHTML="";
                name.classList.remove('error');
            }

            if (lastname.value=="")
            {
                message.innerHTML="Lastname field cannot be empty.";
                message.style.opacity=1;
                lastname.classList.add('error');
                return false;
            }
             else if (lastname.value.charAt(0)!==lastname.value.charAt(0).toUpperCase())
            {
                message.innerHTML="Firstname's first character must be in uppercase.";
                message.style.opacity=1;
                lastname.classList.add('error');
                return false;
            } else if (lastname.value.length<3)
            {
                message.innerHTML="Lastname length must be atleast 3 characters.";
                message.style.opacity=1;
                lastname.classList.add('error'); 
                return false;
            } else {
                message.innerHTML="";
                lastname.classList.remove('error'); 
            }
            if (cin.value=="")
            {
                message.innerHTML="CIN field cannot be empty.";
                message.style.opacity=1;
                cin.classList.add('error');
                return false;
            } else 
            {
                message.innerHTML="";
                cin.classList.remove('error'); 
            }
            
            if (email.value=="")
            {
                message.innerHTML="Email field cannot be empty.";
                message.style.opacity=1;
                email.classList.add('error');
                return false;
            } else 
            {
                message.innerHTML="";
                email.classList.remove('error'); 
            }
            
            if (pwd.value=="")
            {
                message.innerHTML="Password field cannot be empty.";
                message.style.opacity=1;
                pwd.classList.add('error');  
                return false;
            }
              else if (pwd.value.length<8)
            {
                message.innerHTML="Password length must be atleast 8 characters.";
                message.style.opacity=1;
                pwd.classList.add('error');   
                return false;
            } 
            else {
                message.innerHTML="";
                password.classList.remove('error');
            }
    };


function checkLogin() {
    var cin = document.getElementById('cin');
    var pwd = document.getElementById('pwd');
    var message = document.getElementById('message');

    if (cin.value=="")
            {
                message.innerHTML="CIN field cannot be empty.";
                message.style.opacity=1;
                cin.classList.add('error');
                return false;
            } else 
            {
                message.innerHTML="";
                email.classList.remove('error'); 
            }
            
            if (pwd.value=="")
            {
                message.innerHTML="Password field cannot be empty.";
                message.style.opacity=1;
                pwd.classList.add('error');  
                return false;
            }
              else if (pwd.value.length<8)
            {
                message.innerHTML="Password length must be atleast 8 characters.";
                message.style.opacity=1;
                pwd.classList.add('error');   
                return false;
            } 
            else {
                message.innerHTML="";
                password.classList.remove('error');
            }
}

function makeid(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * 
 charactersLength));
   }
   return result;
}

function randomseed() {
    var url = "https://avatars.dicebear.com/api/adventurer-neutral/";
    var seed = makeid(5);
    url+=seed;
    url+=".svg?mood[]=happy&background=%23000000";
    var profile = document.getElementById('profile');
   // style="background: url('https://avatars.dicebear.com/api/adventurer-neutral/espritta.svg?mood[]=happy&background=%23000000');"
    profile.style.background = "url('"+url+"')";
    profile.addEventListener('click', () => {
        window.location ='./userprofile.php';
    })
}

function userprofile() {
    var icon = document.getElementsByClassName("icon");
    icon.addEventListener('click', () => {
        window.location('./modifyuser.php');
    })
}

function goToIndexC()
{
    var img = document.getElementById('easyrocket').onclick = function () {
        location.href = "./indexC.php";
    };
}

function earth() {
    var planet = document.getElementById('planet');
    planet.setAttribute('src','https://my.spline.design/untitledcopycopy-ca9a2e1d8f9e12d3da0d6cbef29839cb/');
    var earth = document.getElementById('earth');
    var mars = document.getElementById('mars');
    var moon = document.getElementById('moon');
    earth.classList.add('selected');
    mars.classList.remove('selected');
    moon.classList.remove('selected');
}

function mars() {
    var planet = document.getElementById('planet');
    planet.setAttribute('src','https://my.spline.design/untitled-8737add8819fa0ac73d43c6e22a00e55/');
    var earth = document.getElementById('earth');
    var mars = document.getElementById('mars');
    var moon = document.getElementById('moon');
    earth.classList.remove('selected');
    mars.classList.add('selected');
    moon.classList.remove('selected');
}

function moon() {
    var planet = document.getElementById('planet');
    planet.setAttribute('src','https://my.spline.design/untitledcopy-82502a1c88b7a1935ad89719a1779765/');
    var earth = document.getElementById('earth');
    var mars = document.getElementById('mars');
    var moon = document.getElementById('moon');
    earth.classList.remove('selected');
    mars.classList.remove('selected');
    moon.classList.add('selected');
}