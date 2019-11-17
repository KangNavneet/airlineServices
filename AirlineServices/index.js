$(document).ready(function () {
    $("#dateofPickup").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        minDate: 0
    })
});

function chooseDestination(sourceCity) {
    var httpreg = new XMLHttpRequest();
    httpreg.onreadystatechange = function () {
        if (this.status == 200 && this.readyState == 4) {
            var ar = JSON.parse(this.response);
            var sel = '<select class="form-control" name="destinationcity" id="destinationcity">' +
                '<option value="">Destination City</option>';
            for (var x in ar) {
                obj = ar[x];
                sel += '<option value="' + obj.cityid + '">' + obj.cityname + '</option>';
            }
            sel += '</select>';
            document.getElementById("destinationcity").innerHTML = sel;
        }
    };
    httpreg.open("POST", "dataEntry.php?sourceCity=" + sourceCity, true);
    httpreg.send();
}

function searchFlights() {
    var sourcecity = document.getElementById("sourcecity").value;
    var destinationcity = document.getElementById("destinationcity").value;
    var dateofPickup = document.getElementById("dateofPickup").value;
    window.location.href = "showFlights.php?sourceCity=" + sourcecity + "&destinationCity=" + destinationcity + "&dateofTravel=" + dateofPickup;
}

var seats = [];
var num = 0;
var grandTotal = 0;

function chooseSeat(obj, price) {
    console.log("msg",obj);
    var singleSeat = {"seatno": obj.value, "type": obj.title, "price": price};
    var flag = 0;
    var index = 0;
    for (i = 0; i < seats.length; i++) {
        if (seats[i].seatno == obj.value && seats[i].type == obj.title) {
            flag = 1;
            index = i;
            break;
        }
    }
    if (flag == 1) {
        seats.splice(index,1);
        if (obj.title == 'Business') {
            document.getElementById(obj.id).className = "btn btn-primary";
        } else {
            document.getElementById(obj.id).className = "btn btn-danger";
        }
    } else {
        seats.push(singleSeat);/*How to push single Seat in the empty array*/
        document.getElementById(obj.id).className = "btn btn-warning";
    }
    var tab = '';
    var k = 0;
    grandTotal = 0;
    for (i = 0; i < seats.length; i++) {
        grandTotal += seats[i].price;
        k++;
        tab += "<tr>" +
            "<td>" + k + "</td>" +
            "<td>" + seats[i].seatno + "</td>" +
            "<td>" + seats[i].type + "</td>" +
            "<td>" + seats[i].price + "</td>" +
            "</tr>";
    }
    $("#seatsContent").html(tab);
    $("#grandTotal").html(grandTotal);

}