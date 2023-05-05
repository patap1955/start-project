function formOnSubmit(id, url) {
    const form = document.getElementById("sendGallery-" +id)
    const checkboxGallery = document.getElementById("checkboxGallery" + id);
    const inputAltGallery = document.getElementById("inputAltGallery" + id).value

    let statusaGallary;

    if (checkboxGallery.checked) {
        statusaGallary = true
    } else {
        statusaGallary = false
    }
    axios({
        method: 'PATCH',
        url: "/amg-admin/gallery/" + id,
        data: {status_gallary:statusaGallary, alt:inputAltGallery}

    })
}

function deleteGallery(url) {
    axios({
        method: 'DELETE',
        url: url
    })
}
(() => {
    const updateButtons = document.querySelectorAll(".updateGallery")
    updateButtons.forEach((button) => {
        if (button) {
            button.addEventListener("click", (e) => {
                const galleryId = button.dataset.gallery
                formOnSubmit(galleryId)
            })
        }
    })

    const deleteButtons = document.querySelectorAll(".deleteGallery")
    deleteButtons.forEach((button) => {
        if (button) {
            button.addEventListener("click", (e) => {
                const galleryId = e.target.dataset.gallery
                axios({
                    method: 'DELETE',
                    url: "/amg-admin/gallery/" + galleryId
                }).then(res => {
                    if (res.data.success === "ok") {
                        const item = document.getElementById("galleryItem-" + res.data.id)
                        item.style.display = "none"
                    }
                })
            })
        }
    })
})()
