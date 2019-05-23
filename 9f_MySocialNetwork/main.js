$(document).ready(function() {
  /* change hamburger menu icon to white cross and vice versa */
  $("#menu").on("click", function() {
    $("#icon").toggleClass("fa-times white-icon");
  });

  /* show further information based on the topic when clicking on one of the 6 coloured boxes */
  $("#fbAdCampaigns").on("click", function() {
    $("#boxes-container").toggle();
    $("#reveal1")
      .toggle()
      .css("background-color", "#FF2C42");
  });

  $("#close1").on("click", function() {
    $("#boxes-container").toggle();
    $("#reveal1").toggle();
  });

  /*right and left white arrows allow users to cycle through further information for each topic corresponding to each one of the six coloured boxes*/
  $("#arrowR1").on("click", function() {
    $("#reveal1").toggle();
    $("#reveal2").toggle();
  });

  $("#fbPageDesign").on("click", function() {
    $("#boxes-container").toggle();
    $("#reveal2")
      .toggle()
      .css("background-color", "#4C27B3");
  });

  $("#close2").on("click", function() {
    $("#boxes-container").toggle();
    $("#reveal2").toggle();
  });

  $("#arrowR2").on("click", function() {
    $("#reveal2").toggle();
    $("#reveal3")
      .toggle()
      .css("background-color", "#00E3B5");
  });

  $("#arrowL2").on("click", function() {
    $("#reveal2").toggle();
    $("#reveal1").toggle();
  });

  $("#fbManagement").on("click", function() {
    $("#boxes-container").toggle();
    $("#reveal3")
      .toggle()
      .css("background-color", "#00E3B5");
  });

  $("#close3").on("click", function() {
    $("#boxes-container").toggle();
    $("#reveal3").toggle();
  });

  $("#arrowR3").on("click", function() {
    $("#reveal3").toggle();
    $("#reveal4")
      .toggle()
      .css("background-color", "#00E3B5");
  });

  $("#arrowL3").on("click", function() {
    $("#reveal3").toggle();
    $("#reveal2").toggle();
  });

  $("#fbOutreach").on("click", function() {
    $("#boxes-container").toggle();
    $("#reveal4")
      .toggle()
      .css("background-color", "#00E3B5");
  });

  $("#close4").on("click", function() {
    $("#boxes-container").toggle();
    $("#reveal4").toggle();
  });

  $("#arrowR4").on("click", function() {
    $("#reveal4").toggle();
    $("#reveal5")
      .toggle()
      .css("background-color", "#FF2C42");
  });

  $("#arrowL4").on("click", function() {
    $("#reveal4").toggle();
    $("#reveal3")
      .toggle()
      .css("background-color", "#FF2C42");
  });

  $("#fbCompetitionApps").on("click", function() {
    $("#boxes-container").toggle();
    $("#reveal5")
      .toggle()
      .css("background-color", "#FF2C42");
  });

  $("#close5").on("click", function() {
    $("#boxes-container").toggle();
    $("#reveal5").toggle();
  });

  $("#arrowR5").on("click", function() {
    $("#reveal5").toggle();
    $("#reveal6")
      .toggle()
      .css("background-color", "#4C27B3");
  });

  $("#arrowL5").on("click", function() {
    $("#reveal5").toggle();
    $("#reveal4")
      .toggle()
      .css("background-color", "#4C27B3");
  });

  $("#fbNetworking").on("click", function() {
    $("#boxes-container").toggle();
    $("#reveal6")
      .toggle()
      .css("background-color", "#4C27B3");
  });

  $("#close6").on("click", function() {
    $("#boxes-container").toggle();
    $("#reveal6").toggle();
  });

  $("#arrowL6").on("click", function() {
    $("#reveal6").toggle();
    $("#reveal5")
      .toggle()
      .css("background-color", "#FF2C42");
  });
});
