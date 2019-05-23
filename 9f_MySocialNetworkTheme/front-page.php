<?php get_header(); ?>

<?php $navMenu = get_field("navigation_menu"); ?>

<?php $banner = get_field("banner_section"); ?>

<?php $secondSection = get_field("second_section"); ?>

<?php $thirdSectionA = get_field("third_sectiona"); ?>

<?php $thirdSectionB = get_field("third_sectionb"); ?>

<?php $fourthSection = get_field("fourth_section"); ?>

<?php $fifthSection = get_field("fifth_section"); ?>











<div id="container">
    <h1 id="logo">
        <?php echo $banner["title"]; ?>
    </h1>

    <!-- start of collapsible menu -->
    <div class="collapsible-menu">
        <input type="checkbox" id="menu" />
        <label for="menu" id="label"><i class="fa fa-bars" id="icon"> </i></label>



        <div class="menu-content">
            <ul>
                <li><a href="#whoWeAre"><?php echo $navMenu["first_link"]; ?></a></li>
                <li><a href="#boxes-container"><?php echo $navMenu["second_link"]; ?></a></li>
                <li><a href="#ourClients"><?php echo $navMenu["third_link"]; ?></a></li>
                <li><a href="#getInTouch"><?php echo $navMenu["fourth_link"]; ?></a></li>
                <li style="padding-top:3%;">
                    <i class="fab fa-facebook fa-2x" style="padding:10px; color:white"></i>
                    <i class="fab fa-twitter-square fa-2x" style="padding:10px; color:white;"></i>
                    <i class="fab fa-instagram fa-2x" style="padding:10px; color:white;"></i>
                </li>
            </ul>
        </div>
    </div>

    <!-- end of collapsible menu -->

    <!-- start of banner section -->
    <div id="banner">
        <h1>

            <?php echo $banner["banner_headline"]; ?>

        </h1>
        <div id="rectangle"></div>
        <br />
        <br />
        <br />
        <a href="#getInTouch" id="getInTouchShortcut"> <i class="fa fa-chevron-down fa-2x"></i>
        </a>
    </div>
    <!-- end of banner section -->

    <!-- start of second section -->
    <section id="whoWeAre">

        <h1 id="whoWeAre-heading"><?php echo $secondSection["second_section_title"]; ?></h1>

        <p> <?php echo $secondSection["second_section_text"]; ?> </p>

        <img src='<?php echo $secondSection["second_section_image"]; ?>' />

    </section>
    <!-- end of second section -->

    <!-- start of third section revealed info-->

    <div id="reveal1">

        <i class="fa fa-times fa-2x" id="close1"></i>

        <div class="reveal-content">
            <?php echo $thirdSectionB["first_reveal"]; ?>
        </div>
        <br />
        <div class="revealRectangle">
        </div>

        <i class="fas fa-chevron-left fa-2x" id="arrowL1"></i>
        <i class="fas fa-chevron-right fa-2x" id="arrowR1"></i>
    </div>

    <div id="reveal2">

        <i class="fa fa-times fa-2x" id="close2"></i>

        <div class="reveal-content">
            <?php echo $thirdSectionB["second_reveal"]; ?>
        </div>
        <br />
        <div class="revealRectangle">
        </div>

        <i class="fas fa-chevron-left fa-2x" id="arrowL2"></i>
        <i class="fas fa-chevron-right fa-2x" id="arrowR2"></i>
    </div>

    <div id="reveal3">

        <i class="fa fa-times fa-2x" id="close3"></i>

        <div class="reveal-content">

            <?php echo $thirdSectionB["third_reveal"]; ?>

        </div>
        <br />
        <div class="revealRectangle">
        </div>

        <i class="fas fa-chevron-left fa-2x" id="arrowL3"></i>
        <i class="fas fa-chevron-right fa-2x" id="arrowR3"></i>

    </div>

    <div id="reveal4">

        <i class="fa fa-times fa-2x" id="close4"></i>

        <div class="reveal-content">

            <?php echo $thirdSectionB["fourth_reveal"]; ?>

        </div>
        <br />
        <div class="revealRectangle">
        </div>

        <i class="fas fa-chevron-left fa-2x" id="arrowL4"></i>
        <i class="fas fa-chevron-right fa-2x" id="arrowR4"></i>

    </div>

    <div id="reveal5">

        <i class="fa fa-times fa-2x" id="close5"></i>

        <div class="reveal-content">
            <?php echo $thirdSectionB["fifth_reveal"]; ?>
        </div>
        <br />
        <div class="revealRectangle">
        </div>

        <i class="fas fa-chevron-left fa-2x" id="arrowL5"></i>
        <i class="fas fa-chevron-right fa-2x" id="arrowR5"></i>

    </div>

    <div id="reveal6">

        <i class="fa fa-times fa-2x" id="close6"></i>

        <div class="reveal-content">
            <?php echo $thirdSectionB["sixth_reveal"]; ?>
        </div>
        <br />
        <div class="revealRectangle">
        </div>

        <i class="fas fa-chevron-left fa-2x" id="arrowL6"></i>
        <i class="fas fa-chevron-right fa-2x" id="arrowR6"></i>

    </div>
    <!-- end of third section revealed info -->

    <!-- start of third section / 6 coloured boxes section -->
    <div id="boxes-container">

        <div style="background-color:#FF2C42;" id="fbAdCampaigns" class="box">
            <h3 class="boxText"> <?php echo $thirdSectionA["third_section_info_1"]; ?>
            </h3>

            <div class="whiteRectangle">
            </div>
        </div>
        <div style="background-color:#4C27B3" id="fbPageDesign" class="box">
            <h3 class="boxText"> <?php echo $thirdSectionA["third_section_info_2"]; ?>
            </h3>

            <div class="whiteRectangle">
            </div>


        </div>


        <div style="background-color:#00E3B5" id="fbManagement" class="box">
            <h3 class="boxText"> <?php echo $thirdSectionA["third_section_info_3"]; ?>
            </h3>
            <div class="whiteRectangle">
            </div>
        </div>

        <div style="background-color:#00E3B5" id="fbOutreach" class="box">
            <h3 class="boxText"><br />
                <?php echo $thirdSectionA["third_section_info_4"]; ?>
            </h3>
            <div class="whiteRectangle">
            </div>
        </div>

        <div style="background-color:#FF2C42;" id="fbCompetitionApps" class="box">
            <br />
            <h3 class="boxText">
                <?php echo $thirdSectionA["third_section_info_5"]; ?>
            </h3>
            <div class="whiteRectangle">
            </div>

        </div>

        <div style="background-color:#4C27B3" id="fbNetworking" class="box">
            <br />
            <h3 class="boxText"><?php echo $thirdSectionA["third_section_info_6"]; ?>
            </h3>
            <div class="whiteRectangle">
            </div>
        </div>


    </div>

    <!--end of third section / six coloured boxes section-->

    <!-- start of fourth section / our clients section -->

    <section id="ourClients">

        <h1 id="ourClients-heading"><?php echo $fourthSection["fourth_section_title"]; ?></h1>

        <div id="imageSection">



            <?php echo $fourthSection["fourth_section_info"]; ?>


        </div>
    </section>

    <!-- end of fourth section / our clients section -->

    <!-- start of fifth section / get in touch section -->
    <section id="getInTouch">

        <h1><?php echo $fifthSection["fifth_section_title"]; ?></h1>



        <p id="form">
            <?php echo $fifthSection["fifth_section_greeting1"]; ?>



            <br />
            My name is <input type="text" /> <br />
            and my email address is <input type="text" /> <br />
            <?php echo $fifthSection["fifth_section_greeting2"]; ?>
            <br />
            <textarea rows="10" cols="75"> </textarea>
        </p>

        <button>Send enquiry</button>

        <div id="contactDetails">
            <i class="fas fa-at fa-2x"></i>
            <p id="email"><?php echo $fifthSection["fifth_section_email_address"]; ?> </p>
            <br />
            <br />
            <i class="fas fa-phone fa-2x"></i>
            <br />
            <p id="phone"><?php echo $fifthSection["fifth_section_phone_number"]; ?></p>
            <br />
            <i class="fas fa-map-marker-alt fa-2x"></i>
            <p id="address"><?php echo $fifthSection["fifth_section_address_line_1"]; ?> <br /> <?php echo $fifthSection["fifth_section_address_line_2"]; ?> <br /> <?php echo $fifthSection["fifth_section_post_code"]; ?> </p>
        </div>

        <div class="wave" style="--w:100px;--h:40px;--p:12px"></div>

    </section>
    <!-- end of fifth section / get in touch section -->

    <?php get_footer(); ?>