let item_price = document.getElementsByClassName("item-price");
let item_qty = document.getElementsByClassName("item-qty");
let item_total = document.getElementsByClassName("item-total");

for(let i = 0; i < item_price.length; i++) {
    item_qty[i].value = 1;
    item_qty[i].onclick = function()
    {
        item_qty[i].value = item_qty[i].value;
        console.log("test success");
    }
    item_total[i].value = item_price[i].value * item_qty[i].value;
}

let product_qty = [];
document.getElementById("add").onclick  = function()
{
    let new_producte_qty = {
        qty: 1, 
    };
    console.log(new_producte_qty);
}