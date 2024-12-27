namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'Student';

    protected $fillable = ['name', 'email', 'PlanID', 'password'];

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'PlanID');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'StudentID');
    }

    public function progress()
    {
        return $this->hasOne(StudentProgress::class, 'StudentID');
    }
}
