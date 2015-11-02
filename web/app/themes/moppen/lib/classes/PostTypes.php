<?php
/**
 * Post Types
 */

namespace Trendwerk\TrendPress;

final class PostTypes
{
    public function __construct()
    {
        add_action('init', array($this, 'cptJokes'));
        add_action('init', array($this, 'taxonomyCategory'));
        add_action('admin_menu', array($this, 'removePosts'));
    }

    public function cptJokes()
    {
        /**
         * Register post type "Jokes"
         *
         * @subpackage PostTypes
         */
        register_post_type('jokes', array(
            'labels'            => array(
                'name'          => __('Jokes', 'tp'),
                'singular_name' => __('Joke', 'tp'),
                'add_new'       => __('Add joke', 'tp'),
                'add_new_item'  => __('Add new joke', 'tp'),
                'edit_item'     => __('Edit joke', 'tp'),
            ),
            'public'            => true,
            'has_archive'       => true,
            'menu_icon'         => 'dashicons-smiley',
            'menu_position'     => 5,
            'rewrite'           => array(
                'slug'          => __('jokes', 'tp'),
            ),
            'supports'          => array('title', 'editor'),
        ));
    }

    public function taxonomyCategory()
    {
        /**
         * Register Taxonomy "category"
         *
         * @subpackage Taxonomies
         */
        register_taxonomy('category', 'jokes', array(
            'hierarchical' => true,
            'label'        => __('Category', 'tp'),
            'rewrite'      => array(
                'slug'     => __('category', 'tp'),
            ),
        ));
    }

    public function removePosts()
    {
        /**
         * Remove "Posts" and "Comments" from admin menu
         */
        remove_menu_page('edit.php');
        remove_menu_page('edit-comments.php');
    }
}
