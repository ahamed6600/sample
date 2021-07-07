function tempAlert(msg,duration)
{
     var el = document.createElement("div");
     el.setAttribute("style","position: fixed;bottom: 50%; border-radius:10px; padding:20px 10px 50px; margin: auto; top: 50%; left:0%; right:0%; width: 75%; background-color: #30bc5b;z-index: 1000;color: #ffffff;color: #ffffff;text-align: center;font-size: 12px;line-height: 20px;font-weight: 700;");
     el.innerHTML = msg;
     setTimeout(function(){
      el.parentNode.removeChild(el);
     },duration);
     document.body.appendChild(el);
}

var cart = [];
$(function () {
    if (localStorage.cart)
    {
        cart = JSON.parse(localStorage.cart);
        $("#counter").html(cart.length);
        showCart();
    }
});

function totalcartcount()
{
    if (localStorage.cart)
    {
        cart = JSON.parse(localStorage.cart);
        $("#counter").html(cart.length);
        showCart();
    }
}

function totalcartamount(total)
{
    $(".grandtotal").html(total.toFixed(2));
}

function addToCart(id) {
    var productdetails = $("#productdetails"+id).val();
    var cart_product = JSON.parse(productdetails);
    var qty = "1";
    
    // update qty if product is already present
    for (var i in cart) {
        if(cart[i].Product == cart_product.productname)
        {
            cart[i].Qty = Number(cart[i].Qty)+Number(qty);
            showCart();
            saveCart();
            tempAlert(cart[i].Product + " updated to cart",2000);
            return;
        }
    }
    // create JavaScript Object
    if(cart_product.todayprice != 0)
    {
        var item = { ProductID: cart_product.productId, Product: cart_product.productname,  Price: cart_product.todayprice, Qty: qty };
    }
    else{
        if(cart_product.offer_price == 0)
        {
            var item = { ProductID: cart_product.productId, Product: cart_product.productname,  Price: cart_product.price, Qty: qty };
        }
        else
        {
            var item = { ProductID: cart_product.productId, Product: cart_product.productname,  Price: cart_product.offer_price, Qty: qty };
        }
    }
    
    cart.push(item);
    saveCart();
    showCart();
    tempAlert(cart_product.productname + " added to cart",5000);
    totalcartcount();
}

function deleteItem(index){
    cart.splice(index,1); // delete item at index
    showCart();
    saveCart();
    totalcartcount();
    if(cart.length == 0)
    {
        var total = 0;
    }
    totalcartamount(total);
}

function saveCart() {
    if (window.localStorage)
    {
        localStorage.cart = JSON.stringify(cart);
    }
}

function showCart() {
    var customer_name = $('#hcustomer_name').val();
    // if(customer_name == "")
    // {
    //     $('#whatsappbtn').prop('disabled', true);
    // }
    // else
    // {
    //     $('#whatsappbtn').prop('disabled', false);
    // }
    // $('#whatsappbtn').prop('disabled', true);
    $("#smartcart1").css("visibility", "hidden");
    $("#cart").css("visibility", "visible");
    $("#cartBody").empty();
    var itemtotal;
    let total=0;
    
    for (var i in cart) {
        
        var item = cart[i];
        
        itemtotal = item.Qty * item.Price;
        
          row = "<tr><th scope='row'><a class='remove-product' onclick='deleteItem(" + i + ")'><i class='lni lni-trash'></i></a></th><td><span style='color: #020310;font-weight: 700;'>"+item.Product+" </span></td><td class='pq'><a href='#'> <span><i class='lni lni-rupee'></i> "+item.Price+"</span></a></td><td><div class='quantity buttons_added'><button class='minus minus-btn' onclick='decrement(" + item.ProductID + ")'>-</button><input type='number' min='1' name='quantity' value='"+ item.Qty +"' class='input-text qty text'><button class='plus plus-btn' onclick='increment("+item.ProductID+")'>+</button></div><br><span class='res-total-price'><i class='lni lni-rupee'></i> "+itemtotal.toFixed(2)+"</span></td><td class='tl'><a href='#'> <span><i class='lni lni-rupee'></i> "+itemtotal.toFixed(2)+"</span></a></td></tr>";
        $("#cartBody").append(row);
        
        if(itemtotal == 0)
        {
            total = 0;
        }
        else
        {
            total = total + itemtotal;
        }
      
    }
    totalcartamount(total);
    if (total == 0) {
        
      var row = "<tr><th scope='row'></th><td><h5>Your Cart Is Empty</h5></td><td class='pq'></td><td></td><td class='tl'></td></tr>";
            $("#cartBody").append(row);
            
    }
}

