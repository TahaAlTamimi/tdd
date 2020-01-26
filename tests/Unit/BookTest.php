<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
class BookTest extends TestCase
{
    use RefreshDatabase;
    /** @test */ 
      public function a_can_add_book_record()
      {
          $this->withoutExceptionHandling();
         Book::create([
            'title'=>'cool title',
            'author_id'=>1,
         ]);
         $this->assertCount(1,Book::all());
         
      
        }
}
