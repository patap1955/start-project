(() => {
    const deleteImgArticle = document.getElementById("deleteImgArticle")
    const imgArticleInput = document.getElementById("imgArticleInput")
    const imgArticleBlock = document.getElementById("imgArticleBlock")
    if (deleteImgArticle) {
        deleteImgArticle.addEventListener("click", function (e) {
            e.preventDefault()
            const src = e.target.dataset.src
            const articleId = e.target.dataset.articleId
            axios({
                method: 'POST',
                url: "/amg-admin/gallery/" + articleId + "/img/delete",

            }).then(function (res) {
                if (res.data.success === "ok") {
                    imgArticleInput.style.display = "block"
                    imgArticleBlock.style.display = "none"
                }
            })
        })
    }
})()
