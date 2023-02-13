$(function() {
    ///////////////////////////////////////////////////////////////////////////
    // Scroll Up
    //select scroll up button
    let scrollup = document.getElementById("scrollup");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
        scrollFunction();
    };

    function scrollFunction() {
        if (
            document.body.scrollTop > 20 ||
            document.documentElement.scrollTop > 20
        ) {
            scrollup.style.display = "block";
        } else {
            scrollup.style.display = "none";
        }
    }
    // When the user clicks on the button, scroll to the top of the document
    scrollup.addEventListener("click", backToTop);

    function backToTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    // Experience page new/edit
    $('#experience_current').on('change', function() {
        $("#experience_end").toggle(!$(this).is(':checked'));
    });
    $('#experience_current').trigger('change');

    // Education page new/edit
    $('#education_current').on('change', function() {
        $("#education_end").toggle(!$(this).is(':checked'));
    });
    $('#education_current').trigger('change');
    /*************************************************************************/
    $("#toggle_button").on("click", function(){
        $("#sidebar").slideToggle( "", function() {
            // Animation complete.
        });
        $("i", this).toggleClass("bi bi-arrows-fullscreen bi bi-x-lg");
    })
});