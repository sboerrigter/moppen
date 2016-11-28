import '../../bower_components/js-cookie/src/js.cookie';

jQuery(($) => {
  let upvotes = parseInt($('.rating-bar').data('upvotes'), 10);
  let downvotes = parseInt($('.rating-bar').data('downvotes'), 10);
  let rating = parseFloat($('.rating-bar').data('rating'), 10);

  const postId = window.ajax_object.post_id;
  const voted = [];
  let votedisabled = false;

  function updateRating() {
    /**
     * Calculate stuff
     */
    const totalvotes = upvotes + downvotes;
    rating = upvotes / totalvotes;
    const grade = Math.round(rating * 100) / 10;

    /**
    * Update Post Meta
    */
    $.ajax({
      url: window.ajax_object.ajax_url,
      data: {
        action: 'update_rating',
        post_id: postId,
        upvotes,
        downvotes,
        rating,
      },
    });

    /**
     * Update rating view
     */
    const width = rating * 100;
    $('.rating').addClass('voted');
    $('.rating .bar').css('width', width + '%');
    $('.rating .grade').html(grade.toFixed(1));
    $('.rating .votes').html(totalvotes);

    /**
     * Set cookie
     */
    voted.push(postId);
    Cookies.set('voted', voted);

    /**
     * Disable voting
     */
    votedisabled = true;
  }

  $('.downvote .button').click(() => {
    if (!votedisabled) {
      downvotes++;
      updateRating();
    }
  });

  $('.upvote .button').click(() => {
    if (!votedisabled) {
      upvotes++;
      updateRating();
    }
  });
});
