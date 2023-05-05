@extends("admin")
@section("title", "Добавление продукта")
@section("css")
    <link rel="stylesheet" href="{{ asset("assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/admin/plugins/select2/css/select2.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/admin/plugins/dropzone/min/dropzone.min.css") }}">
@endsection

@section("content")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield("title")</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <section class="content">
            @include("admin.layouts.session-success")
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Форма добавления</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <form id="productForm" method="post" action="{{ route("products.store") }}" enctype="multipart/form-data">
                        @csrf
                        @include("admin.pages.products.form")
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>


@endsection

@section("scripts")
    <script src="{{ asset("assets/admin/plugins/select2/js/select2.full.min.js") }}"></script>
    <script src="{{ asset("assets/admin/plugins/ckeditor/ckeditor.js") }}"></script>
    <script src="{{ asset("assets/admin/plugins/dropzone/min/dropzone.min.js") }}"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        CKEDITOR.replace('productTextEditor', options);

        const previewNode = document.querySelector("#template")
        var previewTemplate = previewNode.parentNode.innerHTML
        let myDropzone = new Dropzone("#productForm", {
            addedfile: file => {
                // ONLY DO THIS IF YOU KNOW WHAT YOU'RE DOING!
            },
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
        });

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
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
        // document.querySelector("#actions .start").onclick = function() {
        //     myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
        // }
        // document.querySelector("#actions .cancel").onclick = function() {
        //     myDropzone.removeAllFiles(true)
        // }

        myDropzone.on("success", function(file, response) {
            file.previewElement.classList.remove("d-flex");
            file.previewElement.classList.add("d-none");
            addSuccessDiv(file.dataURL, response)
        })
    </script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
            $('.select3').select2()
        })
    </script>
@endsection









