<div id="back_overlay">
    <div class="overlay_footer">
        <div class="copyright">
            Eatzem tout droits réservés 2016
        </div>
        <nav id="rightfoot">
            <a title="A propos" href="#">À propos</a>
            <a title="Foire aux questions" href="#">F.A.Q</a>
            <a title="Fonctionnement" href="#">Fonctionnement</a>
            <a title="Conditions générales d'utilisations" href="#">C.G.U</a>
        </nav>
    </div>
    <div class="logosite_overlay_content">
        <img class="logosite_overlay" alt="logo site" src="Upload/Graphisme/Logo/eatzem.png"/>
    </div>
    <div class="middlebar"></div>
    <div class="center_overlay">
<!--        <p><span>Connexion</span></p>-->
        <form action="<?='.'.$_SERVER['REQUEST_URI'];?>" method="post" style="background-color: #222222 !important;">

            <?php if(isset($pop_up_error)){ echo '<p>' . $pop_up_error . '</p>'; } ?>
            
            <input class="special-input" type="text" name="email" placeholder="E-mail" />
            <input class="special-input" type="password" name="password" placeholder="password" />
            <p>
                <a id="link_forget_password" href="./?page=password_oublie">Mot de passe oublié ?</a>
            </p>
            <span>
                <input type="button" name="retour" id="close_overlay_co" value="Inscription" />
                <input type="submit" name="connexion" value="Connexion" />
            </span>
            <span>
                <a style="margin-top: 5px; background-color: #c7001b; color: white; font-weight: 700" href="https://pro.eatzem.fr" class="btn btn-block" title="lien vers la présentation">Découvrez-nous !</a>
            </span>
        </form>
    </div>


</div>

<style>

    .special-input{
        border-radius: 3px;
    }

    #link_forget_password{
        width: 100%;
        display: flex;
        align-content: center;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 11px;
        transition: color 0.2s;
    }

    #link_forget_password:hover{
        color: #205470;
        text-decoration: none;
    }


    .logosite_overlay_content{
        position: fixed;
        top: 20px;
        width: 100%;
        height: auto;
        display: flex;
        justify-content: space-around;
        flex-direction: row;
    }

    .logosite_overlay{
        height: 40px;
        width: auto;
    }

    #back_overlay{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 10000;
        background-color: #222222; /*dim the background*/
        display: flex;
    }

    .middlebar{
        position: fixed;
        top: 50%;
        height:0px;
        width: 100%;
        border-top: 2px solid #c7001b;
        border-bottom: 2px solid #c7001b;
        z-index: 3;
        box-shadow: 0px 0px 5px #171717;
    }

    .center_overlay{
        width: 270px;
        /*height: auto;*/
        /*padding-bottom: 0px;*/
        margin: auto;
        background-color: #222222;
        border: 4px solid #c7001b;
        border-radius: 3px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        /*justify-content: center;*/
        position: relative;
        z-index: 5;
        box-shadow: 0px 0px 10px #171717;
    }

    .center_overlay > form{
        margin: 0px;
        padding: 0px;
    }

    .center_overlay > form > p{
        width: 100%;
        height: 30px;
        background-color: #222222;
        display: flex;
        margin: 0px;
    }

    .center_overlay > p > span{
        margin: auto;
        color: #c7001b;
        text-shadow: 0px 2px 4px #000;
    }

    .center_overlay > form{
        width: 100%;
        height: auto;
        padding: 5px;
        display: flex;
        flex-direction: column;
    }

    .center_overlay > form > span{
        width: 100%;
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
    }

    .center_overlay > form > input[type=text], .center_overlay > form > input[type=password]{
        width: 100%;
        text-align: center;
        border: 1px solid black;
        /*height 100%;*/
        padding: 5px;
        margin-bottom: 5px;
    }

    .center_overlay > form > span > input[type=submit]{
        width: 100%;
        text-align: center;
        /*border: 1px solid black;*/
        /*height 30px;*/
        padding: 5px;
        margin-left: 2.5px;
        background-color: rgba(0,0,0,0);
        border: none;
        border-bottom: 1px solid #d0021b;
        border-top: 1px solid #d0021b;
        color: #d0021b;
        transition: background-color 0.3s, color 0.3s;

        border-radius: 3px;
    }

    .center_overlay > form > span > input[type=submit]:hover{
        color: #fff;
        background-color: #d0021b;
    }

    .center_overlay > form > span > input[type=button]{
        width: 100%;
        text-align: center;
        /*border: 1px solid black;*/
        /*height 30px;*/
        padding: 5px;
        margin-right: 2.5px;
        background-color: rgba(0,0,0,0);
        border: none;
        border-bottom: 1px solid #11709d;
        border-top: 1px solid #11709d;
        color: #11709d;
        transition: background-color 0.3s, color 0.3s;
        border-radius: 3px;
    }

    .center_overlay > form > span > input[type=button]:hover{
        color: #fff;
        background-color: #11709d;
    }

    .overlay_footer{
        height: 25px;
        width: 100%;
        padding: 5px;
        display: flex;
        flex-direction: row;
        align-items: flex-end;
        justify-content: space-between;
        position: fixed;
        bottom: 0px;
        z-index: 10;
    }

    .copyright{
        color: white;
        text-shadow: 0px 2px 4px #000;
    }

    .overlay_footer > nav > a{
        padding: 5px;
        color: white;
        text-decoration: none;
        text-shadow: 0px 2px 4px #000;
        transition: background-color 0.3s, color 0.3s;
        z-index: 1000000;
    }

    .overlay_footer > nav > a:hover{
        background-color: #D0021B;
        color: #222222;
        text-shadow: none;
    }
</style>