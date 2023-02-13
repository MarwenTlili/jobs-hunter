$(function(){
    let toast = "#toast";
    let button_toast_close = "#button_toast_close";
    let toast_box = "#toast_box";
    let modal = "#modal_document_delete";
    // n interval for alert animation [fade, hide, ...]
    let n_interval_id;
    let alert_success = "#alert_document_remove_success";
    let alert_document_type = "#documentType";
    let alert_document_name = "#documentName";

    let document_form_diploma_link = "#document_form_diploma_link";
    let document_form_realisation_link = "#document_form_realisation_link";

    let button_document_delete = "#button_document_delete";

    ///////////////////////////////////////////////////////////////////////////
    // document/{id}/edit
    
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
        $(toast_box).css("zIndex", -1);
    });
    
    ///////////////////////////////////////////////////////////////////////////
    // delete document [diploma | realisation]
    $(modal).on("shown.bs.modal", function(event){
        var relatedTarget = $(event.relatedTarget); // Button that triggered the modal
        var documentId = relatedTarget.data('id');
        var documentName = relatedTarget.data('documentName');
        var documentType = relatedTarget.data('documentType');
        
        $(button_document_delete).off("click").on("click", function(event){
            $(`${modal} ${button_document_delete} > .spinner-border`).show();
            // return jqXHR object
            $.ajax({
                url: "/document/" + documentId + "/" + documentType + "/" + documentName + "/delete",
                method: "POST",
                cache: false,
                global: false,
                // async: false,
                complete: function(){
                    // hide loading spinner after ajax call complete [success | error]
                    $(`${modal} ${button_document_delete} > .spinner-border`).hide();
                }
            }).done(function(data){ // ajax promises
                if (data["isDeleted"]) {
                    // hide 'modal_document_delete'
                    $(modal).modal("hide");
                    // remove document_form_*_link from DOM
                    switch (data["documentType"]) {
                        case "diploma":
                            $(document_form_diploma_link).remove();
                            break;
                        case "realisation":
                            $(document_form_realisation_link).remove();
                            break;
                        default: break;
                    }
                    // show alert success
                    showAlertDocumentRemoveSuccess(data["documentType"], data["documentName"]);
                }else{
                    // if BackEnd JSON response 'isDeleted' return false
                    // then set warning text and show warning alert for 5s
                    showModalDocument_AlertWarning("Permission/FileLocation");
                }
            }).fail(function(jqXHR, textStatus, errorThrown){
                showModalDocument_AlertWarning(errorThrown);
            }).then(function(response){ });

        });
    });

    // before closing modal: hide warning if it's visible
    $(modal).on("hide.bs.modal", function(){
        // $("#modal-body-warning:visible").hide();
        $(`${modal} .alert:visible`).hide("fast", function(){
            clearAlertInterval();
        });
    });

    // close alerts manually
    $(".alert .close").off("click").on("click", function(){
        $(this).parent().fadeOut("fast", function(){
            clearAlertInterval();
        });
    });

    // set warning text and show warning alert for 3s
    function showModalDocument_AlertWarning(reason) {
        $(`${modal} .alert #reason`).text(reason);
        $(`${modal} .alert:hidden`).fadeIn();
        clearAlertInterval();
        n_interval_id = setInterval(() => {
            $(`${modal} .alert:visible`).fadeOut("fast", function(){
                clearAlertInterval();
            });
        }, 3000);
    }

    // set success text and show success alert for 3s
    function showAlertDocumentRemoveSuccess(type, name) {
        $(`${alert_success} ${alert_document_type}`).text(type);
        $(`${alert_success} ${alert_document_name}`).text(name);
        $(`${alert_success}:hidden`).fadeIn();
        clearAlertInterval();
        n_interval_id = setInterval(() => {
            $(`${alert_success}:visible`).fadeOut("fast", function(){
                clearAlertInterval();
            });
        }, 3000);
    }

    // if there intervalId has value => clear it
    function clearAlertInterval() {
        if (n_interval_id) {
            clearInterval(n_interval_id); 
            n_interval_id = null;
        }
    }
    ///////////////////////////////////////////////////////////////////////////
});