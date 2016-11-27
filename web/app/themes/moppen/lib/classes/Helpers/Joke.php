<?php
namespace Sboerrigter\Moppen\Helpers;

final class Joke
{
    public function downvotes()
    {
        $downvotes = get_post_meta(get_the_ID(), '_downvotes', true);
        if (empty($downvotes)) {
            $downvotes = 0;
        }

        return intval($downvotes);
    }

    public function upvotes()
    {
        $upvotes = get_post_meta(get_the_ID(), '_upvotes', true);
        if (empty($upvotes)) {
            $upvotes = 0;
        }

        return intval($upvotes);
    }

    public function totalvotes()
    {
        $totalvotes = $this->downvotes() + $this->upvotes();

        return intval($totalvotes);
    }

    public function rating()
    {
        $rating = get_post_meta(get_the_ID(), '_rating', true);
        if (empty($rating)) {
            $rating = 0;
        }

        return floatval($rating);
    }

    public function mark()
    {
        $mark = $this->rating() * 10;
        $mark = round($mark, 1);

        return floatval($mark);
    }

    public function barwidth()
    {
        $barwidth = $this->rating() * 100;
        $barwidth = $barwidth . '%';

        return $barwidth;
    }
}
