jQuery(($) => {
  let upvotes = parseInt($('.rating').data('upvotes'), 10);
  let downvotes = parseInt($('.rating').data('downvotes'), 10);
  let rating = parseFloat($('.rating').data('rating'), 10);

  $('.downvote').click(function () {
    downvotes++;
    updateRating();
  });

  $('.upvote').click(function () {
    upvotes++;
    updateRating();
  });

  function updateRating() {

    /**
     * Calculate rating
     */
    rating = upvotes / (upvotes + downvotes);

    /**
     * Update Post Meta
     */
    $.ajax({
			url: ajax_object.ajax_url,
			data: {
				action: 'update_rating',
        post_id: ajax_object.post_id,
        upvotes: upvotes,
        downvotes: downvotes,
        rating: rating
			}
		});

    /**
     * Update rating view
     */
    let width = rating * 100;
    $('.rating .bar').css('width', width+'%');

    /**
     * Set cookie
     */

    /**
     * Disable rating buttons
     */

    /**
     * Disable rating buttons
     */
  };
});
