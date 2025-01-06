function FormValidation() {
    fullname = document.validation.name.value;
    address = document.validation.address.value;
    phone = document.validation.phone.value;
    eventType = document.validation.eventType.value;
    venue = document.validation.venue.value;
    var nameExp = /^[a-zA-Z ]+$/;
    var phoneExp = /^98[0-9]{8}$/;
    if (fullname == "") {
        alert("Enter Name");
        return false;
    }
    if (!fullname.match(nameExp)) {
        alert("Name must be in text.");
        return false;
    }
    if (address == "") {
        alert("Enter Address");
        return false;
    }
    if (phone == "") {
        alert("Enter phone no.");
        return false;
    }
    if (!phone.match(phoneExp)) {
        alert("Phone must be only 10 numbers.");
        return false;
    }
    if (eventType == "1") {
        alert("Please select one option.");
        return false;
    }
    if (venue == "") {
        alert("Enter Venue");
        return false;
    }
}