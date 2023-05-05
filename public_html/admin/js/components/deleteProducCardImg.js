(() => {
    const deleteCardImgButton = document.getElementById('deleteCardImg')
    const productInputCardImg = document.getElementById('productInputCardImg')
    const productCardImg = document.getElementById('productCardImg')
    const deleteImagesProduct = document.querySelectorAll('.deleteImageProduct')

    // Удаление фото из карточки продукта
    deleteCardImgButton.addEventListener('click', (e) => {
        e.preventDefault();
        const id = e.target.dataset.productId
        const route = e.target.dataset.route

        axios({
            method: 'POST',
            url: route
        }).then(res => {
            console.log(res.data)
            if (res.data.answer === 'ok') {
                productInputCardImg.style.display = 'block'
                productCardImg.style.display = 'none'
            }
            console.log(res)
        })
    })

    // Удаление фото из галереи продукта
    deleteImagesProduct.forEach(function (elem) {
        elem.addEventListener('click', (e) => {
            e.preventDefault()
            const imageId = e.target.dataset.imageId
            const routeImage = e.target.dataset.route
            const imgProduct = document.getElementById('imgProduct-' + imageId)
            axios({
                method: 'POST',
                url: routeImage
            }).then(res => {
                if (res.data.answer === 'ok') {
                    imgProduct.style.display = 'none'
                }

            })
        })
    })
})()
