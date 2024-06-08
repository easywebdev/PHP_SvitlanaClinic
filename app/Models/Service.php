<?

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model 
{
    
    /**
     * @var string
     */
    protected $table = 'services';
    /**
     * @var bool
     */
    public $timestamps = false;

    /*
     * @var array
     */
    protected $fillable = [
        'title',
        'name',
        'keywords',
        'description',
        'text',
        'image',
    ];

    public function galleries() : HasMany
    {
        return $this->hasMany(Gallery::class, 'service_id');
    }
}