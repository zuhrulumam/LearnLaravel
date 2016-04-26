
Dropzone.options.createForm = {
    uploadMultiple: false,
    parallelUploads: 100,
    maxFilesize: 8,
//    previewsContainer: '#dropzonePreview',
//    previewTemplate: document.querySelector('#preview-template').innerHTML,
    addRemoveLinks: true,
    dictRemoveFile: 'Remove',
    dictFileTooBig: 'Image is bigger than 8MB',
    // The setting up of the dropzone
    init: function () {
        this.on("addedfile", function (file) {
            alert("Added file.");
        });
        this.on("removedfile", function (file) {
            alert("Removedfile.");
        });
    },
    error: function (file, response) {
        if ($.type(response) === "string")
            var message = response; //dropzone sends it's own error messages in string
        else
            var message = response.message;
        file.previewElement.classList.add("dz-error");
        _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
        _results = [];
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i];
            _results.push(node.textContent = message);
        }
        return _results;
    },
    success: function (file, done) {
        console.log("Done !");
    }
};

