<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'articles';

  	public function hasManyComments()
  	{
    	return $this->hasMany('App\Comment', 'article_id', 'id');
  	}

  	// public function allArticleComments()
  	// {
   //  	return $this->table->all()->toArray();
  	// }
}
