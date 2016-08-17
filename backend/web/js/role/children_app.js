var tableBody = null;

$(document).ready(function () {

    var add_button = $('#add');
    tableBody = $('#mt_body')[0];
    add_button.on('click', addChildren);

});

var addChildren = function () {
    // Here goes add table children
    var row = _insertRow(0);
    var pos = tableBody.length;
    var cell = _insertCell(row, pos);
};

var _insertRow = function (position) {
    return tableBody.insertRow(position)
};

var _insertCell = function (row, position) {
    return row.insertCell(position);
};