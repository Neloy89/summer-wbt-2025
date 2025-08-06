function reasonForContact() {
    var service = prompt("Which type of service do you want?!");
    if (service === null) {
        alert("Please enter a valid service.")
    }
    else if(service === "Web Developer") {
        alert("You have selected: " + service);
    }
    else if(service === "Data Scientist") {
        alert("You have selected: " + service);
    } 
    else if (service === "Backent Developer") {
        alert("You have selected: " + service);
    }


    var service = prompt("Which type of project do you want?!");
    if (service === null) {
        alert("Please enter a valid service.")
    }
    else if(service === "Web Application") {
        alert("You have selected: " + service);
    }
    else if(service === "Desktop based project") {
        alert("You have selected: " + service);
    } 
    else if (service === "Java based application") {
        alert("You have selected: " + service);
    }

}