function createNewProduct () {
    var addProductButton = document.getElementById("addProductButton");
    addProductButton.disabled = true;

	var composerDiv = document.getElementById("composer_div");

    var productDiv = document.createElement('div');
    productDiv.className = "product";

    var nameInput = document.createElement('input');
    nameInput.type = "text";
    nameInput.placeholder = "Name";
    productDiv.appendChild(nameInput);

    var descriptionTextarea = document.createElement('textarea');
    descriptionTextarea.placeholder = "Description";
    productDiv.appendChild(descriptionTextarea);

    var selectImageButton = document.createElement('input');
    selectImageButton.type = 'file';
    productDiv.appendChild(selectImageButton);

    var saveProductButton = document.createElement('input');
    saveProductButton.type = "button";
    saveProductButton.value = "Save product";
    saveProductButton.onclick = function () {
        saveNewProduct(this.parentNode);
    }
    productDiv.appendChild(saveProductButton);

    var sendInvitesButton = document.getElementById('sendInvites');
    if (sendInvitesButton) {
        composerDiv.insertBefore(productDiv, sendInvitesButton);
    } else {
        composerDiv.appendChild(productDiv);
    }
}

function saveNewProduct(productDiv) {
    var nameTextField = productDiv.getElementsByTagName('input').item(0);
    var descriptionTextArea = productDiv.getElementsByTagName('textarea').item(0);
    var imageInput = productDiv.getElementsByTagName('input').item(1);
    productDiv.innerHTML = "Saved product: <br/>";
    productDiv.innerHTML += "Name: " + nameTextField.value + "<br/>";
    productDiv.innerHTML += "Description: " + descriptionTextArea.value + "<br/>";
    productDiv.innerHTML += "Image: " + imageInput.value + "<br/>";
    var addProductButton = document.getElementById("addProductButton");
    addProductButton.disabled = false;

    if (window.XMLHttpRequest) {
        xmlhttp=new XMLHttpRequest();
    }
    else {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    var requestURL = "databaseInsert.php?" + "productName=" + nameTextField.value + "&productDescription=" + descriptionTextArea.value;
    xmlhttp.open("GET", requestURL, true);
    xmlhttp.send();

    addSaveInvitesButtonIfNeeded();
}

function addSaveInvitesButtonIfNeeded() {
    var composerDiv = document.getElementById('composer_div')
    var sendInvitesButton = document.getElementById('sendInvites');
    if (!sendInvitesButton) {
        var input = document.createElement('input');
        input.type = "button";
        input.value = "Send Invites";
        input.id = "sendInvites";
        input.onclick = function() {
            document.location = "/index.php";
        }
        composerDiv.appendChild(input);
    }
}


