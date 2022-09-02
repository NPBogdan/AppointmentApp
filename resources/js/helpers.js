function appointmentDate(){
    var appointmentDate = document.getElementById('date').value;
    console.log(appointmentDate);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById('appointmentSelectedDate').innerHTML =
                this.responseText;
        }
    }
    xhttp.open('POST','appointmentDate',true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(appointmentDate);
}

document.getElementById('date').addEventListener('change',appointmentDate());
