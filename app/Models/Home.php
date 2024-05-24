<?

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Home extends Model 
{
    /**
     * @var string
     */
    protected $table = 'home';
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
        'text',
    ];
}