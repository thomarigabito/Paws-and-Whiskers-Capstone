<!-- Footer section -->
<footer class="footer">
    <!-- Footer -->
        <div class="box-container">
            <!-- Box container -->
            <div class="box">
                <!-- Box -->
                <h3> <i class="fa-solid fa-paw"></i>  Paws and Whiskers  <i class="fa-solid fa-cat"></i> </h3>
                <p>Supplies for your furr babies</p>
                <div class="share">                    
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fa-brands fa-square-x-twitter"></a>
                </div>
            </div>
            <div class="box">
                <!-- Box -->
                <h3>Contact Info</h3>
                <a href="#" class="links"> <i class="fas fa-envelope"></i> pawsandwhiskers@gmail.com </a>
                <a href="#" class="links"> <i class="fas fa-map-marker-alt"></i> Brgy. Santo Tomas Biñan City, Laguna </a>
            </div>

            <div class="box">
                <!-- Box -->
                <h3>Quick Links</h3>
                <a href="#" class="links"> <i class="fas fa-arrow-right"></i> About us </a>
            </div>

            <div class="box">
                <!-- Box -->
                <h3>Newsletter</h3>
                <p>Subscribe for latest updates</p>
                <input type="email" placeholder="enter your email address" class="email">
                <input type="submit" value="Subscribe" class="btn">
                <img src="images/payment.png" class="payment-img" alt="">
            </div>
        </div>

        <div class="credit"> <span>Made</span> with ♥ by <span> Paws and Whiskers</span> | All Rights Reserved 2024</div>
    </footer>

        <!-- External JavaScript libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        <!-- Custom JavaScript file -->
    <script src="./js/homepage.js"></script>

        <!-- Inline JavaScript for opening items -->
    <script>
        // Function to show/hide item containers
        function openItems(x) {
            // Hide all item containers
            var i, cardContainer, navLinks;
            cardContainer = document.getElementsByClassName("card-container");
            for (i = 0; i < cardContainer.length; i++) {
                cardContainer[i].style.display = "none";
            }
            // Show the selected item container
            document.getElementById(x).style.display = "grid";
        }
        // Automatically click the defaultOpen element to show the default item
        document.getElementById("defaultOpen").click();
		
    </script>
</body>
</html>