<?php
    namespace App\Utils;

class Review
{
    public $reviews = null;

    public function __construct($reviews)
    {
        $this->reviews = $reviews;
    }

    /**
     * Calculate average rating from all reviews
     * Round the avg rating and return
     */
    public function rating()
    {
        $total_rating = 0;
        foreach ($this->reviews as $review) {
            $total_rating += $review->rating;
        }

        if ($total_rating < 1) {
            return 0;
        }
        return round($total_rating/sizeof($this->reviews), 1);
    }

    /**
     * In case fractional rating like 4.7
     * Calculate the total widh for the last star.
     *
     * Here 30% is the base width of a star icon so we will calculate the fraction from rest 70%
     * Star icon -> item-detail.blade.php
     */
    public function fractionalStarWidth()
    {
        $rating = $this->rating();
        $fraction = $rating - floor($rating);
            
        if ($fraction) {
            return 30 + $fraction*70;
        }

        return 0;
    }
}
