<?php

namespace App\Repositories;

use App\Models\Member;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class MemberRepository
{
    public function save(array $member): void
    {
        $model = new Member(Arr::except($member, 'profile'));
        $model->save();

        $model = new Profile($member['profile']);
        $model->member_id = $member['id'];
        $model->fields = $model->fields ?? [];
        $model->save();
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return Member::all();
    }
}
