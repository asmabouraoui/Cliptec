var selectedRow = null

function onFormSubmit() {
    if (validate()) {
        var formData = readFormData();
        if (selectedRow == null)
            insertNewRecord(formData);
        else
            updateRecord(formData);
        resetForm();
    }
}

function readFormData() {
    var formData = {};
    formData["topic"] = document.getElementById("topic").value;
    formData["questiontitle"] = document.getElementById("questiontitle").value;
    formData["questioncontent"] = document.getElementById("questioncontent").value;
    // formData["city"] = document.getElementById("city").value;
    return formData;
}

function insertNewRecord(data) {
    var table = document.getElementById("employeeList").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.length);
    cell1 = newRow.insertCell(0);
    cell1.innerHTML = data.topic;
    cell2 = newRow.insertCell(1);
    cell2.innerHTML = data.questiontitle;
    cell3 = newRow.insertCell(2);
    cell3.innerHTML = data.questioncontent;
    cell4 = newRow.insertCell(3);
    // cell4.innerHTML = data.city;
    cell4 = newRow.insertCell(4);
    cell4.innerHTML = `<a onClick="onEdit(this)">Edit</a>
                       <a onClick="onDelete(this)">Delete</a>`;
}

function resetForm() {
    document.getElementById("topic").value = "";
    document.getElementById("questiontitle").value = "";
    document.getElementById("questioncontent").value = "";
    // document.getElementById("city").value = "";
    selectedRow = null;
}

function onEdit(td) {
    selectedRow = td.parentElement.parentElement;
    document.getElementById("topic").value = selectedRow.cells[0].innerHTML;
    document.getElementById("questiontitle").value = selectedRow.cells[1].innerHTML;
    document.getElementById("questioncontent").value = selectedRow.cells[2].innerHTML;
    // document.getElementById("city").value = selectedRow.cells[3].innerHTML;
}
function updateRecord(formData) {
    selectedRow.cells[0].innerHTML = formData.topic;
    selectedRow.cells[1].innerHTML = formData.questiontitle;
    selectedRow.cells[2].innerHTML = formData.questioncontent;
    // selectedRow.cells[3].innerHTML = formData.city;
}

function onDelete(td) {
    if (confirm('Are you sure to delete this record ?')) {
        row = td.parentElement.parentElement;
        document.getElementById("employeeList").deleteRow(row.rowIndex);
        resetForm();
    }
}
function validate() {
    isValid = true;
    if (document.getElementById("topic").value == "") {
        isValid = false;
        document.getElementById("topicValidationError").classList.remove("hide");
    } else {
        isValid = true;
        if (!document.getElementById("topicValidationError").classList.contains("hide"))
            document.getElementById("topicValidationError").classList.add("hide");
    }
    return isValid;
}