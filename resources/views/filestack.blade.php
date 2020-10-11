<script src="//static.filestackapi.com/filestack-js/1.x.x/filestack.min.js"></script>
<script>
    // Set up the picker

    const client = filestack.init("{{env('FILESTACK_KEY')}}");

    const options = {
        onUploadDone: updateForm,
        maxSize: 10 * 1024 * 1024,
        maxFiles: 5,
        accept: 'image/*',
        uploadInBackground: false,
        transformations: {
            crop: {
                aspectRatio: 16 / 9,
                force: true
            },
            circle: false,
            rotate: true
        },
    };

    const picker = client.picker(options);

    // Get references to the DOM elements

    const form = document.getElementById('pick-form');
    const fileInput = document.getElementById('fileupload');
    const btn = document.getElementById('picker');
    const nameBox = document.getElementById('nameBox');
    const urlBox = document.getElementById('urlBox');


    // Add our event listeners

    btn.addEventListener('click', function (e) {
        e.preventDefault();
        picker.open();
    });


    function updateForm(result) {
        var data = result.filesUploaded;
        $.post({
            type: 'POST',
            url: '/meals/store-pic',
            data: {uploads: result.filesUploaded},
            // dataType: 'JSON',
            success: function () {
                console.log("success")
            }
        });

        window.location.href = "/meals/add-meal-cost";
    }
</script>