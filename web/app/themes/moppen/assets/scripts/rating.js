import cookies from '../../bower_components/cookiesjs/cookies';

jQuery(($) => {
  let upvotes = parseInt($('.rating-bar').data('upvotes'), 10);
  let downvotes = parseInt($('.rating-bar').data('downvotes'), 10);
  let rating = parseFloat($('.rating-bar').data('rating'), 10);

  const voted = cookies('voted');
  let voteEnabled = false;

  if (!voted) {
    voteEnabled = true;
    $('.rating').removeClass('disabled');
  }

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
        post_id: window.ajax_object.post_id,
        upvotes,
        downvotes,
        rating,
      },
    });

    /**
     * Update rating view
     */
    const width = rating * 100;
    $('.rating').addClass('disabled');
    $('.rating .bar').css('width', width + '%');
    $('.rating .grade').html(grade.toFixed(1));
    $('.rating .votes').html(totalvotes);

    /**
     * Set cookie
     */
    cookies({ voted: 1 }, { path: '' });

    /**
     * Disable voting
     */
    voteEnabled = false;
  }

  $('.downvote .button').click(() => {
    if (voteEnabled) {
      downvotes++;
      updateRating();
    }
  });

  $('.upvote .button').click(() => {
    if (voteEnabled) {
      upvotes++;
      updateRating();
    }
  });
});
