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
    formData["Topic"] = document.getElementById("Topic").value;
    formData["Descriptiontitle"] = document.getElementById("Descriptiontitle").value;
    formData["Descriptioncontent"] = document.getElementById("Descriptioncontent").value;
   
    return formData;
}

function insertNewRecord(data) {
    var table = document.getElementById("employeeList").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.length);
    cell1 = newRow.insertCell(0);
    cell1.innerHTML = data.Topic;
    cell2 = newRow.insertCell(1);
    cell2.innerHTML = data.Descriptiontitle;
    cell3 = newRow.insertCell(2);
    cell3.innerHTML = data.Descriptioncontent;
    cell4 = newRow.insertCell(3);

    cell4.innerHTML = `<a onClick="onEdit(this)">Edit</a>
                       <a onClick="onDelete(this)">Delete</a>`;
}

function resetForm() {
    document.getElementById("Topic").value = "";
    document.getElementById("Descriptiontitle").value = "";
    document.getElementById("Descriptioncontent").value = "";

    selectedRow = null;
}

function onEdit(td) {
    selectedRow = td.parentElement.parentElement;
    document.getElementById("Topic").value = selectedRow.cells[0].innerHTML;
    document.getElementById("Descriptiontitle").value = selectedRow.cells[1].innerHTML;
    document.getElementById("Descriptioncontent").value = selectedRow.cells[2].innerHTML;
}
function updateRecord(formData) {
    selectedRow.cells[0].innerHTML = formData.Topic;
    selectedRow.cells[1].innerHTML = formData.Descriptiontitle;
    selectedRow.cells[2].innerHTML = formData.Descriptioncontent;
 
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
    if (document.getElementById("Topic").value == "") {
        isValid = false;
        document.getElementById("TopicValidationError").classList.remove("hide");
    } else {
        isValid = true;
        if (!document.getElementById("TopicValidationError").classList.contains("hide"))
            document.getElementById("TopicValidationError").classList.add("hide");
    }
    return isValid;
}