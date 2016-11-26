<?php
$context = Timber::get_context();
$context['post'] = new TimberPost();


if (!empty($upvotes = get_post_meta(get_the_ID(), '_upvotes', true))) {
    $context['upvotes'] = $upvotes;
} else {
    $context['upvotes'] = 0;
}

if (!empty($downvotes = get_post_meta(get_the_ID(), '_downvotes', true))) {
    $context['downvotes'] = $downvotes;
} else {
    $context['downvotes'] = 0;
}

if (!empty($rating = get_post_meta(get_the_ID(), '_rating', true))) {
    $context['rating'] = $rating;
} else {
    $context['rating'] = 0;
}

$context['width'] = floatval($rating) * 100;

$context['archivelink'] = get_post_type_archive_link('jokes');
$context['nextpostlink'] = get_permalink(get_adjacent_post(false, '', true));

Timber::render('single.twig', $context);
