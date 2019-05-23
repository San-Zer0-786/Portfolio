<?php $banner = get_field("banner_section"); ?>

<?php $navMenu = get_field("navigation_menu"); ?>

<?php $footerSection = get_field("footer_section"); ?>



<footer>
    <h2 id="footer-logo">
        <?php echo $banner["title"]; ?>
    </h2>
    <div id="footer-links">
        <ul>
            <li><a href="#whoWeAre"><?php echo $navMenu["first_link"]; ?></a></li>
            <li><a href="#boxes-container"><?php echo $navMenu["second_link"]; ?></a></li>
            <li><a href="#ourClients"><?php echo $navMenu["third_link"]; ?></a></li>
            <li><a href="#getInTouch"><?php echo $navMenu["fourth_link"]; ?></a></li>
        </ul>
    </div>

    <div id="footer-icons">
        <i class="fab fa-facebook fa-2x"></i>
        <i class="fab fa-twitter-square fa-2x"></i>
        <i class="fab fa-instagram fa-2x"></i>
    </div>

    <div id="footer-business">
        <p>
            <?php echo $footerSection["footer_business_info"]; ?>
        </p>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>