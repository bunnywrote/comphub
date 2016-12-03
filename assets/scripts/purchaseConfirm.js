$(document).ready(function () {

    $(function alertWindow() {
        $("#submitButton2").click(function ( event ) {
            alert("Purchased!");
            // alert("Thank you!");
            event.stopPropagation();
        });
    });

    // $(function goBack() {
    //     $("#backButton").click(function ( event ) {
    //         event.history.go(-1);
    //     });
    // });

});
