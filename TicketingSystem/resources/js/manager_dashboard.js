const { default: axios } = require("axios");

const add_place_form = document.getElementById("add_place");
const add_bus_form = document.getElementById("add_bus");
const add_ticket_form = document.getElementById("add_ticket");
const add_driver_form = document.getElementById("add_driver");
const from = document.getElementById("from");
const to = document.getElementById("to");
const fare = document.getElementById("fare");
const bus = document.getElementById("bus");
const place_name = document.getElementById("place_name");
const bus_name = document.getElementById("bus_name");
const driver_name = document.getElementById("driver_name");
const driver_username = document.getElementById("driver_username");
const driver_email = document.getElementById("driver_email");
const driver_password = document.getElementById("driver_password");
const assign_bus = document.getElementById("assign_bus");
const places_list = document.getElementById("places_list");
const buses_list = document.getElementById("buses_list");
const ticket_list = document.getElementById("ticket_list");

add_place_form.addEventListener("submit", function (e) {
    e.preventDefault();

    let has_error = false;

    if (place_name.value == "") {
        alert("Please enter the name of the palce");
        has_error = true;
    }

    if (has_error) {
        return;
    }

    const options = {
        method: "post",
        url: "/add-place",
        data: {
            place_name: place_name.value,
        },
    };

    axios(options);

    $.get("/get-place", function (data) {
        places_list.innerHTML +=
            "<tr> <th>" +
            data["id"] +
            " </th> <th>" +
            data["name"] +
            " </th> </tr>";

        from.innerHTML +=
            "<option value='" + data["id"] + "'>" + data["name"] + "</option>";
        to.innerHTML +=
            "<option value='" + data["id"] + "'>" + data["name"] + "</option>";
    });
});

add_bus_form.addEventListener("submit", function (e) {
    e.preventDefault();

    let has_error = false;

    if (bus_name.value == "") {
        alert("Please enter the name of the bus");
        has_error = true;
    }

    if (has_error) {
        return;
    }

    const options = {
        method: "post",
        url: "/add-bus",
        data: {
            bus_name: bus_name.value,
        },
    };

    axios(options);

    $.get("/get-bus", function (data) {
        buses_list.innerHTML +=
            "<tr> <th>" +
            data["id"] +
            " </th> <th>" +
            data["name"] +
            " </th> </tr>";

        bus.innerHTML +=
            "<option value='" + data["id"] + "'>" + data["name"] + "</option>";
    });
});

add_ticket_form.addEventListener("submit", function (e) {
    e.preventDefault();

    let has_error = false;

    if (from.value == "") {
        alert("Please select a starting place");
        has_error = true;
        return;
    }
    if (to.value == "") {
        alert("Please select a ending place");
        has_error = true;
        return;
    }
    if (to.value == from.value) {
        alert("Please select two different places");
        has_error = true;
        return;
    }

    if (fare.value < 100) {
        alert("Lowest Fare is 100 Tk. Increase the fare.");
        has_error = true;
        return;
    }

    if (bus.value == "") {
        alert("Please select a bus");
        has_error = true;
        return;
    }

    if (has_error) {
        return;
    }

    const options = {
        method: "post",
        url: "/add-ticket",
        data: {
            from: from.value,
            to: to.value,
            fare: fare.value,
            b_id: bus.value,
        },
    };

    $.get("/get-ticket", function (data) {
        ticket_list.innerHTML +=
            "<tr> <th>" +
            data["id"] +
            " </th> <th>" +
            data["from"] +
            " </th> <th>" +
            data["to"] +
            " </th> <th>" +
            data["fare"] +
            " </th> </tr>";
    });

    axios(options);
});

add_driver_form.addEventListener("submit", function (e) {
    e.preventDefault();

    let has_error = false;

    if (driver_name.value == "") {
        alert("Please enter driver name.");
        has_error = true;
        return;
    }

    if (driver_username.value == "") {
        alert("Please enter driver's username.");
        has_error = true;
        return;
    }

    if (driver_email.value == "") {
        alert("Please enter driver email.");
        has_error = true;
        return;
    }

    if (driver_password.value == "") {
        alert("Please enter driver password.");
        has_error = true;
        return;
    }

    if (assign_bus.value == "") {
        e.assign_bus = null;
    }

    if (has_error) {
        return;
    }

    const options = {
        method: "post",
        url: "/add-driver",
        data: {
            name: driver_name.value,
            username: driver_username.value,
            email: driver_email.value,
            password: driver_password.value,
            b_id: assign_bus.value,
        },
    };

    axios(options).then(
        $.get("/get-driver", function (data) {
            driver_list.innerHTML +=
                "<tr> <th>" +
                data["id"] +
                " </th> <th>" +
                data["name"] +
                " </th> <th>" +
                data["email"] +
                " </th> <th>";
        })
    );
});
