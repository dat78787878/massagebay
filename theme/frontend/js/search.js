$(document).ready(function () {
  if ($("#key").length == 0) {
    $.ajaxSetup({
      data: { csrf_tech5s_name: $('meta[name="csrf-token"]').attr("content") },
    });

    var q = "";

    q = $("#key").data("key");

    $.ajax({
      url: "search-tour",

      type: "GET",

      data: { q: q },
    })
    .done(function (data) {
      $(".list_tour_result").html(data);
    });

    $(document).on(
      "click",
      ".list_tour_result .pagination a",
      function (event) {
        event.preventDefault();

        $.ajax({
          url: $(this).attr("href"),

          type: "GET",
        })
        .done(function (data) {
          $(".list_tour_result").html(data);

          var hic = $(".list_tour_result").offset().top - 50;

          $("body,html").animate({ scrollTop: hic }, 800);
        });
      }
    );

    // $.ajax({

    // 	url: 'search-combo',

    // 	type: 'GET',

    // 	data: {q:q}

    // })

    // .done(function(data) {

    // 	$('.list_combo_result').html(data);

    // });

    // $(document).on('click', '.list_combo_result .pagination a', function(event) {

    // 	event.preventDefault();

    // 	$.ajax({

    // 		url: $(this).attr('href'),

    // 		type: 'GET'

    // 	})

    // 	.done(function(data) {

    // 		$('.list_combo_result').html(data);

    // 		var hic = $('.list_combo_result').offset().top - 50;

    // 		$('body,html').animate({ scrollTop: hic }, 800 );

    // 	})

    // });
  }
});
