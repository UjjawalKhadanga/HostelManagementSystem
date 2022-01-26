// Javascript for swapping between book,swap,vacate, and HosAv
var book = document.getElementsByClassName("book")[0];
var swap = document.getElementsByClassName("swap")[0];
var vacate = document.getElementsByClassName("vacate")[0];
var HosAv = document.getElementsByClassName("HosAv")[0];

document.getElementById("book_link").addEventListener("click", (e) => {
    Array.from(document.getElementsByClassName("menu__link")).forEach(function(element,index,array){element.classList.remove("selected__item")});
    e.target.classList.add("selected__item")
    book.classList.add("active")
    swap.classList.remove("active")
    vacate.classList.remove("active")
    HosAv.classList.remove("active")
})

document.getElementById("swap_link").addEventListener("click", (e) => {
    Array.from(document.getElementsByClassName("menu__link")).forEach(function(element,index,array){element.classList.remove("selected__item")});
    e.target.classList.add("selected__item")
    book.classList.remove("active")
    swap.classList.add("active")
    vacate.classList.remove("active")
    HosAv.classList.remove("active")
})
document.getElementById("vacate_link").addEventListener("click", (e) => {
    Array.from(document.getElementsByClassName("menu__link")).forEach(function(element,index,array){element.classList.remove("selected__item")});
    e.target.classList.add("selected__item")
    book.classList.remove("active")
    swap.classList.remove("active")
    vacate.classList.add("active")
    HosAv.classList.remove("active")
})
document.getElementById("hosav_link").addEventListener("click", (e) => {
    Array.from(document.getElementsByClassName("menu__link")).forEach(function(element,index,array){element.classList.remove("selected__item")});
    e.target.classList.add("selected__item")
    book.classList.remove("active")
    swap.classList.remove("active")
    vacate.classList.remove("active")
    HosAv.classList.add("active")
})




// Updating the CheckAvailibility Table using AJAX request t table_server
$(document).ready(function(){
    $("#table-form").submit(function(event){
        event.preventDefault();
        var postdata = $("#table-form").serialize();
        $.ajax({
            type: "POST",
            url: '/HostelManagementSystem/table_server.php',
            data: postdata,
            success: function (response) {
                var arr=JSON.parse(response);
                document.getElementById('table').innerHTML='<thead><tr><th>Hostel</th><th>Room No</th><th>Availability</th></tr></thead><tbody></tbody>';
                
                arr.forEach(row =>{
                    var newele=document.createElement('tr');
                    var col1=document.createElement('td');
                    col1.innerHTML=row["Hostel"];
                    newele.appendChild(col1);
                    var col2=document.createElement('td');
                    col2.innerHTML=row["Room"];
                    newele.appendChild(col2);
                    var col3=document.createElement('td');
                    if(row["Availability"]==0){
                        newele.classList.add('unavailable-row');
                        col3.innerHTML='Unavailable';
                    }else{
                        newele.classList.add('available-row');               
                        col3.innerHTML='Available';
                    }
                    newele.appendChild(col3);
                    document.getElementById('table').appendChild(newele); 
                })
                
            }
        })
    })
})
