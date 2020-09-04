<?php

namespace App\Console\Commands;

use App\Models\Look;
use App\Models\LookHashtag;
use App\Models\TrendingHashtag;
use Carbon\Carbon;
use Illuminate\Console\Command;

class TrendingTags extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:trending-tags';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate trending tags from recently uploaded looks';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // $trendingHashTags = TrendingHashtag::all();
        // foreach ($trendingHashTags as $trendingHashTag) {
        //     $trendingHashTag->delete();
        // }

        $tags = Look::where('is_delete', false)
                ->join('look_hashtags', 'looks.id', 'look_hashtags.look_id')
                ->selectRaw('look_hashtags.hashtag_id, count(look_hashtags.hashtag_id) as tag_count')
                ->where('updated_at', '>', Carbon::now()->subDay(7))
                ->orderBy('tag_count', 'desc')
                ->groupBy('look_hashtags.hashtag_id')
                ->get();

        foreach ($tags as $tag) {
            TrendingHashtag::create([
                'hashtag_id'    => $tag->hashtag_id,
                'total_repeat'  => $tag->tag_count,
            ]);
        }
    }
}
