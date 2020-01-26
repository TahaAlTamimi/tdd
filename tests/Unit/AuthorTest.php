<?php

namespace Tests\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class AuthorTest extends TestCase
{
    use RefreshDatabase;
  /** @test */ 
    public function a_can_dob_nullable()
    {
        Author::firstOrCreate([
            'name'=>'john Doe',

        ]);
        $this->assertCount(1,Author::all());
    }

}
