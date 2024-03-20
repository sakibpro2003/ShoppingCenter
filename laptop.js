// Define the container
const container = document.getElementById("container");

// Fetch data function
function getData() {
  return fetch("./laptop.json")
    .then((res) => res.json())
    .then((data) => data.map((item) => item.name));
}
getData();

// Example usage
getData()
  .then((names) => {
    names.forEach((name, index) => {
      const card = document.createElement("section");
      card.innerHTML = `
        <div class="card card-compact w-96 bg-base-100 shadow-xl">
          <figure><img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" /></figure>
          <div class="card-body">
            <h2 id="name-${index}">Name: <span>${name}</span></h2>
            <p id="description-${index}">If a dog chews shoes whose shoes does he choose?</p>
            <div class="card-actions justify-end">
              <button class="btn btn-primary">Buy Now</button>
            </div>
          </div>
        </div>
      `;
      container.appendChild(card);
    });
  })
  .catch((error) => {
    console.error("Error fetching data:", error);
  });
