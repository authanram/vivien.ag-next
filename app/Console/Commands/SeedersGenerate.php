<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Riimu\Kit\PHPEncoder\PHPEncoder;

class SeedersGenerate extends Command
{
    protected $signature = 'vivien:seeders:generate';

    protected $description = 'Generate raw seeders from database tables';

    public function handle(): int
    {
        $encoder = new PHPEncoder();

        $tables = DB::select('SHOW TABLES');

        foreach ($tables as $table) {
            $tableName = $table->{'Tables_in_'.config('database.connections.mysql.database')};

            $data = DB::select('SELECT * FROM '.$tableName);

            if (empty($data)) {
                $data = [];
            }

            if (in_array($tableName, config('project-seeders'), true) === false) {
                continue;
            }

            $data = array_map(static fn ($item) => (array)$item, $data);

            $path = database_path('seeds/raw');

            File::ensureDirectoryExists($path);

            $filepath = $path.'/'.Str::of($tableName)->studly()->append('TableSeeder.php')->toString();

            $content = "<?php\n\nreturn ".$encoder->encode($data).";\n";

            file_put_contents($filepath, $content);

            $this->line('Generating <fg=green>'.basename($filepath).'</>');
        }

        return static::SUCCESS;
    }
}
