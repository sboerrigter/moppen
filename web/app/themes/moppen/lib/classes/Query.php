<?php
namespace Sboerrigter\Moppen;

final class Query
{
    public function __construct()
    {
        add_filter('pre_get_posts', array($this, 'adjust'));
    }

    public function adjust($query)
    {
        if (!is_admin() &&
            $query->is_main_query() &&
            ($query->is_post_type_archive('jokes') || $query->is_category())
        ) {
            $query->set('post_type', 'jokes');
            $query->set('meta_query', array(
                'relation' => 'AND',
                '_rating'  => array('key' => '_rating'),
                '_upvotes' => array('key'  => '_upvotes'),
            ));
            $query->set('orderby', array(
                '_rating'  => 'DESC',
                '_upvotes' => 'DESC',
            ));
            $query->set('posts_per_page', 25);
        }
    }
}
