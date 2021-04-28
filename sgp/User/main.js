let carts = document.querySelectorAll('.add-cart-cart1, .add-cart-cart2 , .add-cart-cart3');

let product=[
    {
        id:101
    },
    {
        id:102
    }
]
let products = [

    {
        name: 'hp-15',
        tag: 'hp',
        price: 23990,
        inCart: 0,
        img: 'l1.jpeg'
    },
    {
        name: 'hp-p',
        tag: 'hpp',
        price: 65990,
        inCart: 0,
        img: 'l2.jpeg'
    },
    {
        name: 'MI',
        tag: 'mi14',
        price: 37499,
        inCart: 0,
        img: 'l3.jpeg'
    },
]

// Click Event Loop
for (let i = 0; i < carts.length; i++) {
    carts[i].addEventListener('click', () => {
        addtotable(product[i]);
        cartnum(products[i]);
        totalCost(products[i]);

    })
}

// To Load The Cart
function onLoadCartnum() {
    let productnumber = localStorage.getItem('cartnum');
    productnumber2 = parseInt(productnumber);

    if (productnumber2) {
        document.querySelector("a.cart span").textContent = productnumber2;
    }
}

// To Increment in Cart
function cartnum(product) {
    let productnumber = localStorage.getItem('cartnum');
    productnumber1 = parseInt(productnumber);

    if (productnumber1) {

        localStorage.setItem('cartnum', productnumber1 + 1);
        document.querySelector('a.cart span').textContent = productnumber1 + 1;

    } else {

        localStorage.setItem('cartnum', 1);
        document.querySelector('a.cart span').textContent = 1;
    }

    setItems(product);

}

// To Set Item in Cart
function setItems(product) {

    let cartItems = localStorage.getItem('ProductsInCart');
    cartItems = JSON.parse(cartItems);

    if (cartItems != null) {

        if (cartItems[product.tag] == undefined) {
            cartItems = {
                ...cartItems,
                [product.tag]: product
            }
        }

        cartItems[product.tag].inCart += 1;

    } else {

        product.inCart = 1;
        cartItems = {
            [product.tag]: product
        }

    }
    product.inCart = 1;
    localStorage.setItem("ProductsInCart", JSON.stringify(cartItems));
}

// To Find Total Cost
function totalCost(product) {
    let cartCost = localStorage.getItem('totalCost');

    if (cartCost != null) {
        cartCost = parseInt(cartCost);
        localStorage.setItem("totalCost", cartCost + product.price);
    } else {
        localStorage.setItem("totalCost", product.price);
    }
}

function displayCart() {
    let cartItems = localStorage.getItem("ProductsInCart");
    cartItems = JSON.parse(cartItems);

    let productContainer = document.querySelector(".products");
    let cartCost = localStorage.getItem('totalCost');

    if (cartItems && productContainer) {
        productContainer.innerHTML = '';
        Object.values(cartItems).map(item => {
            productContainer.innerHTML += `
            <div class = "product">
                <ion-icon name="close-circle"></ion-icon> 
                <img src = "${item.img}.jpeg>
                <span ${item.name}</span>
                </div>
            <div class = "price">₹${item.price},00</div>
            <div class = "quantity"> 
                 <ion-icon class="decrease" 
                 name="caret-back-circle"></ion-icon>
                 <span>${item.inCart}</span>
                 <ion-icon class="increase"
                 name="caret-forward-circle"></ion-icon>
            </div>
            <div class = "total">
            ₹${item.inCart * item.price},00
            </div>
            `;
        });

        productContainer.innerHTML += `
            <div class="BasketTotalConatainer">
                <h4 class= "BasketTotalTitle">
                     Basket Total
                </h4>
                <h4 class= "BasketTotal">
                ₹${cartCost},00
                </h4>
        `;
    }
}

onLoadCartnum();
displayCart();