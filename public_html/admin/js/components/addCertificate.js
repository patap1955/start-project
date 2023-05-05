(() => {
    Dropzone.autoDiscover = false

    const addGallary = document.getElementById("addGallery");
    const previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)
    const sendGalleryForm = document.querySelectorAll(".sendGallery")

    function addSuccessDiv(img, res) {
        const imageSuccess = document.querySelector(".image-success__list")
        const imageSuccessItem = document.createElement("div")
        const imgBlock = document.createElement("div")
        const imgSuccess = document.createElement("img")
        const inputBlock = document.createElement("div")
        const formGallery = document.createElement("form")
        const inputGroup = document.createElement("div")
        const inputCheckbox = document.createElement("input")
        const labelCheckbox = document.createElement("label")
        const formGroup = document.createElement("div")
        const saveButtonGallery = document.createElement("button")
        const LabelAltGallery = document.createElement("label")
        const inputAltGallery = document.createElement("input")
        const inputHiddenIdGalley = document.createElement("input")

        formGallery.setAttribute("class", "sendGallery")
        formGallery.setAttribute("id", "sendGallery-" + res.id)
        imageSuccessItem.setAttribute("class", "image-success__item")
        imgBlock.setAttribute("class", "img-block")
        imgSuccess.setAttribute("src", img)
        inputBlock.setAttribute("class", "input-block")
        inputGroup.setAttribute("class", "custom-control custom-checkbox")
        inputCheckbox.setAttribute("class", "custom-control-input")
        inputCheckbox.setAttribute("name", "status_gallary")
        inputCheckbox.setAttribute("type", "checkbox")
        inputCheckbox.setAttribute("id", "checkboxGallery" + res.id)
        labelCheckbox.setAttribute("for", "checkboxGallery"  + res.id)
        labelCheckbox.setAttribute("class", "custom-control-label")
        labelCheckbox.innerText = "Добавить в блок Портфолио?"
        formGroup.setAttribute("class", "form-group")
        saveButtonGallery.setAttribute("type", "button")
        saveButtonGallery.setAttribute("onclick", "formOnSubmit(" + res.id + ")")
        saveButtonGallery.setAttribute("class", "saveButtonGallery")
        saveButtonGallery.setAttribute("class", "btn btn-block btn-info btn-sm")
        saveButtonGallery.setAttribute("data-gallery", res.id)
        saveButtonGallery.innerText = "Сохранить"
        LabelAltGallery.innerText = "Описание изображения"
        inputAltGallery.setAttribute("class", "form-control")
        inputAltGallery.setAttribute("type", "text")
        inputAltGallery.setAttribute("name", "alt")
        inputAltGallery.setAttribute("id", "inputAltGallery" + res.id)
        inputHiddenIdGalley.setAttribute("name", "id_gallery")
        inputHiddenIdGalley.setAttribute("type", "hidden")
        inputHiddenIdGalley.setAttribute("value", res.id)


        imageSuccess.appendChild(imageSuccessItem)
        imageSuccessItem.appendChild(imgBlock)
        imgBlock.appendChild(imgSuccess)
        imageSuccessItem.appendChild(inputBlock)
        inputBlock.appendChild(formGallery)
        formGallery.appendChild(inputGroup)
        formGallery.appendChild(inputHiddenIdGalley)
        inputGroup.appendChild(inputCheckbox)
        inputGroup.appendChild(labelCheckbox)
        formGallery.appendChild(formGroup)
        formGroup.appendChild(LabelAltGallery)
        formGroup.appendChild(inputAltGallery)
        formGallery.appendChild(saveButtonGallery)
    }
    const myDropzone = new Dropzone("#addGallery", { // Make the whole body a dropzone
        //url: "", // Set the url
        paramName: "img",
        thumbnailWidth: 120,
        renameFile: function (file) {
            var dt = new Date();
            var time = dt.getTime();
            return time + "_" + file.name;
        },
        withCredentials: false,
        //uploadMultiple: true,
        autoProcessQueue: true,
        parallelUploads: 20,
        maxFilesize: 2,
        createImageThumbnails: true,
        maxThumbnailFilesize: 2,
        resizeQuality: 0.8,
        //autoProcessQueue: false,
        thumbnailMethod: "contain",
        acceptedFiles: "image/jpeg,image/png,image/svg,image/gif,image/webp",
        previewTemplate: previewTemplate,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews", // Define the container to display the previews
        clickable: ".fileinput-button", // Define the element that should be used as click trigger to select files.
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        thumbnail: function (file, dataUrl) {
            if (file.previewElement) {
                file.previewElement.classList.remove("dz-file-preview");
                var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                for (var i = 0; i < images.length; i++) {
                    var thumbnailElement = images[i];
                    thumbnailElement.alt = file.name;
                    thumbnailElement.src = dataUrl;
                }
                setTimeout(function () {
                    file.previewElement.classList.add("dz-image-preview");
                }, 1);
            }
        }
    })

    myDropzone.on("addedfile", function(file) {
        // Hookup the start button
        console.log(file)
        file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
    })

    myDropzone.on("complite", function(res) {
        console.log(res)
        // Hookup the start button
        // file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function(file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1"
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
        document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true)
    }

    myDropzone.on("success", function(file, response) {
        file.previewElement.classList.remove("d-flex");
        file.previewElement.classList.add("d-none");
        addSuccessDiv(file.dataURL, response)
    })

})()



