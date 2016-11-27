<?php
$context = Timber::get_context();
$context['post'] = Timber::get_post(false, 'Sboerrigter\Moppen\TimberHelpers\Post');

$context['archivelink'] = get_post_type_archive_link('jokes');
$context['nextpostlink'] = get_permalink(get_adjacent_post(false, '', true));

Timber::render('single.twig', $context);
