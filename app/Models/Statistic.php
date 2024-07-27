<?

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Statistic extends Model 
{
    
    /**
     * @var string
     */
    protected $table = 'statistics';
    /**
     * @var bool
     */
    public $timestamps = false;

    /*
     * @var array
     */
    protected $fillable = [
        'name',
        'url',
        'ip',
        'agent',
        'country',
        'region',
        'city',
        'loc',
        'dt',
    ];
}