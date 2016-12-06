<?php
use Timber\Post;

$context = Timber::get_context();
$context['post'] = new Post();

$context['categories'] = Timber::get_terms('category');

$args = array(
    'post_type'      => 'jokes',
    'posts_per_page' => 10,
);
$context['newestJokes'] = Timber::get_posts($args, 'Sboerrigter\Moppen\TimberHelpers\Joke');

$args = array(
    'post_type'      => 'jokes',
    'posts_per_page' => 10,
    'orderby'        => array(
        '_rating'    => 'DESC',
        '_upvotes'   => 'DESC',
    )
);
$context['bestJokes'] = Timber::get_posts($args, 'Sboerrigter\Moppen\TimberHelpers\Joke');

Timber::render('front-page.twig', $context);
