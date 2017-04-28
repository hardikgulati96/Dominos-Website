/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function changeDescPic(x)
{
    var source="images/"+x+".jpg";
    document.getElementById("pic").src=source;
   
    var name;
    var desc;
    if(x=='margherita')
    {
        name='MARGHERITA';
        desc='      A hugely popular margherita, with a deliciously tangy single cheese topping.';
    }
    else if(x=='dcmargherita')
    {
        name='DOUBLE CHEESE MARGHERITA';
        desc='      The ever-popular Margherita - loaded with extra cheese... oodies of it!';
    }
    else if(x=='country-special')
    {
        name='COUNTRY SPECIAL';
        desc='  For all those with a partiality for veggies, this one\'s loaded - crunchy onions, crisp capsicum and fresh juicy tomatoes. Yum!';
    }
    else if(x=='farmhouse')
    {
        name='FARM HOUSE';
        desc='      A pizza that goes ballistic on veggies! Check out this mouth watering overload of crunchy, crisp capsicum, succulent mushrooms and fresh tomatoes.';
        
    }
    else if(x=='spicy-triple-tango')
    {
        name='SPICY TRIPLE TANGO';
        desc='      Get ready for a triple flavor treat! Sweet golden corn mingled with tangy Gherkins and luscious red paprika will make your taste buds do the tango.';
    }
    else if(x=='peppy-paneer')
    {
        name='PEPPY PANEER';
        desc='      Chunky paneer with crisp capsicum and spicy red pepper - quite a mouthful!';
    }
    else if(x=='mexican-green-wave')
    {
        name='MEXICAN GREEN WAVE';
        desc='      A pizza loaded with crunchy onions, crisp capsicum, juicy tomatoes and jalapeno with a liberal sprinkling of exotic Mexican herbs.';
    }
    else if(x=='deluxe-veggie')
    {
        name='DELUXE VEGGIE';
        desc='      For a vegetarian looking for a BIG treat that goes easy on the spices, this one\'s got it all.. The onions, the capsicum, those delectable mushrooms - with paneer and golden corn to top it all.';
    }
    else if(x=='5-pepper')
    {
        name='5 PEPPER';
        desc='      Dominos introduces "5 Peppers" an exotic new Pizza. Topped wih red bell pepper, yellow bell pepper, capsicum, red paprika, jalapeno & sprinked with exotic herb.';
    }
    else if(x=='veg-paradise')
    {
        name='VEGGIE PARADISE';
        desc='      For vegetarians who love their extravagance, we have a combination of 4 premium vegetables and cheese. Juicy Mediterranean black olives, crisp capsicum, fresh baby corn fiery Red Paprika. The Gods would probably drool over this one!';
    }
    else if(x=='veg-extravaganza')
    {
        name='VEG EXTRAVAGANZA';
        desc='      A pizza that decidedly staggers under an overload of golden corn, exotic black olives, crunchy onions, crisp capsicum, succulent mushrooms, juicyfresh tomatoes and jalapeno - with extra cheese to go all around.';
    }
    else if(x=='cloud-9')
    {
        name='CLOUD 9';
        desc='      A fully loaded hurricane of tasty vegetables, this pizza is one for all seasons and reasons. Onions,juicy tomatoes, crunchy baby corn, crisp capsicum, hot jalapeno and every vegetarian’s first love: Paneer! All this on a liquid cheesy sauce base will lift your spirits higher and higher.';
    }
    else if(x=='chefs-veg-wonder')
    {
        name='CHEF\'S VEG WONDER';
        desc='      Not just a pizza but also a vegetarian gourmet affair! Our chef’s have put together the choicest vegetables to give you a fine dining pizza experience. Bite into a blend of tender Mushrooms, tangy Gherkins, crunchy Babycorn, Crisp Capsicum, fiery Red Paprika, Paneer and yummy liquid cheesy sauce. Yes, all in one pizza. Wonder indeed!';
    }
    else if(x=='roman-veg')
    {
        name='ROMAN VEG SUPREME';
        desc='      Rome’s fresh veggie delight with choicest broccoli, black olive, babycorn and red paprika. Freshly baked & hand-crafted- thin, crispy, buttery crust with wood-fired seasoned pizza sauce and olive oil. Experience true Italian flavors like never before.';
    }
    else if(x=='milan-veg')
    {
        name='MILAN VEG FANTASY';
        desc='      Savor the delightful flavors of Milan. Green & yellow zucchini wrapped in spicy grilled seasoning along with tomato and jalapeno. Freshly baked & hand-crafted- thin, crispy, buttery crust with wood-fired seasoned pizza sauce and olive oil. Experience true Italian flavors like never before.';
    }
   document.getElementById("name").textContent=name;
   document.getElementById("desc").textContent=desc;
    
}

