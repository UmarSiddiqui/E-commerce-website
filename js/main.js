let carts = document.querySelectorAll('.cardBtn');
// carts[0]
let products = [
  {
    name: "Strapped-Beanie",
    tag: "Product1",
    price: 19.99,
    inCart: 0
  },
  {
    name: "Earcuff-Beanie",
    tag: "Product2",
    price: 34.99,
    inCart: 0
  },
  {
    name: "FlowerPrint-Beanie",
    tag: "Product3",
    price: 19.99,
    inCart: 0
  },
  {
    name: "FootWarmer",
    tag: "Product4",
    price: 19.99,
    inCart: 0
  },
  {
    name: "Hand-Warmer",
    tag: "Product5",
    price: 39.99,
    inCart: 0
  },
  {
    name: "Strapped-FootWarmer",
    tag: "Product6",
    price: 39.99,
    inCart: 0
  },
  {
    name: "Kids-FootWarmer",
    tag: "Product7",
    price: 19.99,
    inCart: 0
  },
  {
    name: "Earmuffs",
    tag: "Product8",
    price: 29.99,
    inCart: 0
  },
  {
    name: "Woolen Jacket",
    tag: "Product9",
    price: 29.99,
    inCart: 0
  }
]

for (let i = 0; i < carts.length; i++) {
  carts[i].addEventListener('click', () => {
    console.log("added to cart");
    cartNumbers(products[i]);
    totalCost(products[i]);
  })
}

function onLoadCartNumbers() {
  let productNumbers = localStorage.getItem('cartNumbers');

  if (productNumbers) {
    document.querySelector('.cart span').textContent = productNumbers; //setting here
  }
}

function cartNumbers(product) {
  let productNumbers = localStorage.getItem('cartNumbers');
  productNumbers = parseInt(productNumbers);

  if (productNumbers) {
    localStorage.setItem('cartNumbers', productNumbers + 1);
    document.querySelector('.cart span').textContent = productNumbers + 1;
  } else {
    localStorage.setItem('cartNumbers', 1);
    document.querySelector('.cart span').textContent = 1;
  }
  setItems(product);
}

function setItems(product) {

  let cartItems = localStorage.getItem("productsInCart");
  cartItems = JSON.parse(cartItems);

  if (cartItems != null) {
    if (cartItems[product.tag] == undefined) {
      cartItems = {
        ...cartItems,
        [product.tag]: product
      }
    }
    cartItems[product.tag].inCart += 1;
  }
  else {
    product.inCart = 1;
    cartItems = {
      [product.tag]: product
    }
  }

  // product.inCart = 1;

  // cartItems = {
  //   [product.tag]: product
  // }

  localStorage.setItem("productsInCart", JSON.stringify(cartItems));
}

function totalCost(product) {
  let cartCost = localStorage.getItem('totalCost');

  if (cartCost != null) {
    cartCost = parseInt(cartCost);
    localStorage.setItem("totalCost", cartCost + product.price)
  }
  else {
    localStorage.setItem("totalCost", product.price);
  }
}

function displayCart() {
  let cartItems = localStorage.getItem("productsInCart");
  cartItems = JSON.parse(cartItems);
  let productContainer = document.querySelector
    (".products-container");
  let cartCost = localStorage.getItem('totalCost');

  if (cartItems && productContainer) {
    // productContainer.innerHTML = '';
    Object.values(cartItems).map(item => {
      productContainer.innerHTML += `
    <div class="product-item">
      <div class="product">
      <img src="./images/${item.tag}.jpeg" style="height: 20px;">
      <span>${item.name}</span>
      </div>
      
      <div class="cost">$${item.price}</div>
      
      <div class="quantity">
        <span>${item.inCart}</span>
      </div> 
    
      <div class="total">
        $${item.inCart * item.price}
      </div>
    </div>
      `;

      /*Old Code, Add image here instead of ion icon*/
      /*productContainer.innerHTML += `
      <div class="product">
        <ion-icon name="close-circle"></ion-icon>
        <img src="./images/${item.tag}.jpeg">
        <span>${item.name}</span>
    </div>
    <div class="cost">$${item.price},00</div>
    <div class="quantity">
    <ion-icon class=-"decrease"
    name="arrow-dropleft-circle"></ion-icon>
    <span›${item.inCart}</span>
    <ion-icon class="increase"
    name="arrow-dropright-circle"></ion-icon>
    </div>
    <div class="total">
    $${item.inCart * item.price},00
    </div>
    `;*/

    });


    productContainer.innerHTML += `
      <div class="basketTotalContainer">
      <h4 class="basketTotalTitle">
        Basket total
        </h4>
        <h4 class= "basketTotal">
          $${cartCost}
        </h4>
      `;
  }
}

onLoadCartNumbers();
displayCart();
