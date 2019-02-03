
$('#sm-box').delay(3000).slideUp();

$('.delete-post-btn').on('click', function () {

  if (confirm('Are you sure?')) {



  } else {

    return false;

  }

})


$("a[href='#top']").click(function () {
  $("html, body").animate({scrollTop: 0}, "slow");
  return false;
});

