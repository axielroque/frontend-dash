window.addEventListener("DOMContentLoaded", function () {

    console.log("script create post");

    let $form = document.querySelector("#createPost");
    let $msg = document.querySelector(".msg");

    $form.addEventListener("submit", function (e) {
        e.preventDefault();

        let datos = new FormData($form);
        let datosParse = new URLSearchParams(datos);

        fetch(`${arc.rest_url}/new-post`,
            {
                method: "POST",
                body: datosParse
            }
        )
            .then(res => res.json())
            .then(json => {
                console.log(json);
                $msg.innerHTML = json?.msg
            })
            .catch(err => {
                console.log(`Hay un error: ${err}`);
            })
    })

    tinymce.init({
        selector: 'textarea#editorPost',
        menubar: false
    });


})


