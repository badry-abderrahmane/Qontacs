<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ContactsRepository;

class ContactsController extends Controller
{
    
    protected $contactsRepository;

    public function __construct(ContactsRepository $contactsRepository)
    {
        $this->contactsRepository = $contactsRepository;
    }
    
    /**
     * Contacts Index 
     * 
     * @return View Contacts List 
     */
    public function index()
    {
        return view('contacts.index');
    }

    /**
     * Contacts Create 
     * 
     * @return View Contact Form
     */
    public function create()
    {
        return view('contacts.form');
    }

    /**
     * Contacts Edit 
     * 
     * @return View Contact Form
     */
    public function edit($id)
    {
        $contact = $this->contactsRepository->contactById($id);
        return view('contacts.form', ['contact' => $contact]);
    }

    /**
     * Contacts Paginated List 
     * 
     * @param Request 
     * @return Array Contacts Paginated
     */
    public function getAllPaginated(Request $request) 
    {
        $dataRequest = $request->all();
        $contacts = $this->contactsRepository->allContacts(
            $dataRequest["start"], 
            $dataRequest["length"], 
            $dataRequest["draw"]
        );
        
        return $contacts;    
    }
    
    public function store(Request $request)
    {
        try {
            
            $contact = $this->contactsRepository->createContact($request->all());
    
            return response()->json($contact, 201);
        
        } catch (Illuminate\Database\QueryException $e) {
            
            return response()->json([
                'error' => 'Contact_cannot_create',
                'message' => $e->getMessage()
            ]);        
        }
    }

    public function show($id)
    {
        try {
            
            $contact = $this->contactsRepository->contactById($id);
            
            return view('contacts.show', ['contact' => $contact]);
            
        } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            
            return response()->json([
                'error' => 'Contact_no_found',
                'message' => $e->getMessage()
            ]);
        }
    }
    
    public function update(Request $request, $id)
    {
        // do data validation
        
        try {
            
            $contact = $this->contactsRepository->updateContact($id, $request->all());
            
            return response()->json($contact);
            
        } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            
            return response()->json([
                'error' => 'Contact_no_found',
                'message' => $e->getMessage()
            ]);            
            
        } catch (Illuminate\Database\QueryException $e) {
            
            return response()->json([
                'error' => 'Contact_cannot_update',
                'message' => $e->getMessage()
            ]);
        }
    }
    
    public function destroy($id)
    {
        try {
            
            $data = $this->contactsRepository->deleteContact($id);
    
            return response()->json($data);
            
        } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            
            return response()->json([
                'error' => 'Contact_no_found',
                'message' => $e->getMessage()
            ]);            
            
        } catch (Illuminate\Database\QueryException $e) {
            
            return response()->json([
                'error' => 'Contact_cannot_delete',
                'message' => $e->getMessage()
            ]);
        }
    }    
}

