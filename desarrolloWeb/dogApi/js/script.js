document.addEventListener('DOMContentLoaded', () => {
    getPerrito()
    let boton = document.querySelector('#btn-generar')

    boton.addEventListener('click', () => {
        getPerrito()
    })

    async function getPerrito() {
        let response = await fetch('https://dog.ceo/api/breeds/image/random')
        const data = await response.json()
        let rutaImagen = data.message

        let imagen = document.querySelector('#img-perrito')
        imagen.setAttribute('src', rutaImagen)
    }
})