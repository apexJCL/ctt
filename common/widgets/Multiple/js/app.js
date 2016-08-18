var tableBodyID = '#mt_body';
var tableBody = null;
var children = [];
var size = 0;
var cfg = null;
var mt_message = 'Removido';

$(document).ready(function () {

    cfg = $('#multiple_config');
    var add_button = $('#add');
    tableBody = $(tableBodyID)[0];
    add_button.on('click', addChildren);
    size = tableBody.children.length;
});

var addChildren = function () {
    var row = _insertRow(0);
    var cell = _insertCell(row, 0);
    _cellContent(cell);
    children[size] = row;
    size++;
    x = row;
};

var _cellContent = function (cell) {
    cell.innerHTML = '<div class="col s8"><input type="text" name="'+cfg.data("children_name") +'[]"></input><label for=""></label></div><div class="col s4"><a data-position="'+size+'" class="btn-flat red removeButton" href="#" onclick="removeRow(this)" ><i class="material-icons mdi-remove"></i></a></div>';
};

var _insertRow = function (position) {
    return tableBody.insertRow(position)
};

var _insertCell = function (row, position) {
    return row.insertCell(position);
};

var removeRow = function (element) {
    children[element.dataset.position].remove();
    Materialize.toast(mt_message, 2000);
    return false;
};