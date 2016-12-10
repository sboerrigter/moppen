<?php
$context = Timber::get_context();
$context['post'] = new Sboerrigter\Moppen\TimberHelpers\Joke();

$context['archivelink'] = get_post_type_archive_link('jokes');

$randomjoke = get_posts(array(
    'orderby'        => 'rand',
    'posts_per_page' => '1',
    'post_type'      => 'jokes'
));
$context['nextpostlink'] = get_permalink($randomjoke[0]->ID);

Timber::render('single.twig', $context);
