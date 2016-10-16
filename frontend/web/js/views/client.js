/**
 * Created by zero_ on 15/10/2016.
 */
$('#clientGrid').on('kvexprow.loaded', function (event, id, key, extra) {
    $('.materialboxed').materialbox();
});