function decrement(productID)
{
    if (localStorage.cart)
    {
        cart = JSON.parse(localStorage.cart);
        for (var i in cart) 
        {
            if(cart[i].ProductID == productID)
            {
                cart[i].Qty = Number(cart[i].Qty)-Number(1);
                
                if(cart[i].Qty == Number(0))
                {
                    // alert('quantity is 1');
                }
                else{
                    showCart(); 
                    saveCart();
                    return;
                }
            }
        }
    }
}

function increment(productID)
{
    if (localStorage.cart)
    {
        cart = JSON.parse(localStorage.cart);
        for (var i in cart) 
        {
            if(cart[i].ProductID == productID)
            {
                cart[i].Qty = Number(cart[i].Qty)+Number(1);
                Qty = cart[i].Qty;
                showCart();
                saveCart();
                return;
            }
        }
    }
}

function deleteItems() {
  localStorage.clear();
}

function deletecart() {
  localStorage.clear();
  location.reload();
}

function sendToWhatsApp(wa_number) {
            
            var purchasemode = $("input[name='purchasemode']:checked").val();
            var grandtotal = $(".grandtotal").html();
            
            if(purchasemode == "Home Delivery")
            {
                var customer_name = $('#hcustomer_name').val();
                var customer_phone = $('#hcustomer_phone').val();
                var customer_address = $('#hcustomer_address').val();
                // var maplink = $('#maplocationlink').val();
                
                var message ="";
                var result = JSON.parse(localStorage.cart);
                for(var k in result)
                {
                    var message = message+result[k].Product+" (Rs "+result[k].Price+" x "+result[k].Qty+" Nos) Rs "+result[k].Price * result[k].Qty+",                                                  ";
                }
                message = message + "                                                  ===============                                                   Grand Total: Rs "+grandtotal+"                                                   Purchase: " +purchasemode+ "                                                  Name: " + customer_name  + "                                                  Mobile: " + customer_phone + "                                                  Address: " + customer_address +"                                                  ===============                                                  Please confirm via reply.                                                  ";
                // if(customer_name == "")
                // {
                //     $("input").prop('required',true);
                // }
                // else if(customer_phone == "")
                // {
                //     $("input").prop('required',true);
                // }
                // else if(customer_address == "")
                // {
                //     $("textarea").prop('required',true);
                // }
                // else
                {
                    
                    window.location.href = "https://api.whatsapp.com/send?phone="+wa_number+"&text="+message;
                }
            }
            else if(purchasemode == "Take Away")
            {
                var customer_name = $('#tcustomer_name').val();
                var customer_phone = $('#tcustomer_phone').val();
                
                var message ="";
                var result = JSON.parse(localStorage.cart);
                for(var k in result)
                {
                    var message = message+result[k].Product+" (Rs "+result[k].Price+" x "+result[k].Qty+" Nos) Rs "+result[k].Price * result[k].Qty+",                                                  ";
                }
                message = message + "                                                  ===============                                                   Grand Total: Rs "+grandtotal+"                                                   Purchase: " +purchasemode+ "                                                  Name: " + customer_name  + "                                                  Mobile: " + customer_phone + "                                                  ===============                                                  Please confirm via reply.";
            
                if(customer_name == "")
                {
                    $("input").prop('required',true);
                }
                else if(customer_phone == "")
                {
                    $("input").prop('required',true);
                }
                else
                {
                    window.location.href = "https://api.whatsapp.com/send?phone="+wa_number+"&text="+message;
                }
            }
            deleteItems();
        }
        
// GPS
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    var error = "Geolocation is not supported by this browser.";
    $('#maplocation').html(error);
  }
}
        
function showPosition(position) {
    var maplink = 'https://maps.google.com/maps?q='+position.coords.latitude+','+position.coords.longitude+'&hl=en&z=14&amp;output=embed';
//   var frame = '<iframe src="'+maplink+'" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>';
//   $('#maplocation').html(frame);
  $('#maplocationlink').val(maplink);
}
