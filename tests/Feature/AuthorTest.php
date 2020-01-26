<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Author;
use Carbon\Carbon;
use App\Book;

class AuthorTest extends TestCase
{
    use RefreshDatabase;
    /** @test */ 
      public function a_can_add_author()
      {
          $this->withoutExceptionHandling();
         
          $response=  $this->post('/author',[
              'name'=>'cool title',
              'dob'=>'05/14/1988',
          
          ]);
         $author=Author::all();
          $this->assertCount(1,Author::all());
          $this->assertInstanceOf(Carbon::class,$author->first()->dob);
          $this->assertEquals('1988/14/05',$author->first()->dob->format('Y/d/m')); 
      
        }
}
