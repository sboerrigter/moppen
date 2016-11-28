<?php
$context = Timber::get_context();
$context['post'] = new Sboerrigter\Moppen\TimberHelpers\Joke();

$context['archivelink'] = get_post_type_archive_link('jokes');
$context['nextpostlink'] = get_permalink(get_adjacent_post(false, '', true));

Timber::render('single-jokes.twig', $context);
