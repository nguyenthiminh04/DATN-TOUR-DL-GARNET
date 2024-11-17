<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory,SoftDeletes;


    static public function getAll(){

        $return = Comment::select('comments.*',
        'users.name as user_name',
        'tours.name as tour_name',
        'articles.title as article_title')
        ->join('users', 'users.id' ,'=', 'comments.user_id')
        ->join('tours','tours.id', '=', 'comments.tour_id')
        ->join('articles','articles.id', '=', 'comments.article_id')
        ->whereNull('comments.deleted_at')->paginate(10);

        return $return;
    }

}
