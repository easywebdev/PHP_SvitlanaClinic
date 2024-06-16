$(document).ready(function () {
    //CKEDITOR.config.fontSize_defaultLabel = '18';
    //CKEDITOR.font_defaultLabel = 'Arial';

    CKEDITOR.replace( 'text', {
        toolbar: [
            ['Source', 'Undo', 'Redo'],
            ['Cut', 'Copy', 'Paste', 'PasteText', 'HorizontalRule'],
            ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', 'Subscript', 'Superscript', '-', 'Link', 'Unlink', 'Anchor' ],
            ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
            ['Format', 'FontSize', 'TextColor', 'BGColor' ],
            ['Image', 'Table', 'SpecialChar'],
            ],
        //width: '600px',
        height: '500px',
        filebrowserBrowseUrl : '/elfinder/ckeditor'
    } );
});