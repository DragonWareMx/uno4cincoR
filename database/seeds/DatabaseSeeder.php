<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(bannersTable::class);
        $this->call(sellosTable::class);
        $this->call(booksTable::class);
        $this->call(authorsTable::class);
        $this->call(imagesTable::class);
        $this->call(genresTable::class);
        $this->call(book_genreTable::class);
        $this->call(book_imageTable::class);
        $this->call(author_bookTable::class);

        // $this->call(UserSeeder::class);
    }
}
