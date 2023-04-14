<?php

namespace App\Console\Commands;

use Support\Str;
use App\Models\Tag;
use App\Models\Article;
use Illuminate\Console\Command;
use Symfony\Component\Validator\Constraints\Length;

class CountArticlesWithTagIdCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'articles:countwithtagid {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Returns count of articles with tag with given id, unless tag exists raises an error';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $id = intval($this->argument("id"));
        $tag = Tag::query()
            ->find($id);

        if ($tag === null) {
            $this->error("Tag with id $id not found");
            return;
        }

        $count = $tag
            ->articles()
            ->count();
        $this->line("Articles with tag: $count");
    }
}
