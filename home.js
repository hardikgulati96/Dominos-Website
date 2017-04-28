/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var cnt=1;

function changetoblack()
{
    document.getElementById("cart").src="images/home/cartblack.png";
    
}

function changetogrey()
{
    document.getElementById("cart").src="images/home/cart.png";
    
}

function applyborder(divname)
{
    document.getElementById(divname).style.border="solid 1px indigo";

}

function disapplyborder(divname)
{
    document.getElementById(divname).style.border="solid 0px white";
}


function loadprev(prev,current)
{
    document.getElementById(prev).style.display="inline";
    document.getElementById(current).style.display="none";
    
}

function loadnext(next,current)
{
    document.getElementById(next).style.display="inline";
    document.getElementById(current).style.display="none";
    
}

function increment()
{
 
    if(cnt<10)
    {
           cnt+=1;
        alert(document.getElementsByClassName('s').innerHTML) ;
        document.getElementsByClassName('s').data=cnt;
    }
}

function decrement()
{
    if(cnt>1)
    {
           cnt-=1;
          alert(document.getElementsByClassName('s').innerHTML) ;
        document.getElementsByClassName('s').data=cnt;
    }
    
}

function logout()
{
    window.location="logout.php";
}