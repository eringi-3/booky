use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run()
    {
        // Laravel 8以降のファクトリー呼び出し方法
        Book::factory()->count(10)->create();
    }
}
