<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Book;
use App\Author;
class BookTest extends TestCase
{
    use RefreshDatabase;
  /** @test */ 
    public function a_can_book_6()
    {
        $this->withoutExceptionHandling();
       
        $response=  $this->post('/books',[
            'title'=>'cool title',
            'author_id'=>'TAMIMI',
        
        ]);
        $book=Book::first();
        // $response->assertOk();
        $this->assertCount(1,Book::all());
        $response->assertRedirect('/books/'.$book->id);
    }

    /** @test */ 
    public function a_title_require()
    {
       
        $response=  $this->post('/books',[
            'title'=>'',
            'author'=>'TAMIMI',
        
        ]);
        $response->assertSessionHasErrors('title');
       
    }

    /** @test */
    public function a_author_require()
    {
       
        $response=  $this->post('/books',array_merge([
            'title'=>'cool title',
            'author'=>'',
        
        ]),['author_id'=>'']);
        $response->assertSessionHasErrors('author_id');
       
    }

       /** @test */
       public function a_can_update()
       {
        $this->withoutExceptionHandling();
           $response=  $this->post('/books',[
               'title'=>'cool title',
               'author_id'=>'TAMIMI',
           
           ]);
            $book=Book::first();
           $response=  $this->patch('/books/'.$book->id,[
            'title'=>'new cool title',
            'author_id'=>'TAMIMIsss',
        
        ]);
        $this->assertEquals('new cool title',Book::first()->title);
        $this->assertEquals(2,Book::first()->author_id);
        $response->assertRedirect('/books/'.$book->id);
       }





       /** @test */
       public function a_can_delete()
       {
        $this->withoutExceptionHandling();
        $response= $this->post('/books',[
               'title'=>'cool title',
               'author_id'=>'TAMIMI',
           
           ]);
           $this->assertCount(1,Book::all());
            $book=Book::first();
           $response=  $this->delete('/books/'.$book->id);
           $this->assertCount(0,Book::all());
           $response->assertRedirect('/books');
       }

        /** @test */
        public function a_can_author_add()
        {
         $this->withoutExceptionHandling();
         $response= $this->post('/books',[
                'title'=>'cool title',
                'author_id'=>'TAMIMI',
            
            ]);
            $book=Book::first();
            $author=Author::first();
            $this->assertEquals($author->id,$book->author_id);
            $this->assertCount(1,Author::all());
             
           
        }
}
