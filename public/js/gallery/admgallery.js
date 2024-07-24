/**
 * Function call rout for delete element
 * @param id (element id)
 * @param slide (element name)
 */
function delGallery(id, gallery)
{
    alertify.confirm("Confirm delete", "Are you sure You want to delete gallery: " + gallery +
        ".<br /> All images assigned to this category will be also deleted!",
        function(){
            $.ajax({
                url: '/delgallery',
                type: 'GET',
                data: { "id" : id },
                success: function(answer) {
                    //alert(answer);
                    window.location.href = "/gallery";
                }
            });

            //alertify.success('Ok');
        },
        function(){
            //alertify.error('Cancel');
        });
}

/**
 * Function call rout for move position
 * @param id (current element)
 * @param position (new position)
 */
function movePosition(id, position)
{
    $.ajax({
        url: 'movegallery',
        type: 'GET',
        data: { "id" : id, "position" : position },
        success: function(answer) {
            //alert(answer);
            window.location.href = "/gallery";
        }
    });
}

/**
 * Function call rout for move position
 * @param id (current element)
 * @param position (new position)
 */
function movePositionImages(id, position, galleryID)
{
    $.ajax({
        url: '/movegalleryimages',
        type: 'GET',
        data: { "id" : id, "position" : position, "galleryID" : galleryID },
        success: function(answer) {
            //alert(answer);
            window.location.href = "/galleryimages/" + galleryID;
        }
    });
}

function uploadImageFile()
{
    let formData = new FormData($('#imagefile').get(0));
    let imgURL= $('#curentimage').attr('src');

    $.ajax({
        url: '/uploadgalleryimagefile',
        type: 'POST',
        contentType: false,
        processData: false,
        data: formData,
        success: function(answer) {
            // Refresh picture: remove src and create the new src with additional unique parameters
            $('#curentimage').removeAttr("src");
            $('#curentimage').attr("src", imgURL + `?v=${new Date().getTime()}`);
        }
    });
}

function delGalleryImages(id, position)
{
    alertify.confirm("Confirm delete", "Are you sure You want to delete image # " + position,
        function(){
            $.ajax({
                url: '/delgalleryimages/' + id,
                type: 'GET',
                data: { "id" : id },
                success: function(answer) {
                    //alert(answer);
                    window.location.href = answer;
                }
            });

            //alertify.success('Ok');
        },
        function(){
            //alertify.error('Cancel');
        });
}
