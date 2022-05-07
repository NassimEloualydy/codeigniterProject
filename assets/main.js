const btn=document.querySelector('.menu-btn');
        
let m=false;
btn.addEventListener('click',()=>{
    if(!m){
     btn.classList.toggle('open'); 
     m=true;       
    }else{
        btn.classList.remove('open');
        m=false;
    }
});
function show(){
document.getElementById('slider').classList.toggle('active');

}

function connexion(){
    
        var pw=document.getElementById('Pw').value;
        var login=document.getElementById('Login').value;
        if(pw!="" && login!=""){
var xhr=new XMLHttpRequest();
xhr.onreadystatechange=function()
{
    if(this.status==200 && this.readyState==4){
       if(this.responseText=="pharmacien" || this.responseText=="medecin"){
        location.href="espace";
        }else
         alert(this.responseText);
    }
}
xhr.open("POST","connexion",false);
var f=new FormData();
    f.append("pw",pw);
    f.append("login",login);
    xhr.send(f);
    }else
        alert("SVP tout les champs sont obligatoire !!");
        

    }
function inscrire(){
    var nom =document.getElementById('nom').value;
    var prenom=document.getElementById('prenom').value;
    var login=document.getElementById('login').value;
    var pw=document.getElementById('pw').value;
    var role=document.getElementById('role').value;
    var specilaliter=document.getElementById('specialite').value;
    var img=document.getElementById('img').files[0];
    
   
    if((nom!="" && prenom!="" && login!="" && pw!="" && img!=undefined && role=="Pharmacien") || (nom!="" && prenom!="" && login!="" && img!=undefined && pw!="" && role=="Medcin" && specilaliter!="")){
        var xhr=new XMLHttpRequest();
    xhr.onreadystatechange=function(){
        if(this.status==200 && this.readyState==4){
            if(this.responseText=="pharmacien" || this.responseText=="medecin"){
                location.href="espace";
                }else
                 alert(this.responseText);
                    }
 }
 xhr.open("POST","inscrire",false);
 var T=new Array();
   T=document.getElementById('img').files[0].name.split('.');
 var f=new FormData();
 f.append("nom",nom);
 f.append("ext","."+T[1]);
 f.append("prenom",prenom);
 f.append("login",login);
 f.append("pw",pw);
 f.append("photo",img);
 f.append("role",role);
 f.append("specilaliter",specilaliter);
 xhr.send(f);

    
    }else
    alert("SVP tout les champs sont obligatoire !!");

}
    function change_insc(){
        document.getElementById('nom').value="";
        document.getElementById('prenom').value="";
        document.getElementById('login').value="";
        document.getElementById('pw').value="";
        document.getElementById('Login').value="";
        document.getElementById('Pw').value="";
      
        document.getElementById('specialite').value="";
        document.getElementById('role').value="Medcin";
        document.getElementById('img').files[0]=undefined;
        if(document.getElementById('sinsc').style.display=="none"){

            document.getElementById('sinsc').style.display="block";
            document.getElementById('slogin').style.display="none";
            
        }else{
            document.getElementById('sinsc').style.display="none";
            document.getElementById('slogin').style.display="block";
     
        }
    }
    function sp(){
        if(document.getElementById('role').value=="Medcin"){
            document.getElementById('sp2').classList.toggle('active');
            document.getElementById('sp2').classList.remove('desactiver');
            
        }else{
            document.getElementById('sp2').classList.toggle('desactiver');
            document.getElementById('sp2').classList.remove('activer');      
        }
    }
    function slide(){
      var sl=document.getElementById('imgc');
       if(sl.classList[0]=='simg1'){
           sl.classList.remove('simg1');
           sl.classList.toggle('simg2');
       }else if(sl.classList[0]=='simg2'){
        sl.classList.remove('simg2');
        sl.classList.toggle('simg3');
 
       }else
       {
        sl.classList.remove('simg3');
        sl.classList.toggle('simg1');
    
       }

    //    if(vv==3)vv=0;
    //   sl.classList.toggle('simg'+(vv+1));
    //   vv++; 
}
    function slit(){
       setInterval('slide()',3500);
    }