<?php
$context = Timber::get_context();

$context['posts'] = Timber::get_posts(false, 'Sboerrigter\Moppen\TimberHelpers\Joke');

if (is_category()) {
    $context['title'] = single_cat_title('', false);
} else {
    $context['title'] = 'Grappige moppen';
}

$context['description'] = get_the_archive_description('<div class="archive-description">', '</div>');

$context['pagination'] = Timber::get_pagination(array(
    'mid_size' => 2,
));

Timber::render('index.twig', $context);
