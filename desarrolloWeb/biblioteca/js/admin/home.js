document.addEventListener('DOMContentLoaded', () => {

    var myModal = new bootstrap.Modal(document.querySelector('#formularioLibroModal'));

    editarLibro = (titulo, idAutor, cat, cantidad, idLibro) => {
        myModal.show()
        const textTitulo = document.querySelector('#txt-titulo')
        textTitulo.value = titulo
        
        const txtAutor = document.querySelector('#slct-autor')
        txtAutor.value = idAutor

        const txtCategoria = document.querySelector('#slct-categoria')
        txtCategoria.value = cat

        const txtStock = document.querySelector('#txt-stock')
        txtStock.value = cantidad

        const txtAccion = document.querySelector('#txtAccion')
        txtAccion.value = 'update'

        const txtId = document.querySelector('#txt-id')
        txtId.value = parseInt(idLibro)
    }

    addLibro = () => {
        const txtAccion = document.querySelector('#txtAccion')
        txtAccion.value = 'add'
    }


})