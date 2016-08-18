var tableBodyID = '#mt_body';
var tableBody = null;
var children = [];
var size = 0;
var cfg = null;

$(document).ready(function () {

    cfg = $('#multiple_config');
    var add_button = $('#add');
    tableBody = $(tableBodyID)[0];
    add_button.on('click', addChildren);
});

var addChildren = function () {
    var row = _insertRow(0);
    var cell = _insertCell(row, 0);
    _cellContent(cell);
    children[size] = row;
    size++;
};

var _cellContent = function (cell) {
    cell.innerHTML = '<input type="password" name="'+cfg.data("children_name") +'[]"></input><label for=""></label>';
}

var _insertRow = function (position) {
    return tableBody.insertRow(position)
};

var _insertCell = function (row, position) {
    var t = row.insertCell(position);
    return t;
};