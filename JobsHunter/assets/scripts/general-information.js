$(function(){
    ///////////////////////////////////////////////////////////////////////////
    // general-information/{id}/edit
    
    ///////////////////////////////////////////////////////////////////////////
    let photo_thumbnail_placeholer = "https://via.placeholder.com/120";
    let photo_thumbnail = "#general_information_photo_thumbnail";
    let photo = "#general_information_photo";

    let modal_confirmation = "#modal_photo_delete";

    let button_photo_delete_confirmation = "#button_photo_delete_confirmation";
    let spinner_photo_delete_confimation = `${button_photo_delete_confirmation} > .spinner-border`;
    
    // n interval for alert animation [fade, hide, ...]
    let n_interval_id; // n interval for alert animation [fade, hide, ...]
    
    let toast = "#toast_general_information";
    let toast_box = "#toast_box";
    let button_toast_close = "#button_toast_close";

    // show toast immediately if there is one
    // depends on array "errors" sent from symfony controller
    $(toast).toast("show");
    $(toast_box).css("zIndex", 999);

    // hide toast manually when user click 'X' button
    $(button_toast_close).on("click", function(){
        $(toast).toast("hide");
    });

    // event when toast finish hiding 
    $(toast).on("hidden.bs.toast", function(){
        // set toast_box sIndex to background
        $(toast_box).css("zIndex", -1);
    });

    // set photo to UI when user selected one
    $(photo).on('change',function(event){
        // get image it self from jQuery Object
        const img = $(photo_thumbnail).get(0);
        const files = event.target.files;
        const file = files[0];
        const reader = new FileReader();
        reader.onload = (e) => { 
            img.src = e.target.result;
        };
        reader.readAsDataURL(file);
    });

    // what to do when modal finished shown
    $(modal_confirmation).on("shown.bs.modal", function(event){
        let relatedTarget = $(event.relatedTarget); // Button that triggered the modal
        let id = relatedTarget.data('id');
        let url_delete_photo = "/general-information/"+id+"/photo/delete";

        // call ajax when user confirm that he want to delete his photo
        $(button_photo_delete_confirmation).off("click").on("click", function(event){
            // event.preventDefault();
            // show loading spinner before calling ajax
            $(spinner_photo_delete_confimation).show();

            // make ajax call to backend 
            $.ajax({
                url: url_delete_photo,
                method: "POST",
                cache: false,
                global: false,
                complete: function(jqXHR, textStatus){
                    console.log("textStatus: " + textStatus);
                    // hide loading spinner after ajax success or fail
                    $(spinner_photo_delete_confimation).hide();
                }
            }).done(function(data){
                console.log(data);
                // refresh current page
                // location.href = "/general-information/"+id+"/edit";
                if (data["isDeleted"]) {
                    $(modal_confirmation).modal("hide");
                    $(photo_thumbnail).get(0).src = photo_thumbnail_placeholer;
                    relatedTarget.remove();
                }else{
                    showConfirmationModalAlert("Permission/FileLocation");
                }
            }).fail(function(jqXHR, textStatus, errorThrown){
                showConfirmationModalAlert(errorThrown);
            }).then(function(response){
                // console.log(response);
                
            });
        });
    });

    // before closing modal: hide warning if it's visible
    $(modal_confirmation).on("hide.bs.modal", function(){
        // $("#modal-body-warning:visible").hide();
        $(`${modal_confirmation} .alert:visible`).hide("fast", function(){
            clearAlertInterval();
        });
    });

    // close alerts manually
    $(".alert .close").off("click").on("click", function(){
        $(this).parent().fadeOut("fast", function(){
            console.log("alert: closed");
            clearAlertInterval();
        });
    });

    // set warning text and show warning alert for 3s
    function showConfirmationModalAlert(reason) {
        $(`${modal_confirmation} .alert #reason`).text(reason);
        $(`${modal_confirmation} .alert:hidden`).fadeIn();
        clearAlertInterval();
        n_interval_id = setInterval(() => {
            $(`${modal_confirmation} .alert:visible`).fadeOut("fast", function(){
                console.log("alert: fadeOut()");
                clearAlertInterval();
            });
        }, 3000);
    }

    // if there intervalId has value => clear it
    function clearAlertInterval() {
        if (n_interval_id) {
            clearInterval(n_interval_id); 
            n_interval_id = null;
            console.log("n_interval_id cleared.");
        }
    }
    ///////////////////////////////////////////////////////////////////////////
});