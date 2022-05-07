<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/style2.css">
    <link rel="stylesheet" href="<?php echo base_url();?>//assets/style2.css">

    <link rel="icon" href="../../../Gestion_Medcin_et_pharmaci/assets/images/hopital.jpg"/>
    <script src='<?php echo base_url();?>assets/main2.js'></script>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body onload="getCompt();actualiserP();">
    <div id="slider">
        <div class="toggle-btn" onclick="show();">
            <div class="menu-btn" onclick="Menu();">
              <div class="menu-btn__burger"></div>
            </div>
        </div>
        <center>
        <img id="imgcompt" src="<?php echo base_url();?>">
        <br>
               <p id="NomCompt"></p>
                       </center>
        <br><br><br>
        <ul>
            <li><input class="btnSM btnSM1" type="button" value="Malade & Rendez vous"></li>
            <li><input class="btnSM btnSM2" type="button" value="Visite & Ordonnance"></li>
            <li><input class="btnSM btnSM3" type="button" value="Gestion Medicament"></li>
            <li><input class="btnSM btnSM4" type="button" value="Votre profil"></li>
            <li><input class="btnSM btnSM5" onclick="Quitter();" type="button" value="Déconnecté"></li>
            
        </ul>
    </div>
<center><h1>Gestion Malade et Rendez vous</h1></center>    
    <div class="S1">
    <div class="s1">
        <div class="box">
            <h2>Liste Des Malade</h2>
            <br>
            <center>
            <table class="TableP">
                <tr><td>CIN :</td><td><input type="text" class="OBLP" id="cinpc"></td><td>Date Naissance :</td><td><input type="date" class="OBLP" id="datepc"></td></tr>
                <tr><td>Nom :</td><td><input type="text" class="OBLP" id="nompc"></td><td>Prenom :</td><td><input type="text" class="OBLP" id="prenompc"></td></tr>
            </table>
            <p><input type="button" class="btnOP1" onclick="chercherP();" value="chercher"/>&nbsp;<input type="button" onclick="actualiserP();"  class="btnOP2" value="Actualiser"/></p>
            <br>
            <div  class="LisP">
            <div class="boxP"><div class="circle"><img class="imgP"><h4>CD704354</h4></div>
          <div class="infoP">
          <p style="color:black"><span>Prenom :</span> Nassim</p>
          <p style="color:black"><span>Nom :</span>Eloualydy</p>
          <p style="color:black"><span>Date :</span>02/10/2000</p>
          <input type="button" class="btnOP5" title="supprimer" onclick="deleteP();"/>
          <input type="button" class="btnOP4" title="modifier" onclick="updateP();" />
          <input type="button" class="btnOP3" title="detail" onclick="detailP();" />
   
        </div>
                 
    </div>
    
            </div>
        </center>
        </div>
        <div class="box"><center>
               <table class="forMP">
       <tr><td>Image :</td><td><input type="file"  id="imagepf"></td></tr>
       <tr><td>CIN :</td><td><input type="text"  id="cinpf"></td></tr>
       <tr><td>Nom :</td><td><input type="text" id="nompf"></td></tr>
       <tr><td>Prenom :</td><td><input type="text" id="prenopf"></td></tr>
       <tr><td>Date :</td><td><input type="date" id="datepf"></td></tr>
                  
   </table>
   <p><input type="button" onclick="addP();" class="btn06" value="Ajouter">&nbsp;<input type="button" onclick="annuler();" class="btn07" value="Annuler"></p>

        </center></div>
    </div>
</div>
<br>
<div class="S1">
    <div class="s1">
        <div class="box"><h3>Liste Des Malade</h3></div>
        <div class="box">ss</div>
    </div>
</div>
 
   </body>
</html>