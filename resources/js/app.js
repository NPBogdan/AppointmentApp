import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

function appointmentDate(){
    var appointmentDate = document.getElementById('date').value;
    var xCsrfToken = document.querySelector('meta[name="csrf-token"]').content
    var params = 'appointmentDate='+appointmentDate;

    function htmlAppointment(responseText){
        return "<div class='bg-lime-500' role='alert'>"+responseText+"</div>"
    }

    console.log(appointmentDate,xCsrfToken);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState === 4 && this.status === 200){
            var response = JSON.parse(this.response);
            var availableHours = '';

            response.forEach(function(e) {
                availableHours += e.appointment_start_time + ' - ' + e.appointment_end_time + '<br />';
            });

            document.getElementById('appointmentSelectedDate').innerHTML =
                htmlAppointment(availableHours)
        }
    }
    xhttp.open('POST','appointmentDate',true);
    xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhttp.setRequestHeader("X-CSRF-TOKEN",xCsrfToken);
    xhttp.send(params);
}

document.getElementById('date').addEventListener('change',appointmentDate);
