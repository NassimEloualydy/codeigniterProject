// const btn=document.querySelector('.menu-btn');
// let m=false;
// btn.addEventListener('click',()=>{
//     if(!m){
//      btn.classList.toggle('open'); 
//      m=true;       
//     }else{
//         btn.classList.remove('open');
//         m=false;
//     }
// });
//deletePupdatePdetailP
function deleteP(id){
    alert(id);
}
function updateP(id){
    alert(id);
}
function detailP(id){
    alert(id);
}
function chercherP(){
    
    var xhr=new XMLHttpRequest();
    xhr.onreadystatechange=function()
    {
        if(this.status==200 && this.readyState==4){
            document.querySelectorAll('.LisP')[0].innerHTML=this.responseText;
 
        }
    }
    xhr.open("POST","chercheP",false);
    var f=new FormData();
    f.append("cin",document.getElementById('cinpc').value);
    f.append("nom",document.getElementById('nompc').value);
    f.append("prenom",document.getElementById('prenompc').value);
    f.append("date",document.getElementById('datepc').value);

    xhr.send(f);
    

}
function actualiserP(){
    document.getElementById('cinpc').value="";
    document.getElementById('nompc').value="";
    document.getElementById('prenompc').value="";
    document.getElementById('datepc').value="";
    var xhr=new XMLHttpRequest();
    xhr.onreadystatechange=function()
    {
        if(this.status==200 && this.readyState==4){
            document.querySelectorAll('.LisP')[0].innerHTML=this.responseText;
        }
    }
    xhr.open("POST","actualiseP",false);
    xhr.send(null);
    

}
function show(){
    document.getElementById('slider').classList.toggle('active');

}
var k=1;
function Menu(){
    if(k==1){
        document.querySelector('.menu-btn').classList.toggle('open');
        k=0; 
    }else
    {
        document.querySelector('.menu-btn').classList.remove('open');
       k=1;
    }
}
function getCompt(){
    var xhr=new XMLHttpRequest();
    xhr.onreadystatechange=function()
    {
        if(this.status==200 && this.readyState==4){
            if(this.responseText==""){
                location.href="login";
            }else{
                //NomCompt 
                var T=new Array();
                
                T=this.responseText.split('.');
                
                document.getElementById('NomCompt').innerHTML=T[0];
                document.getElementById('imgcompt').src+=T[3]+"/"+T[1]+'.'+T[2];
            }
            
          }
    }
    xhr.open("POST","getcompt",false);
    xhr.send(null);
    
}
function Quitter(){
    var xhr=new XMLHttpRequest();
    xhr.onreadystatechange=function()
    {
        if(this.status==200 && this.readyState==4){
            location.href="login";  
        }
    }
    xhr.open("POST","logout",false);
    xhr.send(null);
    
}
