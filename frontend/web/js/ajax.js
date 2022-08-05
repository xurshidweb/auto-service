$(document).ready(function () {
  $(document).on("click", "#addToCart", function (e) {
    e.preventDefault();
    let href = $(this).attr("href");

    //animate
    var cart = $(".shopping-cart");
    var imgtodrag = $(this).parent(".item").find("img").eq(0);
    if (imgtodrag) {
      var imgclone = imgtodrag
        .clone()
        .offset({
          top: imgtodrag.offset().top,
          left: imgtodrag.offset().left,
        })
        .css({
          opacity: "0.5",
          position: "absolute",
          height: "150px",
          width: "150px",
          "z-index": "100",
        })
        .appendTo($("body"))
        .animate(
          {
            top: cart.offset().top + 10,
            left: cart.offset().left + 10,
            width: 75,
            height: 75,
          },
          1000,
          "easeInOutExpo"
        );

      setTimeout(function () {
        cart.effect(
          "shake",
          {
            times: 2,
          },
          200
        );
      }, 1500);

      imgclone.animate(
        {
          width: 0,
          height: 0,
        },
        function () {
          $(this).detach();
        }
      );
    }

    $.ajax({
      url: href,
      type: "GET",
      success: function (res) {
        $(".cart-qty").html(res.allCount);
        $(".my-order-table").html(res.content1);
        $("#mydiv").html(res.content);
        $(".related-product").html(res.content2);
      },
    });
  });

  //animation addToCart

  $(".add-to-cart").on("click", function (e) {
    e.preventDefault();
    var cart = $(".shopping-cart");

    var imgtodrag = $(this).parent(".item").find("img").eq(0);
    if (imgtodrag) {
      var imgclone = imgtodrag
        .clone()
        .offset({
          top: imgtodrag.offset().top,
          left: imgtodrag.offset().left,
        })
        .css({
          opacity: "0.5",
          position: "absolute",
          height: "150px",
          width: "150px",
          "z-index": "100",
        })
        .appendTo($("body"))
        .animate(
          {
            top: cart.offset().top + 10,
            left: cart.offset().left + 10,
            width: 75,
            height: 75,
          },
          1000,
          "easeInOutExpo"
        );

      setTimeout(function () {
        cart.effect(
          "shake",
          {
            times: 2,
          },
          200
        );
      }, 1500);

      imgclone.animate(
        {
          width: 0,
          height: 0,
        },
        function () {
          $(this).detach();
        }
      );
    }
  });

  $(document).on("change", ".radio_val", function (e) {
    e.preventDefault();
    let val = $(this).val();
    let sum = $("#summa").html();
    let total = 1 * sum + 1 * val;
    let summa = $("#sum_total").html(total);

    $.ajax({
      url: "/site/ajax",
      data: { sum: total },
      type: "POST",
      success: function (data) {
        console.log(data);
        $("#sum_total").html(total);
      },
    });
  });

  $(document).on("click", ".btn-remove", function (e) {
    e.preventDefault();
    var href = $(this).attr("href");

    $.ajax({
      url: href,
      type: "GET",
      success: function (res) {
        $(".cart-qty").html(res.allCount);
        $(".my-order-table").html(res.content1);
        $("#mydiv").html(res.content);
      },
    });
  });

  //count product
  $(document).on("click", "#productPlus", function (e) {
    e.preventDefault();
    var url = $(this).attr("href");
    let self = $(this);
    let parentTr = self.parentsUntil("tr").parent();
    $.ajax({
      url: url,
      type: "GET",
      success: function (res) {
        parentTr.find(".sum_product_one").html(res.productOneSum);
        $("#count").html(res.count);
        $(".cart-qty").html(res.allCount);
        $(".product-single").html(res.content);
        $("#sum_total").html(res.totalSum);
        $("#summa").html(res.totalSum);
        $("#sum_product_one").html(res.productOneSum);
      },
    });
  });
  //count product

  //minus product

  $(document).on("click", "#product-minus", function (e) {
    e.preventDefault();
    if (parseInt($("#count").val()) >= 0) {
      var val = $(this).attr("href");
      let self = $(this);
      let parentTr = self.parentsUntil("tr").parent();
      $.ajax({
        url: val,
        type: "GET",
        success: (res) => {
          parentTr.find(".sum_product_one").html(res.productOneSum);
          $("#count").html(res.count);
          $(".cart-qty").html(res.allCount);
          $(".product-single").html(res.content);
          $("#sum_total").html(res.totalSum);
          $("#summa").html(res.totalSum);
        },
      });
    }
    if (parseInt($("#count").val()) === 0) {
      $(this).parent().parent().parent().remove();
      var val = $(this).attr("href");

      $.ajax({
        url: "/site/delete",
        type: "GET",
        data: { id: val },
        success: (res) => {
          $("#mydiv").html(res.content);
          // $(".my-order-table").html( .content1);
        },
      });
    }
  });
});
