<?php include('header.php')?>

<!-- Main content sections -->
<div class="item-list position-absolute">

    <!-- Item list container -->
    <div class="container">
        <!-- Container --> 
        <div class="row">
            <!-- Row -->
            <div class="col-md-12">
                <!-- Column -->
                <section class="jumbotron text-center card-container" id="main">
                    <!-- Jumbotron -->
                    <div class="col-md-12 mt-5">
                        <!-- Column -->
                        <h1><span>Paw</span>some goods for your <span>Furr Babies</span></h1>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero nesciunt vel animi iste et! Illo reprehenderit et alias facere? Voluptatibus cumque pariatur autem aliquam officiis molestias hic sapiente illum perferendis.</p>
                        <a href="#" class="btn btn-primary">Know more</a>
                    </div>
                </section>
                <section class="card-container" id="dry_dogfood"></section>
                <section class="card-container" id="wet_dogfood"></section>
                <section class="card-container" id="dry_catfood"></section>
                <section class="card-container" id="wet_dogfood"></section>
                <section class="card-container" id="login"><?php include('login.php'); ?></section>
            </div>
        </div>
    </div>
</div>
<div class="slider">
    <!-- Slider -->
    <div class="shopping-cart">
        <!-- Shopping cart -->
        <div class="item-box">
            <!-- Item box -->
            <div class="image">
                <!-- Image -->
                <img src="images/whikas.png" alt="">
            </div>
            <div class="name">
                <!-- Name -->
                <h3>Whiskas</h3>
            </div>
            <div class="totalPrice">
                    <!-- Total price -->
                <span class="price">₱2300</span>
            </div>
            <div class="quantity">
                    <!-- Quantity -->
                <span class="minus"><</span>
                <span>1</span>
                <span class="plus">></span>
            </div>
            <!--<i class="fas fa-trash"></i>-->
        </div>
        <div class="btn w-100">
                <!-- Button -->
            <button class="btn btn-warning">Close</button>
            <button class="btn btn-success">Place Order</button>
        </div>
    </div>
</div>

<!-- Testimonials section -->
<section class="review" id="review"> 
        <!-- Review -->
</section>
        
<?php include('footer.php')?>