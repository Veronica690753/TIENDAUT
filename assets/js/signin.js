$(document).ready(function() {

    $("#btnSave").click(function(e) {
        e.preventDefault();
        location.href = "index.html";
        alert("Registrado correctamente");
        agregarDato();
    });


    async function agregarDato() {
        const datos = new FormData(document.getElementById('formulario2'));

        await fetch('assets/data/signin.php', {
            method: 'POST',
            body: datos
        })

        .then(response => response.json())
            .then(response => {
                //console.log(response.data);
                if (response.dato == 'ok') {
                    location.href = "index.html"
                } else {
                    alert("Datos Incorrectos");
                }
            })
            .catch(err => {
                console.log(err);
            });
    }
});