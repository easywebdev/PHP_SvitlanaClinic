ClassicEditor
    .create( document.querySelector( '#text' ), {
        toolbar: {
            items: [
                'undo', 'redo',
                '|', 'heading',
                '|', 'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor',
                '|', 'bold', 'italic', 'strikethrough', 'subscript', 'superscript', 'code',
                '-', // break point
                '|', 'alignment',
                'link', 'uploadImage', 'blockQuote', 'codeBlock',
                '|', 'bulletedList', 'numberedList', 'todoList', 'outdent', 'indent'
            ],
            shouldNotGroupWhenFull: true
        }
    } )
    .then( editor => {
        window.editor = editor;
    } )
    .catch( err => {
        console.error( err.stack );
    } );