document.addEventListener('DOMContentLoaded', () => {

    async function fetchProductos(url) {
        const response = await fetch(url)
        const data = await response.json()
        console.log(data)
        return data
    }

    let next = ''


    fetchProductos('https://digi-api.com/api/v1/digimon?page=11').then(digimons => {
        let html = ''
        next = digimons.pageable.nextPage
        digimons.content.forEach(digimon => {
            console.log(digimon)
            html += '<div class="col-3 my-3">'
            html += '<img src="'+digimon.image+'" alt="">'
            html += '</div>'
        });
        const productosContainer = document.querySelector('#productos-container')
        productosContainer.innerHTML = html
    })




    document.querySelector('#next').addEventListener('click' , () => {
        fetchProductos()
        fetchProductos(next).then(digimons => {
            let html = ''
            next = digimons.pageable.nextPage
            digimons.content.forEach(digimon => {
                console.log(digimon)
                html += '<div class="col-3 my-3">'
                html += '<img src="'+digimon.image+'" alt="">'
                html += '</div>'
            });
            const productosContainer = document.querySelector('#productos-container')
            productosContainer.innerHTML = html
        })
    })

})