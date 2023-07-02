const product = [

    {
        id: 0,
        image: ' https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMoD18wPUw7NAejCOsYsNYHriPJODf4HRwIw&usqp=CAU',
        title: 'kikis delivery service',
        price: 12,
    },

    {
        id: 1,
        image: ' https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaWb5oPru6XegGlqsAsJxojnGopZAM87qunEh6s7ht8VjMXkhAk161f-dfayYezRGOmG8&usqp=CAU',
        title: 'arietye',
        price: 10,

    },

    {
        id: 3,
        image: 'https://occ-0-1168-299.1.nflxso.net/dnm/api/v6/evlCitJPPCVCry0BZlEFb5-QjKc/AAAABf7z3182sV5npT6XvjMdZy9oSYzUoeKMzPII1h6mxfseRaYVy6vhG5HeXBFuBcfa2D0CxaElXKKUV6GcTcB7OjLzxA.jpg?r=797',
        title: 'the wind rises',
        price: 16,

    },
    
    {
        id: 4,
        image: 'https://m.media-amazon.com/images/M/MV5BZTI3NmJmYTQtNDg4NS00M2VlLTgzZDAtZWIwZDcyOWY5YzIzXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_.jpg',
        title: 'nausicca',
        price: 20,

    },

];
const categories = [...new Set(product.map((item)=>
{return item}))] 
let i=0;
document.getElementById('root').innerHTML = categories.map((item)=>
{
    var {image,title,price} = item;
    return(
        `<div class='box'>
        <div class='img-box'>
        <img class='images' src=${image}></img>
        </div>
        <div class='bottom'>
        <p>${title}</p>
        <h2>$ ${price}.00</h2>`+
        "<button onclick='addtocart("+(i++)+")'>Add to cart</button>"+
        `</div>
        </div>`
    )


}).join('')

var cart =[];
function addtocart(a){
    cart.push({...categories[a]});
    displaycart();
}
function delElement(a){
    cart.splice(a,1);
    displaycart();
}

var cart =[];
function displaycart(){
    let j = 0, total=0;
    document.getElementById("count").innerHTML=cart.length;
    if(cart.length==0){
        document.getElementById('cartItem').innerHTML = "Your cart is empty";
        document.getElementById("total").innerHTML = "$ "+0+".00";
    }
    else{
        document.getElementById("cartItem").innerHTML = cart.map((items)=>
        {
            var {image,title,price} = items;
            total=total+price;
            document.getElementById("total").innerHTML = "$ "+total+ ".00";
            return(
                `<div class='cart-item'>
                <div class='row-img' src=${image}></div>
            
            <p style='font-size:12px;'>${title}</p>
            <h2 style='font-size: 15px;'>$ ${price}.00</h2>`+
            "<i class='fa-solid fa-trash' onclick='delElement("+(j++) +")'></i></div>"
            );
        }).join('')

    }
}