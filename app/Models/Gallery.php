<?

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model 
{
    
    /**
     * @var string
     */
    protected $table = 'galleries';
    /**
     * @var bool
     */
    public $timestamps = false;

    /*
     * @var array
     */
    protected $fillable = [
        'image',
        'text',
        'service_id',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}