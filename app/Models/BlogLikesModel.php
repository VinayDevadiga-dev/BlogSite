<?php namespace App\Models;

use CodeIgniter\Model;

class BlogLikesModel extends Model
{
    protected $table = 'blog_likes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['blog_id', 'user_id'];

    // Check if a user has liked a particular blog post
    public function hasLiked($blogId, $userId)
    {
        return $this->where('blog_id', $blogId)
                    ->where('user_id', $userId)
                    ->countAllResults() > 0;
    }

    // Add a like
    public function addLike($blogId, $userId)
    {
        return $this->insert([
            'blog_id' => $blogId,
            'user_id' => $userId
        ]);
    }

    // Remove a like
    public function removeLike($blogId, $userId)
    {
        return $this->where('blog_id', $blogId)
                    ->where('user_id', $userId)
                    ->delete();
    }

    // Get the total like count for a blog post
    public function getLikeCount($blogId)
    {
        return $this->where('blog_id', $blogId)
                    ->countAllResults();
    }

    // Get the users who liked a particular blog post (optional)
    public function getLikingUsers($blogId)
    {
        return $this->select('users.username')  // Assuming you have a `username` field in `users` table
                    ->join('users', 'users.id = blog_likes.user_id')
                    ->where('blog_id', $blogId)
                    ->findAll();
    }
}
