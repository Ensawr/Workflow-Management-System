// Search Input 

function Search() {
    var input, filter, table, tr, td, i, txtValue;

    input = document.getElementById("productC");
    filter = input.value.toUpperCase();
    table = document.getElementById("left_table");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function SearchBarcode() {
    var input, filter, table, tr, td, i, txtValue;

    input = document.getElementById("productB");
    filter = input.value.toUpperCase();
    table = document.getElementById("left_table");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[3];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

// Left table to right table

function sendtoRight(buttonID) {
    var table_left = document.getElementById('left_table');
    var tdcount = table_left.getElementsByTagName('td').length;
    var countData = 1;
    var data = [];
    var datas = [];
    for (var i = 0; i < tdcount; i++) {

        if ((countData %= 7) == 0) {
            data.push(productName, colorName, colorCode, productBarcode, productPlace, productID);
            datas.push(data);
            data = [];
            countData += 1;
            continue;
        } else if ((countData %= 7) == 1) {
            var productName = document.getElementsByTagName('td')[i].textContent;
        } else if ((countData %= 7) == 2) {
            var colorName = document.getElementsByTagName('td')[i].textContent;
        } else if ((countData %= 7) == 3) {
            var colorCode = document.getElementsByTagName('td')[i].textContent;
        } else if ((countData %= 7) == 4) {
            var productBarcode = document.getElementsByTagName('td')[i].textContent;
        } else if ((countData %= 7) == 5) {
            var productPlace = document.getElementsByTagName('td')[i].textContent;
        } else if ((countData %= 7) == 6) {
            var productID = document.getElementsByTagName('td')[i].textContent;
        }
        countData += 1;
    }

    addRow(datas, buttonID);
    hideRow(buttonID);
}

// Dynamic right table

function addRow(datas, buttonID) {

    var table = document.getElementById('right_table');

    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);

    var cell1 = row.insertCell(0);
    var element1 = document.createElement("input");
    element1.type = "checkbox";
    element1.id = parseInt(buttonID);
    element1.name = "check[]";
    cell1.appendChild(element1);

    var cell2 = row.insertCell(1);
    var element2 = document.createElement("label");
    element2.name = "productName";
    element2.innerText = datas[buttonID][0];
    cell2.appendChild(element2);

    var cell3 = row.insertCell(2);
    var element3 = document.createElement("label");
    element3.name = "colorName";
    element3.innerText = datas[buttonID][1];
    cell3.appendChild(element3);

    var cell4 = row.insertCell(3);
    var element4 = document.createElement("label");
    element4.name = "colorCode";
    element4.innerText = datas[buttonID][2];
    cell4.appendChild(element4);

    var cell5 = row.insertCell(4);
    var element5 = document.createElement("label");
    element5.name = "productBarcode[]";
    element5.innerText = datas[buttonID][3];
    cell5.appendChild(element5);

    var cell6 = row.insertCell(5);
    var element6 = document.createElement("label");
    element6.name = "productPlace";
    element6.innerText = datas[buttonID][4];
    cell6.appendChild(element6);

    var cell7 = row.insertCell(6);
    var element7 = document.createElement("input");
    element7.type = "text";
    element7.style.display = "none";
    element7.name = "hiddenID[]";
    cell7.appendChild(element7);
    element7.value = datas[buttonID][5];
}


// Hide left table's selected row

function hideRow(buttonID) {

    var rowLocation = parseInt(buttonID) + 1;
    var table_left = document.getElementById('left_table');
    var hidetr = table_left.getElementsByTagName('tr')[rowLocation];
    hidetr.style.display = "none";
}

// Hide right table's selected row

function sendBack(table) {

    try {
        var table = document.getElementById(table);
        var rowCount = table.rows.length;

        for (var i = 0; i < rowCount; i++) {
            var row = table.rows[i];
            var chkbox = row.cells[0].childNodes[0];
            if (null != chkbox && true == chkbox.checked) {
                table.deleteRow(i);
                rowCount--;
                i--;
            }
        }
    } catch (e) {
        alert(e);
    }

}

// Show other buttons

function openOptions() {
    document.getElementById('showButtons').style.display = "none";
    document.getElementById('buttons').style.display = "block";
}