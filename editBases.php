<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Bases</title>
    <script src="https://cdn.tiny.cloud/1/3ixwsk1t7lut87w3jqgr99zrluxhmfeyue60ctdhytp2iqqo/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#editor',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });
    </script>
    <script>
        <?php
        function myMessage()
        {
            echo "Hello world!";
        }
        ?>
    </script>
    <style>
        textarea {
            background-color: rgba(0, 0, 0, 0.9);
            position: relative;
            padding: 80px;
            margin-top: 80%;
            border-radius: 1 5px;
            color: white;
        }
    </style>
</head>

<body>

    <textarea id="editor" name="editor1">Editar</textarea>

    <label><?php myMessage() ?></label>

</body>

</html>