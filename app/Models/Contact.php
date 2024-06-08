<?

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model 
{
    
    /**
     * @var string
     */
    protected $table = 'contacts';
    /**
     * @var bool
     */
    public $timestamps = false;

    /*
     * @var array
     */
    protected $fillable = [
        'title',
        'keywords',
        'description',
        'email',
        'phone',
        'facebook',
        'address',
        'image',
        'geolocation',
    ];
}