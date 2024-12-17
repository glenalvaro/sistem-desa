$(function () {
  "use strict";

  /**
   * Create ThemeQuarry ad
   */
  var wrapper_css = {
    padding: "20px 30px",
    background: "#f39c12",
    display: "none",
    "z-index": "999999",
    "font-size": "15px",
    "font-weight": 600,
  };

  var link_css = {
    color: "rgba(255, 255, 255, 0.9)",
    display: "inline-block",
    "margin-right": "10px",
    "text-decoration": "none",
  };

  var wrapper = $("<div />").css(wrapper_css);

  var link = $("<a />", { href: "#" })
    .html(
      "Situs kami saat ini sedang down karena masalah yang tidak terduga. Kami sedang menyelidiki masalah ini dan akan memberikan pembaruan informasi lebih lanjut. Kami mohon maaf atas ketidaknyamanan yang ditimbulkan."
    )
    .css(link_css)
    .hover(function () {
      $(this).css(link_css);
    });

  wrapper.append(link);

  $(".content-wrapper").first().prepend(wrapper);

  wrapper.hide(4).delay(500).slideDown();
});
