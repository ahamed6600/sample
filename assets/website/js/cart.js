function tempAlert(msg,duration)
{
     var el = document.createElement("div");
     el.setAttribute("style","position: fixed;bottom: 50%; border-radius:10px; padding:20px 10px 50px; margin: auto; top: 50%; left:0%; right:0%; width: 75%; background-color: #30bc5b;z-index: 1000;color: #ffffff;text-align: center;font-size: 12px;line-height: 20px;font-weight: 700;");
     el.innerHTML = msg;
     setTimeout(function(){
      el.parentNode.removeChild(el);
     },duration);
     document.body.appendChild(el);
}

function orderPlaced(msg,duration)
{
     var el = document.createElement("div");
     el.setAttribute("style","position: fixed;bottom: 60%;border-radius: 10px;padding: 22px 10px 56px;margin: auto;top: 45%;left:0%;right:0%;width: 75%;background-color: #3bda6b;z-index: 1000;color: #ffffff;text-align: center;font-size: 17px;line-height: 18px;font-weight: 700;border: 3px solid #30bc5b;");
     el.innerHTML = msg;
     setTimeout(function(){
      el.parentNode.removeChild(el);
     },duration);
     document.body.appendChild(el);
    
     deleteItems();
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
            tempAlert(cart[i].Product + " updated to cart",1000);
            return;
        }
    }
    // create JavaScript Object
    if(cart_product.todayprice != 0)
    {
        var item = { CategoryID: cart_product.categoryid, ProductID: cart_product.productId, Product: cart_product.productname,  Price: cart_product.todayprice, Qty: qty };
    }
    else{
        if(cart_product.offer_price == 0)
        {
            var item = { CategoryID: cart_product.categoryid, ProductID: cart_product.productId, Product: cart_product.productname,  Price: cart_product.price, Qty: qty };
        }
        else
        {
            var item = { CategoryID: cart_product.categoryid, ProductID: cart_product.productId, Product: cart_product.productname,  Price: cart_product.offer_price, Qty: qty };
        }
    }
    
    cart.push(item);
    saveCart();
    showCart();
    tempAlert(cart_product.productname + " added to cart",1000);
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
    $("#smartcart1").css("visibility", "hidden");
    $("#cart").css("visibility", "visible");
    $("#cartBody").empty();
    var itemtotal;
    let total=0;
    
    for (var i in cart) {
        
        var item = cart[i];
        $("#quantity"+ item.ProductID).css("display", "block");
        $("#cartadd"+ item.ProductID).css("background","#5c7713");
        $("#cartadd"+ item.ProductID).css("border-color","#5c7713");
        itemtotal = item.Qty * item.Price;
        
          row = "<tr><th scope='row'><a class='remove-product' onclick='deleteItem(" + i + ")'><i class='lni lni-trash'></i></a></th><td><span style='color: #020310;font-weight: 700;'>"+item.Product+" </span></td><td class='pq'><a href='#'> <span><i class='lni lni-rupee'></i> "+item.Price+"</span></a></td><td><div class='quantity buttons_added'><button class='minus minus-btn' onclick='decrement(" + item.ProductID + ")'>-</button><input type='number' min='1' name='quantity' value='"+ item.Qty +"' class='input-text qty text'><button class='plus plus-btn' onclick='increment("+item.ProductID+")'>+</button></div><br><span class='res-total-price'><i class='lni lni-rupee'></i> "+itemtotal.toFixed(2)+"</span></td><td class='tl'><a href='#'> <span><i class='lni lni-rupee'></i> "+itemtotal.toFixed(2)+"</span></a></td></tr>";
        $("#cartBody").append(row);
        
        $("#qtycount"+ item.ProductID).val(item.Qty);
        
        if(item.Qty == Number(1))
        {
            $('#dummy'+item.ProductID).css('display', 'block');
            $('#dummy'+item.ProductID).css('float', 'left');
            $('#decrement'+item.ProductID).css('display', 'none');
        }
        else if(item.Qty > Number(1)){
            $('#dummy'+item.ProductID).css('display', 'none');
             $('#decrement'+item.ProductID).css('display', 'block');
             $('#decrement'+item.ProductID).css('float', 'left');
        }
        
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
  setTimeout(function(){
      location.reload(true);
    }, 5000);
}

function deletecart() {
  localStorage.clear();
  location.reload();
}


