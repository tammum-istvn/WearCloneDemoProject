// update header cart total icon
// homePage/header.blade
function updateCartTotal(total){
    $('#cartTotal').text(total);
}

function removeFormatter(value){
    return Number((value).replace(/[.₫]/g,''));
}
