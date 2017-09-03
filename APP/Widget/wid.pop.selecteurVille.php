<div id="selTown_overlay_content">
    <form method="post" action="." autocomplete="false">
        <input type="text" name="nouvelle_localisation" placeholder="Rentrez votre adresse" id="setTown_overlay_txt" />
        <input type="submit" name="ManualSelect" value="." id="setTown_overlay_sub" />
    </form>
</div>

<style>

    #selTown_overlay_content{
        display: none;

        position: fixed;
        top: 55px;
        right: 10px;
        z-index: 1000;

        border: 5px solid grey;
        background-color: #363636;

        padding: 0px;
        margin: 0px;

        border-radius: 10px;
        overflow: hidden;
    }

    #selTown_overlay_content > form{
        margin: 0px;
        padding: 0px;

        width: 100%;
        max-width: 100%;
        height: 100%;
        max-height: 100%;

        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
    }

    #selTown_overlay_content > form > input{
        margin: 0px;
        padding: 0px;

        text-align: center;
        font-size: 24px;
        font-style: italic;

        border: none;

        height: 40px;
    }

    #setTown_overlay_txt{
        width: 290px;
    }

    #setTown_overlay_sub{
        width: 40px;
        color: rgba(0,0,0,0);

        background-color: #343434;
        background-image: url('Upload/Graphisme/Icones/geolocation_white.png');
        background-size: 80%;
        background-position: center;
        background-repeat: no-repeat;

        transition: background-color 0.5s;
    }

    #setTown_overlay_sub:hover{
        background-color: #830e1d;
    }
</style>