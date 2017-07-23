window.onload = function(){
    var d = new Date();
    var month_name = ['January','February','March','April','May','June','July','August','September','October','November','December'];
    var month = d.getMonth();   //0-11
    var year = d.getFullYear(); //2014
	var day = d.getDate();
    var first_date = month_name[month] + " " + 1 + " " + year;
    //September 1 2014
    var tmp = new Date(first_date).toDateString();
    //Mon Sep 01 2014 ...
    var first_day = tmp.substring(0, 3);    //Mon
    var day_name = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
    var day_no = day_name.indexOf(first_day);   //1
    var days = new Date(year, month+1, 0).getDate();    //30
    //Tue Sep 30 2014 ...
	var month_name = ['Styczeń','Luty','Marzec','Kwiecień','Maj','Czerwiec','Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień'];
    var calendar = get_calendar(day_no, days, day);
    document.getElementById("calendar_month_year").innerHTML = month_name[month]+" "+year;
    document.getElementById("calendar_dates").appendChild(calendar);
}

function get_calendar(day_no, days, acttual_day){
    var table = document.createElement('table');
    var tr = document.createElement('tr');
    
    //row for the day letters
    for(var c=0; c<=6; c++){
        var td = document.createElement('td');
        switch(c){
			case 0: td.innerHTML = "Pon";
			break;
			case 1: td.innerHTML = "Wt";
			break;
			case 2: td.innerHTML = "Śr";
			break;
			case 3: td.innerHTML = "Czw";
			break;
			case 4: td.innerHTML = "Pią";
			break;
			case 5: td.innerHTML = "Sob";
			break;
			case 6: td.innerHTML = "Nie";
			break;
		}
        tr.appendChild(td);
    }
    table.appendChild(tr);
    
    //create 2nd row
    tr = document.createElement('tr');
    var c;
    for(c=0; c<=6; c++){
        if(c == day_no){
            break;
        }
        var td = document.createElement('td');
        td.innerHTML = "";
        tr.appendChild(td);
    }
    
    var count = 1;
    for(; c<=6; c++){
        var td = document.createElement('td');
        td.innerHTML = count;
		if(count==acttual_day) td.style.backgroundColor="#7309AA";
        count++;
        tr.appendChild(td);
		
    }
    table.appendChild(tr);
    
    //rest of the date rows
    for(var r=3; r<=7; r++){
        tr = document.createElement('tr');
        for(var c=0; c<=6; c++){
            if(count > days){
                table.appendChild(tr);
                return table;
            }
            var td = document.createElement('td');
            td.innerHTML = count;
			if(count==acttual_day) td.style.backgroundColor="#7309AA";
            count++;
            tr.appendChild(td);
        }
        table.appendChild(tr);
    }
	
    return table;
}