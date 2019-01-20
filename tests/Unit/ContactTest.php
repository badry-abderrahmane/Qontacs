<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\ContactsRepository;
use App\Models\Contact;
use App\Http\Resources\ContactResource;

class ContactTest extends TestCase
{
    use WithFaker;
    
    /** @test */
    public function it_can_delete_the_Contact()
    {
        $contact = factory(Contact::class)->create();

        $contactRepo = new ContactsRepository(new ContactResource);
        $delete = $contactRepo->deleteContact($contact->id);
        
        $this->assertTrue($delete);
    }

    /** @test */
    public function it_can_show_the_contact()
    {
        $contact        = factory(Contact::class)->create();
        $contactRepo    = new ContactsRepository(new ContactResource);
        $found          = $contactRepo->contactById($contact->id);
        
        $this->assertInstanceOf(Contact::class, $found);
        $this->assertEquals($found->first_name, $contact->first_name);
        $this->assertEquals($found->last_name, $contact->last_name);
        $this->assertEquals($found->birth_date, $contact->birth_date);
        $this->assertEquals($found->email, $contact->email);
        $this->assertEquals($found->city, $contact->city);
        $this->assertEquals($found->company, $contact->company);
        $this->assertEquals($found->phone, $contact->phone);
        $this->assertEquals($found->address, $contact->address);
        $this->assertEquals($found->function, $contact->function);
    }

    /** @test */
    public function it_can_create_a_contact()
    {
        $data = [
            'first_name'    => $this->faker->firstName(),
            'last_name'     => $this->faker->lastName(),
            'birth_date'    => $this->faker->dateTimeThisCentury->format('Y-m-d'),
            'email'         => $this->faker->unique()->safeEmail,
            'city'          => $this->faker->city(),
            'company'       => $this->faker->company(),
            'phone'         => $this->faker->phoneNumber(),
            'address'       => $this->faker->address(),
            'function'      => $this->faker->jobTitle(),
        ];
      
        $contactRepo    = new ContactsRepository(new ContactResource);
        $contact        = $contactRepo->createContact($data);
      
        $this->assertInstanceOf(Contact::class, $contact);
        $this->assertEquals($data['first_name'], $contact->first_name);
        $this->assertEquals($data['last_name'], $contact->last_name);
        $this->assertEquals($data['birth_date'], $contact->birth_date);
        $this->assertEquals($data['email'], $contact->email);
        $this->assertEquals($data['city'], $contact->city);
        $this->assertEquals($data['company'], $contact->company);
        $this->assertEquals($data['phone'], $contact->phone);
        $this->assertEquals($data['address'], $contact->address);
        $this->assertEquals($data['function'], $contact->function);
        
    }
}
