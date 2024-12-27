namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $table = 'Instructor';

    protected $fillable = ['name', 'email', 'RoleID', 'phone', 'password'];

    public function role()
    {
        return $this->belongsTo(Role::class, 'RoleID');
    }

    public function sections()
    {
        return $this->hasMany(Section::class, 'InstructorID');
    }
}
