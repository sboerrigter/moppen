<?php
$context = Timber::get_context();

$query = array(
    'order'     => 'DESC',
    'orderby'   => 'meta_value',
    'meta_key'  => '_rating',
    'post_type' => 'jokes',
);
$context['posts'] = Timber::get_posts($query, 'Sboerrigter\Moppen\TimberHelpers\Joke');

if (is_archive()) {
    $context['title'] = 'Moppen';
} else {
    $context['title'] = get_the_title(get_option('page_for_posts'));
}

$context['description'] = get_the_archive_description('<div class="archive-description">', '</div>');
$context['pagination'] = Timber::get_pagination(array(
    'mid_size' => 2,
));

Timber::render('index.twig', $context);
