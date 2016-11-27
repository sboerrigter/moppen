<?php
namespace Sboerrigter\Moppen\TimberHelpers;

final class Joke extends \TimberPost
{
    public function rating()
    {
        /* Downvotes */
        $downvotes = get_post_meta($this->id, '_downvotes', true);
        if (empty($downvotes)) {
            $downvotes = 0;
        }

        /* Upvotes */
        $upvotes = get_post_meta($this->id, '_upvotes', true);
        if (empty($upvotes)) {
            $upvotes = 0;
        }

        /* Total votes */
        $totalvotes = $downvotes + $upvotes;

        /* Value */
        $value = get_post_meta($this->id, '_rating', true);
        if (empty($value)) {
            $value = 0;
        }

        /* Grade */
        $grade = round($value * 10, 1);

        /* Bar width */
        $barwidth = $value * 100;

        return array(
            'downvotes' => intval($downvotes),
            'upvotes' => intval($upvotes),
            'totalvotes' => intval($totalvotes),
            'value' => floatval($value),
            'grade' => floatval($grade),
            'barwidth' => $barwidth . '%',
        );

    }
}
