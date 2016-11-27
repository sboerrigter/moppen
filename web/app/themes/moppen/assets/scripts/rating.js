jQuery(($) => {
  let upvotes = parseInt($('.rating-bar').data('upvotes'), 10);
  let downvotes = parseInt($('.rating-bar').data('downvotes'), 10);
  let rating = parseFloat($('.rating-bar').data('rating'), 10);

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
      url: ajax_object.ajax_url,
      data: {
        action: 'update_rating',
        post_id: ajax_object.post_id,
        upvotes,
        downvotes,
        rating,
      },
    });

    /**
     * Update rating view
     */
    const width = rating * 100;
    $('.rating-bar .bar').css('width', width + '%');
    $('.grade').html(grade);
    $('.totalvotes').html(totalvotes);

    /**
     * Set cookie
     */

    /**
     * Disable rating buttons
     */

    /**
     * Disable rating buttons
     */
  }

  $('.downvote').click(function downvote() {
    downvotes++;
    updateRating();
  });

  $('.upvote').click(function upvote() {
    upvotes++;
    updateRating();
  });
});
