<?php namespace IlluminatoComments;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'illuminato_comments';
	protected $fillable = array('id_shop', 'id_product', 'firstname', 'lastname', 'email', 'grade', 'comment');
}