var amount =document.getElementById("amount").value ;
var price =document.getElementById("price").value ;
var total =(amount * price);

document.getElementById("total").innerHTML = (total) ? total : amount ;