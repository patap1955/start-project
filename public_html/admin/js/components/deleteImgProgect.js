(function() {
    const deleteImgProject = document.querySelectorAll('.deleteImgProject')

    deleteImgProject.forEach(el => {
        el.addEventListener('click', (e) => {
            e.preventDefault()
            const imgData = el.dataset.img
            const url = el.dataset.route
            const img = JSON.parse(imgData)

            axios({
                method: 'POST',
                url: "/amg-admin/project-img/" + img['id'] + "/delete",

            }).then(function (res) {
                if (res.data.success === "ok") {
                    document.querySelector('.project-img-' + img['id']).style.display = "none"
                }
            })
        })
    });
})()
