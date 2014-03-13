var xmlhttp,updateObj;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  updateObj=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  updateObj=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.open("GET","ajax/workshops.php",false);
xmlhttp.send();
var table=document.getElementById("workshops");
var workshops=JSON.parse(xmlhttp.responseText);
for(var i=0;i<workshops.length;i++)
{
    var row = document.createElement("tr");
    for(var ws in workshops[i])
    {
        if(ws=="id" || ws=="name" || ws=="venue")
        {
            if(ws=="venue")
            {
                var data = document.createElement("td");
                var box = document.createElement("select");
                var auxBox = document.createElement("input");
                auxBox.type = "text";
                auxBox.readOnly=true;
                auxBox.style.backgroundColor="#e7e7e7";
                auxBox.id="aux"+workshops[i]["id"];
                auxBox.style.display="none";
                var opt0 = document.createElement("option");
                opt0.innerHTML = "";
                box.appendChild(opt0);
                var opt1 = document.createElement("option");
                opt1.innerHTML = "A-";
                box.appendChild(opt1);
                var opt2 = document.createElement("option");
                opt2.innerHTML = "C-";
                box.appendChild(opt2);
                var opt3 = document.createElement("option");
                opt3.innerHTML = "Auditorium";
                box.appendChild(opt3);
                var opt4 = document.createElement("option");
                opt4.innerHTML = "Library Lawns";
                box.appendChild(opt4);
                var opt14 = document.createElement("option");
                opt14.innerHTML = "Library";
                box.appendChild(opt14);
                var opt5 = document.createElement("option");
                opt5.innerHTML = "Computer Centre";
                box.appendChild(opt5);
                var opt15 = document.createElement("option");
                opt15.innerHTML = "Workshop";
                box.appendChild(opt15);
                var opt16 = document.createElement("option");
                opt16.innerHTML = "Central Lawns";
                box.appendChild(opt16);
                var opt17 = document.createElement("option");
                opt17.innerHTML = "Student Activity Centre";
                box.appendChild(opt17);
                var opt6 = document.createElement("option");
                opt6.innerHTML = "Lecture theatre 1";
                box.appendChild(opt6);
                var opt7 = document.createElement("option");
                opt7.innerHTML = "Lecture theatre 2";
                box.appendChild(opt7);
                var opt8 = document.createElement("option");
                opt8.innerHTML = "Lecture theatre 3";
                box.appendChild(opt8);
                var opt9 = document.createElement("option");
                opt9.innerHTML = "Lecture theatre 4";
                box.appendChild(opt9);
                var opt19 = document.createElement("option");
                opt19.innerHTML = "Other";
                opt19.value = " ";
                box.appendChild(opt19);
                box.value=workshops[i][ws];
                if(workshops[i][ws].substring(0,2)=="A-")
                {
                    box.value="A-";
                    auxBox.value=workshops[i][ws].substring(2);
                    auxBox.style.display="block";
                }
                if(workshops[i][ws].substring(0,2)=="C-")
                {
                    box.value="C-";
                    auxBox.value=workshops[i][ws].substring(2);
                    auxBox.style.display="block";
                }
                box.id=workshops[i]["id"];
                box.onchange=function() {
                    if(this.value.substring(0,2)!="A-" && this.value.substring(0,2)!="C-" && this.value!=" ")
                    {
                        document.getElementById("aux"+this.id).value="";
                        document.getElementById("aux"+this.id).style.display="none";
                        updateObj.open("POST","ajax/updateWorkshopVenue.php",true);
                        updateObj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                        updateObj.send("id="+this.id+"&venue="+this.value);
                    }
                    else
                    {
                        document.getElementById("aux"+this.id).style.display="block";
                    }
                }
                auxBox.onkeypress = function (e) {
                        if (e.keyCode === 13)
                            this.blur();
                };
                auxBox.onclick = function() {
                    if(this.readOnly)
                    {
                        this.readOnly=false;
                        this.style.backgroundColor="white";
                        this.select();
                        this.oldValue=this.value;
                        this.onblur=function() {
                            this.readOnly=true;
                            this.style.backgroundColor="#e7e7e7";
                            if(this.oldValue!=this.value)
                            {
                                updateObj.open("POST","ajax/updateWorkshopVenue.php",true);
                                updateObj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                                updateObj.send("id="+this.parentNode.childNodes[0].id+"&venue="+this.parentNode.childNodes[0].value+this.value);
                            }
                        }
                    }
                }
                data.appendChild(box);
                data.appendChild(auxBox);
                row.appendChild(data);
            }
            else
            {
                var data = document.createElement("td");
                data.innerHTML=workshops[i][ws];
                row.appendChild(data);
            }
        }
    }
    table.appendChild(row);
}