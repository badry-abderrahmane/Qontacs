<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\ContactResource;
use App\Models\Contact;

class ContactsRepository
{
    
    protected $contactResource;
    
    public function __construct(ContactResource $contactResource)
    {
        $this->contactResource = $contactResource;
    }
    
    /**
     * @param array $data
     *
     * @return Contact
     */
    public function createContact(array $data) : Contact
    {
        try {
            return Contact::create($data);
        } catch (QueryException $e) {
            throw new \Exception($e);
        }
    }
    
    /**
     * @param array $data
     *
     * @return bool
     */
    public function updateContact(int $id, array $data) : bool
    {
        $contact = $this->contactById($id);

        try {
            return $contact->update($data);
        } catch (QueryException $e) {
            throw new \Exception($e);
        }
    }

    /**
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     *
     * @return Collection
     */
    public function allContacts($start = 0, $perPage = 10, $search = '', $sortCol = 'id', $sortDir = 'asc', $draw = 1)
    {
        try {
            $contacts = Contact::where('email', 'like', '%' . $search . '%')
                                ->orWhere('first_name', 'like', '%' . $search . '%')
                                ->orWhere('city', 'like', '%' . $search . '%')
                                ->orWhere('birth_date', 'like', '%' . $search . '%')
                                ->orWhere('phone', 'like', '%' . $search . '%')
                                ->orWhere('company', 'like', '%' . $search . '%')
                                ->get()
                                ->sortBy(function($value, $key) use($sortCol) {
                                    return array_keys($value->getAttributes())[(int)$sortCol];
                                }, false, $sortDir);

            $contacts = $this->contactResource->transfrom($contacts)->toArray();

            $paginator = $this->paginateArrayResults($contacts, $start, $perPage);

            return $this->adaptToDataTables($paginator, $contacts, $draw);

        } catch (QueryException $e) {
            throw new \Exception($e);
        }
    }

    /**
     * @param int $id
     *
     * @return Contact
     */
    public function contactById(int $id)
    {
        try {
            return Contact::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new \Exception($e);
        }
    }
    
    /**
     * @return bool
     * @throws \Exception
     */
    public function deleteContact(int $id) : bool
    {
        return Contact::destroy($id);
    }

    /**
     * 
     * @return Intger
     */
    public function totalContacts()
    {
        return Contact::count();
    }

    /**
     * @param array $data
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function paginateArrayResults(array $data, int $start = 0, int $perPage = 50)
    {
        $page = ($start + $perPage) / $perPage;
        return new LengthAwarePaginator(
            array_slice($data, $start, $perPage, false),
            count($data),
            $perPage,
            $page,
            [
                'path' => app('request')->url(),
                'query' => app('request')->query()
            ]
        );
    }

    public function adaptToDataTables(LengthAwarePaginator $paginator, $items, $draw)
    {
        return [
            'draw' => (int)$draw,
            'recordsTotal' => $paginator->total(),
            'recordsFiltered' => $paginator->total(),
            'data' => $paginator->items()
        ];
    }
}

