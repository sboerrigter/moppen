<?php
namespace Sboerrigter\Moppen;

final class Rating
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'addAjaxObject']);
        add_action('wp_ajax_update_rating', [$this, 'update']);
    }

    public function addAjaxObject()
    {
        wp_localize_script('main', 'ajax_object', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'post_id' => get_the_ID(),
        ));
    }

    public function update()
    {
        update_post_meta($_REQUEST['post_id'], '_upvotes', $_REQUEST['upvotes']);
        update_post_meta($_REQUEST['post_id'], '_downvotes', $_REQUEST['downvotes']);
        update_post_meta($_REQUEST['post_id'], '_rating', $_REQUEST['rating']);
        wp_die();
    }
}
