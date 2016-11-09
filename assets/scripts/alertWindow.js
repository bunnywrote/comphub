$(function alertWindow() {
    $(this).click(function ( event ) {
        alert("Purchased!");
        alert("Thank you!");
        event.stopPropagation();
    });
});

// custom window alert
// window.alert = function(message) { $(document.createElement('div'))
//     .attr({
//         title: 'Alert',
//         'class': 'alert'
//     })
//     .html(message)
//     .dialog({
//         buttons: {
//             OK: function() {
//                 $(this).dialog('close');
//             }
//         },
//         close: function() {
//             $(this).remove();
//         },
//         modal: true,
//         resizable: false,
//         width: 'auto'
//     });
// };
