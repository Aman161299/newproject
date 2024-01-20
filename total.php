<div class="col-xxl-4 col-xl-3">
                        <div class="checkout-details smt-30">
                            <div class="content-box-title">
                                <h5>Total Bill</h5>
                            </div>
                            <div class="bill-details">
                                <div class="bill-item-wrap">
                                <?php
                                     $session_id=session_id();
                                     $cart="select * from cart where session_id='".$session_id."'";
                                     $query=mysqli_query($con,$cart);
                                     while($result=mysqli_fetch_assoc($query)){
                                         $product="select * from products where id='".$result["product_id"]."'";
                                         $query2=mysqli_query($con,$product);
                                         while($result2=mysqli_fetch_assoc($query2)){
                                             ?>
                                    <div class="bill-item">
                                        <div class="bill-item-name">
                                            <p><?php echo $result2["product_name"]?></p>
                                        </div>
                                        <div class="bill-item-price">
                                            <span><?php
                                                    $price=$result["price"];
                                                    $quantity=$result["quantity"];
                                                    $total=$price*$quantity;
                                                    echo $total;
                                                    ?></span>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                            }
                                        ?>
                                </div>
                                <div class="subtotal-wrap">
                                    <div class="subtotal-item">
                                        <div class="subtotal-item-left">
                                            <h6>Subtotal</h6>
                                        </div>
                                        <div class="subtotal-item-right">
                                            <?php
                                            $session=session_id();
                                            $total_price="SELECT SUM(total) FROM cart where session_id='".$session."'";
                                            $qery4=mysqli_query($con,$total_price);
                                            $result4=mysqli_fetch_assoc($qery4);
                                            print_r(implode($result4));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="subtotal-item">
                                        <h6>Have A Promo Code?</h6>
                                        <div class="form-group mb-0 w-100">
                                            <input class="w-100" type="text" placeholder="Enter code here">
                                            <button type="submit">Apply</button>
                                        </div>
                                    </div>
                                    <div class="subtotal-item">
                                        <div class="subtotal-item-left">
                                            <p>Shipping Charge</p>
                                        </div>
                                        <div class="subtotal-item-right">
                                            <p>$0.00</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="total-wrap">
                                    <h5>Total Amount</h5>
                                    <?php
                                            $session=session_id();
                                            $total_price="SELECT SUM(total) FROM cart where session_id='".$session."'";
                                            $qery4=mysqli_query($con,$total_price);
                                            $result4=mysqli_fetch_assoc($qery4);
                                            echo implode($result4);
                                            ?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="select-method">
                                    <div>
                                        <input type="radio" id="test1" name="radio-group">
                                        <label for="test1">Cash On Delivery</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="test2" name="radio-group">
                                        <label for="test2">Card</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="test3" name="radio-group">
                                        <label for="test3">Check</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <form method="post">
                                <button type="submit" name="checkout" class="btn v3">checkout</a>
                                </form>
                            </div>
                        </div>
                    </div>