
function modal(id){
    const productId = document.getElementById('productModalId');
    productId.innerText = id;
    my_modal_1.showModal()
}

function addToCart(productName, productId, price) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "add_to_cart.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            alert(this.responseText);
        }
    };
    xhr.send("productName=" + productName + "&productId=" + productId + "&price=" + price);
}
