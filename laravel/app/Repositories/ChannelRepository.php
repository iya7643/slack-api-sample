<?php

namespace App\Repositories;

use App\Models\Channel;
use Illuminate\Database\Eloquent\Collection;

class ChannelRepository
{

    public function save(array $channel): void
    {
        $model = new Channel($channel);
        $model->save();
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Channel::all();
    }
}
