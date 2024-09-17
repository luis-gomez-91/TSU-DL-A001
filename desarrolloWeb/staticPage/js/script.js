
document.addEventListener('DOMContentLoaded', function() {

    let botonPrueba = document.querySelector('#prueba')

    window.addEventListener('scroll', () => {
        let nav = document.querySelector('nav')
        if (window.scrollY > 0) {
            nav.classList.add('prueba')
        } else {
            nav.classList.remove('prueba')
        }
    })
    

    document.querySelector('#prueba').addEventListener('click', () => {
        Swal.fire({
            title: "Saludo",
            text: "Hola mundo",
            icon: "info"
        });
    })



})

