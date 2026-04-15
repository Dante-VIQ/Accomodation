<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
try {
    $room = App\Models\Room::create([
        'name' => 'test',
        'type' => 'test',
        'description' => 'desc',
        'price' => 100,
    ]);
    echo 'OK\n';
    var_dump($room->getAttributes());
} catch (Exception $e) {
    echo get_class($e) . ': ' . $e->getMessage() . "\n";
}
