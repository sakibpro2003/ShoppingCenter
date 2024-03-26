function addToCart(productId, productName, price) {
  function modal(productId){
    const productId = document.getElementById('productModalId');
    productId.innerText = productId;
    my_modal_1.showModal()
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "insert.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
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




// get current tiem date 
// function getCurrentDateTime() {
//   const currentDate = new Date();
  
//   const year = currentDate.getFullYear();
//   const month = String(currentDate.getMonth() + 1).padStart(2, '0');
//   const date = String(currentDate.getDate()).padStart(2, '0');
//   const hours = String(currentDate.getHours()).padStart(2, '0');
//   const minutes = String(currentDate.getMinutes()).padStart(2, '0');
//   const seconds = String(currentDate.getSeconds()).padStart(2, '0');
  
//   const currentDateTime = `${year}-${month}-${date} ${hours}:${minutes}:${seconds}`;
  
//   return currentDateTime;
// }

// Example usage
// console.log(getCurrentDateTime());