function sendToWhatsApp(wa_number) {
    var ordertype = $('input[name="purchasemode"]:checked').val();      
    var purchasemode = $("input[name='purchasemode']:checked").val();
    var grandtotal = $(".grandtotal").html();
    
    var customer_name = $('#hcustomer_name').val();
    var customer_phone = $('#hcustomer_phone').val();
    var customer_address = $('#hcustomer_address').val();
    var customer_pincode = $('#hpincode').val();
    var customer_feedback = $('#hcustomer_feedback').val();
    var card_no = $('#hcard_no').val();
    
    // var order_no = $('#orderid').val();
    var message ="";
    var result = JSON.parse(localStorage.cart);
    for(var k in result)
    {
        var slno = parseFloat(k) + Number(1);
        var message = message+slno+"."+result[k].Product+"(₹"+result[k].Price+"x"+result[k].Qty+") ₹"+result[k].Price * result[k].Qty+".                                                                             ---------------------------------------                                                                             ";
    }
    // message = message + "                                                  ===============                                                                                                         Grand Total: ₹"+grandtotal+"                                                                                                         Purchase: " +purchasemode+ "                                                                                                        Name: " + customer_name  + "                                                                                                                                      Mobile: " + customer_phone + "                                                                                                                                      Address: " + customer_address +"                                                                                                                                      Card no: "+card_no+"                                                                                                                                      Feedback: "+customer_feedback+"                                                                                                                                      ===============                                                                                                        Please confirm via reply.                                                  ";
    
    $.ajax({
        url: "website/order_details",
        method: "POST",
        data: {
            customer_name: customer_name,
            customer_phone:customer_phone,
            customer_address:customer_address,
            customer_pincode:customer_pincode,
            customer_feedback:customer_feedback,
            card_no:card_no,
            ordertype:ordertype,
            order:result,
        },
        success: function(data) {
          
            console.log(grandtotal);
            message = message + "                                                  ===============                                                                                                         Grand Total: ₹"+grandtotal+"                                                                                                         Order Number: " +data+ "                                                                                                        Purchase: " +purchasemode+ "                                                                                                        Name: " + customer_name  + "                                                                                                                                      Mobile: " + customer_phone + "                                                                                                                                      Address: " + customer_address +"                                                                                                                                      Pincode: " + customer_pincode + "                                                                                                                                      Card no: "+card_no+"                                                                                                                                      Feedback: "+customer_feedback+"                                                                                                                                      ===============                                                                                                        Final bill will be based on the product availability and amount derived there upon.                                                  ";
            window.location.href = "https://api.whatsapp.com/send?phone="+wa_number+"&text="+message;
        }
    })
    
    orderPlaced("Your Order Has Been Placed. Will contact you in short time",2000);
}
    
function sendToWhatsApp1(wa_number) {
    var ordertype = $('input[name="purchasemode"]:checked').val();      
    var purchasemode = $("input[name='purchasemode']:checked").val();
    var grandtotal = $(".grandtotal").html();
    var customer_name = $('#tcustomer_name').val();
    var customer_phone = $('#tcustomer_phone').val();
    var customer_feedback = $('#tcustomer_feedback').val();
    var card_no = $('#tcard_no').val();
    
    // var order_no = $('#orderid1').val();
    var message ="";
    var result = JSON.parse(localStorage.cart);
    for(var k in result)
    {
        var slno = parseFloat(k) + Number(1);
        var message = message+slno+"."+result[k].Product+"(₹"+result[k].Price+"x"+result[k].Qty+") ₹"+result[k].Price * result[k].Qty+".                                                                             ---------------------------------------                                                                             ";
    }
    // message = message + "                                                  ===============                                                                                                         Grand Total: ₹"+grandtotal+"                                                                                                         Purchase: " +purchasemode+ "                                                                                                        Name: " + customer_name  + "                                                                                                                                      Mobile: " + customer_phone + "                                                                                                                                      Card no: "+card_no+"                                                                                                                                      Feedback: "+customer_feedback+"                                                                                                                                      ===============                                                                                                        Please confirm via reply.                                                  ";

   $.ajax({
        url: "website/order_details",
        method: "POST",
        data: {
            customer_name: customer_name,
            customer_phone:customer_phone,
            customer_feedback:customer_feedback,
            card_no:card_no,
            ordertype:ordertype,
            order:result,
        },
        success: function(data) {
          
            console.log(grandtotal);
            message = message + "                                                  ===============                                                                                                         Grand Total: ₹"+grandtotal+"                                                                                                         Order NUmber: "+data+"                                                                                                         Purchase: " +purchasemode+ "                                                                                                        Name: " + customer_name  + "                                                                                                                                      Mobile: " + customer_phone + "                                                                                                                                      Card no: "+card_no+"                                                                                                                                      Feedback: "+customer_feedback+"                                                                                                                                      ===============                                                                                                        Final bill will be based on the product availability and amount derived there upon.                                                  ";
            window.location.href = "https://api.whatsapp.com/send?phone="+wa_number+"&text="+message;
        }
    });
    orderPlaced("Your Order Has Been Placed. Will contact you in short time",2000);
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
