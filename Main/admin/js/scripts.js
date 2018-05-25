$('#selectAllBoxes').click(function(event){
    if(this.checked){
        $('.checkBoxes').each(function() {
            this.checked = true;
        });
    } else{
        $('.checkBoxes').each(function() {
            this.checked = false;
        });
    }
});

/*VALIDATION FOR ADD POST FORM*/

$(document).ready(function() {
    $('#addPost').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            post_title: {
                validators: {
                    notEmpty: {
                        message: 'The Title is required and cannot be empty'
                    },
                    stringLength: {
                        min: 2,
                        max: 100,
                        message: 'The username must be more than 1 character and less than 100 characters long'
                    },
                }
            },
            post_category_id: {
                validators: {
                    notEmpty: {
                        message: 'The Category is required and cannot be empty'
                    },
                }
            },
            post_status: {
                validators: {
                    notEmpty: {
                        message: "The Post status is required and cannot be empty"
                    },
                }
            },
            post_image: {
                validators: {
                    notEmpty: {
                        message: "The image is required"
                    }
                }
            },
            post_tags: {
                validators: {
                    notEmpty: {
                        message: "The tags of blog are required"
                    }
                }
            },
            post_content: {
                validators: {
                    notEmpty: {
                        message: "The Content is required"
                    }
                }
            },
        }
    });
});

function loadUsersOnline(){
    $.get("functions.php?onlineusers=result", function(data){
        $('.usersonline').text(data);
    });
}


setInterval(function(){
    loadUsersOnline();
}, 50);