function initMCEexact(id, height = 300) {
    tinymce.init({
        selector: id,
        height: height,
        content_css: "//www.tiny.cloud/css/codepen.min.css",
        relative_urls: false,
        remove_script_host: true,
        plugins: [
            "advlist autolink lists link image charmap preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "template paste textpattern"
        ],
        menubar: false,
        toolbar:
            "insertfile undo redo | subscript superscript bold italic underline | alignleft aligncenter alignright alignjustify | link image media",
        toolbar_mode: "floating",
        image_dimensions: false,
        branding: false,
        image_class_list: [{ title: "fluid", value: "img-fluid" }],
        images_upload_handler: function(blobInfo, success, failure) {
            var xhr, formData;
            var path = window.location.pathname.split("/");
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open("POST", "/fungsi/upload/");
            var token = $('meta[name="csrf-token"]').attr("content");
            xhr.setRequestHeader("X-CSRF-Token", token);
            xhr.onload = function() {
                var json;

                if (xhr.status < 200 || xhr.status >= 300) {
                    failure("HTTP Error: " + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != "string") {
                    failure("Invalid JSON: " + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            formData = new FormData();
            formData.append("file", blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
        }
    });
}
