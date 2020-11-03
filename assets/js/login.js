$(document).ready(function() {
    $("#btnLogin").click(function(e) { //sobre este boton mande llamar a la funcion e
        e.preventDefault();
        /*
                //mandar llamar lo que tienen los dos cmapos de uso, capturar su valor, guardamos en una variable
                var user = $("#inputUser").val().trim(); //borramos espacios en blanco(trim)
                var pass = $("#inputPassword").val().trim();

                //una alerta que me escriba lo que tiene user
                //alert(user + " " + pass);
                console.log(user + " " + pass);
        */
        mostrarDato();
    }); //end btnLogin

    async function mostrarDato() {
        const datos = new FormData(document.getElementById('formulario')); //obtengo todo o que tenga los campos del formulario, me puede eviatr lo de arriba, solo fue para ver si se jalaban, arriba
        // y los encapasulo en la variable llamada data

        //espero una promesa 
        await fetch('assets/data/login.php', { //los mande a la pagina a login.php
            method: 'POST',
            body: datos
        })

        .then(response => response.json()) //lo que traiga de resouesta lo quiero en formato JSON
            .then(response => {
                //console.log(response.dato); //que me ponga en consola lo que traiga el response
                if (response.dato == 'ok') {
                    location.href = "principal.html";
                } else {
                    alert("Datos incorrectos");
                }
            })
            //capturar si viene algun error
            .catch(err => {
                console.log(err);
            });
    } //end mostrarDato
});