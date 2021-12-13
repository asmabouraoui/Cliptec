
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
    var email = document.getElementById('Email');
    var pwd = document.getElementById('pwd');
    var message = document.getElementById('message');

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
        location.href = "../Index/indexC.php";
    
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
function eventactive() {
    var event = document.getElementById('event');
    var shop = document.getElementById('shop');
    var forum = document.getElementById('forum');
    var hidden = document.getElementById('hiddenval');
    hidden.value='event';
        event.style.color = '#000000';
        shop.style.color = '#A8A8A8';
        forum.style.color = '#A8A8A8';
    
}
function shopactive() {
    var event = document.getElementById('event');
    var shop = document.getElementById('shop');
    var forum = document.getElementById('forum');
    var hidden = document.getElementById('hiddenval');
    hidden.value='shop';
    event.style.color = '#A8A8A8';
    shop.style.color = '#000000';
    forum.style.color = '#A8A8A8';
}
function forumactive() {
    var event = document.getElementById('event');
    var shop = document.getElementById('shop');
    var forum = document.getElementById('forum');
    var hidden = document.getElementById('hiddenval');
    hidden.value='forum';
    event.style.color = '#A8A8A8';
    shop.style.color = '#A8A8A8';
    forum.style.color = '#000000';

}

function transporteractive() {
    var transporter = document.getElementById('transporter');
    var client = document.getElementById('client');
    var hidden = document.getElementById('hiddenval');
    hidden.value='event';
    transporter.style.color = '#000000';
    client.style.color = '#A8A8A8';
    
}
function clientactive() {
    var transporter = document.getElementById('transporter');
    var client = document.getElementById('client');
    var hidden = document.getElementById('hiddenval');
    hidden.value='event';
        transporter.style.color = '#A8A8A8';
        client.style.color = '#000000';
    
}

function addfriend() {
    var search = document.getElementById('search');
    var friend = document.getElementById('friend');
    var chat = document.getElementById('chat');
    var show = document.getElementById('friendcontainer');
    var hide1 = document.getElementById('chatcontainer');
    var hide2 = document.getElementById('searchcontainer');
    search.classList.remove('active');
    friend.classList.add('active');
    chat.classList.remove('active');
    hide1.style.display ='none';
    hide2.style.display ='none';
    show.style.display = 'block';
}

function chercher() {
    var search = document.getElementById('search');
    var friend = document.getElementById('friend');
    var chat = document.getElementById('chat');
    var show = document.getElementById('searchcontainer');
    var hide1 = document.getElementById('chatcontainer');
    var hide2 = document.getElementById('friendcontainer');
    search.classList.add('active');
    friend.classList.remove('active');
    chat.classList.remove('active');
    hide1.style.display ='none';
    hide2.style.display ='none';
    show.style.display = 'block';
}

function chat() {
    var search = document.getElementById('search');
    var friend = document.getElementById('friend');
    var chat = document.getElementById('chat');
    var hide1 = document.getElementById('searchcontainer');
    var hide2 = document.getElementById('friendcontainer');
    var show = document.getElementById('chatcontainer');
    search.classList.remove('active');
    friend.classList.remove('active');
    chat.classList.add('active');
    hide1.style.display ='none';
    hide2.style.display ='none';
    show.style.display = 'block';
}

/*function showNotification() {
    var notification = document.getElementById('notification');
        var notification_container = document.getElementById('notification_container');
        var planets_div = document.getElementById('planets_div');
        notification_container.style.display = 'flex';
        planets_div.style.display = 'none';
}

function closeNotification() {
    var notification = document.getElementById('close');
        var notification_container = document.getElementById('notification_container');
        var planets_div = document.getElementById('planets_div');
        notification_container.style.display = 'none';
        planets_div.style.display = 'flex';
} */

function profile(number,number2,url)
{
        if (url=='profile')
    window.location = './profile.php?c='+number+'&u='+number2;
    else
    window.location = '../Profile/profile.php?c='+number+'&u='+number2;
}

function approve2(number,number2,id)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "../../Controllers/Profile/approvetransporter.php?c=" + number+"&a="+number2, true);
    xmlhttp.send();
    var element = document.getElementById(id+'box-notifications').remove();
    var nots = $(".number").html();
    --nots;
    $(".number").html(nots);
    alert('User Approved!');
}
/*function approve(number,number2)
{
   window.location = './approvetransporter.php?c='+number+'&a='+number2;
}*/

/*function refuse(number,number2)
{
   window.location = './refusetransporter.php?c='+number+'&a='+number2;
}*/

function refuse2(number,number2,id)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "../../Controllers/Profile/refusetransporter.php?c=" + number+'&a='+number2, true);
    xmlhttp.send();
    var element = document.getElementById(id+'box-notifications').remove();
    var nots = $(".number").html();
    --nots;
    $(".number").html(nots);
    alert('User Refused.');
}
function togglenotifications() {
    $("#notification_container").toggle();
    $("#planets_div").toggle();
}

function hidenotifications(number,id,i)
{
    var xmlhttp = new XMLHttpRequest();
   // alert(id+'box-notifications');
    xmlhttp.open("GET", "../../Controllers/Profile/hidenotification.php?c=" + number+'&id='+id, true);
    xmlhttp.send();
    var element = document.getElementById(i+'box-notificationsuser').remove();
    var nots = $(".number").html();
    --nots;
    $(".number").html(nots);
}


function updateTransporter(gov,cin)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "../../Controllers/Profile/updateTransporter.php?cin=" +cin+'&gov='+gov, true);
    xmlhttp.send();
    alert("Informations updated!");
}