function openSignin()
{
    document.getElementById('overlaySignin').style.display="inline";
    document.getElementById('overlaySignup').style.display="none";
    
}

function openSignup()
{
    document.getElementById('overlaySignup').style.display="inline";
    document.getElementById('overlaySignin').style.display="none";
    
}

function closeOverlay()
{
    document.getElementById("overlay").style.display="none";
    
}

function openOverlay(str)
{
   
    document.getElementById("overlay").style.display="inline";
   
    if(str==='in')
    {
        openSignin();
        document.getElementById('overlayWindow').style.height="450px";
        document.getElementById('overlayWindow').style.top="60px";
    }
    else
    {
        openSignup();
        document.getElementById('overlayWindow').style.height="650px";
        document.getElementById('overlayWindow').style.top="25px";
    }
    
    
    
}

//function setOverlayHW()
//{
//    document.getElementById("overlay").style.height=document.body.clientHeight ;
//    document.getElementById("overlay").style.width=document.body.clientHeight ;
//    
//}

var error=0;

function checkname()
{
    var name=document.getElementById('name1').value;

    for(var i=0;i<name.length;i++)
    {

        if((name.charAt(i)>=0 && name.charAt(i)<=9) && name.charAt(i)!==' ') 
        { document.getElementById('ename').textContent="*Name should  contain letters only";

          error=1;
          return;
        }
    }
     document.getElementById('ename').textContent="";
          error=0;
}

function checkusername()
{
    var name=document.getElementById('username').value;
    var flag=0;
    
    for(var i=0;i<name.length;i++)
    {

        if(name.charAt(i)==' ')
        { flag=1;
        }
    }
    
    

        if(name.length<8 )
        { document.getElementById('euser').textContent="*Username must contain atleaset 8 characters";

          error=1;
          return;
        }
        if(flag==1)
        { document.getElementById('euser').textContent="*Username should not contain spaces";

          error=1;
          return;
        }
     document.getElementById('euser').textContent="";
          error=0;
    
}

function checkpass()
{
    var name=document.getElementById('pass').value;
    

        if(name.length<8 )
        { document.getElementById('epass').textContent="*Password must contain atleaset 8 characters";

          error=1;
          return;
        }
    
     document.getElementById('epass').textContent="";
          error=0;
    
}

function confirmpass()
{
    var pass=document.getElementById('pass').value;
    var cpass=document.getElementById('cpass').value;
    
    

        if(pass!=cpass )
        { document.getElementById('ecpass').textContent="*Password don't match";

          error=1;
          return;
        }
    
     document.getElementById('ecpass').textContent="";
          error=0;
    
}


function checkphone()
{
    var name=document.getElementById('phone').value;
    var flag=0;
    
    for(var i=0;i<name.length;i++)
    {

        if(!(name.charAt(i)>=0 && name.charAt(i)<=9))
        { flag=1;
        }
    }
    
    if(flag==1)
        { document.getElementById('ephone').textContent="*Phone can have digits only";

          error=1;
          return;
        }
     if(!(name.charAt(0)==9 ||name.charAt(0)==8 ||name.charAt(0)==7))
        { document.getElementById('ephone').textContent="*Invalid Phone Number";

          error=1;
          return;
        }
        if(name.length!=10 )
        { document.getElementById('ephone').textContent="*Phone must contain 10 digits";

          error=1;
          return;
        }
        
     document.getElementById('ephone').textContent="";
          error=0;
    
}

function checkpin()
{
    var name=document.getElementById('pincode').value;
    var flag=0;
    
    for(var i=0;i<name.length;i++)
    {

        if(!(name.charAt(i)>=0 && name.charAt(i)<=9))
        { flag=1;
        }
    }
    
    if(flag==1)
        { document.getElementById('epin').textContent="*Pin can have digits only";

          error=1;
          return;
        }
     
        if(name.length!=6 )
        { document.getElementById('epin').textContent="*Pin must contain 6 digits";

          error=1;
          return;
        }
        
     document.getElementById('epin').textContent="";
          error=0;
    
}

function checkerror()
{
    if(error==1)
    {
        alert("Check Errors in form!!");
        document.getElementById('supsubmit').style.display="none";
    }
    else
    {
        document.getElementById('supsubmit').style.display="inline";
               
    }
    
}