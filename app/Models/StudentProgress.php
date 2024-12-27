namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProgress extends Model
{
    use HasFactory;

    protected $table = 'StudentProgress';

    protected $fillable = ['StudentID', 'PlanID', 'TotalCreditsEarned', 'GraduationStatus'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'StudentID');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'PlanID');
    }
}

