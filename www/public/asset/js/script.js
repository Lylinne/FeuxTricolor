//var heureDepart = new Date('13:00:00');
//var heureArret = new Date('16:00:00');
var heureArret = 0;
var heureDepart = 13;
var color1 = document.querySelector('#color1');
var color2 = document.querySelector('#color2');
var color3 = document.querySelector('#color3');

function TimeColor1()
{
    var minuteur = scope.setTimeout(feuxCirculation, 10000);
}

function TimeColor2()
{
    var minuteur = scope.setTimeout(feuxCirculation, 2000);
}

function TimeColor3()
{
    var minuteur = scope.setTimeout(feuxCirculation, 5000);
}

function feuxCirculation()
{
    
    if(heureDepart >= heureArret)
    {
        for(var i=13; i>heureArret; i--)
        {
            color1.setAttribute("name", "color1").style.backgroundColor='red';
            color1.setAttribute("name", "color2").style.backgroundColor='orange';
            color1.setAttribute("name", "color3").style.backgroundColor='green';
        }
        
    }
    alert("bonjour");
}







var heureArret2 = 13;
var heureDepart2 = 0;
var color4 = document.querySelector('#color1');
var color5 = document.querySelector('#color2');
var color6 = document.querySelector('#color3')

function TimeColor4()
{
    var minuteur = scope.setTimeout(feuxCirculation2, 10000);
}

function TimeColor5()
{
    var minuteur = scope.setTimeout(feuxCirculation2, 2000);
}

function TimeColor6()
{
    var minuteur = scope.setTimeout(feuxCirculation2, 5000);
}

function feuxCirculation2()
{
    
    if(heureArret2 >= heureDepart2)
    {
        for(var i=0; i<heureArret; i++)
        {
            color6.setAttribute("name", "color6").style.backgroundColor='green';
            color4.setAttribute("name", "color4").style.backgroundColor='red';
            color5.setAttribute("name", "color5").style.backgroundColor='orange';
        }
    }
}