<?php


use Illuminate\Database\Seeder;
use App\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('brands')->delete();
        $brands = ['JINS', '眼鏡市場', 'Zoff', 'メガネスーパー'];
        foreach ($brands as $brand) {
            Brand::create(['name' => $brand]);
        }
    }
}
