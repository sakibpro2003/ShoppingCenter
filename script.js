function addToCart(productId, productName, price) {
  function modal(productId){
    const productId = document.getElementById('productModalId');
    productId.innerText = productId;
    my_modal_1.showModal()
  }
  // console.log(productId);
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "insert.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Redirect to cart page after adding to cart
      // window.location.href = "cart.php";
      modal();
    }
  };
  xhr.send(
    "product_id=" +
      productId +
      "&product_name=" +
      productName +
      "&price=" +
      price
  );
  console.log("okay");
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

