$(document).ready(function () {
    // Materialize Initialization
    $('.button-collapse').sideNav();
    $('.modal-trigger').leanModal();
    $('.scrollspy').scrollSpy();
    $('select').material_select();
    $(".dropdown-button").dropdown();
    Materialize.updateTextFields();
    try{
        document.getElementById('main').scrollIntoView({block: "end", behavior: "smooth"});
    } catch (err){}
    $('.collapsible').collapsible({
        accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
});