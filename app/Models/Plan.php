namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'Plan';

    protected $fillable = ['PlanName', 'RequiredCredits'];

    public function students()
    {
        return $this->hasMany(Student::class, 'PlanID');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'PlanCourse', 'PlanID', 'CourseID');
    }

    public function progress()
    {
        return $this->hasMany(StudentProgress::class, 'PlanID');
    }
}
