<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/style.css"> 
    <link rel="icon" href="../../../Gestion_Medcin_et_pharmaci/assets/images/hopital.jpg"/>
    <script src='<?php echo base_url();?>/assets/main.js'></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body onload="slit();change_insc();">
    <div id="container">
    <div id="imgc" class="simg1"><center></center></div>
    <div id="slogin"><center>
        <h1 style="margin-top: 50px;">Connexion</h1>
        <br><br><br>
        <table class="login">
            <tr><td>Login :</td><td><input type="text" class="input_cnx" id="Login"></td></tr>
            <tr><td>Mot de Passe :</td><td><input type="text" class="input_cnx" id="Pw"></td></tr>


            <tr><td><input type="button" class="btn_cnx" onclick="connexion();"  value="Connexion"></td><td><input type="button" class="btn_insc" onclick="change_insc();"  value="Inscrire"></td></tr>
            

        </table>
    </center></div>
    <div id="sinsc"><center>
        <h1 style="margin-top: 50px;">Inscrire</h1>
        <br>
        <table class="login">
            <tr><td>Image :</td><td><input type="file" class="input_cnx" accept="image/x-png,image/gif,image/jpeg,image/jpg" style="border: none;" id="img"></td></tr>

            <tr><td>Nom :</td><td><input type="text" class="input_cnx" id="nom"></td></tr>
            <tr><td>Prenom :</td><td><input type="text" class="input_cnx" id="prenom"></td></tr>
            <tr><td>Login :</td><td><input type="text" class="input_cnx" id="login"></td></tr>
            <tr><td>Mot de Passe :</td><td><input type="text" class="input_cnx" id="pw"></td></tr>    
            <tr><td>Role :</td><td><select onchange="sp();"  class="input_cnx" id="role"><option>Pharmacien</option><option>Medcin</option></select></td></tr>
            <tr id="sp2"  class="activer"><td>Spécialité :</td><td><input type="text" class="input_cnx" id="specialite"></td></tr>
            <tr><td><input type="button" class="btn_cnx" onclick="inscrire();"  value="Inscrire"></td><td><input type="button" onclick="change_insc();" class="btn_insc"  value="Connexion"></td></tr>
            
    
        </table>
    </center></div>
    
</div>
<div id="imgc" class="simg1"><center></center></div>
</div>

</body>
</html>