namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'Role';

    protected $fillable = ['RoleName'];

    public function instructors()
    {
        return $this->hasMany(Instructor::class, 'RoleID');
    }
}
