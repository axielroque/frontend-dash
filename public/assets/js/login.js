window.addEventListener("DOMContentLoaded", function () {
    console.log("scrpt login");

    let $form = document.querySelector("#signin");
    let $msg = document.querySelector(".msg");

    $form.addEventListener("submit", function (e) {
        e.preventDefault();

        let datos = new FormData($form);
        let datosParse = new URLSearchParams(datos);

        fetch(`${arc.rest_url}/login`,
            {
                method: "POST",
                body: datosParse
            }
        )
            .then(res => res.json())
            .then(json => {
                console.log(json);
                $msg.innerHTML = json.data.user_nicename
                if (json.data.user_nicename) {
                    window.location.href = `${arc.home_url}`
                }
            })
            .catch(err => {
                console.log(`Hay un error: ${err}`);
            })
    })

})